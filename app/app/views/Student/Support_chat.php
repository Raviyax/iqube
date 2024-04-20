<?php
include(APPROOT . "/Chat/Chat.php");
$chat = new Chat();
$loggedUser = $chat->getUserDetails($_SESSION['USER_DATA']['user_id']);

$currentSession = $_SESSION['USER_DATA']['chat_agent'] ;


?>

<?php if (isset($_SESSION['USER_DATA']['user_id']) && $_SESSION['USER_DATA']['user_id']) { ?>

    <div id="supportContainer" class="frame" style="width: auto; min-width:auto; max-width:none; border: 1px solid black; border-radius:5px;position: fixed; bottom: 60px; right: 15px; height:auto;">

        <div class="content" id="content" style="width: auto;border-radius:5px;">
            <div class="contact-profile" id="userSection">
                <?php
                $userDetails = $chat->getUserDetails($currentSession);
                foreach ($userDetails as $user) {
                    echo '<img src="' . URLROOT . '/Student/userimage/' . $user['image'] . '" alt="" />';
                    echo '<p>' . $user['username'] . '</p>';
                }
                ?>
            </div>
            <div class="messages" id="conversation" style="height: 200px;">
                
               
            </div>
            <div class="message-input" id="replySection" style="position: unset;">
                <div class="message-input" id="replyContainer" style="position: unset;">
                    <div class="wrap">
                        <input style="width: auto; padding: 11px 32px 25px 8px;" type="text" class="chatMessage" id="chatMessage<?php echo $currentSession; ?>" placeholder="Write your message..." />
                        <button class="submit chatButton" id="chatButton<?php echo $currentSession; ?>"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                        <!-- generate drop dow according to available subjects in session -->


                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="startSupportContainer" class="frame" style="width: auto; min-width:auto; max-width:none; border: 1px solid black; border-radius:5px;position: fixed; bottom: 60px; right: 15px; height:auto;">

        <div class="content" style="width: auto;border-radius:5px;">
            <div class="contact-profile" id="userSection">
                <img src="<?php echo URLROOT; ?>/public/assets/img/iqube.png" alt="" />

                <p>Support</p>
            </div>
            <div class="messages" style="height: 200px;">

            </div>
            <div class="message-input"style="position: unset;">
                <div class="message-input"  style="position: unset;">
                    <div class="wrap">
                        <input id="request" style="width: auto; padding: 11px 32px 25px 8px;" type="text" class="chatMessage" placeholder="Enter your request briefly..." />
                        <button class="submit chatButton" id="startChat"><i class="fa-solid fa-headset"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>







<?php }  ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script>
    const URLROOT = "<?php echo URLROOT; ?>";
    const chat_root = URLROOT + '/chat_api.php';

    $(document).ready(function() {

        $(document).on("click", '#startChat', function(event) {
            $('#supportContainer').show();
            $('#startSupportContainer').hide();
            var request = $("#request").val();
            if ($.trim(request) == '') {
                return false;
            }
            $.ajax({
                url: chat_root,
                method: "POST",
                data: {
                    support_request: request,
                    action: 'start_support'
                },
                dataType: "json",
                success: function(response) {

                    var resp = response;
                    console.log('edwgtwe');
                    

                    
                    $('#conversation').html(resp.conversation);
                    $(".messages").animate({
                        scrollTop: $('.messages').height()
                    }, "fast");
                }
            });
       

        setInterval(function() {

            updateUserChat();
        }, 2000);
        $(".messages").animate({
            scrollTop: $(document).height()
        }, "fast");

    });

        $(document).on("click", '.submit', function(event) {
            var to_user_id = $(this).attr('id').replace(/chatButton/g, "");
            sendMessage(to_user_id);
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
                action: 'insert_support_messages'
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
                action: 'update_support_messages'
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
</script>