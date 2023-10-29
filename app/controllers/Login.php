<?php
class Login extends Controller
{       private $userModel;
    public function __construct()
    {   
        $this->userModel = $this->model('User');
    }
    
    public function index(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'title' => 'Signup',
               
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                
               
                'email_err' => '',
                'password_err' => '',
               
            ];

          

            //validte email
            if(empty($data['email'])){
                $data['email_err'] = 'Please enter email';
            }
           // validate password
              if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
                }

            // check for user/email
            if($this->userModel->findUserByEmail($data['email'])){
                //user found
            }else{  
                //user not found
                $data['email_err'] = 'No user found';

            }
    
               
    
                //make sure errors are empty
                if(empty($data['email_err']) && empty($data['password_err'])){
                
                    //validated
                    //check and set logged in user
                    $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                    if($loggedInUser){
                        //create session
                        $this->createUserSession($loggedInUser);
                        
                       
                    }else{
                        $data['password_err'] = 'Password incorrect';
                        $this->view('Login', $data);
                    }
                 }
                    else{
                        //load view with errors
                        $this->view('Login', $data);
                    }
                 
        }
        else{
            $data = [
                'title' => 'Lognup',
               
                'email' => '',
                'password' => '',
            
               
                'email_err' => '',
                'password_err' => '',
                
            ];
            $this->view('Login', $data);
        }

      
    }
    public function createUserSession($user){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_role'] = $user->role;

        

        
        header('location: ' . URLROOT . '/Dashboard/'.$_SESSION['user_role']);
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_role']);
        session_destroy();
        header('location: ' . URLROOT . '/Login');
    }
}

