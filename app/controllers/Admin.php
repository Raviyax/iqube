<?php
class Admin extends Controller
{

    public $Subjectadmin;

    public function index()
    {
        if (Auth::is_logged_in() && Auth::is_admin()) {
            $data = [
                'title' => 'Admin',
                'view' => 'Dashboard'
            ];
            $this->view('Admin/dashboard', $data);
        } else {
            redirect('/Login');
        }
    }

    public function users()
    {
        if (Auth::is_logged_in() && Auth::is_admin()) {
           

            $data['errors'] = [];
            $data['title'] = 'Users';
            $this->view('Admin/Users', $data);
            $this->Subjectadmin = $this->model('Subjectadmin');
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if ($this->Subjectadmin->validate($_POST)) {
                    $row = $this->Subjectadmin->first([
                        'email' => $_POST['email']
                    ], 'users', 'user_id');
                    $_POST['user_id'] = $row->user_id;
    
    
    
    
                    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $this->Subjectadmin->insert($_POST, 'users', ['username', 'email', 'password']);
                    $row = $this->Subjectadmin->first([
                        'email' => $_POST['email']
                    ], 'users', 'user_id');
                    $_POST['user_id'] = $row->user_id;
                    $this->Subjectadmin->insert($_POST, 'subject_admins', ['user_id','subject','fname','lname', 'username', 'email','cno']);
    
    
    
                    header('location:' . URLROOT . '/Admin/Users');
                } else {
                    $data['errors'] = $this->Subjectadmin->errors;
                    $data['title'] = 'Signup';
                    $this->view('Admin/Users', $data);
                }
            }


        } else {
            redirect('/Login');
        }
    }

    
    public function subject_admins()
    {
        if (Auth::is_logged_in() && Auth::is_admin()) {
            $data = [
                'title' => 'Admin',
                'view' => 'Dashboard'
            ];
            $this->view('Admin/Subjectadmins', $data);
        } else {
            redirect('/Login');
        }
    }

    public function tutors()
    {
        if (Auth::is_logged_in() && Auth::is_admin()) {
            $data = [
                'title' => 'Admin',
                'view' => 'Dashboard'
            ];
            $this->view('Admin/tutors', $data);
        } else {
            redirect('/Login');
        }
    }

    public function students()
    {
        if (Auth::is_logged_in() && Auth::is_admin()) {
            $data = [
                'title' => 'Admin',
                'view' => 'Dashboard'
            ];
            $this->view('Admin/students', $data);
        } else {
            redirect('/Login');
        }
    }
}


