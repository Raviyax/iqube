<?php
class Landing extends Controller {

    public function index(){
        $data = [
            'title' => 'Home',
            'view' => 'Home'
            
        ];
        $this->view('Landing',$data);
        //
       


    }
}