<?php
class Landing extends Controller {
    public $user;
    public function __construct(){
        $this->user = $this->model('User');
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

    $data['view'] = 'Make a tutor request';
    $this->view('Landing/Tutor_request',$data);
}
}