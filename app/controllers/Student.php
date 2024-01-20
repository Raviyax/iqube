<?php
class Student extends Controller {

    private $imagepath;

    public $user;
    public function index(){
        if(Auth::is_logged_in() && Auth::is_student()){
            $data = [
                'title' => 'Student',
                'view' => 'Dashboard'
            ];
            $this->view('Student/dashboard', $data);
        }
        else{
            redirect('/Login');
        }
        



    }

    public function purchase_premium(){
        if(Auth::is_logged_in() && Auth::is_student() && !Auth::is_premium()){
            $data = [
                'title' => 'Student',
                'view' => 'Purchase Premium'
            ];
            $this->view('Student/purchase_premium', $data);

            //temporarily

            if(isset($_POST['pay'])){
                $student_id = $_SESSION['USER_DATA']['student_id'];
                $this->user = $this->model('user');
                $this->user->query("UPDATE students SET paid = 1 WHERE student_id = $student_id");
                $_SESSION['USER_DATA']['paid'] = 1;


                
                
            }

            
        }
        else{
            redirect('/Login');
        }
    }

    public function signup_premium(){
        if(Auth::is_logged_in() && Auth::is_student() && !Auth::is_premium()){
            if(Auth::is_paid()){
                $data = [
                    'title' => 'Student',
                    'view' => 'Signup Premium'
                ];
                $this->view('Student/Signup_premium', $data);
                $this->user = $this->model('user');
                if(isset($_POST['submit'])){
                    $student_id = $_SESSION['USER_DATA']['student_id'];
                    $email = $_SESSION['USER_DATA']['email'];
                    $this->user->query("INSERT INTO premium_students (email, student_id, fname, lname, cno) VALUES ('$email', '$student_id', '$_POST[fname]', '$_POST[lname]', '$_POST[cno]')");
                    $this->user->query("UPDATE students SET premium = 1 WHERE student_id = $student_id");
                    

                   
                }
            }else{
               echo "<script>alert('Please pay first')</script>";
            }
            
           
        }
        else{
            redirect('/Login');
        }
    }

    public function userimage($image) {
       
        if(Auth::is_logged_in() && Auth::is_student()){
            $imagePath = APPROOT. "/uploads/userimages/" . $image;
        readfile($imagePath);
        }
        else{
            redirect('/Login');
        }
    }


    public function study_materials(){
        if(Auth::is_logged_in() && Auth::is_student()){
            $data = [
                'title' => 'Student',
                'view' => 'Study Materials'
            ];
            $this->view('Student/study_materials', $data);
        }
        else{
            redirect('/Login');
        }
    }

}
    