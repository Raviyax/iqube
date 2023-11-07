<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME. " ".$data['title']; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<link rel="stylesheet" href="<?php echo URLROOT;?>/assets/css/Signup.css">
<body>
    <div class="box-form" id="login">
        <form class="login_menu" action="<?php echo URLROOT;?>/Signup" method = "post">
           
           
            <h5>Let Us Guide You</h5>
            
            <div class="inputs">
                <input type="text"  name="name" placeholder = <?php print (empty($data['errors']['name_err']))?"Username":$data['errors']['name_err'];?> value="<?=set_value('name')?>">
                
                
                <br>
                <input type="email" name="email" placeholder = "<?php print (empty($data['errors']['email_err']))?"Email":$data['errors']['email_err'];?>" value="<?=set_value('email')?>" >
                <br>
                <input type="password"  name="password" placeholder = "<?php print (empty($data['errors']['password_err']))?"Password":$data['errors']['password_err'];?>" value="<?=set_value('password')?>">
                <br>
                <input type="password" name="confirm_password" placeholder = "<?php print (empty($data['errors']['confirm_password_err']))?"Confirm Password":$data['errors']['confirm_password_err'];?>" value="<?=set_value('confirm_password')?>">
                
            </div>
                
                <br><br>
                
            <div class="remember-me--forget-password">
                    
        <label>
            <input <?=set_value('terms')?'checked':''?> type="checkbox" name="terms" value="1" checked ="checked"/>
            <span class="text-checkbox"><?php print (empty($data['errors']['terms_err']))?"Agree to terms and conditions":$data['errors']['terms_err'];?></span>
        </label>
        <p>Already have an account? <br><a href="<?php echo URLROOT;?>/Login">Login</a> </p>
            </div>
                
                <br>
                <button>Signup</button>
        
        </form>

        <div class="img_container">
            <div class="overlay">
                <div class="container">
                    <div class="row">
                      <div class="col-md-12 text-center">
                        <h3 class="animate-charcter"> Welcome</h3>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
        
    </div>
    
    <?php $this->view('Inc/Footer') ?>