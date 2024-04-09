<?php
session_start();
include("../app/config/config.php");
include("../app/lib/Database.php");
include("../app/lib/Model.php");
include ("../app/models/Subjectadmins.php");


$subjectadmins = new Subjectadmins();
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