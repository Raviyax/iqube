<?php
class Admin extends Controller
{

    public $Subjectadmin;
    public $user;
    public $subject;

    public function __construct()
    {
        $this->user = $this->model('User');
        $this->Subjectadmin = $this->model('Subjectadmin');
        $this->subject = $this->model('Subjects');
    }

    public function login()
    {
        if (Auth::is_logged_in() && Auth::is_admin()) {
            redirect('/Admin');
        } else {
            $data = [
                'title' => 'Login',
                'view' => 'Login'
            ];
           
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
          if($this->user->validate_admin_login($_POST)){
                Auth::authenticate_admin($this->user->validate_admin_login($_POST));
                redirect('/Admin');


            }
            else{
                $data['errors'] = $this->user->login_errors;
                $this->view('Admin/login', $data);
            }
        }
         $this->view('Admin/login', $data);
    }
}




    public function index()
    {
        if (Auth::is_logged_in() && Auth::is_admin()) {
            $data = [
                'title' => 'Admin',
                'view' => 'Dashboard'
            ];
            $this->view('Admin/dashboard', $data);
        } else {
            redirect('/admin/login');
        }
    }   

    public function users()
    {
        if (Auth::is_logged_in() && Auth::is_admin()) {

           
      

           

            $data['errors'] = [];
            $data['title'] = 'Users';
            $data['view'] = 'Manage Users';
            $this->user = $this->model('user');
            $this->Subjectadmin = $this->model('Subjectadmin');
            $this->subject = $this->model('Subjects');
           
            $data['subjectadmins'] = $this->Subjectadmin->get_subject_admins();
            $data['subjects'] = $this->subject->get_subjects();
          
            $this->view('Admin/Users', $data);
            

           
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if ($this->Subjectadmin->validate($_POST)) {
                    $this->Subjectadmin->add_new_subject_admin($_POST);       
                } else {
                    $data['errors'] = $this->Subjectadmin->errors;
                    $data['title'] = 'Signup';
                    $this->view('Admin/Users', $data);
                }
            }


        } else {
            redirect('/admin/login');
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
            redirect('/admin/login');
        }
    }

    public function all_subject_admins($subject=null)
    {
        if (Auth::is_logged_in() && Auth::is_admin()) {
            $this->Subjectadmin = $this->model('Subjectadmin'); 
            $this->subject = $this->model('Subjects');
            $data['subject'] = $subject;
            $data['subjectadmins'] = $this->Subjectadmin->get_subject_admins($subject);
            $data['subjects'] = $this->subject->get_subjects();
          

            
        $data['title'] = 'All Subject Admins';
        $data['view'] = 'All Subject Admins';
            
            $this->view('Admin/All_subject_admins', $data);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if ($this->Subjectadmin->validate($_POST)) {
                    $this->Subjectadmin->add_new_subject_admin($_POST);       
                } else {
                    $data['errors'] = $this->Subjectadmin->errors;
                    $data['title'] = 'Signup';
                    $this->view('Admin/All_subject_admins', $data);
                }
            }
        

        } else {
            redirect('/admin/login');
        }
    }

    public function Subject_admin_profile($id){
        if (Auth::is_logged_in() && Auth::is_admin()) {
            $data = [
                'title' => 'Subject Admin',
                'view' => 'Subject Admin Profile',
            ];
        
            $this->Subjectadmin = $this->model('Subjectadmin');
            $data['subjectadmin'] = $this->Subjectadmin->get_subject_admin($id);
            $this->view('Admin/Subject_admin_profile', $data);
        
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if ($_POST['email'] != $data['subjectadmin']->email) {
                    if ($this->Subjectadmin->first(['email' => $_POST['email']], 'users', 'user_id')) {
                        $data['errors'] = ['email' => 'Email already exists'];
                        $this->view('Admin/Subject_admin_profile', $data);
                    } else {
                        $this->Subjectadmin->update_subject_admin($_POST, $id);
                    }
                } else {
                    $this->Subjectadmin->update_subject_admin($_POST, $id);
                }
            }
        } else {
            redirect('/admin/login');
        }
        
    }

    public function userimage($image) {
       
        if(Auth::is_logged_in() && Auth::is_admin()){
            $this->retrive_media($image,'/uploads/userimages/');
        }
       
        else{
            redirect('/admin/login');
        }
    }

}


