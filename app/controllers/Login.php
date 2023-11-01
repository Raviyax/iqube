<?php
class Login extends Controller
{       
   

    public function index(){
        $row = [];
        $data['title'] = 'Login';
        $data['errors'] = [];
        $user = $this->model('User');
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $row = $user->first([
                'email' => $_POST['email']
                
            ]);     
            if($row){
                
                if(password_verify($_POST['password'], $row->password)){
                    Auth::authenticate($row);
                  if( Auth::is_tutor()){ header('location:'.URLROOT.'/tutor');}
                    if( Auth::is_admin()){ header('location:'.URLROOT.'/admin');}
                  
                   
                   
                }

                $data['errors']['email_err'] = '*Wrong Email or Password';

            }
        }
        $this->view('login', $data);
        
        
}
}
