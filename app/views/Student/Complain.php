<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Chat</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <link rel="stylesheet" href="<?php echo URLROOT;?>/assets/css/Chat.css">
</head>
<!-- link Chat.css -->
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
    
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="" alt="">
        <div class="details">
          <span>Madasha Liyanage</span>
          <p>Typing</p>
        </div>
      </header>
      <div class="chat-box">
      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="123" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>
  <script src="javascript/chat.js"></script>
</body>
</html>
</body>
</html>