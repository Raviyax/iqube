<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if(Auth::is_logged_in()){$role = $_SESSION['USER_DATA']['role'];} else $role ="";?>
    <?php if($_SESSION['USER_DATA']['role'] == 'subject_admin'){$role = "Subject Admin";}?>
    <title><?php echo (SITENAME." ".$role." ". ucwords($data['view']));?></title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="<?php echo URLROOT;?>/assets/css/styles.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">

</head>

<body >

 <!-- subject admin header  -->
    <?php if(Auth::is_logged_in() && Auth::is_subject_admin()){?>
<header class="header">

    <section class="flex">
        <div class="icons">
    
            <div id="menu-btn" class="fas fa-bars"></div>
            
            
        </div>



        <form action="search_page.php" method="post" class="search-form">
            <input type="text" name="search" placeholder="search here..." required maxlength="100">
            <button type="submit" class="fas fa-search" name="search_btn"></button>
        </form>
        

        <div class="icons">
        <a href="dashboard.php" class="logo"><?php echo  ucfirst($role);?></a>
            <div id="search-btn" class="fas fa-search"></div>
            <div id="user-btn" class="fas fa-user"></div>
            <div id="toggle-btn" class="fas fa-sun"></div>
            <div id="notification-btn" class="fa-regular fa-bell"></div>
            <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
        </div>

        <div class="profile">

            <img src="../uploaded_files/" alt="">
            <h3><?php echo  $_SESSION['USER_DATA']['email'];?></h3>
            <span><?php echo  ucfirst($_SESSION['USER_DATA']['subject']);?></span>
            <a href="<?php echo URLROOT?>/subjectadmin/profile" class="btn">View Profile</a>
          
            <a href="<?php echo URLROOT;?>/Logout" class="delete-btn">logout</a>






        </div>

    </section>

</header>

<!-- header section ends -->

<!-- side bar section starts  -->

<div class="side-bar">

    <div class="close-side-bar">
        <i class="fas fa-times"></i>
    </div>

    <div class="profile">

        <img src="../uploaded_files/" alt="">
        <h3></h3>
        <span></span>
        <a href="profile.php" class="btn"><?php echo  ucfirst($_SESSION['USER_DATA']['fname'])." ".ucfirst($_SESSION['USER_DATA']['lname']);?></a>



    </div>

    <nav class="navbar">
        <a href="<?php echo URLROOT;?>/subjectadmin/"><i class="fa-solid fa-gauge"></i><span>Dashboard</span></a>
        <a href="<?php echo URLROOT;?>/admin/users"><i class="fa-solid fa-users"></i><span>Users</span></a>
        <a href="contents.php"><i class="fa-solid fa-book"></i><span>Study Materials</span></a>
        <a href="comments.php"><i class="fa-solid fa-gear"></i><span>Site Settings</span></a>
        <a href="<?php echo URLROOT;?>/Logout"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a>
    </nav>

</div>
<?php } ?>


 <!-- admin header  -->
    <?php if(Auth::is_logged_in() && Auth::is_admin()){?>

<header class="header">

    <section class="flex">
        <div class="icons">
    
            <div id="menu-btn" class="fas fa-bars"></div>
            
            
        </div>



        <form action="search_page.php" method="post" class="search-form">
            <input type="text" name="search" placeholder="search here..." required maxlength="100">
            <button type="submit" class="fas fa-search" name="search_btn"></button>
        </form>
        

        <div class="icons">
        <a href="dashboard.php" class="logo"><?php echo  ucfirst($role);?></a>
            <div id="search-btn" class="fas fa-search"></div>
            <div id="user-btn" class="fas fa-user"></div>
            <div id="toggle-btn" class="fas fa-sun"></div>
            <div id="notification-btn" class="fa-regular fa-bell"></div>
            <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
        </div>

        <div class="profile">

            <img src="../uploaded_files/" alt="">
            <h3>ggg</h3>
            <span>gg7</span>
            <a href="profile.php" class="btn"><?php echo  $_SESSION['USER_DATA']['username'];?></a>
            <div class="flex-btn">
                <a href="login.php" class="option-btn">login</a>
                <a href="register.php" class="option-btn">register</a>
            </div>
            <a href="<?php echo URLROOT;?>/Logout" class="delete-btn">logout</a>






        </div>

    </section>

</header>

<!-- header section ends -->

<!-- side bar section starts  -->

<div class="side-bar">

    <div class="close-side-bar">
        <i class="fas fa-times"></i>
    </div>

    <div class="profile">

        <img src="../uploaded_files/" alt="">
        <h3></h3>
        <span></span>
        <a href="profile.php" class="btn"><?php echo  $_SESSION['USER_DATA']['username'];?></a>



    </div>

    <nav class="navbar">
        <a href="<?php echo URLROOT;?>/admin/"><i class="fa-solid fa-gauge"></i><span>Dashboard</span></a>
        <a href="<?php echo URLROOT;?>/admin/users"><i class="fa-solid fa-users"></i><span>Users</span></a>
        <a href="contents.php"><i class="fa-solid fa-book"></i><span>Study Materials</span></a>
        <a href="comments.php"><i class="fa-solid fa-gear"></i><span>Site Settings</span></a>
        <a href="<?php echo URLROOT;?>/Logout"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a>
    </nav>

</div><header class="header">

<section class="flex">
    <div class="icons">

        <div id="menu-btn" class="fas fa-bars"></div>
        
        
    </div>



    <form action="search_page.php" method="post" class="search-form">
        <input type="text" name="search" placeholder="search here..." required maxlength="100">
        <button type="submit" class="fas fa-search" name="search_btn"></button>
    </form>
    

    <div class="icons">
    <a href="dashboard.php" class="logo"><?php echo  ucfirst($role);?></a>
        <div id="search-btn" class="fas fa-search"></div>
        <div id="user-btn" class="fas fa-user"></div>
        <div id="toggle-btn" class="fas fa-sun"></div>
        <div id="notification-btn" class="fa-regular fa-bell"></div>
        <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    </div>

    <div class="profile">

        <img src="../uploaded_files/" alt="">
        <h3>ggg</h3>
        <span>gg7</span>
        <a href="profile.php" class="btn"><?php echo  $_SESSION['USER_DATA']['username'];?></a>
        <div class="flex-btn">
            <a href="login.php" class="option-btn">login</a>
            <a href="register.php" class="option-btn">register</a>
        </div>
        <a href="<?php echo URLROOT;?>/Logout" class="delete-btn">logout</a>






    </div>

</section>

</header>

<!-- header section ends -->

<!-- side bar section starts  -->

<div class="side-bar">

<div class="close-side-bar">
    <i class="fas fa-times"></i>
</div>

<div class="profile">

    <img src="../uploaded_files/" alt="">
    <h3></h3>
    <span></span>
    <a href="profile.php" class="btn"><?php echo  $_SESSION['USER_DATA']['username'];?></a>



</div>

<nav class="navbar">
    <a href="<?php echo URLROOT;?>/admin/"><i class="fa-solid fa-gauge"></i><span>Dashboard</span></a>
    <a href="<?php echo URLROOT;?>/admin/users"><i class="fa-solid fa-users"></i><span>Users</span></a>
    <a href="contents.php"><i class="fa-solid fa-book"></i><span>Study Materials</span></a>
    <a href="comments.php"><i class="fa-solid fa-gear"></i><span>Site Settings</span></a>
    <a href="<?php echo URLROOT;?>/Logout"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a>
</nav>

</div>
<?php } ?>

 

<!-- side bar section ends -->