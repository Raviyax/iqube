<?php
class Student extends Controller
{
    private $imagepath;
    public $user;
    public $student;
    public $payhere;
    public $tutor;

    public function __construct()
    {
        $this->user = $this->model('User');
        $this->payhere = new Payhere;
        $this->student = $this->model('Students');
        $this->tutor = $this->model('Tutors');
    }
    public function index()
    {
        if (Auth::is_logged_in() && Auth::is_student()) {
            if (Auth::is_premium()) {
                $data = [
                    'title' => 'Student',
                    'view' => 'Dashboard',
                    'chapters' => $this->student->get_chapters_for_my_subjects(),
                ];
                $this->view('Student/Premium_dashboard', $data);
                return;
            }
            $data = [
                'title' => 'Student',
                'view' => 'Dashboard'
            ];
            $this->view('Student/Dashboard', $data);
        } else {
            redirect('/Login');
        }
    }
    public function purchase_premium()
    {
        //wrong implementation due to error in payhere end
        if (isset($_POST['status'])) {
            if ($_POST['status'] == 'ok') {
                if ($this->student->upgrade_to_premium()) {
                    // Send a JSON response
                    header('Content-Type: application/json');
                    echo json_encode(['message' => 'ok']);
                }
                return;
            }
        }
        if (Auth::is_logged_in() && Auth::is_student() && !Auth::is_premium() && Auth::is_completed()) {
            $data = [
                'title' => 'Student',
                'view' => 'Purchase Premium',
            ];
            $premiumdata = $this->student->get_premium_data($_SESSION['USER_DATA']['student_id']);
            if ($premiumdata) {
                $data['payment'] = $this->payhere->premium($premiumdata->cno, $premiumdata->address, $premiumdata->city, $premiumdata->fname, $premiumdata->lname);
                $data['premiumdata'] = $premiumdata;
                $this->view('Student/Pay', $data);
                return;
            }
            if (isset($_POST['premium']) && !$this->student->get_premium_data($_SESSION['USER_DATA']['student_id'])) {
                $this->view('Student/Purchase_premium', $data);
                return;
            }
            if (isset($_POST['next-to-confirmation'])) {
                if ($this->student->validate_insert_to_premium_students($_POST)) {
                    if ($this->student->insert_to_premium_students($_POST)) {
                        $premiumdata = $this->student->get_premium_data($_SESSION['USER_DATA']['student_id']);
                        if ($premiumdata) {
                            $data['payment'] = $this->payhere->premium($premiumdata->cno, $premiumdata->address, $premiumdata->city, $premiumdata->fname, $premiumdata->lname);
                            $data['premiumdata'] = $premiumdata;
                            $this->view('Student/Pay', $data);
                            return;
                        }
                    }
                } else {
                    $data['errors'] = $this->student->errors;
                    $this->view('Student/Purchase_premium', $data);
                    return;
                }
            }
            $this->view('Student/Premium', $data);
        } else {
            redirect('/Login');
        }
    }
    public function userimage($image)
    {
        if (Auth::is_logged_in() && Auth::is_student()) {
            $this->retrive_media($image, '/uploads/userimages/');
        } else {
            $this->view('Noaccess');
        }
    }
    public function study_materials()
    {

        if (Auth::is_logged_in() && Auth::is_student() && Auth::is_completed()) {
            $data = [
                'title' => 'Student',
                'view' => 'Study Materials',
                'study_materials' => $this->student->get_study_materials(),
            ];
            $this->view('Student/Study_materials', $data);
        } else {
            redirect('/Login');
        }
    }
    public function more_details()
    {
        if (Auth::is_logged_in() && Auth::is_student()) {
            if (!Auth::is_completed()) {
                $data = [
                    'title' => 'Student',
                    'view' => 'More Details',
                    'subjects' => $this->user->query("SELECT * FROM subjects"),
                ];
                if (isset($_POST['proceed'])) {
                    if ($this->student->validate_complete_profile($_POST)) {
                        if ($this->student->complete_profile($_POST)) {
                            redirect('/Student');
                            return;
                        }
                    } else {
                        $data['errors'] = $this->student->errors;
                    }
                }
                $this->view('Student/More_details', $data);
            } else {
                redirect('/Student');
            }
        } else {
            redirect('/Login');
        }
    }
    public function profile()
    {
        if (Auth::is_logged_in() && Auth::is_student()) {
            $data = [
                'title' => 'Student',
                'view' => 'Profile',
            ];
            $this->view('Student/Profile', $data);
            if (isset($_POST['submit'])) {
                $this->student->update_profile();
            }
        } else {
            redirect('/Login');
        }
    }
    public function syllabus()
    {
        if (Auth::is_logged_in() && Auth::is_student()) {
            $data = [
                'title' => 'Student',
                'view' => 'Syllabus',
            ];
            $this->view('Student/Syllabus', $data);
        } else {
            redirect('/Login');
        }
    }
    public function threads()
    {
        if (Auth::is_logged_in() && Auth::is_student()) {
            $data = [
                'title' => 'Student',
                'view' => 'Threads',
            ];
            $this->view('Student/Threads', $data);
        } else {
            redirect('/Login');
        }
    }
    public function tutors()
    {
        if (Auth::is_logged_in() && Auth::is_student()) {
            $data = [
                'title' => 'Student',
                'view' => 'Tutors',
                'tutors' => $this->student->get_all_tutors_for_my_subjects($_SESSION['USER_DATA']['student_id']),
                'subjects' => $this->student->get_my_subject_names($_SESSION['USER_DATA']['student_id']),
            ];

            $this->view('Student/Tutors', $data);
        } else {
            redirect('/Login');
        }
    }
    public function verify_email()
    {
        $token = isset($_GET['token']) ? $_GET['token'] : '';
        $email = isset($_GET['email']) ? $_GET['email'] : '';
        if ($this->student->verify_email($token, $email)) {
            $data = [
                'title' => 'Student',
                'view' => 'Email Verified',
            ];
            $this->view('Student/Email_verified', $data);
            //after 5 seconds redirect to login page
            header("refresh:3;url=" . URLROOT . "/Login");
        } else {
            echo "Invalid verification link";
        }
    }
    public function chat()
    {
        if (Auth::is_logged_in() && Auth::is_student()) {
            $this->view('Student/Chat');
        } else {
            redirect('/Login');
        }
    }

    public function tutor_profile($id)
    {
        if (Auth::is_logged_in() && Auth::is_student()) {

            $data = [
                'title' => 'Tutor',
                'view' => 'Tutor Profile',

            ];
            $data['tutor'] = $this->tutor->get_tutor($id);

            $this->view('Student/Tutorprofile', $data);
        } else {
            $this->view('Noaccess');
        }
    }

    public function video_thumbnail($thumbnail)
    {
        if (Auth::is_logged_in() && Auth::is_student()) {
            $this->retrive_media($thumbnail, '/uploads/video_content/thumbnails/');
        } else {
            $this->view('Noaccess');
        }
    }
    public function model_paper_thumbnail($thumbnail)
    {
        if (Auth::is_logged_in() && Auth::is_student()) {
            $this->retrive_media($thumbnail, '/uploads/model_papers/thumbnails/');
        } else {
            $this->view('Noaccess');
        }
    }

    public function video_overview($id)
    {
        if (Auth::is_logged_in() && Auth::is_student()) {
            $data = [
                'title' => 'Student',
                'view' => 'Video Overview',
                'video' => $this->student->get_video_overview($id),
                'status' => $this->student->is_video_purchased($id),
            ];
            $this->view('Student/Video_overview', $data);
        } else {
            $this->view('Noaccess');
        }
    }

    public function model_paper_overview($id)
    {
        if (Auth::is_logged_in() && Auth::is_student()) {
            $data = [
                'title' => 'Student',
                'view' => 'Model Paper Overview',
                'model_paper' => $this->student->get_model_paper_overview($id),
                'status' => $this->student->is_model_paper_purchased($id),

            ];
            $this->view('Student/Model_paper_overview', $data);
        } else {
            $this->view('Noaccess');
        }
    }

    public function purchase_video()
    {
        if (Auth::is_logged_in() && Auth::is_student()) {
            if (isset($_POST['video_id'])) {
                if ($this->student->is_video_purchased($_POST['video_id'])) {
                    redirect('/Student');
                    return;
                }
                $premiumdata = $this->student->get_premium_data($_SESSION['USER_DATA']['student_id']);
                if ($premiumdata) {
                    $video_data = $this->student->get_video_overview($_POST['video_id']);
                    $data['payment'] = $this->payhere->purchase_material($premiumdata->cno, $premiumdata->address, $premiumdata->city, $premiumdata->fname, $premiumdata->lname, $video_data->price, $video_data->name);
                    $data['premiumdata'] = $premiumdata;
                    $data['video'] = $video_data;
                    $this->view('Student/Pay_for_video', $data);
                    return;
                }
            }

            if (isset($_POST['status'])) {
                if ($_POST['status'] == 'ok') {

                    $video_content_id = $_POST['video_content_id'];
                    $result = $this->student->purchase_video($video_content_id);
                    header('Content-Type: application/json');
                    echo json_encode(['message' => 'ok']);

                    return;
                }
            }
        } else {
            $this->view('Noaccess');
        }
    }

    public function purchase_model_paper()
    {
        if (Auth::is_logged_in() && Auth::is_student()) {
            if (isset($_POST['model_paper_id'])) {
                if ($this->student->is_model_paper_purchased($_POST['model_paper_id'])) {
                    redirect('/Student');
                    return;
                }
                $premiumdata = $this->student->get_premium_data($_SESSION['USER_DATA']['student_id']);
                if ($premiumdata) {
                    $model_paper_data = $this->student->get_model_paper_overview($_POST['model_paper_id']);
                    $data['payment'] = $this->payhere->purchase_material($premiumdata->cno, $premiumdata->address, $premiumdata->city, $premiumdata->fname, $premiumdata->lname, $model_paper_data->price, $model_paper_data->name);
                    $data['premiumdata'] = $premiumdata;
                    $data['model_paper'] = $model_paper_data;
                    $this->view('Student/Pay_for_model_paper', $data);
                    return;
                }
            }

            if (isset($_POST['status'])) {
                if ($_POST['status'] == 'ok') {

                    $model_paper_id = $_POST['model_paper_content_id'];
                    $result = $this->student->purchase_model_paper($model_paper_id);
                    header('Content-Type: application/json');
                    echo json_encode(['message' => 'ok']);

                    return;
                }
            }
        } else {
            $this->view('Noaccess');
        }
    }

    public function do_model_paper()
    {
        if (Auth::is_logged_in() && Auth::is_student()) {
            if (isset($_POST['model_paper_id']) || isset($_GET['model_paper_id'])) {
                $modelPaperId = isset($_POST['model_paper_id']) ? $_POST['model_paper_id'] : $_GET['model_paper_id'];
                
                if ($this->student->is_model_paper_purchased($modelPaperId)) {
                    // Check if the paper has already been started
                    // if($this->student->is_model_paper_started($modelPaperId)){
                    //     echo "Browser refreshed. You can't start the paper again.";
                    //     return;
                    // }
                    
                    // Check if the start paper button is clicked
                    if (isset($_POST['start_paper'])) {
                        $data['model_paper'] = $this->student->get_model_paper_overview($modelPaperId);
                        $this->view('Student/Paper_instructions', $data);
                        return;
                    } else {
                        // Load model paper questions for exam
                        $data['model_paper'] = $this->student->get_model_paper_overview($modelPaperId);
                        $data['questions'] = $this->student->get_model_paper_mcqs($modelPaperId);
                        
                        // Update database to mark the paper as started
                        if($this->student->update_as_model_paper_started($modelPaperId)){
                            $this->view('Student/Do_model_paper', $data);
                            return;
                        } else {
                            // Handle database update failure
                            $this->view('Error_page', ['error' => 'Failed to update model paper status.']);
                            return;
                        }
                    }
                }
            }
        }
        
        // If the conditions above are not met, it might indicate unauthorized access or missing parameters
        $this->view('Noaccess');
    }


    public function submit_model_paper()
    {
        if (Auth::is_logged_in() && Auth::is_student()) {
            if (isset($_POST['model_paper_content_id'])) {
                $modelPaperId = $_POST['model_paper_content_id'];
                if ($this->student->is_model_paper_purchased($modelPaperId)) {
                   
                        $modelPaperId = $_POST['model_paper_content_id'];
                    
                        $result = $this->student->submit_model_paper_answers($_POST);
                        if ($result) {
                            $data = [
                                'title' => 'Student',
                                'view' => 'Model Paper Results',
                                'model_paper' => $this->student->get_model_paper_overview($modelPaperId),
                                'result' => $result,
                            ];
                            $this->view('Student/Model_paper_results', $data);
                            return;
                        }
                    
                }
            }
        }
        $this->view('Noaccess');
    }
        
    
}
