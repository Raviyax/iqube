<?php
class Complain extends Complains {
    
    public function start_complain($about_complain,$subject){
    
    $subject_admins = $this->query("SELECT user_id FROM subject_admins WHERE subject = :subject", [
        'subject' => $subject
    ]);
    //randomly select one of a user_id
    $random_key = array_rand($subject_admins);
    $message_to = $subject_admins[$random_key]->user_id;
    $message = "Complain about ".$about_complain;
    //generate a complain_id of 8 characters
    $complain_id = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);
    $query = $this->insert_complain_chat($message_to, $message, $complain_id);
    if($query){
        return $complain_id;
    }
    else{
        return false;
    }
    }
    
}