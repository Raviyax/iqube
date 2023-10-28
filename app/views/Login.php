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
        <div class="login_menu">
            <div class="top">
                 <div class="img_container"></div>   
            </div>
            <div class = "googleloginn">
                
            </div>
           
            <h5>Login</h5>
            <p>New to IQube? <br><a href="#">Creat Your Account</a> </p>
            <div class="inputs">
                <input type="text" placeholder="Username">
                <br>
                <input type="password" placeholder="password">
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
                <button>Login</button>
        
        </div>

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
    
    <?php $this->view('inc/footer') ?>