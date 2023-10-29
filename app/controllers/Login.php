<?php
class Login extends Controller
{

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
    
               
    
                //make sure errors are empty
                if(empty($data['email_err']) && empty($data['password_err'])){
                 //validated
                 die('SUCCESS');
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
}
