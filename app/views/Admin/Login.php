<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>IQube Admin Login</title>
    

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

   <form action="<?php echo URLROOT;?>/admin/login" method="post" enctype="multipart/form-data" class="login">
      <h3>Welcome Back IQube Admin!</h3>
      <p>Email<span>*</span></p>
      <?php if(isset($data['errors']['email_err'])){echo '<p style="color: red;">'.$data['errors']['email_err'].'</p>';}?>
      <p style="color: red;"><?php ?></p>
      <input type="email" name="email" placeholder="Enter your email" maxlength="50" required class="box">
      <p>Password<span>*</span></p>
      <?php if(isset($data['errors']['password_err'])){echo '<p style="color: red;">'.$data['errors']['password_err'].'</p>';}?>
      <input type="password" name="password" placeholder="Enter your password" maxlength="50" required class="box">
      <?php if(isset($data['errors']['mismatch_err'])){echo '<p class="link"><a style="color: red;">'.$data['errors']['mismatch_err'].'</a></p>';}?>

      <p class="link"><a href="">Lost your password?</a></p>
      <a href="<?php echo URLROOT;?>"><p class="link" ><i class="fa-solid fa-arrow-left-long"></i> Go to IQube</p></a>
      <input type="submit" name="submit" value="login now" class="btn">
   </form>

</section>


















   
</body>
</html>


</body>
</html>