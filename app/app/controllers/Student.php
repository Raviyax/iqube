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
            if (!Auth::is_completed()) {
                redirect('/Student/more_details');
                return;
            }
         
            if (Auth::is_premium()) {
                $this->student->get_total_weights_of_my_subjects();
                $data = [
                    'title' => 'Student',
                    'view' => 'Dashboard',
                    'chapters' => $this->student->get_chapters_for_my_subjects(),
                    'not_completed_study_materials' => $this->student->get_my_not_completed_study_materials(),
                    'studied_subunits' => $this->student->get_subunit_ids_of_purchased_materials(),
                    'progress_tracked_subunits' => $this->student->get_progress_tracked_subunits(),
                    'mainunit_progresses' => $this->student->track_progress_for_my_mainunits(),
                    'subject_progresses' => $this->student->track_progress_for_my_subjects(),
                    'subject_completions' => $this->student->get_overall_completion_of_subjects(),
                    'unit_weights' => $this->student->get_total_weights_of_my_subjects(),
                ];
                $this->view('Student/Premium_dashboard', $data);
                return;
            }
            $data = [
                'title' => 'Student',
                'view' => 'Dashboard',
                'chapters' => $this->student->get_chapters_for_my_subjects(),
               
                'unit_weights' => $this->student->get_total_weights_of_my_subjects(),
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
        if (Auth::is_logged_in() && Auth::is_student() && !Auth::is_premium()) {
            if (!Auth::is_completed()) {
                redirect('/Student/more_details');
                return;
            }
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
        if (Auth::is_logged_in() && Auth::is_student()) {
            if (!Auth::is_completed()) {
                redirect('/Student/more_details');
                return;
            }
            $data = [
                'title' => 'Student',
                'view' => 'Study Materials',
                'study_materials' => $this->student->get_study_materials(),
                'subjects' => $this->student->get_my_subject_names($_SESSION['USER_DATA']['student_id']),
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
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['proceed'])) {
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
            if (!Auth::is_completed()) {
                redirect('/Student/more_details');
                return;
            }
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
    public function tutors()
    {
        if (Auth::is_logged_in() && Auth::is_student()) {
            if (!Auth::is_completed()) {
                redirect('/Student/more_details');
                return;
            }
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
    // public function chat()
    // {
    //     if (Auth::is_logged_in() && Auth::is_student()) {
    //         $this->view('Student/Chat');
    //     } else {
    //         redirect('/Login');
    //     }
    // }
    public function tutor_profile($id)
    {
        if (!$id) {
            echo "Invalid request";
            return;
        }
        if (Auth::is_logged_in() && Auth::is_student()) {
            if (!Auth::is_completed()) {
                redirect('/Student/more_details');
                return;
            }
            $data = [
                'title' => 'Tutor',
                'view' => 'Tutor Profile',
                'student_count' => $this->student->get_student_count_of_tutor($id),
                'content_count' => $this->student->get_content_count_of_tutor($id),
                'purchase_count' => $this->student->get_purchase_count_of_tutor($id),
            ];
            $data['tutor'] = $this->tutor->get_tutor($id);
            $this->view('Student/Tutorprofile', $data);
        } else {
            $this->view('Noaccess');
        }
    }
    public function video_thumbnail($thumbnail)
    {
        if (!$thumbnail) {
            echo "Invalid request";
            return;
        }
        if (Auth::is_logged_in() && Auth::is_student()) {
            $this->retrive_media($thumbnail, '/uploads/video_content/thumbnails/');
        } else {
            $this->view('Noaccess');
        }
    }
    public function model_paper_thumbnail($thumbnail)
    {
        if (!$thumbnail) {
            echo "Invalid request";
            return;
        }
        if (Auth::is_logged_in() && Auth::is_student()) {
            $this->retrive_media($thumbnail, '/uploads/model_papers/thumbnails/');
        } else {
            $this->view('Noaccess');
        }
    }
    public function video_overview($id)
    {
        if (!$id) {
            echo "Invalid request";
            return;
        }
        if (Auth::is_logged_in() && Auth::is_student()) {
            if (!Auth::is_completed()) {
                redirect('/Student/more_details');
                return;
            }
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
        if (!$id) {
            echo "Invalid request";
            return;
        }
        if (Auth::is_logged_in() && Auth::is_student()) {
            if (!Auth::is_completed()) {
                redirect('/Student/more_details');
                return;
            }
            $data = [
                'title' => 'Student',
                'view' => 'Model Paper Overview',
                'model_paper' => $this->student->get_model_paper_overview($id),
                'status' => $this->student->is_model_paper_purchased($id),
                'completed' => $this->student->is_model_paper_completed($id),
                'is_rated' => $this->student->is_model_paper_rated($id),
            ];
            $this->view('Student/Model_paper_overview', $data);
        } else {
            $this->view('Noaccess');
        }
    }
    public function purchase_video()

    {
        if (Auth::is_logged_in() && Auth::is_student()) {
            if (!Auth::is_premium()) {
                redirect('/Student/purchase_premium');
                return;
            }
            if (!Auth::is_completed()) {
                redirect('/Student/more_details');
                return;
            }
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
                    $data['view'] = 'Pay for video';
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
            if (!Auth::is_premium()) {
                redirect('/Student/purchase_premium');
                return;
            }
            if (!Auth::is_completed()) {
                redirect('/Student/more_details');
                return;
            }
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
                    $data['view'] = 'Pay for model paper';
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
            if (!Auth::is_premium()) {
                redirect('/Student/purchase_premium');
                return;
            }
            if (!Auth::is_completed()) {
                redirect('/Student/more_details');
                return;
            }
            if (isset($_POST['model_paper_id']) || isset($_GET['model_paper_id'])) {
                $modelPaperId = isset($_POST['model_paper_id']) ? $_POST['model_paper_id'] : $_GET['model_paper_id'];
                if ($this->student->is_model_paper_purchased($modelPaperId)) {
                    if ($this->student->is_model_paper_started($modelPaperId)) {
                        echo "Browser refreshed. You can't start the paper again.";
                        return;
                    }
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
                        if ($this->student->update_as_model_paper_started($modelPaperId)) {
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
            if (!Auth::is_premium()) {
                redirect('/Student/purchase_premium');
                return;
            }
            if (!Auth::is_completed()) {
                redirect('/Student/more_details');
                return;
            }
            if (isset($_POST['model_paper_content_id'])) {
                $modelPaperId = $_POST['model_paper_content_id'];
                if ($this->student->is_model_paper_purchased($modelPaperId) && $this->student->is_model_paper_started($modelPaperId)) {
                    $modelPaperId = $_POST['model_paper_content_id'];
                    $this->student->submit_model_paper_answers($_POST);
                    $data = [
                        'model_paper' => $this->student->get_model_paper_overview($modelPaperId),
                    ];
                    $this->view('Student/Model_paper_completed', $data);
                    return;
                }
            }
        }
        $this->view('Noaccess');
    }
    public function view_model_paper_answers($modelPaperId)
    {
        if (!$modelPaperId) {
            echo "Invalid request";
            return;
        }
        if (Auth::is_logged_in() && Auth::is_student()) {
            if (!Auth::is_premium()) {
                redirect('/Student/purchase_premium');
                return;
            }
            if (!Auth::is_completed()) {
                redirect('/Student/more_details');
                return;
            }
            if ($this->student->is_model_paper_purchased($modelPaperId)) {
                if ($this->student->is_model_paper_completed($modelPaperId)) {
                    $data = [
                        'title' => 'Student',
                        'view' => 'Model Paper Results',
                        'model_paper' => $this->student->get_model_paper_overview($modelPaperId),
                        'result' => $this->student->get_model_paper_result($modelPaperId),
                        'questions' => $this->student->get_model_paper_mcqs($modelPaperId),
                        'students_answers' => $this->student->get_student_answers_for_model_paper_mcq($modelPaperId),
                    ];
                    $this->view('Student/Answers_for_model_paper', $data);
                    return;
                }
            }
        }
        $this->view('Noaccess');
    }
    public function watch_video($id)
    {
        if (!$id) {
            echo "Invalid request";
            return;
        }
        if (Auth::is_logged_in() && Auth::is_student()) {
            if (!Auth::is_premium()) {
                redirect('/Student/purchase_premium');
                return;
            }
            if (!Auth::is_completed()) {
                redirect('/Student/more_details');
                return;
            }
            if ($this->student->is_video_purchased($id)) {
                $data = [
                    'title' => 'Student',
                    'view' => 'Watch Video',
                    'video' => $this->student->get_video($id),
                    'is_completed' => $this->student->is_video_completed($id),
                    'is_rated' => $this->student->is_video_rated($id),
                ];
                $this->view('Student/Watch_video', $data);
            } else {
                $this->view('Noaccess');
            }
        } else {
            $this->view('Noaccess');
        }
    }
    public function retrieve_video($video)
    {
        if (!$video) {
            echo "Invalid request";
            return;
        }
        if (Auth::is_logged_in() && Auth::is_student()) {
            if(!Auth::is_premium()){
                redirect('/Student/purchase_premium');
                return;
            }
            if (!Auth::is_completed()) {
                redirect('/Student/more_details');
                return;
            }
            $this->retrive_media($video, '/uploads/video_content/videos/');
        } else {
            $this->view('Noaccess');
        }
    }
    public function do_questions_of_video($videoId)
    {
        if (!$videoId) {
            echo "Invalid request";
            return;
        }
        if (Auth::is_logged_in() && Auth::is_student()) {
            if(!Auth::is_premium()){
                redirect('/Student/purchase_premium');
                return;
            }
            if (!Auth::is_completed()) {
                redirect('/Student/more_details');
                return;
            }
            if ($this->student->is_video_purchased($videoId)) {
                $data['video'] = $this->student->get_video($videoId);
                $data['questions'] = $this->student->get_video_mcqs($videoId);
                $this->view('Student/Do_questions_of_video', $data);
                return;
            }
        }
        $this->view('Noaccess');
    }
    public function submit_video_answers()
    {
        if (Auth::is_logged_in() && Auth::is_student()) {
            if(!Auth::is_premium()){
                redirect('/Student/purchase_premium');
                return;
            }
            if (!Auth::is_completed()) {
                redirect('/Student/more_details');
                return;
            }
            if (isset($_POST['video_content_id'])) {
                $videoId = $_POST['video_content_id'];
                if ($this->student->is_video_purchased($videoId)) {
                    $this->student->submit_video_answers($_POST);
                    $data = [
                        'video' => $this->student->get_video_overview($videoId),
                    ];
                    $this->view('Student/Video_completed', $data);
                    return;
                }
            }
        }
        $this->view('Noaccess');
    }
    public function video_results($videoId)
    {
        if (!$videoId) {
            echo "Invalid request";
            return;
        }
        if (Auth::is_logged_in() && Auth::is_student()) {
            if(!Auth::is_premium()){
                redirect('/Student/purchase_premium');
                return;
            }
            if (!Auth::is_completed()) {
                redirect('/Student/more_details');
                return;
            }
            if ($this->student->is_video_purchased($videoId)) {
                if ($this->student->is_video_completed($videoId)) {
                    $data = [
                        'video' => $this->student->get_video($videoId),
                        'result' => $this->student->get_video_result($videoId),
                        'questions' => $this->student->get_video_mcqs($videoId),
                        'students_answers' => $this->student->get_student_answers_for_video_mcq($videoId),
                    ];
                    $this->view('Student/Answers_for_video', $data);
                    return;
                }
            }
        }
        $this->view('Noaccess');
    }
    public function where_am_i($subunit_id)
    {
        if (!$subunit_id) {
            echo "Invalid request";
            return;
        }
        if (Auth::is_logged_in() && Auth::is_student()) {
        
            if (!Auth::is_completed()) {
                redirect('/Student/more_details');
                return;
            }
            if ($this->student->is_subunit_available_and_belong_to_my_subjects($subunit_id)) {
                $data = [
                    'title' => 'Student',
                    'view' => 'Where am I',
                    'about_subunit' => $this->student->get_subunit_overview($subunit_id),
                    'completed' => $this->student->is_progress_tracking_completed($subunit_id),
                    'score' => $this->student->get_my_score_for_subunit($subunit_id),
                    'my_videos' => $this->student->get_my_purchased_videos_by_subunit_id($subunit_id),
                    'my_model_papers' => $this->student->get_my_purchased_model_papers_by_subunit_id($subunit_id),
                    'not_purchased_videos' => $this->student->get_videos_by_subunit_not_purchased($subunit_id),
                    'not_purchased_model_papers' => $this->student->get_model_papers_by_subunit_not_purchased($subunit_id),
                ];
                $this->view('Student/Where_am_i_on_subunit', $data);
            } else {
                echo "You are not allowed to access this page";
            }
        } else {
            redirect('/Login');
        }
    }
    public function do_progress_tracking_paper($subunit_id)
    {
        if (!$subunit_id) {
            echo "Invalid request";
            return;
        }
        try {
            // Check if $subunit_id is valid
            if (!isset($subunit_id) || !is_numeric($subunit_id) || $subunit_id == null) {
                throw new Exception("Invalid request");
            }
            // Check if user is logged in and is a student
            if (!Auth::is_logged_in() || !Auth::is_student()) {
                throw new Exception("You are not authorized to access this page. Please log in as a student.");
            }
            if (!Auth::is_completed()) {
                redirect('/Student/more_details');
                return;
            }
            // Check if progress tracking is available for this subunit
            if ($this->student->get_subunit_overview($subunit_id)->model_paper_duration <= 0) {
                throw new Exception("Progress tracking is not available for this subunit.");
            }
            // Check if the subunit belongs to the user's subjects
            if (!$this->student->is_subunit_available_and_belong_to_my_subjects($subunit_id)) {
                throw new Exception("You are not allowed to access this page.");
            }
            // Check if the last attempt date for progress tracking is more than 24 hours ago
            if ($this->student->is_last_attempt_date_more_than_24_hours_progress_tracking($subunit_id)) {
                throw new Exception("You have already attempted this paper. You can attempt it again after 24 hours.");
            }
            // Check if 'start' parameter is provided in the URL
            if (isset($_GET['start']) && $_GET['start'] == 'true') {
                // Start progress tracking
                if (!$this->student->start_progress_tracking($subunit_id)) {
                    throw new Exception("Failed to start progress tracking.");
                }
            }
            // Load the appropriate view based on the conditions
            if (isset($_GET['start']) && $_GET['start'] == 'true') {
                $data = [
                    'title' => 'Student',
                    'view' => 'Do Progress Tracking Paper',
                    'subunit' => $this->student->get_subunit_overview($subunit_id),
                    'mcqs' => $this->student->get_mcqs_for_progress_tracking($subunit_id),
                ];
                $this->view('Student/Do_progress_tracking_paper', $data);
            } else {
                $data = [
                    'title' => 'Student',
                    'view' => 'Progress Tracking Paper',
                    'subunit' => $this->student->get_subunit_overview($subunit_id),
                ];
                $this->view('Student/Progress_tracking_paper_instructions', $data);
            }
        } catch (Exception $e) {
            echo $e->getMessage(); // Output the error message
        }
    }
    public function submit_progress_tracking_paper()
    {
        if (Auth::is_logged_in() && Auth::is_student()) {
            if (!Auth::is_completed()) {
                redirect('/Student/more_details');
                return;
            }
            if (isset($_POST['subunit_id'])) {
                $subunitId = $_POST['subunit_id'];
                if ($this->student->is_subunit_available_and_belong_to_my_subjects($subunitId)) {
                    $this->student->submit_progress_tracking_answers($_POST);
                    $data = [
                        'subunit' => $this->student->get_subunit_overview($subunitId),
                    ];
                    $this->view('Student/Progress_tracking_paper_completed', $data);
                    return;
                }
            }
        }
        $this->view('Noaccess');
    }
}
