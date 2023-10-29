<?php
class Signup extends Controller {

    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');

    }
   
    public function index(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'title' => 'Signup',
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['rpassword']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            //validate name
            if(empty($data['name'])){
                $data['name_err'] = 'Please enter name';
            }

            //validte email
            if(empty($data['email'])){
                $data['email_err'] = 'Please enter email';
            }
            else{
                //check email
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_err'] = 'Email is already taken';
                }
            }
           // validate password
              if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
                }elseif(strlen($data['password']) < 6){
                 $data['password_err'] = 'Password must be at least 6 characters';
                }
    
                //validate confirm password
                if(empty($data['confirm_password'])){
                 $data['confirm_password_err'] = 'Please confirm password';
                }else{
                 if($data['password'] != $data['confirm_password']){
                      $data['confirm_password_err'] = 'Passwords do not match';
                 }
                }
    
                //make sure errors are empty
                if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                 //validated
                    //hash password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    //register user
                    if($this->userModel->register($data)){
                        header('location: ' . URLROOT . '/Login');
                       
                    }else{
                        die('Something went wrong');
                    }
                 
                 }
                    else{
                        //load view with errors

                        $this->view('Signup', $data);
                    }
                 
        }
        else{
            $data = [
                'title' => 'Signup',
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            $this->view('Signup', $data);
        }
    }
}