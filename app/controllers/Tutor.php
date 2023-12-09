<?php
class Tutor extends Controller
{

    public function index()
    {

        if (Auth::is_logged_in() && Auth::is_tutor()) {


            $data = [
                'title' => 'Tutor',
                'view' => 'Dashboard'
            ];
            $this->view('Tutor/Dashboard', $data);
        }
        else{
            redirect('/Login');
        }

    }

}
