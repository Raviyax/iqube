<?php
class Subject_admin extends Controller {
    public $Crud;

    public function index(){

        
        
        $data = [
            'title' => 'Subject Admin',
            'view' => 'Dashboard'
        ];
        $this->view('Subject_admin/dashboard', $data);
       


    }

    public function tutors(){
        $this->Crud = $this->model('Crud');
        
       

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $inserttutor = [
                'name' => $_POST['name'],
                'subject' => $_POST['subject'],
                'email' => $_POST['email'],
                'password' => $_POST['password']

                
                
       
            ];

            $insertuser = [
                'name' => $_POST['name'],
                
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'role' => 'tutor'

                
                
       
            ];
            $this->Crud->insertData('tutors', $inserttutor);
            $this->Crud->insertData('users', $insertuser);
           
           }
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