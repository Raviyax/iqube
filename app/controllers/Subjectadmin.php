<?php
class Subjectadmin extends Controller
{
    public $tutor;
    public $Subjectadmin;
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
            $this->Subjectadmin = $this->model('Subjectadmin');
            if (isset($_POST["submit"])) {
                if ($_FILES["image"]['size'] > 0) {
                    $image = $this->upload_media($_FILES["image"], "/uploads/userimages/");
                    $this->Subjectadmin->save_image_data($image, $_SESSION['USER_DATA']['user_id']);
             }
                $this->Subjectadmin->update_profile($_POST, $_SESSION['USER_DATA']['user_id']);
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
            $this->Subjectadmin = $this->model('Subjectadmin');
            $data['tutors'] = $this->Subjectadmin->view_tutors($_SESSION['USER_DATA']['subject']);
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
    public function userimage($image) {
        if(Auth::is_logged_in() && Auth::is_subject_admin()){
            $imagePath = APPROOT. "/uploads/userimages/" . $image;
        readfile($imagePath);
        }
        else{
            redirect('/Login');
        }
    }
}
