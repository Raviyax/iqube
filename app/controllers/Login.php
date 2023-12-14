<?php
class Login extends Controller
{       
   

    public function index(){

        if(!Auth::is_logged_in()){
           
        
        $row = [];
        $studentdata = [];
        $tutordata = [];
        $subjectadmindata = [];
        $premiumdata = [];

        $data['title'] = 'Login';
        $data['errors'] = [];
        $user = $this->model('User');
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $row = $user->first([
                   'email' => $_POST['email']],'users','user_id');
            $subjectadmindata = $user->first([
                    'email' => $_POST['email']],'subject_admins','subject_admin_id');
                    $studentdata = $user->first([
                        'email' => $_POST['email']],'students','student_id');
                        $tutordata = $user->first([
                            'email' => $_POST['email']],'tutors','tutor_id');
                            $premiumdata = $user->first([
                                'email' => $_POST['email']],'premium_students','pro_id');
               
            if($row){
                
                if(password_verify($_POST['password'], $row->password)){
                    Auth::authenticate($row, $subjectadmindata, $studentdata, $tutordata, $premiumdata);
                  if( Auth::is_tutor()){ header('location:'.URLROOT.'/tutor');}
                    if( Auth::is_admin()){ header('location:'.URLROOT.'/admin');}
                    if( Auth::is_student()){ header('location:'.URLROOT.'/student');}
                    if( Auth::is_subject_admin()){ header('location:'.URLROOT.'/subjectadmin');}
                  
                   
                   
                }

                $data['errors']['email_err'] = '*Wrong Email or Password';

            }
        }
        $this->view('login', $data);
        
        
}
    
    else{
        header('location:'.URLROOT.'/Landing');
    }
    
}
}