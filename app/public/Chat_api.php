<?php
session_start();
include("../app/config/config.php");
include ("../app/Chat/Chat.php");
$chat = new Chat();
if($_POST['action'] == 'insert_support_messages') {
	$chat->insertSupportMessages($_SESSION['USER_DATA']['chat_agent'], $_SESSION['USER_DATA']['user_id'], $_POST['chat_message']);
}
if($_POST['action'] == 'update_support_messages') {
	$conversation = $chat->getSupportChat();
	$data = array(
		"conversation" => $conversation			
	);
	echo json_encode($data);
}
if($_POST['action'] == 'start_support') {
	$chat->startSupport($_SESSION['USER_DATA']['user_id'], $_POST['support_request']);
}
if($_POST['action'] == 'subject_admin_update_user_chat') {
	$chat->subjectAdminUpdateUserChat( $_POST['to_user_id']);
}
if($_POST['action'] == 'subject_admin_insert_chat') {
	$chat->subjectAdminInsertChat($_POST['to_user_id'], $_POST['chat_message'], $_POST['lastIqubeSupportId']);
}
if($_POST['action'] == 'subject_admin_show_chat') {
	$chat->subjectAdminshowUserChat($_POST['to_user_id']);
}
?>