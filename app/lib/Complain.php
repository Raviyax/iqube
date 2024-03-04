<?php

class Complain extends Database{

 

public function insert_complain($message_from, $message_to, $message, $complain_id){
    $this->query("INSERT INTO complains (message_from, message_to, message, complain_id) VALUES (:message_from, :message_to, :message, :complain_id)", [
        'message_from' => $message_from,
        'message_to' => $message_to,
        'message' => $message,
        'complain_id' => $complain_id
    ]);
    return true;
}
}