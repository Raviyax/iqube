<?php
class Chat{
    private $host  = DB_HOST;
    private $user  = DB_USER;
    private $password   = DB_PASS;
    private $database  = DB_NAME;     
    private $chatTable = 'messages';
	private $chatUsersTable = 'users';
	private $dbConnect = false;
    public function __construct(){
		
        if(!$this->dbConnect){ 
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            }else{
                $this->dbConnect = $conn;
				
            }
        }
    }
	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result) {
			die('Error in query: ' . mysqli_error($this->dbConnect));
		}
		$data = array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[] = $row;            
		}
		// Free the result set
		mysqli_free_result($result);
		return $data;
	}
	
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error($this->dbConnect));
		}
		$numRows = mysqli_num_rows($result);
		// Free the result set
		mysqli_free_result($result);
		return $numRows;
	}

	public function hi (){
		echo "hi";
	}
	
		
	public function chatUsers($userid){
		$sqlQuery = "
			SELECT * FROM ".$this->chatUsersTable." 
			WHERE user_id != '$userid'";
		return  $this->getData($sqlQuery);
	}
	public function getUserDetails($userid){
		$sqlQuery = "
			SELECT * FROM ".$this->chatUsersTable." 
			WHERE user_id = '$userid'";
		return  $this->getData($sqlQuery);
	}
	public function getUserAvatar($userid){
		$sqlQuery = "
			SELECT image 
			FROM ".$this->chatUsersTable." 
			WHERE user_id = '$userid'";
		$userResult = $this->getData($sqlQuery);
		$userAvatar = '';
		foreach ($userResult as $user) {
			$userAvatar = $user['image'];
		}	
		return $userAvatar;
	}	
	public function updateUserOnline($userId, $online) {		
		$sqlUserUpdate = "
			UPDATE ".$this->chatUsersTable." 
			SET online = '".$online."' 
			WHERE user_id = '".$userId."'";			
		mysqli_query($this->dbConnect, $sqlUserUpdate);		
	}
	public function insertChat($reciever_userid, $user_id, $chat_message) {	
		$sqlInsert = "
			INSERT INTO ".$this->chatTable." 
			(sender, receiver, message, status) 
			VALUES ('".$user_id."', '".$reciever_userid."', '".$chat_message."', '1')";	
		$result = mysqli_query($this->dbConnect, $sqlInsert);
		if(!$result){
			return ('Error in query: '.mysqli_error($this->dbConnect));
		} else {
			$conversation = $this->getUserChat($user_id, $reciever_userid);
			$data = array(
				"conversation" => $conversation			
			);
			echo json_encode($data);	
		}
	}
	public function getUserChat($from_user_id, $to_user_id) {
		$fromUserAvatar = $this->getUserAvatar($from_user_id);	
		$toUserAvatar = $this->getUserAvatar($to_user_id);			
		$sqlQuery = "
			SELECT * FROM ".$this->chatTable." 
			WHERE (sender = '".$from_user_id."' 
			AND receiver = '".$to_user_id."') 
			OR (sender = '".$to_user_id."' 
			AND receiver = '".$from_user_id."') 
			ORDER BY received ASC";
		$userChat = $this->getData($sqlQuery);	
		$conversation = '<ul>';
		foreach($userChat as $chat){
			$user_name = '';
			if($chat["sender"] == $from_user_id) {
				$conversation .= '<li class="sent">';
				$conversation .= '<img width="22px" height="22px" src="' . URLROOT . '/Student/userimage/' . $fromUserAvatar. '" alt="" />';
			} else {
				$conversation .= '<li class="replies">';
				$conversation .= '<img width="22px" height="22px" src="' . URLROOT . '/Student/userimage/' . $toUserAvatar. '" alt="" />';
			}			
			$conversation .= '<p>'.$chat["message"].'</p>';			
			$conversation .= '</li>';
		}		
		$conversation .= '</ul>';
		return $conversation;
	}
	public function showUserChat($from_user_id, $to_user_id) {		
		
		$userDetails = $this->getUserDetails($to_user_id);
		$toUserAvatar = '';
		foreach ($userDetails as $user) {
			$toUserAvatar = $user['image'];
			$userSection = '<img src="' . URLROOT . '/Student/userimage/' . $user['image'] . '" alt="" />
				<p>'.$user['username'].'</p>
				<div class="social-media">
					<i class="fa fa-facebook" aria-hidden="true"></i>
					<i class="fa fa-twitter" aria-hidden="true"></i>
					 <i class="fa fa-instagram" aria-hidden="true"></i>
				</div>';

				
		}		
		// get user conversation
		$conversation = $this->getUserChat($from_user_id, $to_user_id);	
		// update chat user read status		
		$sqlUpdate = "
			UPDATE ".$this->chatTable." 
			SET status = '0' 
			WHERE sender = '".$to_user_id."' AND receiver = '".$from_user_id."' AND status = '1'";
		mysqli_query($this->dbConnect, $sqlUpdate);		
		// update users current chat session
		$sqlUserUpdate = "
			UPDATE ".$this->chatUsersTable." 
			SET current_session = '".$to_user_id."' 
			WHERE user_id = '".$from_user_id."'";
		mysqli_query($this->dbConnect, $sqlUserUpdate);		
		$data = array(
			"userSection" => $userSection,
			"conversation" => $conversation			
		 );
		 echo json_encode($data);		
	}	
	public function getUnreadMessageCount($senderUserid, $recieverUserid) {
		$sqlQuery = "
			SELECT * FROM ".$this->chatTable."  
			WHERE sender = '$senderUserid' AND receiver = '$recieverUserid' AND received = '1'";
		$numRows = $this->getNumRows($sqlQuery);
		$output = '';
		if($numRows > 0){
			$output = $numRows;
		}
		return $output;
	}	
	public function updateTypingStatus($is_type, $loginDetailsId) {		
		$sqlUpdate = "
			UPDATE ".$this->chatUsersTable." 
			SET is_typing = '".$is_type."' 
			WHERE id = '".$loginDetailsId."'";
		mysqli_query($this->dbConnect, $sqlUpdate);
	}		
	public function fetchIsTypeStatus($userId){
		$sqlQuery = "
		SELECT is_typing FROM ".$this->chatUsersTable." 
		WHERE userid = '".$userId."' ORDER BY last_activity DESC LIMIT 1"; 
		$result =  $this->getData($sqlQuery);
		$output = '';
		foreach($result as $row) {
			if($row["is_typing"] == 'yes'){
				$output = ' - <small><em>Typing...</em></small>';
			}
		}
		return $output;
	}		
	
	public function updateLastActivity($loginDetailsId) {		
		$sqlUpdate = "
			UPDATE ".$this->chatUsersTable." 
			SET last_activity = now() 
			WHERE id = '".$loginDetailsId."'";
		mysqli_query($this->dbConnect, $sqlUpdate);
	}	
	public function getUserLastActivity($userId) {
		$sqlQuery = "
			SELECT last_activity FROM ".$this->chatUsersTable." 
			WHERE userid = '$userId' ORDER BY last_activity DESC LIMIT 1";
		$result =  $this->getData($sqlQuery);
		foreach($result as $row) {
			return $row['last_activity'];
		}
	}	
}
?>