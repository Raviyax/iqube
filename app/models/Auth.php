<?php
 class Auth {
    public $user;
    public static function authenticate($row, $subjectadmindata, $studentdata, $tutordata){
        

        if(is_object($row )){

            if($row->role == 'subject_admin'){
                $_SESSION['USER_DATA'] = [
                    'user_id' => $row->user_id,
                    'username' => $row->username,
                    'email' => $row->email,
                    'role' => $row->role,
                    'created_at' => $row->created_at,
                    'updated_at' => $row->updated_at,
                    'fname' => $subjectadmindata->fname,
                    'lname' => $subjectadmindata->lname,
                    'cno' => $subjectadmindata->cno,
                    'username' => $subjectadmindata->username,
                    'subject' => $subjectadmindata->subject,
                    'subject_admin_id' => $subjectadmindata->subject_admin_id,
                    'image' => $subjectadmindata->image,
              
                ];
            }
            if($row->role == 'admin'){
                $_SESSION['USER_DATA'] = [
                    'user_id' => $row->user_id,
                    'username' => $row->username,
                    'email' => $row->email,
                    'role' => $row->role,
                    'created_at' => $row->created_at,
                    'updated_at' => $row->updated_at,
                    
              
                ];
            }

            if($row->role == 'tutor'){
                $_SESSION['USER_DATA'] = [
                    'user_id' => $row->user_id,
                    'username' => $row->username,
                    'email' => $row->email,
                    'role' => $row->role,
                    'created_at' => $row->created_at,
                    'updated_at' => $row->updated_at,
                    'fname' => $tutordata->fname,
                    'lname' => $tutordata->lname,
                    'cno' => $tutordata->cno,
                    'username' => $tutordata->username,
                    'subject' => $tutordata->subject,
                    'tutor_id' => $tutordata->tutor_id,
              
                ];
            }

         
       
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
        if($_SESSION['USER_DATA']['role'] == 'tutor'){
            return true;
        }
        return false;
    }

    public static function is_student(){
        if($_SESSION['USER_DATA']['role'] == 'student'){
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



 }