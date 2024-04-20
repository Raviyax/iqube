<?php $this->view('inc/Header') ?>
<?php
include(APPROOT . "/Chat/Chat.php");
$chat = new Chat();
$chatUsers = $chat->subjectadmin_get_chat_users();

?>

<body class="">
    <div class="container" style="min-height:500px;">
        <div class="container">
            <?php if (isset($_SESSION['USER_DATA']['user_id']) && $_SESSION['USER_DATA']['user_id']) { ?>
                <div class="chat" style="min-height: auto; background-color:unset;">
                    <div class="frame" style="width: 100%; max-width:none;">
                        <div id="sidepanel">

                            <div id="search">
                                <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
                                <input type="text" placeholder="Search contacts..." />
                            </div>
                            <div id="contacts" style="height: 100%;">
                                <?php
                                echo '<ul>';

                               
                                foreach ($chatUsers as $userArray) {
                                    foreach ($userArray as $user) {
                                        echo '<li id="' . $user['user_id'] . '" class="contact" data-touserid="' . $user['user_id'] . '" data-tousername="' . $user['username'] . '">';
                                        echo '<div class="wrap">';
                                        echo '<span id="status_' . $user['user_id'] . '" class="contact-status"></span>';
                                        echo '<img src="' . URLROOT . '/subjectadmin/userimage/' . $user['image'] . '" alt="" />';
                                        echo '<div class="meta">';
                                        echo '<p class="name">' . $user['username'] . '</p>';
                                        echo '<p class="preview"><span id="isTyping_' . $user['user_id'] . '" class="isTyping"></span></p>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</li>';
                                    }
                                }
                                
                                echo '</ul>';
                                ?>
                            </div>

                        </div>
                        <div class="content" id="content">
                            <div class="contact-profile" id="userSection">

                            </div>
                            <div class="messages" id="conversation">
                              

                            </div>
                            <div class="message-input" id="replySection">
                                <div class="message-input" id="replyContainer">
                                    <div class="wrap">
                                        <input type="text" class="chatMessage" id="chatMessage" placeholder="Write your message..." />
                                        <button class="submit chatButton" id="chatButton"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }  ?>

</body>

</html>

<script src="<?php echo URLROOT; ?>/assets/js/main.js"></script>
</body>
<script>
    const URLROOT = "<?php echo URLROOT; ?>";
    const chat_root = URLROOT + '/chat_api.php';

    $(document).ready(function() {
        setInterval(function() {
            updateUserChat(); 
        }, 2000);

        $(".messages").animate({
            scrollTop: $(document).height()
        }, "fast");
        $(document).on("click", '#profile-img', function(event) {
            $("#status-options").toggleClass("active"); 
        });
        $(document).on("click", '.expand-button', function(event) {
            $("#profile").toggleClass("expanded"); 
            $("#contacts").toggleClass("expanded"); 
        });
        // 
        $(document).on("click", '#status-options ul li', function(event) {
    
            $("#profile-img").removeClass();
            $("#status-online").removeClass("active");
            $("#status-away").removeClass("active");
            $("#status-busy").removeClass("active");
            $("#status-offline").removeClass("active");

            $(this).addClass("active");
            if ($("#status-online").hasClass("active")) {
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

        $(document).on('click', '.contact', function() {
            $('.contact').removeClass('active'); 
            $(this).addClass('active'); 
            var to_user_id = $(this).attr('data-touserid');
            showUserChat(to_user_id);
            $(".chatMessage").attr('id', 'chatMessage' + to_user_id);
            $(".chatButton").attr('id', 'chatButton' + to_user_id);
        });

  
        $(document).on("click", '.submit', function(event) {
            // Get the user ID from the button ID
            var to_user_id = $(this).attr('id').replace(/chatButton/g, "");
            // Send message to the specified user
            sendMessage(to_user_id);
        });
        // Event handler for focusing on the message input field
        $(document).on('focus', '.message-input', function() {
            var is_type = 'yes';
            // Send typing status to the server
            $.ajax({
                url: chat_root,
                method: "POST",
                data: {
                    is_type: is_type,
                    action: 'update_typing_status'
                },
                success: function() {
                    // Do nothing on success
                }
            });
        });
        // Event handler for blurring from the message input field
        $(document).on('blur', '.message-input', function() {
            var is_type = 'no';
            // Send typing status to the server
            $.ajax({
                url: chat_root,
                method: "POST",
                data: {
                    is_type: is_type,
                    action: 'update_typing_status'
                },
                success: function() {
                    // Do nothing on success
                }
            });
        });
    });


    // Function to send a message to a specified user
    function sendMessage(to_user_id) {
        var message = $(".message-input input").val();
        var lastIqubeSupportId = $('#lastIqubeSupportId').attr('data-lastIqubeSupportId');
        console.log(lastIqubeSupportId);


        $('.message-input input').val('');
        if ($.trim(message) == '') {
            return false;
        }
        $.ajax({
            url: chat_root,
            method: "POST",
            data: {
                to_user_id: to_user_id,
                lastIqubeSupportId: lastIqubeSupportId,
                chat_message: message,
                action: 'subject_admin_insert_chat'
            },
            dataType: "json",

        });
    }
    // Function to display the chat for a specific user
    function showUserChat(to_user_id) {
        $.ajax({
            url: chat_root,
            method: "POST",
            data: {
                to_user_id: to_user_id,
                action: 'subject_admin_show_chat'
            },
            dataType: "json",
            success: function(response) {
                
                $('#userSection').html(response.userSection);
                $('#conversation').html(response.conversation);
                $(".messages").animate({
                    scrollTop: $('.messages').height()
                }, "fast");
            }
        });
    }
    // Function to update the chat for active contacts
    function updateUserChat() {
        $('li.contact.active').each(function() {
            var to_user_id = $(this).attr('data-touserid');
            $.ajax({
                url: chat_root,
                method: "POST",
                data: {
                    to_user_id: to_user_id,
                    action: 'subject_admin_update_user_chat'
                },
                dataType: "json", 
                success: function(response) {
                    $('#conversation').html(response.conversation);
                    $(".messages").animate({
                        scrollTop: $('.messages').height()
                    }, "fast");
                }
            });
        });
    }
</script>

</html>