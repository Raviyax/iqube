<?php
class Pages extends Controller {
    public function __construct()
    {
    }

    public function about (){
      
        $data = [
            'title' => 'About Us'
        ];
       $this->view("about",$data);
        
    }

    public function index(){
        $this->view("index"); 
    }
}
