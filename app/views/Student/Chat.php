<?php $this->view('inc/Header') ?>
<section class="courses">
	<h1 class="heading">Hello <?php echo $_SESSION['USER_DATA']['username']; ?>!</h1>
	<!DOCTYPE html>
	<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
		<link href="<?php echo URLROOT; ?>/assets/css/Chat.css" rel="stylesheet" id="bootstrap-css">
		
			
		<style>
			.modal-dialog {
				width: 400px;
				margin: 30px auto;
			}
		</style>
	</head>

	<body class="">
		<div class="container" style="min-height:500px;">

			<div class="container">

				<?php if (isset($_SESSION['USER_DATA']['user_id']) && $_SESSION['USER_DATA']['user_id']) { ?>
					<div class="chat">
						<div id="frame">
							<div id="sidepanel">
								<div id="profile">
									<?php
									include(APPROOT . "/Chat/Chat.php");
									$chat = new Chat();
									$loggedUser = $chat->getUserDetails($_SESSION['USER_DATA']['user_id']);
                                  
									$chat->updateUserOnline($_SESSION['USER_DATA']['user_id'], 1);

									echo '<div class="wrap">';
									$currentSession = '';
									foreach ($loggedUser as $user) {
										$currentSession = $user['current_session'];
										echo '<img id="profile-img" src="' . URLROOT . '/Student/userimage/' . $user['image'] . '" class="online" alt="" />';
										echo  '<p>' . $user['username'] . '</p>';
										echo '<i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>';
										echo '<div id="status-options">';
										echo '<ul>';
										echo '<li id="status-online" class="active"><span class="status-circle"></span> <p>Online</p></li>';
										echo '<li id="status-away"><span class="status-circle"></span> <p>Away</p></li>';
										echo '<li id="status-busy"><span class="status-circle"></span> <p>Busy</p></li>';
										echo '<li id="status-offline"><span class="status-circle"></span> <p>Offline</p></li>';
										echo '</ul>';
										echo '</div>';
										echo '<div id="expanded">';
										echo '<a href="logout.php">Logout</a>';
										echo '</div>';
									}
									echo '</div>';
									?>
								</div>
								<div id="search">
									<label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
									<input type="text" placeholder="Search contacts..." />
								</div>
								<div id="contacts">
									<?php
									echo '<ul>';
									$chatUsers = $chat->chatUsers($_SESSION['USER_DATA']['user_id']);
									foreach ($chatUsers as $user) {
										$status = 'offline';
										if ($user['online']) {
											$status = 'online';
										}
										$activeUser = '';
										if ($user['user_id'] == $currentSession) {
											$activeUser = "active";
										}
										echo '<li id="' . $user['user_id'] . '" class="contact ' . $activeUser . '" data-touserid="' . $user['user_id'] . '" data-tousername="' . $user['username'] . '">';
										echo '<div class="wrap">';
										echo '<span id="status_' . $user['user_id'] . '" class="contact-status ' . $status . '"></span>';
										echo '<img src="' . URLROOT . '/Student/userimage/' . $user['image'] . '" alt="" />';
										echo '<div class="meta">';
										echo '<p class="name">' . $user['username'] . '<span id="unread_' . $user['user_id'] . '" class="unread">' . $chat->getUnreadMessageCount($user['user_id'], $_SESSION['USER_DATA']['user_id']) . '</span></p>';
										echo '<p class="preview"><span id="isTyping_' . $user['user_id'] . '" class="isTyping"></span></p>';
										echo '</div>';
										echo '</div>';
										echo '</li>';
									}
									echo '</ul>';
									?>
								</div>
								<div id="bottom-bar">
									<button id="addcontact"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Add contact</span></button>
									<button id="settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Settings</span></button>
								</div>
							</div>
							<div class="content" id="content">
								<div class="contact-profile" id="userSection">
									<?php
									$userDetails = $chat->getUserDetails($currentSession);
									foreach ($userDetails as $user) {
										echo '<img src="' . URLROOT . '/Student/userimage/' . $user['image'] . '" alt="" />';
										echo '<p>' . $user['username'] . '</p>';
										echo '<div class="social-media">';
										echo '<i class="fa fa-facebook" aria-hidden="true"></i>';
										echo '<i class="fa fa-twitter" aria-hidden="true"></i>';
										echo '<i class="fa fa-instagram" aria-hidden="true"></i>';
										echo '</div>';
									}
									?>
								</div>
								<div class="messages" id="conversation">
									<?php
									echo $chat->getUserChat($_SESSION['USER_DATA']['user_id'], $currentSession);
									?>
								</div>
								<div class="message-input" id="replySection">
									<div class="message-input" id="replyContainer">
										<div class="wrap">
											<input type="text" class="chatMessage" id="chatMessage<?php echo $currentSession; ?>" placeholder="Write your message..." />
											<button class="submit chatButton" id="chatButton<?php echo $currentSession; ?>"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php }  ?>
				
				
				<br>
				<br>
				<div style="margin:50px 0px 0px 0px;">
					<a class="btn btn-default read-more" style="background:#3399ff;color:white" href="http://www.phpzag.com/build-live-chat-system-with-ajax-php-mysql/">Back to Tutorial</a>
				</div>
			</div>
			<div class="insert-post-ads1" style="margin-top:20px;">

			</div>
		</div>
	</body>

	</html>
</section>
<?php $this->view('inc/Footer') ?>
</body>
<script>
	const URLROOT = "<?php echo URLROOT; ?>";
	const chat_root = URLROOT + '/chat_api.php';
// Wait for the document to be fully loaded before executing the script
$(document).ready(function(){
    // Set intervals for periodic tasks
    
    // Update user list and unread message count every 60 seconds
    setInterval(function(){
        updateUserList(); // Update the list of online users
        updateUnreadMessageCount(); // Update the count of unread messages
    }, 60000); // 60 seconds
    
    // Show typing status and update user chat every 5 seconds
    setInterval(function(){
        showTypingStatus(); // Show typing status of users
        updateUserChat(); // Update user chat
    }, 5000); // 5 seconds

    // Scroll to the bottom of the messages container
    $(".messages").animate({ 
        scrollTop: $(document).height() 
    }, "fast");
    
    // Event handler for clicking on the profile image
    $(document).on("click", '#profile-img', function(event) { 	
        $("#status-options").toggleClass("active"); // Toggle the status options
    });
    
    // Event handler for clicking on the expand button
    $(document).on("click", '.expand-button', function(event) { 	
        $("#profile").toggleClass("expanded"); // Toggle expansion of profile
        $("#contacts").toggleClass("expanded"); // Toggle expansion of contacts
    });	
    
    // Event handler for clicking on status options
    $(document).on("click", '#status-options ul li', function(event) { 	
        // Remove existing status classes from profile image
        $("#profile-img").removeClass();
        $("#status-online").removeClass("active");
        $("#status-away").removeClass("active");
        $("#status-busy").removeClass("active");
        $("#status-offline").removeClass("active");
        
        // Add active class to clicked status option
        $(this).addClass("active");
        
        // Add corresponding status class to profile image
        if($("#status-online").hasClass("active")) {
            $("#profile-img").addClass("online");
        } else if ($("#status-away").hasClass("active")) {
            $("#profile-img").addClass("away");
        } else if ($("#status-busy").hasClass("active")) {
            $("#profile-img").addClass("busy");
        } else if ($("#status-offline").hasClass("active")) {
            $("#profile-img").addClass("offline");
        } else {
            $("#profile-img").removeClass();
        };
        
        // Hide the status options
        $("#status-options").removeClass("active");
    });	
    
    // Event handler for clicking on a contact
    $(document).on('click', '.contact', function(){		
        $('.contact').removeClass('active'); // Remove active class from all contacts
        $(this).addClass('active'); // Add active class to clicked contact
        
        // Get the user ID of the clicked contact
        var to_user_id = $(this).attr('data-touserid');
        
        // Show the chat for the selected user
        showUserChat(to_user_id);
     
        
        // Set unique IDs for chat message input and send button
        $(".chatMessage").attr('id', 'chatMessage'+to_user_id);
        $(".chatButton").attr('id', 'chatButton'+to_user_id);
    });	
    
    // Event handler for clicking on the submit button
    $(document).on("click", '.submit', function(event) { 
        // Get the user ID from the button ID
        var to_user_id = $(this).attr('id').replace(/chatButton/g, "");
        
        // Send message to the specified user
        sendMessage(to_user_id);
    });
    
    // Event handler for focusing on the message input field
    $(document).on('focus', '.message-input', function(){
        var is_type = 'yes';
        
        // Send typing status to the server
        $.ajax({
            url:chat_root,
            method:"POST",
            data:{is_type:is_type, action:'update_typing_status'},
            success:function(){
                // Do nothing on success
            }
        });
    }); 
    
    // Event handler for blurring from the message input field
    $(document).on('blur', '.message-input', function(){
        var is_type = 'no';
        
        // Send typing status to the server
        $.ajax({
            url:chat_root,
            method:"POST",
            data:{is_type:is_type, action:'update_typing_status'},
            success:function() {
                // Do nothing on success
            }
        });
    }); 		
});
 
// Function to update the list of online users
function updateUserList() {
    // Send an AJAX request to the server to update the user list
    $.ajax({
        url: chat_root, // URL to send the request
        method: "POST", // HTTP method
        dataType: "json", // Expected data type of the response
        data: { // Data to send in the request
            action: 'update_user_list' // Action to perform on the server
        },
        success: function(response){ // Callback function to handle successful response
            // Extract the user profile HTML data from the response
            var obj = response.profileHTML;
            
            // Iterate over each user profile
            Object.keys(obj).forEach(function(key) {
                // Check if the user profile element exists in the UI
                if ($("#"+obj[key].userid).length) {
                    // Update the online/offline status of the user
                    if (obj[key].online == 1 && !$("#status_"+obj[key].userid).hasClass('online')) {
                        // If user is online and not marked as online, add online class
                        $("#status_"+obj[key].userid).addClass('online');
                    } else if (obj[key].online == 0) {
                        // If user is offline, remove online class
                        $("#status_"+obj[key].userid).removeClass('online');
                    }
                }
            });
        }
    });
}

// Function to send a message to a specified user
function sendMessage(to_user_id) {

    
    // Get the message from the input field
    var message = $(".message-input input").val();
   
    // Clear the input field
    $('.message-input input').val('');
    
    // Check if the message is empty or contains only whitespace
    if ($.trim(message) == '') {
        // If message is empty, return false and exit the function
        return false;
    }
    
    // Send an AJAX request to the server to insert the chat message
    $.ajax({
        url: chat_root, // URL to send the request
        method: "POST", // HTTP method
        data: { // Data to send in the request
            to_user_id: to_user_id, // ID of the recipient user
            chat_message: message, // Content of the chat message
            action: 'insert_chat' // Action to perform on the server
        },
        dataType: "json", // Expected data type of the response
        success: function(response) { // Callback function to handle successful response
            console.log(response);
            // Parse the JSON response
            var resp = $.parseJSON(response);
            // Update the conversation area with the updated chat messages
            $('#conversation').html(resp.conversation); // Display the conversation
            // Scroll to the bottom of the messages
            $(".messages").animate({ scrollTop: $('.messages').height() }, "fast");
        }
    }); 
}

// Function to display the chat for a specific user
function showUserChat(to_user_id){
    
    // Send an AJAX request to the server to retrieve the chat data for the specified user
    $.ajax({
        url: chat_root, // URL to send the request
        method: "POST", // HTTP method
        data: { // Data to send in the request
            to_user_id: to_user_id, // ID of the user
            action: 'show_chat' // Action to perform on the server
        },
        dataType: "json", // Expected data type of the response
       
        success: function(response){ // Callback function to handle successful response
    // Log a message indicating successful request

    
    // Update the user section with user-specific information
    $('#userSection').html(response.userSection); // Display user section
    
    // Update the conversation area with the chat messages
    $('#conversation').html(response.conversation); // Display conversation
    
    // Clear the unread message count for the specified user
    $('#unread_'+to_user_id).html(''); // Clear unread message count
}
    });
}

// Function to update the chat for active contacts
function updateUserChat() {
    // Iterate over each active contact
    $('li.contact.active').each(function(){
        // Get the user ID of the active contact
        var to_user_id = $(this).attr('data-touserid');
        
        // Send an AJAX request to the server to update the user chat
        $.ajax({
            url: chat_root, // URL to send the request
            method: "POST", // HTTP method
            data: { // Data to send in the request
                to_user_id: to_user_id, // ID of the user
                action: 'update_user_chat' // Action to perform on the server
            },
            dataType: "json", // Expected data type of the response
            success: function(response){ // Callback function to handle successful response
                // Update the conversation area with the updated chat messages
                $('#conversation').html(response.conversation); // Display the conversation
            }
        });
    });
}

// Function to update the unread message count for each contact
function updateUnreadMessageCount() {
    // Iterate over each contact
    $('li.contact').each(function(){
        // Check if the contact is not active
        if (!$(this).hasClass('active')) {
            // Get the user ID of the contact
            var to_user_id = $(this).attr('data-touserid');
            
            // Send an AJAX request to the server to update the unread message count
            $.ajax({
                url: chat_root, // URL to send the request
                method: "POST", // HTTP method
                data: { // Data to send in the request
                    to_user_id: to_user_id, // ID of the user
                    action: 'update_unread_message' // Action to perform on the server
                },
                dataType: "json", // Expected data type of the response
                success: function(response){ // Callback function to handle successful response
                    // Check if there are unread messages
                    if (response.count) {
                        // Update the UI with the unread message count
                        $('#unread_'+to_user_id).html(response.count); // Display the count
                    }                   
                }
            });
        }
    });
}

// Function to show typing status of active contacts
function showTypingStatus() {
    // Iterate over each active contact
    $('li.contact.active').each(function(){
        // Get the user ID of the contact
        var to_user_id = $(this).attr('data-touserid');
        
        // Send AJAX request to server to check typing status
        $.ajax({
            url: chat_root, // URL to send the request
            method: "POST", // HTTP method
            data: { // Data to send in the request
                to_user_id: to_user_id, // ID of the user
                action: 'show_typing_status' // Action to perform on the server
            },
            dataType: "json", // Expected data type of the response
            success: function(response){ // Callback function to handle successful response
                // Update the UI with the typing status message received from the server
                $('#isTyping_'+to_user_id).html(response.message); // Display typing status
            }
        });
    });
}

</script>

</html>