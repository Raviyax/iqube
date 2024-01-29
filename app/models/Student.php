<?php
class Student extends Model {
    public function pay(){
        $student_id = $_SESSION['USER_DATA']['student_id'];
        $this->query("UPDATE students SET paid = 1 WHERE student_id = $student_id");
        $_SESSION['USER_DATA']['paid'] = 1;
    }
    public function signup_premium(){
        $student_id = $_SESSION['USER_DATA']['student_id'];
        $email = $_SESSION['USER_DATA']['email'];
        $this->query("INSERT INTO premium_students (email, student_id, fname, lname, cno) VALUES ('$email', '$student_id', '$_POST[fname]', '$_POST[lname]', '$_POST[cno]')");
        $this->query("UPDATE students SET premium = 1 WHERE student_id = $student_id");
        $_SESSION['USER_DATA']['premium'] = 1;
    }
    public function complete_profile(){
        $student_id = $_SESSION['USER_DATA']['student_id'];
        $this->query("UPDATE students SET subjects = '$_POST[subjects]', completed = 1 WHERE student_id = $student_id");
        $_SESSION['USER_DATA']['completed'] = 1;
        header('location:'.$_SERVER['HTTP_REFERER']);
    }
}