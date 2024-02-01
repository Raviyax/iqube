<?php
class Landing extends Controller {

    public function index(){
       $data['view'] = 'Home';
        $this->view('Landing',$data);
       


    }
}