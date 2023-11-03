<?php
class Student extends Controller {

    public $Crud;

    public function index(){
        
        $data = [
            'title' => 'Student',
            'view' => 'Dashboard'
        ];
        $this->view('Student/dashboard', $data);
       


    }

    public function profile(){
        $data = [
            'title'=> 'Student',
            'view'=> 'Profile',
            ];
            $this->view('Student/profile', $data);

        }

    public function courses(){
        $this->Crud = $this->model('Crud');
        $result = $this->Crud->readData('courses');
        $data = [
            'title' => 'Student',
            'view' => 'Courses',
            'result' => $result
        ];
        $this->view('Student/courses', $data);
    }

    public function singleCourse(){
        $data = [
            'title' => 'Student',
            'view' => 'singleCourse'
        ];
        $this->view('Student/singleCourse', $data);

    }

    public function syllabus(){
        $data = [
            'title' => 'Student',
            'view' => 'syllabus'
        ];
        $this->view('Student/syllabus', $data);
    }

    public function schedule(){
        $this->Crud = $this->model('Crud');
        $result = $this->Crud->readData('gantt_tasks');

        $data = [
            'title' => 'Student',
            'view' => 'schedule'
        ];
        $this->view('Student/schedule', $data);
    }

    public function tutors(){
        $data = [
            'title' => 'Student',
            'view' => 'tutors'
        ];
        $this->view('Student/tutors', $data);
    }

    public function wishlist(){

        $this->Crud = $this->model('Crud');
        $result = $this->Crud->readData('enrolled_courses');
        $data = [
            'title'=> 'Student',
            'view'=> 'wishlist'
            ];
            $this->view('Student/wishlist', $data);
        }

    public function messages(){
        
        $data = [
            'title' => 'Student',
            'view' => 'messages'
        ];
        $this->view('Student/messages', $data);

    }

    public function settings(){
        $data = [
            'title' => 'Student',
            'view' => 'settings'
        ];
        $this->view('Student/settings', $data);
    }

    
}