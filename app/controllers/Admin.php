<?php
class Admin extends Controller
{
    public $Subjectadmin;
    public $user;
    public $subject;
    public $tutor;
    public function __construct()
    {
        $this->user = $this->model('User');
        $this->Subjectadmin = $this->model('Subjectadmins');
        $this->subject = $this->model('Subjects');
        $this->tutor = $this->model('Tutors');
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
            $this->view('Noaccess');
        }
    }
    public function users()
    {
        if (Auth::is_logged_in() && Auth::is_admin()) {
            $data['errors'] = [];
            $data['title'] = 'Users';
            $data['view'] = 'Manage Users';
            $data['subjectadmincount'] = $this->Subjectadmin->get_subject_admin_count_subject_vise();
            $data['subjects'] = $this->subject->get_subjects();
            $data['tutorcount'] = $this->tutor->get_tutor_count_subject_vise();
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
            $this->view('Noaccess');
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
            $this->view('Noaccess');
        }
    }
    public function all_subject_admins($subject = null)
    {
        if (Auth::is_logged_in() && Auth::is_admin()) {
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
            $this->view('Noaccess');
        }
    }
    public function Subject_admin_profile($id)
    {
        if (Auth::is_logged_in() && Auth::is_admin()) {
            $data = [
                'title' => 'Subject Admin',
                'view' => 'Subject Admin Profile',
            ];
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
            $this->view('Noaccess');
        }
    }
    public function userimage($image)
    {
        if (Auth::is_logged_in() && Auth::is_admin()) {
            $this->retrive_media($image, '/uploads/userimages/');
        } else {
            $this->view('Noaccess');
        }
    }
    public function all_tutors($subject = null)
    {
        if (Auth::is_logged_in() && Auth::is_admin()) {
            $data['subject'] = $subject;
            $data['tutors'] = $this->tutor->get_tutors($subject);
            $data['subjects'] = $this->subject->get_subjects();
            $data['title'] = 'All Tutors';
            $data['view'] = 'All Tutors';
            $this->view('Admin/All_tutors', $data);
        } else {
            $this->view('Noaccess');
        }
    }
    public function tutor_profile($id)
    {
        if (Auth::is_logged_in() && Auth::is_admin()) {
            $data = [
                'title' => 'Tutor',
                'view' => 'Tutor Profile',
            ];
            $data['tutor'] = $this->tutor->get_tutor($id);
            $this->view('Admin/Tutor_profile', $data);
        } else {
            $this->view('Noaccess');
        }
    }
}
