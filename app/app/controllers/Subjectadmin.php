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
                'tutor_count' => $this->Subjectadmin->get_my_subject_tutor_count($_SESSION['USER_DATA']['subject']),
                'student_count' => $this->Subjectadmin->get_my_subject_student_Count(),
                'premium_student_count' => $this->Subjectadmin->get_my_subject_premium_student_count(),
                'open_support_count' => $this->Subjectadmin->get_my_not_completed_support_requests(),
                'tutor_requests' => $this->Subjectadmin->get_tutor_request_count(),
                'model_paper_count' => $this->Subjectadmin->get_model_paper_count(),
                'video_count' => $this->Subjectadmin->get_video_count(),
                'support_requests' => $this->Subjectadmin->get_my_support_requests(),
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
    public function tutors()
    {
        if (Auth::is_logged_in() && Auth::is_subject_admin()) {
            $notifications = $this->Subjectadmin->get_notifications();
            $data['errors'] = [];
            $data['title'] = 'Tutors';
            $data['view'] = 'Tutors';
            $data['notifications'] = $notifications;
            $data['tutors'] = $this->Subjectadmin->view_tutors($_SESSION['USER_DATA']['subject']);
            // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //     if ($this->tutor->validate($_POST)) {
            //         $this->tutor->add_new_tutor($_POST);
            //         redirect('/Subjectadmin/Tutors');
            //     } else {
            //         $data['errors'] = $this->tutor->errors;
            //         $data['title'] = 'tutors';
            //         $this->view('Subject_admin/Tutors', $data);
            //     }
            // }
            $this->view('Subject_admin/Tutors', $data);
        } else {
            redirect('/Login');
        }
    }
    public function tutor_profile($id)
    {if($id == null){
        echo "Invalid url";
        return;
    }
    
        if (Auth::is_logged_in() && Auth::is_subject_admin()) {
            if(!$this->Subjectadmin->is_tutor_belongs_to_subject($id)){
                echo "<script>alert('Tutor not found');</script>";
                return;
            }
            $notifications = $this->Subjectadmin->get_notifications();
            $data = [
                'title' => 'Tutor',
                'view' => 'Tutor Profile',
                'notifications' => $notifications,
            ];
            $data['tutor'] = $this->tutor->get_tutor($id);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['changeemail'])) {
                    if ($this->tutor->validate_email_change($_POST)) {
                        $this->tutor->update_tutor_email($_POST['email'], $data['tutor']->user_id);
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
                    if ($this->Subjectadmin->accept_tutor_request($id)) {
                        redirect('/Subjectadmin/tutor_requests');
                        echo "<script>alert('Tutor request accepted successfully');</script>";
                    }
                } elseif (isset($_POST['reject'])) {
                    $this->Subjectadmin->reject_tutor_request($id);
                    redirect('/Subjectadmin/tutor_requests');
                }
            }
            $this->view('Subject_admin/View_request', $data);
        } else {
            redirect('/Login');
        }
    }
    public function manage_syllabus()
    {
        if (Auth::is_logged_in() && Auth::is_subject_admin()) {
            $notifications = $this->Subjectadmin->get_notifications();
            $data = [
                'title' => 'Manage Syllabus',
                'view' => 'Manage Syllabus',
                'notifications' => $notifications,
                'syllabus' => $this->Subjectadmin->get_chapters($_SESSION['USER_DATA']['subject'])
            ];
            $this->view('Subject_admin/Manage_syllabus', $data);
        } else {
            redirect('/Login');
        }
    }
    public function iqube_support()
    {
        if (Auth::is_logged_in() && Auth::is_subject_admin()) {
            $notifications = $this->Subjectadmin->get_notifications();
            $data = [
                'title' => 'IQube Support',
                'view' => 'IQube Support',
                'notifications' => $notifications,
            ];
            $this->view('Subject_admin/Support_chat', $data);
        } else {
            redirect('/Login');
        }
    }
    public function about_subunit($id)
    {
        if (Auth::is_logged_in() && Auth::is_subject_admin()) {
        if($this->Subjectadmin->is_subunit_available_and_belongs_to_subject($id)){
            $notifications = $this->Subjectadmin->get_notifications();
            $data = [
                'title' => 'About Subunit',
                'view' => 'About Subunit',
                'notifications' => $notifications,
                'subunit' => $this->Subjectadmin->get_subunit($id),
               'videos_by_subunit' => $this->Subjectadmin->get_videos_by_subunit($id),
                'model_papers_by_subunit' => $this->Subjectadmin->get_model_paper_by_subunit($id),
                'mcqs' => $this->Subjectadmin->get_mcqs_for_progress_tracking_by_subunit($id),
            ];
            $this->view('Subject_admin/About_subunit', $data);
        } else {
            echo "<script>alert('Subunit not found');</script>";
        }
        } else {
            redirect('/Login');
        } 
    }




    public function video_overview($id)
    {
        if (Auth::is_logged_in() && Auth::is_subject_admin()) {
            if($this->Subjectadmin->is_video_available_and_belongs_to_subject($id)){
       
                $data = [
                    'title' => 'Video Overview',
                    'view' => 'Video Overview',
       
                    'video' => $this->Subjectadmin->get_video($id),
                ];
                $this->view('Subject_admin/Video_overview', $data);
            } else {
                echo "<script>alert('Video not found');</script>";
            }
        } else {
            redirect('/Login');
        }
    }


    public function video($video)
    {
        if (Auth::is_logged_in() && Auth::is_subject_admin()) {
            $this->retrive_media($video, '/uploads/video_content/videos/');
        } else {
            $this->view('Noaccess');
        }
    }

    public function video_thumbnail($thumbnail)
    {
        if (Auth::is_logged_in() && Auth::is_subject_admin()) {
            $this->retrive_media($thumbnail, '/uploads/video_content/thumbnails/');
        } else {
            $this->view('Noaccess');
        }
    }

    public function model_paper_overview($id)
    {
        if (Auth::is_logged_in() && Auth::is_subject_admin()) {
            if($this->Subjectadmin->is_model_paper_available_and_belongs_to_subject($id)){
                $data = [
                    'title' => 'Model Paper Overview',
                    'view' => 'Model Paper Overview',
                    'model_paper' => $this->Subjectadmin->get_model_paper($id),
                ];
                $this->view('Subject_admin/Model_paper_overview', $data);
            } else {
                echo "<script>alert('Model paper not found');</script>";
            }
        } else {
            redirect('/Login');
        }
    }


    public function model_paper_thumbnail($thumbnail)
    {
        if (Auth::is_logged_in() && Auth::is_subject_admin()) {
            $this->retrive_media($thumbnail, '/uploads/model_papers/thumbnails/');
        } else {
            $this->view('Noaccess');
        }
    }

    public function cv($cv)
    {
        if (Auth::is_logged_in() && Auth::is_subject_admin()) {
        //download cv
        $this->Subjectadmin->download_cv($cv);
        } else {
            $this->view('Noaccess');
     
    }

}
 

}
