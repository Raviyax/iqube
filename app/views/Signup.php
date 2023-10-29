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
                <input type="text"  name="name" placeholder = "<?php echo (!empty($data['name_err']))?$data['name_err']:'Username';?>" value="<?php echo $data['name'];?>">
                <br>
                <input type="email" name="email" placeholder = "<?php echo (!empty($data['email_err']))?$data['email_err']:'Email';?>" value="<?php echo $data['email'];?>" >
                <br>
                <input type="password"  name="password" placeholder = "<?php echo (!empty($data['password_err']))?$data['password_err']:'Password';?>" value="<?php echo $data['password'];?>">
                <br>
                <input type="password" name="rpassword" placeholder = "<?php echo (!empty($data['confirm_password_err']))?$data['confirm_password_err']:'Confirm Password';?>" value="<?php echo $data['confirm_password'];?>">
                
            </div>
                
                <br><br>
                
            <div class="remember-me--forget-password">
                    
        <label>
            <input type="checkbox" name="item" checked/>
            <span class="text-checkbox">Agree to terms and conditions</span>
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
    
    <?php $this->view('inc/footer') ?>