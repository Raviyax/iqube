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
            $this->view('tutor/dashboard', $data);
        }
        else{
            redirect('/Login');
        }

    }

    public function messages()
    {

        if (Auth::is_logged_in() && Auth::is_tutor()) {

            $data = [
                'title' => 'Tutor',
                'view' => 'messages'
            ];
            $this->view('tutor/messages', $data);
        }
        else{
            redirect('/Login');
        }


    }
    public function lessons()
    {

        if (Auth::is_logged_in() && Auth::is_tutor()) {

            $data = [
                'title' => 'Tutor',
                'view' => 'lessons'
            ];
            $this->view('tutor/Lessons', $data);
        }
        else{
            redirect('/Login');
        }
    }
    public function upload()
    {

        if (Auth::is_logged_in() && Auth::is_tutor()) {





            $data = [
                'title' => 'Tutor',
                'view' => 'Upload New'
            ];
            $this->view('tutor/upload', $data);
        }
        else{
            redirect('/Login');
        }
    }
}
