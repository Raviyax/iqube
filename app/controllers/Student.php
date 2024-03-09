<?php
class Student extends Controller {
    private $imagepath;
    public $user;
    public $student;
    public $payhere;
    public $complain;
    public function __construct(){
        $this->user = $this->model('User');
        $this->payhere = new Payhere;
        $this->student = $this->model('Students');
        $this->complain = $this->model('Complain');
    }
    public function index(){
        if(Auth::is_logged_in() && Auth::is_student()){
            $data = [
                'title' => 'Student',
                'view' => 'Dashboard'
            ];
            $this->view('Student/Dashboard', $data);
        }
        else{
            redirect('/Login');
        }
    }
    public function purchase_premium(){
        //wrong implementation due to error in payhere end
        if (isset($_POST['status'])) {
            if ($_POST['status'] == 'ok') {
                if($this->student->upgrade_to_premium()){
                // Send a JSON response
                header('Content-Type: application/json');
                echo json_encode(['message' => 'ok']);
                }
                return;
            }
        }
        if(Auth::is_logged_in() && Auth::is_student() && !Auth::is_premium() && Auth::is_completed()){
            $data = [
                'title' => 'Student',
                'view' => 'Purchase Premium',
            ];
            $premiumdata = $this->student->get_premium_data($_SESSION['USER_DATA']['student_id']);
            if($premiumdata){
                $data['payment'] = $this->payhere->premium($premiumdata->cno, $premiumdata->address, $premiumdata->city, $premiumdata->fname, $premiumdata->lname);
                $data['premiumdata'] = $premiumdata;
                $this->view('Student/Pay', $data);
                return;
            }
            if(isset($_POST['premium']) && !$this->student->get_premium_data($_SESSION['USER_DATA']['student_id'])){
            $this->view('Student/Purchase_premium', $data);
            return;
            }
            if(isset($_POST['next-to-confirmation'])){
                if($this->student->validate_insert_to_premium_students($_POST)){
                    if($this->student->insert_to_premium_students($_POST)){
                        $premiumdata = $this->student->get_premium_data($_SESSION['USER_DATA']['student_id']);
                        if($premiumdata){
                            $data['payment'] = $this->payhere->premium($premiumdata->cno, $premiumdata->address, $premiumdata->city, $premiumdata->fname, $premiumdata->lname);
                            $data['premiumdata'] = $premiumdata;
                            $this->view('Student/Pay', $data);
                            return;
                        }
                    }
                }
                else{
                    $data['errors'] = $this->student->errors;
                    $this->view('Student/Purchase_premium', $data);
                    return;
                }
            }
            $this->view('Student/Premium', $data);
        }
        else{
            redirect('/Login');
        }
    }
    public function userimage($image)
    {
        if (Auth::is_logged_in() && Auth::is_student()) {
            $this->retrive_media($image, '/uploads/userimages/');
        } else {
            $this->view('Noaccess');
        }
    }
    public function study_materials(){
        if(!Auth::is_completed())
        if(Auth::is_logged_in() && Auth::is_student() && Auth::is_completed()){
            $data = [
                'title' => 'Student',
                'view' => 'Study Materials'
            ];
            $this->view('Student/Study_materials', $data);
        }
        else{
            redirect('/Login');
        }
    }
    public function more_details()
    {
        if (Auth::is_logged_in() && Auth::is_student()) {
            if (!Auth::is_completed()) {
                $data = [
                    'title' => 'Student',
                    'view' => 'More Details',
                    'subjects' => $this->user->query("SELECT * FROM subjects"),
                ];
                if (isset($_POST['proceed'])) {
                    // Sanitize and validate input if necessary
                    // Move the logic to the Student model
                    if ($this->student->complete_profile()) {
                        redirect('/Student');
                        return;
                    }
                }
                $this->view('Student/More_details', $data);
            } else {
                redirect('/Student');
            }
        } else {
            redirect('/Login');
        }
    }
public function profile(){
    if(Auth::is_logged_in() && Auth::is_student()){
        $data = [
            'title' => 'Student',
            'view' => 'Profile',
        ];
        $this->view('Student/Profile', $data);
        if(isset($_POST['submit'])){
            $this->student->update_profile();
        }
    }
    else{
        redirect('/Login');
    }
}
public function syllabus(){
    if(Auth::is_logged_in() && Auth::is_student()){
        $data = [
            'title' => 'Student',
            'view' => 'Syllabus',
        ];
        $this->view('Student/Syllabus', $data);
    }
    else{
        redirect('/Login');
    }
}
public function threads(){
    if(Auth::is_logged_in() && Auth::is_student()){
        $data = [
            'title' => 'Student',
            'view' => 'Threads',
        ];
        $this->view('Student/Threads', $data);
    }
    else{
        redirect('/Login');
    }
}
public function tutors(){
    if(Auth::is_logged_in() && Auth::is_student()){
        $data = [
            'title' => 'Student',
            'view' => 'Tutors',
            'tutors' => $this->user->query("SELECT * FROM tutors"),
        ];
        $this->view('Student/Tutors', $data);
    }
    else{
        redirect('/Login');
    }
}
public function verify_email(){
     $token = isset($_GET['token']) ? $_GET['token'] : '';
        $email = isset($_GET['email']) ? $_GET['email'] : '';
        if($this->student->verify_email($token, $email)){
            $data = [
                'title' => 'Student',
                'view' => 'Email Verified',
            ];
            $this->view('Student/Email_verified', $data);
            //after 5 seconds redirect to login page
            header("refresh:3;url=".URLROOT."/Login");
        }
        else{
           echo "Invalid verification link";
        }
}
public function iqube_support(){
    if(Auth::is_logged_in() && Auth::is_student()){
        if(isset($_POST['about_complain'])){
            $complain_id = $this->complain->start_complain($_POST['about_complain'], 'IQube Support');
            if($complain_id){
              
                $this->view('Student/Complain');
            }
           
        } 
     
      $this->view('Student/Start_complain');
  
           
    }
  
  
}
}
