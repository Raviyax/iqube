<?php
class Staff extends Controller{
    public $user;
    public function __construct()
    {
        $this->user = $this->model('User');
        if (Auth::is_logged_in() && Auth::is_admin()) {
            redirect('/Admin');
        }
        else if(Auth::is_logged_in() && Auth::is_subject_admin()){
            redirect('/Subjectadmin');
        }
        else {
            $data = [
                'title' => 'Staff Login',
                'view' => 'Staff Login'
            ];
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          if($this->user->validate_admin_login($_POST)){
                Auth::authenticate_admin($this->user->validate_admin_login($_POST));
                redirect('/Admin');
            }
            elseif($this->user->validate_subject_admin_login($_POST)){
                Auth::authenticate_subject_admin($this->user->validate_subject_admin_login($_POST), $this->user->load_subject_admin_data($_POST['email']));
                redirect('/Subjectadmin');
            }
            else{
                $data['errors'] = $this->user->login_errors;
                $this->view('Staff_login/Login', $data);
            }
        }
         $this->view('Staff_login/Login', $data);
    }
    }
}