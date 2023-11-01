<?php
class Admin extends Controller {

    public function index(){
        
        $data = [
            'title' => 'Admin',
            'view' => 'Dashboard'
        ];
        $this->view('Admin/dashboard', $data);
       


    }

    
}