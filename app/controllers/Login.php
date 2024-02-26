<?php
class Login extends Controller
{
    public function index()
    {
        if (!Auth::is_logged_in()) {
            $row = [];
            $studentdata = [];
            $premiumdata = [];
            $data['title'] = 'Login';
            $data['errors'] = [];
            $user = $this->model('User');
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // if($user->google_recaptcha($_POST['g-recaptcha-response']) == false){
                //     $data['errors']['captcha_err'] = '*Please check the captcha';
                //     $this->view('login', $data);
                // }

                $row = $user->first([
                    'email' => $_POST['email']
                ], 'users', 'user_id');
                $studentdata = $user->first([
                    'email' => $_POST['email']
                ], 'students', 'student_id');

                if ($studentdata) {
                    $premiumdata = $user->first([
                        'student_id' => $studentdata->student_id
                    ], 'premium_students', 'student_id');
                }
                if ($row) {
                    if (password_verify($_POST['password'], $row->password)) {
                        if ($studentdata->verify == 1) {
                           if(Auth::authenticate($row, $studentdata, $premiumdata)){
                            if (Auth::is_student()) {
                                header('location:' . URLROOT . '/student');
                                return;
                            }
                            else {
                                header('location:' . URLROOT . '/Logout');
                                return;
                            }

                        }
                        } else {
                            $data['errors']['verification_err'] = 'Please Verify your email first. Check your email for the verification link. ';
                            $this->view('Login', $data);
                            return;
                        }
                    }
                    $data['errors']['email_err'] = '*Wrong Email or Password';
                }
            }
            $this->view('Login', $data);
        } else {
            header('location:' . URLROOT . '/Landing');
        }
    }

   
}
