<?php
class Student extends Controller {

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
        $data = [
            'title' => 'Student',
            'view' => 'Courses'
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