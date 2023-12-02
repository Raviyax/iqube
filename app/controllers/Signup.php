<?php
class Signup extends Controller
{

    public $User;


    public function index()
    {
        $data['errors'] = [];
        $data['title'] = 'Signup';
        $this->view('Signup', $data);
        $this->User = $this->model('User');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->User->validate($_POST)) {
              




                $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $this->User->insert($_POST, 'users', ['username', 'email', 'password']);
                $row = $this->User->first([
                    'email' => $_POST['email']
                ], 'users', 'user_id');
                $_POST['user_id'] = $row->user_id;
                $this->User->insert($_POST, 'students', ['user_id', 'username', 'email']);
                
                



                header('location:' . URLROOT . '/login');
            } else {
                $data['errors'] = $this->User->errors;
              
                $data['title'] = 'Signup';
                $this->view('Signup', $data);
            }
        }
    }
}
