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
    public function be_an_IQube_tutor(){
        $data['view'] = 'Be an IQube Tutor';
        $this->view('Landing/Be_a_tutor',$data);
    }
    public function Login_as_a_tutor()
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
                $this->view('Landing/tutor_login',$data);
            }
        }
        $this->view('Landing/tutor_login',$data);
    }
}
public function make_a_tutor_request(){
    $data['subjects'] = $this->subjects->get_subjects();

    $data['view'] = 'Make a tutor request';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {



        if($this->tutors->validate_tutor_requests($_POST,$_FILES['fileToUpload'])){
            $cv=  $this->upload_media($_FILES['fileToUpload'],'/uploads/cv/');
            $this->tutors->make_a_tutor_request($_POST,$cv);
            redirect('/Landing');

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