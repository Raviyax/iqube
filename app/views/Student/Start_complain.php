<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chat</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/Chat.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

</head>
<body>
    <div class="wrapper">
        <section class="chat-area" id="chat">
            <header>
                <button class="close-button" id="closechat">X</button>
                <img src="" alt="">
                <div class="details">
                    <span>IQube Support</span>
                </div>
            </header>
            <div class="chat-box" ></div> <!-- Added ID to the chat-box div -->
            <form action="" class="typing-area" id="send-msg-form">
                <input type="text" style="width: 100%;" name="about_complain" class="input-field" placeholder="Explain the issue briefly..." autocomplete="off">
                 <!-- Corrected the button ID -->
            </form>
            <button type="submit" class="submit-about-chat" id="start">Start Chat</button>
        </section>
    </div>

    <script>
        $(document).ready(function () {
    $("#closechat").click(function () {
        document.getElementById("chat").style.display = "none";
    });
});

$(document).ready(function () {
    $("#start").click(function () {
        var about_complain = $("input[name='about_complain']").val();
        $.ajax({
            url: "<?php echo URLROOT; ?>/Student/iqube_support",
            type: "POST",
            data: {
                about_complain: about_complain
            },
            success: function (data) {
                if (data) {
                    document.getElementById("chat").style.display = "block";
                    $("#chat").html(data);
                   
                } else {
                    alert("Failed to start complain");
                }
            }
        });

      
       
    });
 });



    </script>
</body>
</html>
