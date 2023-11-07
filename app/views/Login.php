<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME. " ".$data['title']; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<link rel="stylesheet" href="<?php echo URLROOT;?>/assets/css/Login.css">
<body>
    <div class="box-form" id="login">
        <form class="login_menu" action="<?php echo URLROOT;?>/Login" method = "post">
            <div class="top">
                 <div class="img_container"></div>   
            </div>
            <div class = "googleloginn">
                
            </div>
           
            <h5>Login</h5>
            <p>New to IQube? <br><a href="<?php echo URLROOT;?>/Signup">Create Your Account</a> </p>
            <div class="inputs">
            <input type="email" name="email" placeholder = "<?php print (empty($data['errors']['email_err']))?"Email":$data['errors']['email_err'];?>" >
                <br>
                <input type="password"  name="password" placeholder = "Password">
            </div>
                
                <br><br>
                
            <div class="remember-me--forget-password">
                    <!-- Angular -->
        <label>
            <input type="checkbox" name="item" checked/>
            <span class="text-checkbox">Remember me</span>
        </label>
                <p>forget password?</p>
            </div>
                
                <br>
                <button >Login</button>
        
        </form>

        <div class="img_container">
            <div class="overlay">
                <div class="container">
                    <div class="row">
                      <div class="col-md-12 text-center">
                        <h3 class="animate-charcter"> Welcome<br> Back</h3>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
        
    </div>
    
    <?php $this->view('Inc/Footer') ?>