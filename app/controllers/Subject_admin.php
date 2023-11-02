<?php
class Subject_admin extends Controller {

    public function index(){

        
        
        $data = [
            'title' => 'Subject Admin',
            'view' => 'Dashboard'
        ];
        $this->view('Subject_admin/dashboard', $data);
       


    }

    public function tutors(){
        $data = [
            'title' => 'Subject Admin',
            'view' => 'View Tutors'
        ];
        $this->view('Subject_admin/tutors', $data);
    }

    public function complaints(){
        $data = [
            'title' => 'Subject Admin',
            'view' => 'Complaints'
        ];
        $this->view('Subject_admin/complaints', $data);
    }

    public function settings(){
        $data = [
            'title' => 'Subject Admin',
            'view' => 'Settings'
        ];
        $this->view('Subject_admin/settings', $data);
    }

    
}