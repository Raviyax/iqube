<?php
 class Auth {
    public $user;
    public static function authenticate($row, $studentdata, $premiumdata){
 
        if(is_object($row )){
            if($row->role == 'student'){
                $_SESSION['USER_DATA'] = [
                    'user_id' => $row->user_id,
                    'username' => $row->username,
                    'email' => $row->email,
                    'role' => $row->role,
                    'created_at' => $row->created_at,
                    'updated_at' => $row->updated_at,
                    'image' => $studentdata->image,
                    'premium' => $studentdata->premium,
                    'student_id' => $studentdata->student_id,
                    'completed' => $studentdata->completed,
                    'verify' => $studentdata->verify
                ];
            }
            if(($row->role == 'student') && ($studentdata->premium == 1)){
                $_SESSION['USER_DATA'] = [
                    'user_id' => $row->user_id,
                    'username' => $row->username,
                    'email' => $row->email,
                    'role' => $row->role,
                    'created_at' => $row->created_at,
                    'updated_at' => $row->updated_at,
                    'fname' => $premiumdata->fname,
                    'lname' => $premiumdata->lname,
                    'cno' => $premiumdata->cno,
                    'student_id' => $studentdata->student_id,
                    'image' => $studentdata->image,
                    'premium' => $studentdata->premium,
                    'completed' => $studentdata->completed,
                    'verify' => $studentdata->verify
                    
                    
                ];
            }

            return true;
        }
        return false;
    }
    public static function authenticate_admin($row){
        if($row[0]!=null){
            $_SESSION['USER_DATA'] = [
                'username' => $row[0]->username,
                'email' => $row[0]->email,
                'role' => 'admin',
            ];
        }
    }
    public static function authenticate_tutor($row, $tutordata){
        if($row[0]!=null){
            $_SESSION['USER_DATA'] = [
                'username' => $row[0]->username,
                'email' => $row[0]->email,
                'role' => 'tutor',
                'fname' => $tutordata[0]->fname,
                'lname' => $tutordata[0]->lname,
                'cno' => $tutordata[0]->cno,
                'username' => $tutordata[0]->username,
                'subject' => $tutordata[0]->subject,
                'tutor_id' => $tutordata[0]->tutor_id,
                'image' => $tutordata[0]->image,
               'approved_date' => $tutordata[0]->approved_date,
               'active' => $tutordata[0]->active,
               
            ];
        }
    }
    public static function authenticate_subject_admin($row, $subjectadmindata){
        if($row[0]!=null){
            $_SESSION['USER_DATA'] = [
                'username' => $row[0]->username,
                'email' => $row[0]->email,
                'role' => 'subject_admin',
                'fname' => $subjectadmindata[0]->fname,
                'lname' => $subjectadmindata[0]->lname,
                'cno' => $subjectadmindata[0]->cno,
                'username' => $subjectadmindata[0]->username,
                'subject' => $subjectadmindata[0]->subject,
                'subject_admin_id' => $subjectadmindata[0]->subject_admin_id,
                'image' => $subjectadmindata[0]->image,
                'created_at' => $row[0]->created_at,
                'user_id' => $row[0]->user_id,
                'password' => $row[0]->password,
            ];
        }
    }
    public static function is_logged_in(){
        if(!empty($_SESSION['USER_DATA'])){
            return true;
        }
        return false;
    }
    public static function logout(){
       if(!empty($_SESSION['USER_DATA'])){
           unset($_SESSION['USER_DATA']);
           session_unset();
           session_regenerate_id();
       }
    }
    public static function is_admin(){
        if($_SESSION['USER_DATA']['role'] == 'admin'){
            return true;
        }
        return false;
    }
    public static function is_tutor(){
        if($_SESSION['USER_DATA']['role'] == 'tutor' && $_SESSION['USER_DATA']['active'] == 1){
            return true;
        }
        return false;
    }
    public static function is_student(){
        if($_SESSION['USER_DATA']['role'] == 'student' && $_SESSION['USER_DATA']['verify'] == 1){
            return true;
        }
        return false;
    }
    public static function is_subject_admin(){
        if($_SESSION['USER_DATA']['role'] == 'subject_admin'){
            return true;
        }
        return false;
    }
    public static function is_premium(){
        if($_SESSION['USER_DATA']['premium'] == '1'){
            return true;
        }
        return false;
    }

    public static function is_completed(){
        if($_SESSION['USER_DATA']['completed'] == '1'){
            return true;
        }
        return false;
    }
 }