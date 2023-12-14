<?php
class Admin extends Controller
{

    public $Subjectadmin;
    public $user;
    public $subject;

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
            $data['view'] = 'Manage Users';
            $this->user = $this->model('user');
           
            $data['subjectadmins'] = $this->user->query("SELECT * FROM subject_admins");
            $data['subjects'] = $this->user->query("SELECT * FROM subjects");
            $this->Subjectadmin = $this->model('Subjectadmin');
            $this->view('Admin/Users', $data);
            

           
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

    
    
    public function profile()
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

    public function all_subject_admins($subject=null)
    {
        if (Auth::is_logged_in() && Auth::is_admin()) {
            $this->Subjectadmin = $this->model('Subjectadmin');
            $data['subject'] = [];
           if($subject!=null){ $data['subjectadmins'] = $this->Subjectadmin->query("SELECT * FROM subject_admins WHERE subject='$subject'"); $data['subject']=$subject;}else{
            $data['subjectadmins'] = $this->Subjectadmin->query("SELECT * FROM subject_admins");}

            $data['subjects'] = $this->Subjectadmin->query("SELECT * FROM subjects");
        $data['title'] = 'All Subject Admins';
        $data['view'] = 'All Subject Admins';
            
            $this->view('Admin/All_subject_admins', $data);
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
                    $this->view('Admin/All_subject_admins', $data);

                }
            }

        } else {
            redirect('/Login');
        }
    }

    public function Subject_admin_profile($id){
        if (Auth::is_logged_in() && Auth::is_admin()) {
            $data = [
                'title' => 'Subject Admin',
                'view' => 'Subject Admin Profile',
            ];
        
            $this->Subjectadmin = $this->model('Subjectadmin');
            $data['subjectadmin'] = $this->Subjectadmin->first([
                'subject_admin_id' => $id
            ], 'subject_admins', 'subject_admin_id');
            $data['profilepic'] = $this->Subjectadmin->get_image($data['subjectadmin']->image, "/uploads/userimages/");
            $this->view('Admin/Subject_admin_profile', $data);
        
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if ($_POST['email'] != $data['subjectadmin']->email) {
                    if ($this->Subjectadmin->first([
                        'email' => $_POST['email']
                    ], 'users', 'user_id')) {
                        $data['errors'] = ['email' => 'Email already exists'];
                        $this->view('Admin/Subject_admin_profile', $data);
                    } else {
                        $this->Subjectadmin->query("UPDATE users SET email=?, username=? WHERE email=?", [
                            $_POST['email'],
                            $_POST['username'],
                            $data['subjectadmin']->email
                        ]);
                        $this->Subjectadmin->query("UPDATE subject_admins SET email=?, username=?, fname=?, lname=?, cno=? WHERE subject_admin_id=?", [
                            $_POST['email'],
                            $_POST['username'],
                            $_POST['fname'],
                            $_POST['lname'],
                            $_POST['cno'],
                            $data['subjectadmin']->subject_admin_id
                        ]);
                    }
                } else {
                    $this->Subjectadmin->query("UPDATE users SET email=?, username=? WHERE email=?", [
                        $_POST['email'],
                        $_POST['username'],
                        $data['subjectadmin']->email
                    ]);
                    $this->Subjectadmin->query("UPDATE subject_admins SET email=?, username=?, fname=?, lname=?, cno=? WHERE subject_admin_id=?", [
                        $_POST['email'],
                        $_POST['username'],
                        $_POST['fname'],
                        $_POST['lname'],
                        $_POST['cno'],
                        $data['subjectadmin']->subject_admin_id
                    ]);
                }
            }
        } else {
            redirect('/Login');
        }
        
    }
}


