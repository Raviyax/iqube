<?php
class Complains extends Database{
public $result;
 
public function insert_complain_chat($message_to, $message, $complain_id){
    $query = $this->query("INSERT INTO complains (message_from, message_to, message, complain_id) VALUES (:message_from, :message_to, :message, :complain_id)", [
        'message_from' => $_SESSION['USER_DATA']['user_id'],
        'message_to' => $message_to,
        'message' => $message,
        'complain_id' => $complain_id
    ]);
    if($query){
        return true;
    }
    else{
        return false;
    }
   
    
}
public function get_complain_chat($message_to,$complain_id){
    $output = '';
    $message_from = $_SESSION['USER_DATA']['user_id'];
    $result = $this->query("SELECT * FROM complains WHERE (message_from = :message_from AND message_to = :message_to) OR (message_from = :message_to AND message_to = :message_from) AND complain_id = :complain_id", [
        'message_from' => $_SESSION['USER_DATA']['user_id'],
        'message_to' => $message_to,
        'complain_id' => $complain_id
    ]);
    
    if($result){
        foreach($result as $row){
            if($row->message_from == $message_from){
                $output .= '<div class="chat outgoing">
                <div class="details">
                    <p>'.$row->message.'</p>
                </div>
            </div>';
            }
            else{
                $output .= '<div class="chat incoming">
                <img src="" alt="">
                <div class="details">
                    <p>'.$row->message.'</p>
                </div>
            </div>';
            }
        }
        return json_encode($output);
    }
    else{
        return false;
    }
   
   
}
}