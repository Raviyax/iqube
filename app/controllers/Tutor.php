<?php
class Tutor extends Controller {

    public $Crud;
    public function index(){
        
        $data = [
            'title' => 'Tutor',
            'view' => 'Dashboard'
        ];
        $this->view('tutor/dashboard', $data);
       


    }

    public function messages(){
        
        $data = [
            'title' => 'Tutor',
            'view' => 'messages'
        ];
        $this->view('tutor/messages', $data);
       


    }
    public function lessons(){

        $this->Crud = $this->model('Crud');
        $result = $this->Crud->readData('courses');
        print_r($result);
        
        
        
        $data = [
            'title' => 'Tutor',
            'view' => 'lessons',
            'result' => $result
        ];
        $this->view('tutor/Lessons', $data);
       


    }
    public function upload(){

        


        
        $data = [
            'title' => 'Tutor',
            'view' => 'Upload New'
        ];
        $this->view('tutor/upload', $data);
       


    }
}