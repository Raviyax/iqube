<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IQube Staff Login</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="<?php echo URLROOT;?>/assets/css/styles.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
</head>
<body style="padding-left: 0;">
<!-- register section starts  -->
<section class="form-container">
   <form action="<?php echo URLROOT . "/Tutor/first_time_login?email=".$data['email']."&token=".$data['token'];?>" method="post" enctype="multipart/form-data" class="login">
      <h3>First you should create a password to activate your account</h3>
      <p>Password<span>*</span></p>
      <?php if(isset($data['errors']['password_err'])){echo '<p style="color: red;">'.$data['errors']['password_err'].'</p>';}?>
      <input type="password" name="password" placeholder="Enter your password" maxlength="50" required class="box">
      <p>Confirm Password<span>*</span></p>
      <?php if(isset($data['errors']['password_err'])){echo '<p style="color: red;">'.$data['errors']['password_err'].'</p>';}?>
      <input type="password" name="confirm_password" placeholder="Enter your password" maxlength="50" required class="box">
      <?php if(isset($data['errors']['confirm_password_err'])){echo '<p class="link"><a style="color: red;">'.$data['errors']['confirm_password_err'].'</a></p>';}?>
      <input type="submit" name="create" value="Create Password" class="btn">
   </form>
</section>
</body>
</html>
</body>
</html>
