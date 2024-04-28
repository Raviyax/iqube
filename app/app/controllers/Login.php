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
        $student = $this->model('Students');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $studentdata = $user->first(['email' => $email], 'students', 'student_id');
            $row = $user->first(['email' => $email], 'users', 'user_id');
            if ($studentdata && password_verify($password, $row->password)) {
                if ($studentdata && $studentdata->verify == 1) {

                    //append to the student data

                    $premiumdata = $user->first(['student_id' => $studentdata->student_id], 'premium_students', 'student_id');
                    if (Auth::authenticate($row, $studentdata, $premiumdata)) {
                        if (Auth::is_student()) {
                            if (Auth::is_premium()) {
                                $_SESSION['USER_DATA']['chat_agent'] = $student->get_a_chat_agent();
                            }


                            redirect('/Student');
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
