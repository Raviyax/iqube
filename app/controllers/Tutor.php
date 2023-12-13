<?php
class Tutor extends Controller
{
    private $me;

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

    public function profile()
    {
        if (Auth::is_logged_in() && Auth::is_tutor()) {

            $data = [
                'title' => 'Tutor',
                'view' => 'My Profile',
                

                
            ];

          
            $this->view('Tutor/Profile', $data);
            $this->me = $this->model('User');


            if (isset($_POST["submit"])) {

               
               $image = $this->me->update_image($_FILES["image"],APPROOT."/uploads/userimages/",'Tutors',$_SESSION['USER_DATA']['user_id']);
               
               $_SESSION['USER_DATA']['image'] = Database::get_image($image,"/uploads/userimages/");

              
               

            }
        } else {
            redirect('/Login');
        }
    }

}
