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
        <form class="login_menu" action="<?php echo URLROOT;?>/Landing/Login_as_a_tutor" method = "post">
            <div class="top">
                 <div class="img_container"></div>   
            </div>
            <div class = "googleloginn">
                
            </div>
           
            <h5>Tutor Login</h5>
        
            
           
            <div class="inputs">
            <input type="email" name="email" placeholder = "" >
                <br>
                <input type="password"  name="password" placeholder = "Password">
            </div>
                
                <br><br>
                
            <div class="remember-me--forget-password">
                    <!-- Angular -->
        <label>
            <span class="text-checkbox">Remember me</span>
            <input type="checkbox" name="item" checked/>
            
        </label>
                <p>forget password?</p>
                 <a href="<?php echo URLROOT;?>/Signup">Not registered as tutor?</a> 
            </div>
                
                <br>
                <button >Login</button>
        
        </form>

        <div class="img_container_tutor">
            <div class="overlay">
                <div class="container">
                    <div class="row">
                      <div class="col-md-12 text-center">
                        
                      </div>
                    </div>
                  </div>
            </div>
        </div>
        
    </div>
    
    <?php $this->view('inc/footer') ?>