<?php
class Chat
{
	private $host  = DB_HOST;
	private $user  = DB_USER;
	private $password   = DB_PASS;
	private $database  = DB_NAME;
	private $chatTable = 'messages';
	private $chatUsersTable = 'users';
	private $dbConnect = false;
	public function __construct()
	{
		if (!$this->dbConnect) {
			$conn = new mysqli($this->host, $this->user, $this->password, $this->database);
			if ($conn->connect_error) {
				die("Error failed to connect to MySQL: " . $conn->connect_error);
			} else {
				$this->dbConnect = $conn;
			}
		}
	}
	private function getData($sqlQuery)
{
    // Prepare the SQL statement
    $statement = $this->dbConnect->prepare($sqlQuery);
    
    // Execute the prepared statement
    $statement->execute();
    
    // Get the result set
    $result = $statement->get_result();
    
    // Check for errors
    if (!$result) {
        // Handle errors gracefully (e.g., log, throw exception)
        error_log('Error in query: ' . $statement->error);
        return false; // Or handle the error in a different way based on your application's requirements
    }
    
    // Fetch data from the result set
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    
    // Free the result set
    $result->free();
    
    return $data;
}

	private function getNumRows($sqlQuery)
	{
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if (!$result) {
			die('Error in query: ' . mysqli_error($this->dbConnect));
		}
		$numRows = mysqli_num_rows($result);
		// Free the result set
		mysqli_free_result($result);
		return $numRows;
	}
	
	public function chatUsers($userid)
	{
		$sqlQuery = "
			SELECT * FROM " . $this->chatUsersTable . " 
			WHERE user_id != '$userid'";
		return  $this->getData($sqlQuery);
	}
	public function getUserDetails($userid)
	{
		$sqlQuery = "
			SELECT * FROM " . $this->chatUsersTable . " 
			WHERE user_id = '$userid'";
		return  $this->getData($sqlQuery);
	}
	public function getUserAvatar($userid)
	{
		$sqlQuery = "
			SELECT image 
			FROM " . $this->chatUsersTable . " 
			WHERE user_id = '$userid'";
		$userResult = $this->getData($sqlQuery);
		$userAvatar = '';
		foreach ($userResult as $user) {
			$userAvatar = $user['image'];
		}
		return $userAvatar;
	}
	public function updateUserOnline($userId, $online)
	{
		$sqlUserUpdate = "
			UPDATE " . $this->chatUsersTable . " 
			SET online = '" . $online . "' 
			WHERE user_id = '" . $userId . "'";
		mysqli_query($this->dbConnect, $sqlUserUpdate);
	}
	public function insertChat($reciever_userid, $user_id, $chat_message)
	{
		$sqlInsert = "INSERT INTO " . $this->chatTable . "(sender, receiver, message, status) VALUES ('" . $user_id . "', '" . $reciever_userid . "', '" . $chat_message . "', '1')";
		$result = mysqli_query($this->dbConnect, $sqlInsert);
		if (!$result) {
			return ('Error in query: ' . mysqli_error($this->dbConnect));
		} else {
			$conversation = $this->getUserChat($user_id, $reciever_userid);
			$data = array(
				"conversation" => $conversation
			);
			echo json_encode($data);
		}
	}
	// public function getUserChat($from_user_id, $to_user_id)
	// {
	// 	$fromUserAvatar = $this->getUserAvatar($from_user_id);
	// 	$toUserAvatar = $this->getUserAvatar($to_user_id);
	// 	$sqlQuery = "
	// 		SELECT * FROM " . $this->chatTable . " 
	// 		WHERE (sender = '" . $from_user_id . "' 
	// 		AND receiver = '" . $to_user_id . "') 
	// 		OR (sender = '" . $to_user_id . "' 
	// 		AND receiver = '" . $from_user_id . "') 
	// 		ORDER BY received ASC";
	// 	$userChat = $this->getData($sqlQuery);
	// 	$conversation = '<ul>';
	// 	foreach ($userChat as $chat) {
	// 		$user_name = '';
	// 		if ($chat["sender"] == $from_user_id) {
	// 			$conversation .= '<li class="sent">';
	// 			$conversation .= '<img width="22px" height="22px" src="' . URLROOT . '/Student/userimage/' . $fromUserAvatar . '" alt="" />';
	// 		} else {
	// 			$conversation .= '<li class="replies">';
	// 			$conversation .= '<img width="22px" height="22px" src="' . URLROOT . '/Student/userimage/' . $toUserAvatar . '" alt="" />';
	// 		}
	// 		$conversation .= '<p>' . $chat["message"] . '</p>';
	// 		$conversation .= '</li>';
	// 	}
	// 	$conversation .= '</ul>';
	// 	return $conversation;
	// }

	public function getUserChat($from_user_id, $to_user_id)
	{
	
		$sqlQuery = "
			SELECT * FROM " . $this->chatTable . " 
			WHERE (sender = '" . $from_user_id . "' 
			AND receiver = '" . $to_user_id . "') 
			OR (sender = '" . $to_user_id . "' 
			AND receiver = '" . $from_user_id . "') 
			ORDER BY received ASC";
		$userChat = $this->getData($sqlQuery);
		$conversation = '<ul>';
		foreach ($userChat as $chat) {
			 
			if ($chat["sender"] == $from_user_id) {
				$conversation .= '<li class="sent">';
			} else {
				$conversation .= '<li class="replies">';

			}
			$conversation .= '<p>' . $chat["message"] . '</p>';
			$conversation .= '</li>';
		}
		$conversation .= '</ul>';
		return $conversation;
	}
	
	public function showUserChat($from_user_id, $to_user_id)
	{
		$userDetails = $this->getUserDetails($to_user_id);
		$toUserAvatar = '';
		foreach ($userDetails as $user) {
			$toUserAvatar = $user['image'];
			$userSection = '<img src="' . URLROOT . '/Student/userimage/' . $user['image'] . '" alt="" />
				<p>' . $user['username'] . '</p>
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
			UPDATE " . $this->chatTable . " 
			SET status = '0' 
			WHERE sender = '" . $to_user_id . "' AND receiver = '" . $from_user_id . "' AND status = '1'";
		mysqli_query($this->dbConnect, $sqlUpdate);
		// update users current chat session
		$sqlUserUpdate = "
			UPDATE " . $this->chatUsersTable . " 
			SET current_session = '" . $to_user_id . "' 
			WHERE user_id = '" . $from_user_id . "'";
		mysqli_query($this->dbConnect, $sqlUserUpdate);
		$data = array(
			"userSection" => $userSection,
			"conversation" => $conversation
		);
		echo json_encode($data);
	}
	public function getUnreadMessageCount($senderUserid, $recieverUserid)
	{
		$sqlQuery = "
			SELECT * FROM " . $this->chatTable . "  
			WHERE sender = '$senderUserid' AND receiver = '$recieverUserid' AND received = '1'";
		$numRows = $this->getNumRows($sqlQuery);
		$output = '';
		if ($numRows > 0) {
			$output = $numRows;
		}
		return $output;
	}
	public function updateTypingStatus($is_type, $loginDetailsId)
	{
		$sqlUpdate = "
			UPDATE " . $this->chatUsersTable . " 
			SET is_typing = '" . $is_type . "' 
			WHERE id = '" . $loginDetailsId . "'";
		mysqli_query($this->dbConnect, $sqlUpdate);
	}
	public function fetchIsTypeStatus($userId)
	{
		$sqlQuery = "
		SELECT is_typing FROM " . $this->chatUsersTable . " 
		WHERE userid = '" . $userId . "' ORDER BY last_activity DESC LIMIT 1";
		$result =  $this->getData($sqlQuery);
		$output = '';
		foreach ($result as $row) {
			if ($row["is_typing"] == 'yes') {
				$output = ' - <small><em>Typing...</em></small>';
			}
		}
		return $output;
	}
	public function updateLastActivity($loginDetailsId)
	{
		$sqlUpdate = "
			UPDATE " . $this->chatUsersTable . " 
			SET last_activity = now() 
			WHERE id = '" . $loginDetailsId . "'";
		mysqli_query($this->dbConnect, $sqlUpdate);
	}
	public function getUserLastActivity($userId)
	{
		$sqlQuery = "
			SELECT last_activity FROM " . $this->chatUsersTable . " 
			WHERE userid = '$userId' ORDER BY last_activity DESC LIMIT 1";
		$result =  $this->getData($sqlQuery);
		foreach ($result as $row) {
			return $row['last_activity'];
		}
	}

	public function startSupport($user_id, $support_request)
	{
		$random_subject_admin = $_SESSION['USER_DATA']['chat_agent'];
		//generate a random string
		$iqube_support_id = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
		$_SESSION['USER_DATA']['iqube_support_id'] = $iqube_support_id;
		$sqlInsert = "INSERT INTO iqube_support (iqube_support_id, user_id, subject_admin_id, support_request) VALUES (?, ?, ?, ?)";
		
		$insert_stmt = $this->dbConnect->prepare($sqlInsert);
		$insert_stmt->bind_param("siis", $iqube_support_id, $user_id, $random_subject_admin, $support_request);
		$insert_result = $insert_stmt->execute();
		$this->insertSupportMessages($random_subject_admin, $user_id, $support_request);
		if ($insert_result) {
			$conversation = $this->getSupportChat();
			$data = array(
				"conversation" => $conversation
			);
			echo json_encode($data);
		} else {
			return ('Error in query: ' . $insert_stmt->error);
		}
		
	
	}

	public function insertSupportMessages($receiver_user_id, $user_id, $chat_message)
	{
		// Ensure the iqube_support_id exists in the session data
		if (!isset($_SESSION['USER_DATA']['iqube_support_id'])) {
			return 'Error: iqube_support_id not found in session data';
		}
		
		// Retrieve iqube_support_id from session data
		$iqube_support_id = $_SESSION['USER_DATA']['iqube_support_id'];
	
		// Prepare the SQL query
		$sqlInsert = "INSERT INTO support_messages (iqube_support_id, sender_user_id, subject_admin_user_id, message) VALUES (?, ?, ?, ?)";

		// Prepare the SQL statement
		$insert_stmt = $this->dbConnect->prepare($sqlInsert);
		$insert_stmt->bind_param("siss", $iqube_support_id, $user_id, $receiver_user_id, $chat_message);
		$insert_result = $insert_stmt->execute();

	

		// Prepare the SQL statement
		if ($insert_result) {
			// Get the updated conversation
			$conversation = $this->getSupportChat();
			
			// Return the conversation as JSON
			$data = array(
				"conversation" => $conversation
			);
			echo json_encode($data);
		} else {
			// Return an error message if the insertion failed
			return ('Error in query: ' . $insert_stmt->error);
		}
	}
	

	public function getSupportChat()
	{
		$iqube_support_id = $_SESSION['USER_DATA']['iqube_support_id'];
		$sqlQuery = "
			SELECT * FROM support_messages 
			WHERE iqube_support_id = '$iqube_support_id' 
			ORDER BY received ASC";
		$userChat = $this->getData($sqlQuery);
		$conversation = '<ul>';
		foreach ($userChat as $chat) {
			if ($chat["sender_user_id"] == $_SESSION['USER_DATA']['user_id']) {
				$conversation .= '<li class="sent">';
			} else {
				$conversation .= '<li class="replies">';
			}
			$conversation .= '<p id="'.$iqube_support_id.'">' . $chat["message"] . '</p>';
			$conversation .= '</li>';
		}
		$conversation .= '</ul>';
		return $conversation;
	}
	
}
