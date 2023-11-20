<?php
class Landing extends Controller {

    public function index(){
        $data = [
            'title' => 'Home'
        ];
        $this->view('Landing',$data);
       


    }
}