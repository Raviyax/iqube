<?php
class Tutor extends Controller {

    public $Crud;
    public function index(){
        
        $data = [
            'title' => 'Tutor',
            'view' => 'Dashboard'
        ];
        $this->view('Tutor/Dashboard', $data);
       


    }

    public function messages(){
        
        $data = [
            'title' => 'Tutor',
            'view' => 'messages'
        ];
        $this->view('Tutor/Messages', $data);
       


    }
    public function lessons(){

        $this->Crud = $this->model('Crud');
        $result = $this->Crud->readData('courses');

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['delete'])){
                $condition ='id = :id';

                $conditionparams = [
                    'id' => $_POST['delete'],
                ];
                $this->Crud->deleteData('courses',$condition,$conditionparams);
               
                header('location:' . URLROOT . '/Tutor/Lessons');
            }
        }

        
        
        
        
        $data = [
            'title' => 'Tutor',
            'view' => 'lessons',
            'result' => $result
        ];
        $this->view('tutor/Lessons', $data);
       


    }
    public function upload(){

        

        $this->Crud = $this->model('Crud');
        
        $data = [
            'title' => 'Tutor',
            'view' => 'Upload New'
        ];
        $this->view('Tutor/Upload', $data); 

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'chapter' => $_POST['chapter'],
                'type' => $_POST['type'],
                'price' => $_POST['price'],
                
                
            ];
            
            $this->Crud->insertData('courses', $data);
            header('location:' . URLROOT . '/tutor/lessons');
           
           }
       


    }
}