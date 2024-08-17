<?php $this->view('inc/Header') ?>
<?php
include(APPROOT . "/Chat/Chat.php");
$chat = new Chat();
$loggedUser = $chat->getUserDetails($_SESSION['USER_DATA']['user_id']);
$chat->updateUserOnline($_SESSION['USER_DATA']['user_id'], 1);
$currentSession = '';
foreach ($loggedUser as $user) {
    $currentSession = $user['current_session'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
        <?php if (isset($_SESSION['USER_DATA']['user_id']) && $_SESSION['USER_DATA']['user_id']) { ?>
            <div id="frame">
                <div class="content" id="content" style="width: auto;">
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
<?php }  ?>
</body>
<?php $this->view('inc/Footer') ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    const URLROOT = "<?php echo URLROOT; ?>";
    const chat_root = URLROOT + '/chat_api.php';
    $(document).ready(function() {
        setInterval(function() {
            showTypingStatus();
            updateUserChat();
        }, 2000);
        $(".messages").animate({
            scrollTop: $(document).height()
        }, "fast");
        $(document).on("click", '.submit', function(event) {
            var to_user_id = $(this).attr('id').replace(/chatButton/g, "");
            sendMessage(to_user_id);
        });
        $(document).on('focus', '.message-input', function() {
            var is_type = 'yes';
            $.ajax({
                url: chat_root,
                method: "POST",
                data: {
                    is_type: is_type,
                    action: 'update_typing_status'
                },
                success: function() {}
            });
        });
        $(document).on('blur', '.message-input', function() {
            var is_type = 'no';
            $.ajax({
                url: chat_root,
                method: "POST",
                data: {
                    is_type: is_type,
                    action: 'update_typing_status'
                },
                success: function() {}
            });
        });
    });
    function sendMessage(to_user_id) {
        var message = $(".message-input input").val();
        $('.message-input input').val('');
        if ($.trim(message) == '') {
            return false;
        }
        $.ajax({
            url: chat_root,
            method: "POST",
            data: {
                to_user_id: to_user_id,
                chat_message: message,
                action: 'insert_chat'
            },
            dataType: "json",
            success: function(response) {
                console.log(response);
                var resp = response;
                $('#conversation').html(resp.conversation);
                $(".messages").animate({
                    scrollTop: $('.messages').height()
                }, "fast");
            }
        });
    }
    function updateUserChat() {
        var to_user_id = 6;
        $.ajax({
            url: chat_root,
            method: "POST",
            data: {
                to_user_id: to_user_id,
                action: 'update_user_chat'
            },
            dataType: "json",
            success: function(response) {
                $('#conversation').html(response.conversation);
                $(".messages").animate({
                    scrollTop: $('.messages').height()
                }, "fast");
            }
        });
    }
    function showTypingStatus() {
        $('li.contact.active').each(function() {
            var to_user_id = $(this).attr('data-touserid');
            $.ajax({
                url: chat_root,
                method: "POST",
                data: {
                    to_user_id: to_user_id,
                    action: 'show_typing_status'
                },
                dataType: "json",
                success: function(response) {
                    $('#isTyping_' + to_user_id).html(response.message);
                }
            });
        });
    }
</script>
</html>