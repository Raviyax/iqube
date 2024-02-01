<?php
class Student extends Controller {

    public $user;

    public $tutor;
    public function index(){
        if(Auth::is_logged_in() && Auth::is_student()){
            $data = [
                'title' => 'Student',
                'view' => 'Dashboard'
            ];
            $this->view('Student/Dashboard', $data);
        }
        else{
            redirect('/Login');
        }
        
        


    }

    // In your Student controller
    public function purchase_premium(){
        if(Auth::is_logged_in() && Auth::is_student() && !Auth::is_premium()){
            $data = [
                'title' => 'Student',
                'view' => 'Purchase Premium'
            ];
            $this->view('Student/purchase_premium', $data);
    
            // Check if the payment form is submitted
            if(isset($_POST['pay'])){
                $student_id = $_SESSION['USER_DATA']['student_id'];
                
                // Payment processing logic
                $payment_success = $this->processPayment($_POST['card_number'], $_POST['expiry_date'], $_POST['cvv']);
    
                if($payment_success){
                    // Update user to premium status in the database
                    $this->user = $this->model('user');
                    $this->user->query("UPDATE students SET paid = 1 WHERE student_id = $student_id");
                    $_SESSION['USER_DATA']['paid'] = 1;
    
                    echo "<script>alert('Payment successful!');</script>";
                } else {
                    echo "<script>alert('Payment failed. Please try again.');</script>";
                }
            }
        }
        else{
            redirect('/Login');
        }
    }
    
    // Simplified example payment processing logic
    private function processPayment($cardNumber, $expiryDate, $cvv){
        
        return true;
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

    public function syllabus(){
        if(Auth::is_logged_in() && Auth::is_student()){
            $data = [
                'title' => 'Student',
                'view' => 'syllaubs'
            ];
            $this->view('Student/syllabus', $data);
        }
        else{
            redirect('/Login');
        }
        



    }

    public function tutors(){
        if(Auth::is_logged_in() && Auth::is_student()){
            $data = [
                'title' => 'Student',
                'view' => 'tutors'
            ];

            $this->tutor = $this->model('Tutors');
            $data['tutors'] = $this->tutor->query("SELECT * FROM tutors");
            
            $data['tutor'] = $this->tutor->first([
                'tutor_id' => $id
            ], 'tutors', 'tutor_id');
            $data['profilepic'] = $this->tutor->get_image($data['tutor']->image, "/uploads/userimages/");

            $this->view('Student/tutors', $data);
        }
        else{
            redirect('/Login');
        }
        



    }

    public function threads(){
        if(Auth::is_logged_in() && Auth::is_student()){
            $data = [
                'title' => 'Student',
                'view' => 'threads'
            ];
            $this->view('Student/threads', $data);
        }
        else{
            redirect('/Login');
        }
        



    }

    public function achievements(){
        if(Auth::is_logged_in() && Auth::is_student()){
            $data = [
                'title' => 'Student',
                'view' => 'achievements'
            ];
            $this->view('Student/achievements', $data);
        }
        else{
            redirect('/Login');
        }
        



    }

    public function profile(){
        if(Auth::is_logged_in() && Auth::is_student()){
            $data = [
                'title' => 'Student',
                'view' => 'profile'
            ];
            $this->view('Student/profile', $data);
        }
        else{
            redirect('/Login');
        }
        



    }
}