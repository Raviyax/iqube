<?php
class Logout extends Controller
{
    public function index()
    {   Auth::logout();
        session_destroy();
        header('location:' . URLROOT . '/Landing');
    }
}