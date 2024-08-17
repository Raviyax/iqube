<?php
class Chat
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $password = DB_PASS;
    private $database = DB_NAME;
    private $dbConnect = false;

    public function __construct()
    {
        if (!$this->dbConnect) {
            try {
                $conn = new PDO("mysql:host={$this->host};dbname={$this->database}", $this->user, $this->password);
                // Set PDO to throw exceptions on error
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->dbConnect = $conn;
            } catch (PDOException $e) {
                die("Error failed to connect to MySQL: " . $e->getMessage());
            }
        }
    }

    public function getUserDetails($userid)
    {
        $sqlQuery = "SELECT * FROM users WHERE user_id = :userid";
        $params = array(':userid' => $userid);
        return $this->getDataWithParams($sqlQuery, $params);
    }

    private function getDataWithParams($sqlQuery, $params)
    {
        try {
            // Prepare the SQL statement
            $statement = $this->dbConnect->prepare($sqlQuery);
            // Bind parameters
            foreach ($params as $key => $value) {
                $statement->bindValue($key, $value);
            }
            // Execute the prepared statement
            $statement->execute();
            // Fetch data from the result set
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);
            // Free the statement
            $statement->closeCursor();
            return $data;
        } catch (PDOException $e) {
            // Handle errors gracefully (e.g., log, throw exception)
            error_log('Error in query: ' . $e->getMessage());
            return false; // Or handle the error in a different way based on your application's requirements
        }
    }

    public function subjectadmin_get_chat_users()
    {
        $sqlQuery = "SELECT user_id FROM iqube_support WHERE subject_admin_user_id = :subject_admin_user_id AND completed = '0'";
        $params = array(':subject_admin_user_id' => $_SESSION['USER_DATA']['user_id']);
        $users = $this->getDataWithParams($sqlQuery, $params);
        $chatUsers = array();
        foreach ($users as $user) {
            $sqlQuery = "SELECT username, user_id, image FROM users WHERE user_id = :user_id";
            $params = array(':user_id' => $user['user_id']);
            $userDetails = $this->getDataWithParams($sqlQuery, $params);
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
        $insert_stmt->execute(array($iqube_support_id, $user_id, $random_subject_admin, $support_request));
        $this->insertSupportMessages($random_subject_admin, $user_id, $support_request);
        $conversation = $this->getSupportChat();
        $data = array(
            "conversation" => $conversation
        );
        echo json_encode($data);
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
        $insert_stmt->execute(array($iqube_support_id, $user_id, $receiver_user_id, $chat_message));
        // Get the updated conversation
        $conversation = $this->getSupportChat();
        // Return the conversation as JSON
        $data = array(
            "conversation" => $conversation
        );
        echo json_encode($data);
    }

    public function getSupportChat()
    {
        $iqube_support_id = $_SESSION['USER_DATA']['iqube_support_id'];
        $sqlQuery = "SELECT * FROM support_messages WHERE iqube_support_id = :iqube_support_id";
        $params = array(':iqube_support_id' => $iqube_support_id);
        $userChat = $this->getDataWithParams($sqlQuery, $params);
        $conversation = '<ul>';
        foreach ($userChat as $chat) {
            if ($chat["sender_user_id"] == $_SESSION['USER_DATA']['user_id']) {
                $conversation .= '<li class="sent">';
            } else {
                $conversation .= '<li class="replies">';
            }
            $conversation .= '<p id="' . $iqube_support_id . '">' . $chat["message"] . '</p>';
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
        $sqlQuery = "SELECT * FROM support_messages WHERE (sender_user_id = :sender_user_id AND reciever_user_id = :to_user_id) OR (sender_user_id = :to_user_id AND reciever_user_id = :sender_user_id)";
        $params = array(
            ':sender_user_id' => $_SESSION['USER_DATA']['user_id'],
            ':to_user_id' => $to_user_id
        );
        $userChat = $this->getDataWithParams($sqlQuery, $params);
        $conversation = '<ul>';
        foreach ($userChat as $chat) {
            if ($chat["sender_user_id"] == $_SESSION['USER_DATA']['user_id']) {
                $conversation .= '<li class="sent">';
            } else {
                $conversation .= '<li class="replies">';
            }
            $conversation .= '<p id="lastIqubeSupportId" data-lastIqubeSupportId="' . $chat['iqube_support_id'] . '">' . $chat["message"] . '</p>';
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
        if (isset($_POST['action']) && $_POST['action'] == 'subject_admin_show_chat') {
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
        $insert_stmt->execute(array($lastIqubeSupportId, $_SESSION['USER_DATA']['user_id'], $to_user_id, $chat_message));
        // Get the updated conversation
        $this->subjectAdminUpdateUserChat($to_user_id);
        return true;
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
