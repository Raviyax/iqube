<?php
class Subject_admin extends Controller {

    public function index(){

        
        
        $data = [
            'title' => 'Subject Admin',
            'view' => 'Dashboard'
        ];
        $this->view('Subject_admin/dashboard', $data);
       


    }

    
}