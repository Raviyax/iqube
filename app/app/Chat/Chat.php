<?php
class Chat
{
	private $host  = DB_HOST;
	private $user  = DB_USER;
	private $password   = DB_PASS;
	private $database  = DB_NAME;
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
	public function getUserDetails($userid)
	{
		$sqlQuery = "
			SELECT * FROM users
			WHERE user_id = '$userid'";
		return  $this->getData($sqlQuery);
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
	public function subjectadmin_get_chat_users()
	{
		$sqlQuery = "
			SELECT user_id FROM iqube_support where subject_admin_user_id = '".$_SESSION['USER_DATA']['user_id']."'AND completed = '0'";
			$users = $this->getData($sqlQuery);
			$chatUsers = array();
			foreach ($users as $user) {
				$sqlQuery = "
				SELECT username,user_id,image FROM users where user_id = '".$user['user_id']."'";
				$userDetails = $this->getData($sqlQuery);
				$chatUsers[] = $userDetails;
			}
			return $chatUsers;
	}
	public function startSupport($user_id, $support_request)
	{
		$random_subject_admin = $_SESSION['USER_DATA']['chat_agent'];
		//generate a random string
		$iqube_support_id = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
		$_SESSION['USER_DATA']['iqube_support_id'] = $iqube_support_id;
		$sqlInsert = "INSERT INTO iqube_support (iqube_support_id, user_id, subject_admin_user_id, support_request) VALUES (?, ?, ?, ?)";
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
		$sqlInsert = "INSERT INTO support_messages (iqube_support_id, sender_user_id, reciever_user_id, message) VALUES (?, ?, ?, ?)";
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
			WHERE iqube_support_id = '$iqube_support_id'";
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
		$data = array(
			"conversation" => $conversation
		);
		return $conversation;
	}
	public function subjectAdminUpdateUserChat($to_user_id)
	{
		//select the messages both sender_user_id = subject_admin_user_id and reciever_user_id = user_id and vice versa
		$sqlQuery = "
			SELECT * FROM support_messages 
			WHERE (sender_user_id = '".$_SESSION['USER_DATA']['user_id']."' AND reciever_user_id = '$to_user_id') 
			OR (sender_user_id = '$to_user_id' AND reciever_user_id = '".$_SESSION['USER_DATA']['user_id']."')";
		$userChat = $this->getData($sqlQuery);
		$conversation = '<ul>';
		foreach ($userChat as $chat) {
			if ($chat["sender_user_id"] == $_SESSION['USER_DATA']['user_id']) {
				$conversation .= '<li class="sent">';
			} else {
				$conversation .= '<li class="replies">';
			}
			$conversation .= '<p id="lastIqubeSupportId" data-lastIqubeSupportId="'.$chat['iqube_support_id'].'">' . $chat["message"] . '</p>';
			$conversation .= '</li>';
		}
		$conversation .= '</ul>';
		$data = array(
			"conversation" => $conversation
		);
		//if this function is called by subjectAdminshowUserChat just return conversation
		//else echo as json
		//meka damme echo wena ekai return ekai dekama wunoth subjectAdminshowUserChat response ekata membersla 2 nek enawa. ethakota chat eke uda image ekai namai pennanne nathuwa yanawa
		//palaweni member wa witharai ganne
		if(isset($_POST['action']) && $_POST['action'] == 'subject_admin_show_chat'){
			return $conversation;
		}
		echo json_encode($data);
	}
	public function subjectAdminInsertChat($to_user_id, $chat_message, $lastIqubeSupportId)
	{
		// Prepare the SQL query
		$sqlInsert = "INSERT INTO support_messages (iqube_support_id, sender_user_id, reciever_user_id, message) VALUES (?, ?, ?, ?)";
		// Prepare the SQL statement
		$insert_stmt = $this->dbConnect->prepare($sqlInsert);
		$insert_stmt->bind_param("siss", $lastIqubeSupportId, $_SESSION['USER_DATA']['user_id'], $to_user_id, $chat_message);
		$insert_result = $insert_stmt->execute();
		// Prepare the SQL statement
		if ($insert_result) {
			// Get the updated conversation
			$this->subjectAdminUpdateUserChat($to_user_id);
			return true;
		} else {
			// Return an error message if the insertion failed
			return ('Error in query: ' . $insert_stmt->error);
		}
	}
	public function subjectAdminshowUserChat($to_user_id)
	{
		$userDetails = $this->getUserDetails($to_user_id);
		foreach ($userDetails as $user) {
			$userSection = '<img src="' . URLROOT . '/subjectadmin/userimage/' . $user['image'] . '" alt="" />
				<p>' . $user['username'] . '</p>';
		}
		// get user conversation
		$conversation = $this->subjectAdminUpdateUserChat($to_user_id);
		$data = array(
			"userSection" => $userSection,
			"conversation" => $conversation
		);
		echo json_encode($data);
	}
}
