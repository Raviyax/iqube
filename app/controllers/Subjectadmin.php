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
            $this->view('Subject_admin/Dashboard', $data);
        } else {
            redirect('/Login');
        }
    }

    public function profile()
    {
        if (Auth::is_logged_in() && Auth::is_subject_admin()) {
            $data = [
                'title' => 'Subject Admin',
                'view' => 'My Profile'
                
            ];
            $this->view('Subject_admin/Profile', $data);
        } else {
            redirect('/Login');
        }
    }
}
