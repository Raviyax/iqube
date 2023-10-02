<?php
class Pages extends Controller {
    public function __construct()
    {
    }

    public function about (){
      
        $data = [
            'title' => 'About us'
        ];
       $this->view("about",$data);
        
    }

    public function index(){
        $this->view("index"); 
    }
}
