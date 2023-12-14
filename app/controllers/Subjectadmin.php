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
                if ($_FILES["image"]['size'] > 0) {
                    $uniqueFilename = generate_unique_filename($_FILES["image"]);
        
                    $this->me->update_image($_FILES["image"],APPROOT."/uploads/userimages/","UPDATE subject_admins SET image = '{$uniqueFilename}' WHERE user_id = '{$_SESSION['USER_DATA']['user_id']}'", $uniqueFilename);
        
                    $_SESSION['USER_DATA']['image'] = Database::get_image( $uniqueFilename, "/uploads/userimages/");
             
                   
                   
        
                 }

               
                $this->me->query("UPDATE users SET username=? WHERE email=?", [
                  
                    $_POST['username'],
                    $_SESSION['USER_DATA']['email']
                ]);
                $this->me->query("UPDATE subject_admins SET username=?, fname=?, lname=?, cno=? WHERE user_id=?", [
                    
                    $_POST['username'],
                    $_POST['fname'],
                    $_POST['lname'],
                    $_POST['cno'],
                    $_SESSION['USER_DATA']['user_id']
                ]);

                $_SESSION['USER_DATA']['username'] = $_POST['username'];
                $_SESSION['USER_DATA']['fname'] = $_POST['fname'];
                $_SESSION['USER_DATA']['lname'] = $_POST['lname'];
                $_SESSION['USER_DATA']['cno'] = $_POST['cno'];
                

              
               

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

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              
              
                        $this->tutor->query("UPDATE users SET username=? WHERE email=?", [
                          
                            $_POST['username'],
                            $data['tutor']->email
                        ]);
                        $this->tutor->query("UPDATE tutors SET username=?, fname=?, lname=?, cno=? WHERE tutor_id=?", [
                            
                            $_POST['username'],
                            $_POST['fname'],
                            $_POST['lname'],
                            $_POST['cno'],
                            $data['tutor']->tutor_id
                        ]);
                    
          
            }

        } else {
            redirect('/Login');
        }
    }
}
