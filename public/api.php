<?php
session_start();
include("../app/config/config.php");
include("../app/lib/Database.php");
include("../app/lib/Model.php");
include ("../app/models/Subjectadmins.php");
include ("../app/models/Students.php");
$subjectadmins = new Subjectadmins();
$students = new Students();
if($_POST['action'] == 'update_syllabus') {
    $id = $_POST['id'];
    $subunit = $_POST['subunit'];
    $weight = $_POST['weight'];
    $subjectadmins->update_syllabus($id, $subunit, $weight);
    echo 'success';
}

if($_POST['action'] == 'delete_syllabus') {
    $id = $_POST['id'];
    $subjectadmins->delete_syllabus($id);
    echo 'success';
}

//insert_subunit
if($_POST['action'] == 'insert_subunit') {
    $chapter_level_1 = $_POST['chapter_level_1'];
    $subunit = $_POST['subunit'];
    $weight = $_POST['weight'];
    $subjectadmins->insert_subunit($chapter_level_1, $subunit, $weight);
    echo 'success';
}

