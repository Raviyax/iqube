<?php
class Landing extends Controller {
    public $user;
    public $subjects;
    public $tutors;
    public function __construct(){
        $this->user = $this->model('User');
        $this->subjects = $this->model('Subjects');
        $this->tutors = $this->model('Tutors');
    }
    public function index(){
       $data['view'] = 'Home';
        $this->view('Landing/Landing',$data);
    }
    public function be_an_iqube_tutor(){
        $data['view'] = 'Be an IQube Tutor';
        $this->view('Landing/Be_a_tutor',$data);
    }
    public function login_as_a_tutor()
    {
        if (Auth::is_logged_in() && Auth::is_tutor()) {
            redirect('/tutor');
        } else {
            $data = [
                'title' => 'Login as a tutor',
                'view' => 'Login as a tutor'
            ];
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          if($this->user->validate_tutor_login($_POST)){
                Auth::authenticate_tutor($this->user->validate_tutor_login($_POST), $this->user->load_tutor_data($_POST['email']));
                redirect('/tutor');
            }
            else{
                $data['errors'] = $this->user->login_errors;
                $this->view('Landing/Tutor_login',$data);
            }
        }
        $this->view('Landing/Tutor_login',$data);
    }
}
public function activate_tutor_account($email,$password){
    if($this->tutors->activate_tutor_account($email,$password)){
    }
    else{
        // $data['view'] = 'Invalid activation link';
        // $this->view('Landing/invalid_activation_link',$data);
        echo "Invalid activation link";
    }
}
public function make_a_tutor_request(){
    $data['subjects'] = $this->subjects->get_subjects();
    $data['view'] = 'Make a tutor request';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if($this->tutors->validate_tutor_requests($_POST,$_FILES['fileToUpload'])){
            $cv=  $this->upload_media($_FILES['fileToUpload'],'/uploads/cv/');
            // $this->tutors->make_a_tutor_request($_POST,$cv);
            // redirect('/Landing');
            if($this->tutors->make_a_tutor_request($_POST,$cv)){
                $data['view'] = 'Confirm request';
                $this->view('Landing/Confirm_request',$data);
                //wait for 3 seconds and redirect to home
                header("refresh:3;url=".URLROOT."/Landing");
            }
    
        }
        else{
            $data['errors'] = $this->tutors->request_errors;
            $data['fname'] = $_POST['fname'];
            $data['lname'] = $_POST['lname'];
            $data['cno'] = $_POST['cno'];
            $data['username'] = $_POST['username'];
            $data['email'] = $_POST['email'];
            $this->view('Landing/Tutor_request',$data);
            $this->view('Landing/Tutor_request',$data);
    }
}
$this->view('Landing/Tutor_request',$data);
}
}