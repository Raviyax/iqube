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
        $this->Crud = $this->model('Crud');
        $result = $this->Crud->readData('courses');
        $data = [
            'title' => 'Student',
            'view' => 'Courses',
            'result' => $result
        ];
        $this->view('Student/singleCourse', $data);

        $user_id = $_SESSION['USER_DATA']['id'];
        $course_id = $_POST('course_id');

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // if(isset($_POST['add'])){
                if($user_id && $course_id){
                    $data = [
                        'user_id' => $user_id,
                        'course_id' => $course_id
                        
                    ];
                    
                    $this->Crud->insertData('enrolled_courses', $data);
                    header('location:' . URLROOT . '/Student/wishlist');
                   
                   }
            // }
        }
        
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

    // Within your Controller, handle the AJAX request to add the Gantt task
// public function addGanttTask() {
//     // Get the JSON data from the request
//     $taskData = json_decode(file_get_contents('php://input'), true);

//     // Call the Model's function to insert the task into the database
//     $taskId = $this->Gantt->insertGanttTask($taskData);

//     // Return the new task ID
//     echo json_encode(['taskId' => $taskId]);
// }

}