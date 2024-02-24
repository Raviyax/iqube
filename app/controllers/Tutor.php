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
                $this->view('Tutor/Createpassword', $data);
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
                        $this->view('Tutor/Createpassword', $data);
                    }
                }
            }
        } else {
            redirect('/Landing');
        }
    }
    public function myuploads()
    {
        if (Auth::is_logged_in() && Auth::is_tutor()) {
            $data = [
                'title' => 'Tutor',
                'view' => 'My Uploads',
                'courses' => $this->tutor->get_my_uploads()
            ];
            $this->view('Tutor/Myuploads', $data);
        } else {
            redirect('/Login');
        }
    }
    public function add_new_video()
    {
        if (Auth::is_logged_in() && Auth::is_tutor()) {
            $data = [
                'title' => 'Tutor',
                'view' => 'Add New',
                'chapters' => $this->tutor->get_chapters(),
            ];
            if (isset($_POST['submit-video'])) {
                if ($this->tutor->validate_insert_to_video_content($_POST, $_FILES['video'], $_FILES['thumbnail'])) {
                    $selectedValues = $_POST['subOption'];
                    $commaSeparatedValues = implode('][', $selectedValues);
                    $_POST['subOption'] = $commaSeparatedValues;
                    $video = $this->upload_media($_FILES['video'], '/uploads/video_content/videos/');
                    $thumbnail = $this->upload_media($_FILES['thumbnail'], '/uploads/video_content/thumbnails/');

                    if ($video && $thumbnail) {
                  

                        $video_content_id = $this->tutor->insert_to_video_content($_POST, $video, $thumbnail);
                        if ($video_content_id) {
                            $data['video_content_id'] = $video_content_id;
                            $this->view('Tutor/Add_mcq_for_video', $data);
                            return;
                        }
                    } else {
                        $data['errors'] = "Error uploading file";
                    }
                } else {
                    $data['errors'] = $this->tutor->errors;
                    $this->view('Tutor/Add_new_video', $data);
                }
            }
            $video_content_id = isset($_GET['video_content_id']) ? $_GET['video_content_id'] : null;
            if (isset($_POST['submit-mcq']) && $video_content_id != null) {
                if ($this->tutor->is_video_content_id_exists_and_not_active($video_content_id)) {
                    if ($this->tutor->validate_insert_to_mcq_for_video($_POST)) {
                        if ($this->tutor->insert_to_mcq_for_video($_POST, $video_content_id)) {
                            if ($this->tutor->set_video_content_active($video_content_id)) {
                                echo "<script>alert('MCQs added successfully')</script>";
                                redirect('/Tutor/myuploads');
                            }
                            
                        }
                    }
                    else {
                        $data['errors'] = $this->tutor->errors;
                        $this->view('Tutor/Add_mcq_for_video', $data);
                    }
                } else {
                    echo "<script>alert('Video Content ID does not exist or is already active')</script>";
                }

                

                ;
            } 
            $this->view('Tutor/Add_new_video', $data);
        }
        else {
            redirect('/Login');
        }
    }

    public function thumbnail($thumbnail)
    {
        if (Auth::is_logged_in() && Auth::is_tutor()) {
            $this->retrive_media($thumbnail, '/uploads/video_content/thumbnails/');
        } else {
            $this->view('Noaccess');
        }
    }

    public function add_new_model_paper()
    {
        if (Auth::is_logged_in() && Auth::is_tutor()) {
            $data = [
                'title' => 'Tutor',
                'view' => 'Add New Model Paper',
                'chapters' => $this->tutor->get_chapters(),
            ];
            if (isset($_POST['submit-about-paper'])) {
                if ($this->tutor->validate_insert_to_model_paper_content($_POST, $_FILES['thumbnail'])) {
                   
                    $selectedValues = $_POST['subOption'];
                    $commaSeparatedValues = implode('][', $selectedValues);
                    $_POST['subOption'] = $commaSeparatedValues;
                    $thumbnail = $this->upload_media($_FILES['thumbnail'], '/uploads/model_papers/thumbnails/');
                    if ($thumbnail) {

                        $model_paper_content_id = $this->tutor->insert_to_model_paper_content($_POST, $thumbnail);
                        if ($model_paper_content_id) {
                            $data['model_paper_content_id'] = $model_paper_content_id;
                            $this->view('Tutor/Add_questions_to_model_paper', $data);
                            return;
                        }
                        // echo"thumbnail uploaded";
                        // if ($this->tutor->insert_to_model_paper_content($_POST, $thumbnail)) {
                        //     echo "<script>alert('Model Paper added successfully')</script>";
                        //     redirect('/Tutor/myuploads');
                        // }
                    } else {
                        $data['errors'] = "Error uploading file";
                        $this->view('Tutor/Add_new_model_paper', $data);
                        
                        
                    }
                } else {
                    $data['errors'] = $this->tutor->errors;
                    $this->view('Tutor/Add_new_model_paper', $data);
                    
                   
                }
            }
            

            
            $model_paper_content_id = isset($_GET['model_paper_content_id']) ? $_GET['model_paper_content_id'] : null;
            if (isset($_POST['submit-questions']) && $model_paper_content_id != null) {
                if ($this->tutor->is_model_paper_content_id_exists_and_not_active($model_paper_content_id)) {
                    if ($this->tutor->validate_insert_to_questions_for_model_paper($_POST, $_FILES['essay_questions'])) {
                        $essay_questions = $this->upload_media($_FILES['essay_questions'], '/uploads/model_papers/essay_questions/');
                        if ($essay_questions) {
                            if ($this->tutor->insert_to_mcqs_for_model_paper($_POST,$model_paper_content_id) && $this->tutor->insert_to_essays_for_model_paper($essay_questions, $model_paper_content_id)) {
                                if ($this->tutor->set_model_paper_content_active($model_paper_content_id)) {
                                    echo "<script>alert('Questions added successfully')</script>";
                                    redirect('/Tutor/myuploads');
                                }
                            }
                        } else {
                            $data['errors'] = "Error uploading file";
                        }
                    } else {
                        $data['errors'] = $this->tutor->errors;
                        $this->view('Tutor/Add_questions_to_model_paper', $data);
                    }
                } else {
                    echo "<script>alert('Model Paper Content ID does not exist or is already active')</script>";
                }
            }



            $this->view('Tutor/Add_new_model_paper', $data);
        } else {
            redirect('/Login');
        }
    }
}
