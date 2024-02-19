<?php
class Subjectadmin extends Controller
{
    public $tutor;
    public $Subjectadmin;
    public function __construct()
    {
        $this->Subjectadmin = $this->model('Subjectadmins');
        $this->tutor = $this->model('Tutors');
    }
    public function index()
    {
        if (Auth::is_logged_in() && Auth::is_subject_admin()) {
            $notifications = $this->Subjectadmin->get_notifications(); 
            $data = [
                'title' => 'Subject Admin',
                'view' => 'Dashboard',
                'notifications' => $notifications,
            ];
            $this->view('Subject_admin/Dashboard', $data);
        } else {
            redirect('/Login');
        }
    }
    public function profile()
    {
        if (Auth::is_logged_in() && Auth::is_subject_admin()) {
            $notifications = $this->Subjectadmin->get_notifications(); 
            $data = [
                'title' => 'Subject Admin',
                'view' => 'My Profile',
                'notifications' => $notifications,
            ];
            if (isset($_POST["submit"])) {
                if ($_FILES["image"]['size'] > 0) {
                    $image = $this->upload_media($_FILES["image"], "/uploads/userimages/");
                    $this->Subjectadmin->save_image_data($image, $_SESSION['USER_DATA']['subject_admin_id']);
                    redirect('/Subjectadmin/profile');
             }
                $this->Subjectadmin->update_profile($_POST, $_SESSION['USER_DATA']['user_id']);
                redirect('/Subjectadmin/profile');
            }
            $this->view('Subject_admin/Profile', $data);
        } else {
            redirect('/Login');
        }
    }
    public function Tutors()
    {
        if (Auth::is_logged_in() && Auth::is_subject_admin()) {
            $notifications = $this->Subjectadmin->get_notifications(); 
            $data['errors'] = [];
            $data['title'] = 'Tutors';
            $data['view'] = 'Tutors';
            $data['notifications'] = $notifications;
            $data['tutors'] = $this->Subjectadmin->view_tutors($_SESSION['USER_DATA']['subject']);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if ($this->tutor->validate($_POST)) {
                    $this->tutor->add_new_tutor($_POST);
                    redirect('/Subjectadmin/Tutors');
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
    public function tutor_profile($id)
    {
        if (Auth::is_logged_in() && Auth::is_subject_admin()) {
            $notifications = $this->Subjectadmin->get_notifications(); 
            $data = [
                'title' => 'Tutor',
                'view' => 'Tutor Profile',
                'notifications' => $notifications,
            ];
            $data['tutor'] = $this->tutor->get_tutor($id);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if(isset($_POST['changeemail'])){
                    if ($this->tutor->validate_email_change($_POST)) {
                        $this->tutor->update_tutor_email($_POST['email'],$data['tutor']->user_id);
                        // redirect('/Subjectadmin/tutor_profile/' . $id);
                    } else {
                        $data['errors'] = $this->tutor->errors;
                        $data['title'] = 'Tutor';
                        $this->view('Subject_admin/Tutorprofile', $data);
                    }
                }
            }
            $this->view('Subject_admin/Tutorprofile', $data);
        } else {
            $this->view('Noaccess');
        }
    }
    public function userimage($image)
    {
        if (Auth::is_logged_in() && Auth::is_subject_admin()) {
            $this->retrive_media($image, '/uploads/userimages/');
        } else {
            $this->view('Noaccess');
        }
    }
    public function tutor_requests()
    {
        if (Auth::is_logged_in() && Auth::is_subject_admin()) {
            $notifications = $this->Subjectadmin->get_notifications(); 
            $data = [
                'title' => 'Tutor Requests',
                'view' => 'Tutor Requests',
                'notifications' => $notifications,
                'tutors' => $this->Subjectadmin->get_tutor_requests($_SESSION['USER_DATA']['subject'])
            ];
            $this->view('Subject_admin/Tutor_requests', $data);
        } else {
            redirect('/Login');
        }
    }
    public function view_request($id)
    {
        if (Auth::is_logged_in() && Auth::is_subject_admin()) {
            $notifications = $this->Subjectadmin->get_notifications(); 
            $data = [
                'title' => 'Tutor Request',
                'view' => 'Tutor Request',
                'notifications' => $notifications,
            ];
            $data['tutor'] = $this->Subjectadmin->get_tutor_request($id);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['accept'])) {
                    if($this->Subjectadmin->accept_tutor_request($id)){
                        redirect('/Subjectadmin/tutor_requests');
                        echo "<script>alert('Tutor request accepted successfully');</script>";
                    }
                } elseif (isset($_POST['reject'])) {
                    $this->Subjectadmin->reject_tutor_request($id);
                    redirect('/Subjectadmin/tutor_requests');
                }
            }
            $this->view('Subject_admin/view_request', $data);
        } else {
            redirect('/Login');
        }
    }
}
