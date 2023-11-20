<?php
class Student extends Controller {

    public function index(){
        if(Auth::is_logged_in() && Auth::is_student()){
            $data = [
                'title' => 'Student',
                'view' => 'Dashboard'
            ];
            $this->view('Student/dashboard', $data);
        }
        else{
            redirect('/Login');
        }
        



    }

    
}