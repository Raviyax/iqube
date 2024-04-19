<?php
class Signup extends Controller
{
    public $User;
    public $student;
    public function index()
    {
        $data['errors'] = [];
        $data['title'] = 'Signup';
        $this->User = $this->model('User');
        $this->student = $this->model('Students');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->User->validate($_POST)) {
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $this->User->insert($_POST, 'users', ['username', 'email', 'password']);
                $row = $this->User->first([
                    'email' => $_POST['email']
                ], 'users', 'user_id');
                $_POST['user_id'] = $row->user_id;
                $this->User->insert($_POST, 'students', ['user_id', 'username', 'email']);
                if ($this->student->send_verification_email($_POST['email'])) {
                    $data['notification'] = 'Verification email has been sent to your email address';
                    $this->view('Login', $data);
                    return;
                }
            } else {
                $data['title'] = 'Signup';
                $data['errors'] = $this->User->errors;
                $this->view('Signup', $data);
                return;
            }
        }
        $this->view('Signup', $data);
    }
}
