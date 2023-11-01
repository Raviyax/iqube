<?php
class Tutor extends Controller {

    public function index(){
        
        $data = [
            'title' => 'Tutor'
        ];
        $this->view('tutor/dashboard');
       


    }
}