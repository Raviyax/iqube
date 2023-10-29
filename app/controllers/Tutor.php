<?php
class Tutor extends Controller {

    public function messages(){
        
        $data = [
            'title' => 'Tutor Dashboard',
            'user_name' =>  $_SESSION['user_name'],
            'user_email' =>    $_SESSION['user_email'],
            'user_role' =>  $_SESSION['user_role'],
            
        ];
       $this->view('Tutor.message', $data);


    }
    
}