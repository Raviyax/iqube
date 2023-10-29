<?php
class Dashboard extends Controller {


    public function tutor(){
        $data = [
            'title' => 'Tutor Dashboard',
            'user_name' =>  $_SESSION['user_name'],
            'user_email' =>    $_SESSION['user_email'],
            'user_role' =>  $_SESSION['user_role'],
            
        ];
        $this->view('Tutor.dashboard', $data);
        
     
    }
    public function subject_admin(){
        
        $data = [
            'title' => 'Subject Admin Dashboard',
            'user_name' =>  $_SESSION['user_name'],
            'user_email' =>    $_SESSION['user_email'],
            'user_role' =>  $_SESSION['user_role'],
            
        ];
        $this->view('Subject_admin.dashboard', $data);
    }

    public function admin(){
        
        $data = [
            'title' => 'Admin Dashboard',
            'user_name' =>  $_SESSION['user_name'],
            'user_email' =>    $_SESSION['user_email'],
            'user_role' =>  $_SESSION['user_role'],
            
        ];
        $this->view('admin.dashboard', $data);
    }
    public function student(){
        
        $data = [
            'title' => 'Student Dashboard',
            'user_name' =>  $_SESSION['user_name'],
            'user_email' =>    $_SESSION['user_email'],
            'user_role' =>  $_SESSION['user_role'],
            
        ];
        $this->view('Student.dashboard', $data);
    }

}