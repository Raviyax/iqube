<?php
class Tutor extends Controller
{
    public $me;
    public $tutor;


    public function __construct()
    {
        $this->me = $this->model('User');
        $this->tutor = $this->model('Tutors');
    }
    public function index()
    {
        if (Auth::is_logged_in() && Auth::is_tutor()) {
            $data = [
                'title' => 'Tutor',
                'view' => 'Dashboard'
            ];
            $this->view('Tutor/Dashboard', $data);
        } else {
            redirect('/Login');
        }
    }
    public function profile()
    {
        if (Auth::is_logged_in() && Auth::is_tutor()) {
            $data = [
                'title' => 'Tutor',
                'view' => 'My Profile',
            ];
            $this->view('Tutor/Profile', $data);
            $this->me = $this->model('User');
            if (isset($_POST["submit"])) {
                if ($_FILES["image"]['size'] > 0) {
                    $uniqueFilename = generate_unique_filename($_FILES["image"]);
                    $this->me->update_image($_FILES["image"], APPROOT . "/uploads/userimages/", "UPDATE tutors SET image = '{$uniqueFilename}' WHERE user_id = '{$_SESSION['USER_DATA']['user_id']}'", $uniqueFilename);
                    // $_SESSION['USER_DATA']['image'] = Database::get_image( $uniqueFilename, "/uploads/userimages/");
                }
                $this->me->query("UPDATE users SET username=? WHERE email=?", [
                    $_POST['username'],
                    $_SESSION['USER_DATA']['email']
                ]);
                $this->me->query("UPDATE tutors SET username=?, fname=?, lname=?, cno=? WHERE user_id=?", [
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
    public function userimage($image)
    {
        if (Auth::is_logged_in() && Auth::is_tutor()) {
            $this->retrive_media($image, '/uploads/userimages/');
        } else {
            $this->view('Noaccess');
        }
    }

    public function first_time_login()
    {   
        $email = isset($_GET['email']) ? $_GET['email'] : null;
    $token = isset($_GET['token']) ? $_GET['token'] : null;
        if (!Auth::is_logged_in() && !$this->tutor->is_activated($email) && $token != null && $email != null) {
            if ($this->tutor->verify_token($email, $token)) {
                $data = [
                    'email' => $email,
                    'token' => $token,
                ];
                $this->view('Tutor/createpassword', $data);
                if (isset($_POST['create'])) {
                    if ($this->tutor->validate_new_password($_POST)) {
                        if ($this->tutor->create_new_password($_POST['password'], $email)) {
                            $this->tutor->set_tutor_active($email);


                            echo "<script>alert('Acount Activated Sucessfully')</script>";
                            redirect('/Login');
                        }
                    } else {
                        $data = [
                            'errors' => $this->tutor->errors
                        ];
                        $this->view('Tutor/createpassword', $data);
                    }
                }
            }
        }else{
            redirect('/Landing');
           
            
        }

    }
}
