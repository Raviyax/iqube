<?php
class Admin extends Controller
{
    public $Subjectadmin;
    public $user;
    public $subject;
    public $tutor;
    public $admin;
    public function __construct()
    {
        $this->user = $this->model('User');
        $this->Subjectadmin = $this->model('Subjectadmins');
        $this->subject = $this->model('Subjects');
        $this->tutor = $this->model('Tutors');
        $this->admin = $this->model('Admins');
    }
    public function index()
    {
        if (Auth::is_logged_in() && Auth::is_admin()) {
            $data = [
                'title' => 'Admin',
                'view' => 'Dashboard',
                'student_count' => $this->admin->get_total_student_count(),
                'new_student_percentage' => $this->admin->get_student_joined_this_month(),
                'tutor_count' => $this->admin->get_total_tutor_count(),
                'new_tutor_percentage' => $this->admin->get_tutor_joined_this_month(),
                'subject_admin_count' => $this->admin->get_total_subject_admin_count(),
                'new_subject_admin_percentage' => $this->admin->get_subject_admin_joined_this_month(),
                'premium_student_count' => $this->admin->get_total_premium_student_count(),
                'video_purchases' => $this->admin->get_last_month_video_purchases(),
                'model_paper_purchases' => $this->admin->get_last_month_model_paper_purchases(),
                'subjects' => $this->admin->get_available_subject_count(),
                'content_count' => $this->admin->get_total_content_count(),
            ];
            $this->view('Admin/Dashboard', $data);
          
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
                'view' => 'Profile',
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
    public function subject_admin_profile($id)
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

    public function site_backup()
    {
        // Ensure the user is logged in and is an admin
        if (Auth::is_logged_in() && Auth::is_admin()) {
            // Check if the request method is POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Validate password confirmation
                if ($this->admin->validate_password($_POST['password'])) {
                    $data = [
                        'title' => 'Site Backup',
                        'view' => 'Site Backup',
                        'backups' => $this->admin->get_backup_files(),
                    ];
                   $this->view('Admin/Site_backups', $data);
                   return;
                } else {
                    // If password confirmation fails, show error message
                    $data = [
                        'title' => 'Site Backup',
                        'view' => 'Site Backup',
                        'errors' => $this->admin->errors,
                    ];
                    $this->view('Admin/Confirm_password', $data);
                }
            } else {
                // If not a POST request, show password confirmation form
                $data = [
                    'title' => 'Site Backup',
                    'view' => 'Site Backup',
                ];
                $this->view('Admin/Confirm_password', $data);
            }
        } else {
            // If user is not logged in or not an admin, show access denied page
            $this->view('Noaccess');
        }
    }

    public function revenue()
    {
        if (Auth::is_logged_in() && Auth::is_admin()) {
            $data = [
                'title' => 'Revenue',
                'view' => 'Revenue',
                'premium' => $this->admin->get_premium_purchases(),
                'video' => $this->admin->get_video_purchases(),
                'model_paper' => $this->admin->get_model_paper_purchase(),
            
            ];
            $this->view('Admin/Revenue', $data);
        } else {
            $this->view('Noaccess');
        }
    }

    public function download_backup($file)
    {
        if (Auth::is_logged_in() && Auth::is_admin()) {
            $this->admin->download_backup($file);
        } else {
            $this->view('Noaccess');
        }
    }

    public function create_backup()
    {
        if (Auth::is_logged_in() && Auth::is_admin()) {
            $this->admin->sql_backup();
            //redirect to site_backup after 2 seconds
            header("refresh:2;url=" . URLROOT . "/admin/site_backup");
           
 } else {
            $this->view('Noaccess');
        }
    }
}
