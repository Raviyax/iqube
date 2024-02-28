<?php

class Login extends Controller
{
    public function index()
    {
        if (Auth::is_logged_in()) {
            redirect('/Student');
            return;
        }

        $data['title'] = 'Login';
        $data['errors'] = [];
        $user = $this->model('User');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Validate and process reCAPTCHA if needed
            // Uncomment the following code if reCAPTCHA is used
            // if($user->google_recaptcha($_POST['g-recaptcha-response']) == false){
            //     $data['errors']['captcha_err'] = '*Please check the captcha';
            //     $this->view('login', $data);
            // }
            $studentdata = $user->first(['email' => $email], 'students', 'student_id');
            $row = $user->first(['email' => $email], 'users', 'user_id');
            
    

            if ($studentdata && password_verify($password, $row->password)) {
                
                
                if ($studentdata && $studentdata->verify == 1) {
                    $premiumdata = $user->first(['student_id' => $studentdata->student_id], 'premium_students', 'student_id');

                    if (Auth::authenticate($row, $studentdata, $premiumdata)) {
                      
                       
                        if (Auth::is_student()) {
                            if (!Auth::is_completed()) {
                                redirect('/Student/more_details');
                                return;
                            } else {
                                redirect('/Student');
                                return;
                            }
                        } 
                    }
                } else {
                    $data['errors']['verification_err'] = 'Please Verify your email first. Check your email for the verification link!';
                  
                    
                }
            } else {
                $data['errors']['email_err'] = '*Wrong Email or Password';
                
            }
        }

        $this->view('Login', $data);
    }
}
