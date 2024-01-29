<?php
class Student extends Controller {
    private $imagepath;
    public $user;
    public $student;
    public function index(){
        if(Auth::is_logged_in() && Auth::is_student()){
            $data = [
                'title' => 'Student',
                'view' => 'Dashboard'
            ];
            $this->view('Student/dashboard', $data);
        }
        else{
            redirect('/Login');
        }
    }
    public function purchase_premium(){
        if(Auth::is_logged_in() && Auth::is_student() && !Auth::is_premium() && Auth::is_completed()){
            $data = [
                'title' => 'Student',
                'view' => 'Purchase Premium'
            ];
            $this->view('Student/purchase_premium', $data);
            //temporarily
            if(isset($_POST['pay'])){
                $this->student = $this->model('student');
                $this->student->pay();
            }
        }
        else{
            redirect('/Login');
        }
    }
    public function signup_premium(){
        if(Auth::is_logged_in() && Auth::is_student() && !Auth::is_premium() && Auth::is_completed()){
            if(Auth::is_paid()){
                $data = [
                    'title' => 'Student',
                    'view' => 'Signup Premium'
                ];
                $this->view('Student/Signup_premium', $data);
                if(isset($_POST['signup'])){
                    $this->student = $this->model('student');
                    $this->student->signup_premium();
                }
            }else{
               echo "<script>alert('Please pay first')</script>";
            }
        }
        else{
            redirect('/Login');
        }
    }
    public function userimage($image) {
        if(Auth::is_logged_in() && Auth::is_student()){
            $this->media($image,'/uploads/userimages/');
        }
        else{
            redirect('/Login');
        }
    }
    public function study_materials(){
        if(!Auth::is_completed())
        if(Auth::is_logged_in() && Auth::is_student() && Auth::is_completed()){
            $data = [
                'title' => 'Student',
                'view' => 'Study Materials'
            ];
            $this->view('Student/study_materials', $data);
        }
        else{
            redirect('/Login');
        }
    }
    public function more_details(){
        if(Auth::is_logged_in() && Auth::is_student()){
            if(!Auth::is_completed()){
                $data = [
                    'title' => 'Student',
                    'view' => 'More Details',
                    'subjects' => $this->model('user')->query("SELECT * FROM subjects"),
                ];
                $this->view('Student/more_details', $data);
                if(isset($_POST['proceed'])){
                    $this->student = $this->model('student');
                    $this->student->complete_profile();
                }
            }
            else{
                redirect('/Student');
            }
        }
        else{
            redirect('/Login');
        }
    }
}
