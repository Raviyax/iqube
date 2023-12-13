<?php
class Subjectadmin extends Controller

{
    public $tutor;
    
    private $me;

    public function index()
    {
        if (Auth::is_logged_in() && Auth::is_subject_admin()) {
            $data = [
                'title' => 'Subject Admin',
                'view' => 'Dashboard'
                
            ];
            $this->view('Subject_admin/Dashboard', $data);
        } else {
            redirect('/Login');
        }
    }

    public function profile()
    {
        if (Auth::is_logged_in() && Auth::is_subject_admin()) {

            $data = [
                'title' => 'Subject Admin',
                'view' => 'My Profile',
                

                
            ];

          
            $this->view('Subject_admin/Profile', $data);
            $this->me = $this->model('User');


            if (isset($_POST["submit"])) {

               
               $uniqueFilename = generate_unique_filename($_FILES["image"]);
        
               $this->me->update_image($_FILES["image"],APPROOT."/uploads/userimages/","UPDATE subject_admins SET image = '{$uniqueFilename}' WHERE user_id = '{$_SESSION['USER_DATA']['user_id']}'");

               $_SESSION['USER_DATA']['image'] = Database::get_image( $uniqueFilename, "/uploads/userimages/");
              
              
               

            }
        } else {
            redirect('/Login');
        }
    }

    public function Tutors()
    {
        if (Auth::is_logged_in() && Auth::is_subject_admin()) {

           
      

           

            $data['errors'] = [];
            $data['title'] = 'Tutors';
            $data['view'] = 'Tutors';
            
            $this->tutor = $this->model('Tutors');
            $data['tutors'] = $this->tutor->query("SELECT * FROM tutors WHERE subject = '{$_SESSION['USER_DATA']['subject']}'");

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if ($this->tutor->validate($_POST)) {
                   
    
    
                    $_POST['role'] = 'tutor';
                    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $this->tutor->insert($_POST, 'users', ['username', 'email', 'password', 'role']);
                    $row = $this->tutor->first([
                        'email' => $_POST['email']
                    ], 'users', 'user_id');
                    $_POST['user_id'] = $row->user_id;
                    $this->tutor->insert($_POST, 'tutors', ['user_id','subject','fname','lname', 'username', 'email','cno']);
    
    
    
                   
                } else {
                    $data['errors'] = $this->tutor->errors;
                    $data['title'] = 'tutors';
                    $this->view('Subject_admin/Tutors', $data);
                }
            }
            $this->view('Subject_admin/Tutors', $data);


        } else {
            redirect('/Login');
        }
    }

    public function Tutorprofile($id){
        if (Auth::is_logged_in() && Auth::is_subject_admin()) {
            $data = [
                'title' => 'Subject Admin',
                'view' => 'Tutor Profile',
                
            ];
            
            $this->tutor = $this->model('Tutors');
            $data['tutor'] = $this->tutor->first([
                'tutor_id' => $id
            ], 'tutors', 'tutor_id');
            $data['profilepic'] = $this->tutor->get_image($data['tutor']->image, "/uploads/userimages/");
            $this->view('Subject_admin/Tutorprofile', $data);
        } else {
            redirect('/Login');
        }
    }
}
