<?php
session_start();
include("../app/config/config.php");
include("../app/lib/Database.php");
include("../app/lib/Model.php");
include ("../app/models/Subjectadmins.php");
include ("../app/models/Students.php");
// Initialize objects
$subjectadmins = new Subjectadmins();
$students = new Students();
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
    
} else {
    // If action is not specified, return an error response
    echo 'error';
}
?>
