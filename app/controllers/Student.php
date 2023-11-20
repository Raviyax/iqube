<?php
class Student extends Controller {

    public function index(){
        
        $data = [
            'title' => 'Student',
            'view' => 'Dashboard'
        ];
        $this->view('Student/dashboard', $data);
       


    }

    
}