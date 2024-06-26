<?php
session_start();
include("../app/config/config.php");
include("../app/lib/Database.php");
include("../app/lib/Model.php");
include ("../app/models/Subjectadmins.php");
include ("../app/models/Students.php");
include ("../app/models/Tutors.php");
include ("../app/models/Admins.php");
include ("../app/models/Auth.php");
// Initialize objects
$subjectadmins = new Subjectadmins();
$students = new Students();
$tutors = new Tutors();
$admins = new Admins();
// Check if the action is specified in the POST data
if(isset($_POST['action'])) {
    $action = $_POST['action'];
    // Handle updating syllabus
    if($action == 'update_syllabus') {
        // Sanitize input
        $id = intval($_POST['id']);
        $subunit = $_POST['subunit'];
        $weight = floatval($_POST['weight']);
        // Perform update and echo response
        if($subjectadmins->update_syllabus($id, $subunit, $weight)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
    // Handle deleting syllabus
    if($action == 'delete_syllabus') {
        // Sanitize input
        $id = intval($_POST['id']);
        // Perform deletion and echo response
        if($subjectadmins->delete_syllabus($id)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
    // Handle inserting subunit
    if($action == 'insert_subunit') {
        // Sanitize input
        $chapter_level_1 = $_POST['chapter_level_1'];
        $subunit = $_POST['subunit'];
        $weight = floatval($_POST['weight']);
        // Perform insertion and echo response
        if($subjectadmins->insert_subunit($chapter_level_1, $subunit, $weight)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
    // Handle saving MCQ edited by subject admin
    if($action == 'subject_admin_save_mcq') {
        // Sanitize input
        $mcq_id = intval($_POST['mcq_id']);
        $question = $_POST['question'];
        $option1 = $_POST['option1'];
        $option2 = $_POST['option2'];
        $option3 = $_POST['option3'];
        $option4 = $_POST['option4'];
        $option5 = $_POST['option5'];
        $correct = $_POST['correct'];
        // Perform saving and echo response
        if($subjectadmins->save_mcq($mcq_id, $question, $option1, $option2, $option3, $option4, $option5, $correct)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
    // Handle deleting MCQ
    if($action == 'subject_admin_delete_mcq') {
        // Sanitize input
        $mcq_id = intval($_POST['mcq_id']);
        // Perform deletion and echo response
        if($subjectadmins->delete_mcq($mcq_id)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
    // Handle inserting MCQ
    if($action == 'subject_admin_add_mcq') {
        // Sanitize input
        $subunit_id = intval($_POST['subunit_id']);
        $question = $_POST['question'];
        $option1 = $_POST['option1'];
        $option2 = $_POST['option2'];
        $option3 = $_POST['option3'];
        $option4 = $_POST['option4'];
        $option5 = $_POST['option5'];
        $correct = $_POST['correct'];
        // Perform insertion and echo response
        if($subjectadmins->add_mcq($subunit_id, $question, $option1, $option2, $option3, $option4, $option5, $correct)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
    //handle subject_admin_save_duration
    if($action == 'subject_admin_save_duration') {
        // Sanitize input
        $subunit_id = intval($_POST['subunit_id']);
        $duration = $_POST['duration'];
        // Perform insertion and echo response
        if($subjectadmins->save_duration($subunit_id, $duration)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    if($action == 'markFlagged') {
        // Sanitize input
        $tutor_id = intval($_POST['tutor_id']);
        // Perform insertion and echo response
        if($subjectadmins->markFlagged($tutor_id)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    if($action == 'tutorUpdatePassword') {
        // Sanitize input
        $oldpassword = $_POST['oldpassword'];
        $newpassword = $_POST['newpassword'];
        // Perform insertion and echo response
        if($tutors->updatePassword($oldpassword, $newpassword)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    if($action == 'tutor_update_model_paper_duration') {
        // Sanitize input
        $model_paper_id = $_POST['model_paper_id'];
        $duration = $_POST['duration'];
        // Perform insertion and echo response
        if($tutors->update_model_paper_duration($model_paper_id, $duration)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    if($action == 'tutor_update_model_paper_description') {
        // Sanitize input
        $model_paper_id = $_POST['model_paper_id'];
        $description = $_POST['description'];
        // Perform insertion and echo response
        if($tutors->update_model_paper_description($model_paper_id, $description)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    if ($action == 'tutor_update_model_paper_thumbnail') {
        // Sanitize input (if necessary)
        $model_paper_id = $_POST['model_paper_id'];
    
        // Check if a file was uploaded
        if (isset($_FILES['thumbnail'])) {
            $thumbnail = $_FILES['thumbnail'];
    
            // Validate file type, size, etc. (if necessary)
    
            // Move the uploaded file to the desired directory on the server
            $uploadDir = ''.APPROOT.'/uploads/model_papers/thumbnails/';
     //rename the file with unique id
            $uploadFilename = uniqid();
            $uploadFile = $uploadDir . $uploadFilename;
            
    
            if (move_uploaded_file($thumbnail['tmp_name'], $uploadFile)) {
                // The file has been successfully uploaded, update the database or perform any other necessary actions
                if ($tutors->update_model_paper_thumbnail($model_paper_id, $uploadFilename)) {
                    echo 'success';
                } else {
                    echo 'error';
                }
            } else {
                // Failed to move the uploaded file, handle the error
                echo 'error';
            }
        } else {
            // No file uploaded, handle the error
            echo 'error';
        }
    }

    if($action == 'tutor_activate_model_paper') {
        // Sanitize input
        $model_paper_id = $_POST['model_paper_id'];
        // Perform insertion and echo response
        if($tutors->activate_model_paper($model_paper_id)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    if($action == 'tutor_deactivate_model_paper') {
        // Sanitize input
        $model_paper_id = $_POST['model_paper_id'];
        // Perform insertion and echo response
        if($tutors->deactivate_model_paper($model_paper_id)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
    
    if($action == 'tutor_delete_mcq') {
        // Sanitize input
        $mcq_id = $_POST['mcq_id'];
        // Perform deletion and echo response
        if($tutors->delete_mcq($mcq_id)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }


    if($action == 'tutor_add_mcq') {
        // Sanitize input
       $model_paper_id = $_POST['model_paper_id'];
        $question = $_POST['question'];
        $option1 = $_POST['option1'];
        $option2 = $_POST['option2'];
        $option3 = $_POST['option3'];
        $option4 = $_POST['option4'];
        $option5 = $_POST['option5'];
        $correct = $_POST['correct'];
        // Perform insertion and echo response
        if($tutors->add_mcq($model_paper_id, $question, $option1, $option2, $option3, $option4, $option5, $correct)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    if($action == 'tutor_update_mcq') {
        // Sanitize input
        $mcq_id = $_POST['mcq_id'];
        $question = $_POST['question'];
        $option1 = $_POST['option1'];
        $option2 = $_POST['option2'];
        $option3 = $_POST['option3'];
        $option4 = $_POST['option4'];
        $option5 = $_POST['option5'];
        $correct = $_POST['correct'];
        // Perform insertion and echo response
        if($tutors->update_mcq($mcq_id, $question, $option1, $option2, $option3, $option4, $option5, $correct)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    if($action == 'tutor_update_video_description') {
        // Sanitize input
        $video_id = $_POST['video_id'];
        $description = $_POST['description'];
        // Perform insertion and echo response
        if($tutors->update_video_description($video_id, $description)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    if($action == 'tutor_update_video_thumbnail') {
        // Sanitize input (if necessary)
        $video_id = $_POST['video_id'];
    
        // Check if a file was uploaded
        if (isset($_FILES['thumbnail'])) {
            $thumbnail = $_FILES['thumbnail'];
    
            // Validate file type, size, etc. (if necessary)
    
            // Move the uploaded file to the desired directory on the server
            $uploadDir = ''.APPROOT.'/uploads/video_content/thumbnails/';
     //rename the file with unique id
            $uploadFilename = uniqid();
            $uploadFile = $uploadDir . $uploadFilename;
            
    
            if (move_uploaded_file($thumbnail['tmp_name'], $uploadFile)) {
                // The file has been successfully uploaded, update the database or perform any other necessary actions
                if ($tutors->update_video_thumbnail($video_id, $uploadFilename)) {
                    echo 'success';
                } else {
                    echo 'error';
                }
            } else {
                // Failed to move the uploaded file, handle the error
                echo 'error';
            }
        } else {
            // No file uploaded, handle the error
            echo 'error';
        }
    }

    if($action == 'tutor_activate_video') {
        // Sanitize input
        $video_id = $_POST['video_id'];
        // Perform insertion and echo response
        if($tutors->activate_video($video_id)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    if($action == 'tutor_deactivate_video') {
        // Sanitize input
        $video_id = $_POST['video_id'];
        // Perform insertion and echo response
        if($tutors->deactivate_video($video_id)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    if($action == 'tutor_delete_video_mcq') {
        // Sanitize input
        $mcq_id = $_POST['mcq_id'];
        // Perform deletion and echo response
        if($tutors->delete_video_mcq($mcq_id)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    if($action == 'tutor_add_video_mcq') {
        // Sanitize input
       $video_id = $_POST['video_id'];
        $question = $_POST['question'];
        $option1 = $_POST['option1'];
        $option2 = $_POST['option2'];
        $option3 = $_POST['option3'];
        $option4 = $_POST['option4'];
        $option5 = $_POST['option5'];
        $correct = $_POST['correct'];
        // Perform insertion and echo response
        if($tutors->add_video_mcq($video_id, $question, $option1, $option2, $option3, $option4, $option5, $correct)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    if($action == 'tutor_update_video_mcq') {
        // Sanitize input
        $mcq_id = $_POST['mcq_id'];
        $question = $_POST['question'];
        $option1 = $_POST['option1'];
        $option2 = $_POST['option2'];
        $option3 = $_POST['option3'];
        $option4 = $_POST['option4'];
        $option5 = $_POST['option5'];
        $correct = $_POST['correct'];
        // Perform insertion and echo response
        if($tutors->update_video_mcq($mcq_id, $question, $option1, $option2, $option3, $option4, $option5, $correct)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    if($action == 'admin_deactivate_subject_admin') {
        // Sanitize input
        $id = intval($_POST['id']);
        // Perform deactivation and echo response
        if($admins->deactivate_subject_admin($id)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    if($action == 'admin_activate_subject_admin') {
        // Sanitize input
        $id = intval($_POST['id']);
        // Perform activation and echo response
        if($admins->activate_subject_admin($id)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    if($action == 'admin_deactivate_tutor') {
        // Sanitize input
        $id = intval($_POST['id']);
        // Perform deactivation and echo response
        if($admins->deactivate_tutor($id)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    if($action == 'admin_activate_tutor') {
        // Sanitize input
        $id = intval($_POST['id']);
        // Perform activation and echo response
        if($admins->activate_tutor($id)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    if($action == 'admin_change_password') {
        // Sanitize input
        $current = $_POST['current'];
        $new = $_POST['new'];
        // Perform password change and echo response
        if($admins->change_password($current, $new)) {
            echo 'success';
        } else {
            echo 'Current password is incorrect or new password is invalid';
        }
    }

    if($action == 'removeFlagged') {
        // Sanitize input
        $tutor_id = intval($_POST['tutor_id']);
        // Perform insertion and echo response
        if($subjectadmins->removeFlagged($tutor_id)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }


    if($action == 'subject_admin_activate_video') {
        // Sanitize input
        $video_id = $_POST['video_id'];
        // Perform insertion and echo response
        if($subjectadmins->activate_video($video_id)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    if($action == 'subject_admin_deactivate_video') {
        // Sanitize input
        $video_id = $_POST['video_id'];
        // Perform insertion and echo response
        if($subjectadmins->deactivate_video($video_id)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    if($action == 'subject_admin_activate_model_paper') {
        // Sanitize input
        $model_paper_id = $_POST['model_paper_id'];
        // Perform insertion and echo response
        if($subjectadmins->activate_model_paper($model_paper_id)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    if($action == 'subject_admin_deactivate_model_paper') {
        // Sanitize input
        $model_paper_id = $_POST['model_paper_id'];
        // Perform insertion and echo response
        if($subjectadmins->deactivate_model_paper($model_paper_id)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    if($action == 'SubjectAdminUpdatePassword') {
        // Sanitize input
        $oldpassword = $_POST['oldpassword'];
        $newpassword = $_POST['newpassword'];
        // Perform insertion and echo response
        if($subjectadmins->updatePassword($oldpassword, $newpassword)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    if($action == 'studentUpdateFname') {
        // Sanitize input
        $fname = $_POST['fname'];
        // Perform insertion and echo response
        if($students->updateFname($fname)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    if($action == 'studentUpdateLname') {
        // Sanitize input
        $lname = $_POST['lname'];
        // Perform insertion and echo response
        if($students->updateLname($lname)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    if($action == 'studentUpdateCno') {
        // Sanitize input
        $cno = $_POST['cno'];
        // Perform insertion and echo response
        if($students->updateCno($cno)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    if($action == 'studentUpdateAddress') {
        // Sanitize input
        $address = $_POST['address'];
        // Perform insertion and echo response
        if($students->updateAddress($address)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    if($action == 'studentUpdateCity') {
        // Sanitize input
        $city = $_POST['city'];
        // Perform insertion and echo response
        if($students->updateCity($city)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    if($action == 'studentUpdatePassword') {
        // Sanitize input
        $oldpassword = $_POST['oldpassword'];
        $newpassword = $_POST['newpassword'];
        // Perform insertion and echo response
        if($students->updatePassword($oldpassword, $newpassword)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    if($action == 'studentUpdateProfilePic') {
        // Sanitize input (if necessary)
        // Check if a file was uploaded
        if (isset($_FILES['file'])) {
            $profilepic = $_FILES['file'];
    
            // Validate file type, size, etc. (if necessary)
    
            // Move the uploaded file to the desired directory on the server
            $uploadDir = ''.APPROOT.'/uploads/userimages/';
     //rename the file with unique id
            $uploadFilename = uniqid();
            $uploadFile = $uploadDir . $uploadFilename;
            
    
            if (move_uploaded_file($profilepic['tmp_name'], $uploadFile)) {
                // The file has been successfully uploaded, update the database or perform any other necessary actions
                if ($students->updateProfilePic($uploadFilename)) {
                    echo 'success';
                } else {
                    echo 'error';
                }
            } else {
                // Failed to move the uploaded file, handle the error
                echo 'error';
            }
        } else {
            // No file uploaded, handle the error
            echo 'error';
        }
    }

    if($action == 'rate_video') {
        // Sanitize input
        $video_id = $_POST['video_id'];
        $rating = $_POST['rating'];
        // Perform insertion and echo response
        if($students->rate_video($video_id, $rating)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    if($action == 'rate_model_paper') {
        // Sanitize input
        $model_paper_id = $_POST['model_paper_id'];
        $rating = $_POST['rate'];
        // Perform insertion and echo response
        if($students->rate_model_paper($model_paper_id, $rating)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
    
} else {
    // If action is not specified, return an error response
    echo 'error';
}
?>
