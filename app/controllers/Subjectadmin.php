<?php
class Subjectadmin extends Controller
{

    public function index()
    {
        if (Auth::is_logged_in() && Auth::is_subject_admin()) {
            $data = [
                'title' => 'Subject Admin',
                'view' => 'Dashboard'
            ];
            $this->view('Subjectadmin/dashboard', $data);
        } else {
            redirect('/Login');
        }
    }
}
