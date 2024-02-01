<?php
class Login extends Controller
{
    public function index(){
        if(!Auth::is_logged_in()){
        $row = [];
        $studentdata = [];
        $premiumdata = [];
        $data['title'] = 'Login';
        $data['errors'] = [];
        $user = $this->model('User');
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($user->google_recaptcha($_POST['g-recaptcha-response']) == false){
                $data['errors']['captcha_err'] = '*Please check the captcha';
                $this->view('login', $data);
            }

            $row = $user->first([
                   'email' => $_POST['email']],'users','user_id');
                    $studentdata = $user->first([
                        'email' => $_POST['email']],'students','student_id');
                            $premiumdata = $user->first([
                                'email' => $_POST['email']],'premium_students','pro_id');
            if($row){
                if(password_verify($_POST['password'], $row->password)){
                    Auth::authenticate($row, $studentdata,$premiumdata);
                    if( Auth::is_student()){ header('location:'.URLROOT.'/student');}
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