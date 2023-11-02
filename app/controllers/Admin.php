<?php
class Admin extends Controller {

    public $Crud;

    public function index(){
        
        $data = [
            'title' => 'Admin',
            'view' => 'Dashboard'
        ];
        $this->view('Admin/dashboard', $data);
       


    }

    public function users()
    {
        $this->Crud = $this->model('Crud');
        $result = $this->Crud->readData('users');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //view tutors
            
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
            header('location:' . URLROOT . '/admin/users');
//delete tutor
            if(isset($_POST['delete'])){
                $condition ='email = :email';

                $conditionparams = [
                    'email' => $_POST['delete'],
                ];
                $this->Crud->deleteData('tutors',$condition,$conditionparams);
                $this->Crud->deleteData('users',$condition,$conditionparams);
                header('location:' . URLROOT . '/admin/users');
            }
        }
        $data = [
            'title' => 'Admin',
            'view' => 'Users',
            'result' => $result
        ];

        $this->view('admin/users', $data);
    }

    
}