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
            $this->Subjectadmin = $this->model('Subjectadmins');
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if ($this->Subjectadmin->validate($_POST)) {
                   
    
    
                    $_POST['role'] = 'subject_admin';
                    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $this->Subjectadmin->insert($_POST, 'users', ['username', 'email', 'password', 'role']);
                    $row = $this->Subjectadmin->first([
                        'email' => $_POST['email']
                    ], 'users', 'user_id');
                    $_POST['user_id'] = $row->user_id;
                    $this->Subjectadmin->insert($_POST, 'subject_admins', ['user_id','subject','fname','lname', 'username', 'email','cno']);
    
    
    
                   
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

    
    
    public function profile($id = null)
    {
        if (Auth::is_logged_in() && Auth::is_admin()) {
          
            
            $data = [
                'title' => 'Profile',
                
            ];
            $this->view('Admin/profile', $data);
        } else {
            redirect('/Login');
        }
    }
}


