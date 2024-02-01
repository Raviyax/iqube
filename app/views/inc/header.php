<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if (Auth::is_logged_in()) {
        $role = $_SESSION['USER_DATA']['role'];
        if ($_SESSION['USER_DATA']['role'] == 'subject_admin') {
            $role = "Subject Admin";
        }
    } else $role = ""; ?>
    <?php if (Auth::is_logged_in()) {
    ?>
        <title><?php echo (SITENAME . " " . $role . " " . ucwords($data['view'])); ?></title>
    <?php } else { ?>
        <title><?php echo (SITENAME . " " . ucwords($data['view'])); ?></title>
    <?php } ?>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/styles.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
</head>

<body>
    <!-- subject admin header  -->
    <?php if (Auth::is_logged_in() && Auth::is_subject_admin()) { ?>
        <header class="header" style="z-index: 1500;">
            <section class="flex">
                <div class="icons">
                    <div id="menu-btn" class="fas fa-bars"></div>
                </div>
                <form action="search_page.php" method="post" class="search-form">
                    <input type="text" name="search" placeholder="search here..." required maxlength="100">
                    <button type="submit" class="fas fa-search" name="search_btn"></button>
                </form>
                <div class="icons">
                    <a href="dashboard.php" class="logo"><?php echo  ucfirst($role); ?></a>
                    <div id="search-btn" class="fas fa-search"></div>
                    <div id="user-btn" class="fas fa-user"></div>
                    <div id="toggle-btn" class="fas fa-sun"></div>
                    <div id="notification-btn" class="fa-regular fa-bell"></div>
                    <div id="tutor-request-btn" class="fa-solid fa-user-plus"></div>
                    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
                </div>
                <div class="profile">
                    <img src="<?php echo URLROOT . "/Subjectadmin/userimage/" . $_SESSION['USER_DATA']['image']; ?>" alt="">
                    <h3><?php echo  $_SESSION['USER_DATA']['email']; ?></h3>
                    <span><?php echo  ucfirst($_SESSION['USER_DATA']['subject']); ?></span>
                    <a href="<?php echo URLROOT ?>/subjectadmin/profile" class="btn">View Profile</a>
                    <a href="<?php echo URLROOT; ?>/Logout" class="delete-btn">logout</a>
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
                <img src="<?php echo URLROOT . "/Subjectadmin/userimage/" . $_SESSION['USER_DATA']['image']; ?>" alt="">
                <h3></h3>
                <span></span>
                <a href="<?php echo URLROOT ?>/subjectadmin/profile" class="btn"><?php echo  ucfirst($_SESSION['USER_DATA']['fname']) . " " . ucfirst($_SESSION['USER_DATA']['lname']); ?></a>
            </div>
            <nav class="navbar">
                <a href="<?php echo URLROOT; ?>/subjectadmin/"><i class="fa-solid fa-gauge"></i><span>Dashboard</span></a>
                <a href="<?php echo URLROOT; ?>/Subjectadmin/tutors"><i class="fa-solid fa-person-chalkboard"></i><span><?php echo ucfirst($_SESSION['USER_DATA']['subject']); ?> Tutors</span>

                    <div class="dropdown-content">
                        <p>
                            <i class="fa-solid fa-user-plus"></i>Tutor Requests
                        </p>

                    </div>
                </a>
                <a href="<?php echo URLROOT; ?>/Subjectadmin/students"><i class="fa-solid fa-user-pen"></i><span>Students</span></a>
                <a href="contents.php"><i class="fa-solid fa-book"></i><span>Study Materials</span></a>
                <a href="comments.php"><i class="fa-solid fa-person-circle-question"></i><span>Complaints</span></a>
                <a href="<?php echo URLROOT; ?>/Logout"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a>
            </nav>
        </div>
    <?php } ?>
    <!-- admin header  -->
    <?php if (Auth::is_logged_in() && Auth::is_admin()) { ?>
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
                    <a href="dashboard.php" class="logo"><?php echo  ucfirst($role); ?></a>
                    <div id="search-btn" class="fas fa-search"></div>
                    <div id="user-btn" class="fas fa-user"></div>
                    <div id="toggle-btn" class="fas fa-sun"></div>
                    <div id="notification-btn" class="fa-regular fa-bell"></div>
                    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
                </div>
                <div class="profile">
                    <img src="<?php echo URLROOT ?>/assets/img/landing/user.jpg" alt="">
                    <h3><?php echo ucfirst($_SESSION['USER_DATA']['username']); ?></h3>
                    <span><?php echo ucfirst($_SESSION['USER_DATA']['email']); ?></span>
                    <a href="<?php echo URLROOT ?>/Admin/profile" class="btn">View Profile</a>
                    <a href="<?php echo URLROOT; ?>/Logout" class="delete-btn">logout</a>
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
                <img src="<?php echo URLROOT ?>/assets/img/landing/user.jpg" alt="">
                <h3></h3>
                <span></span>
                <a href="profile.php" class="btn"><?php echo  $_SESSION['USER_DATA']['username']; ?></a>
            </div>
            <nav class="navbar">
                <a href="<?php echo URLROOT; ?>/admin/"><i class="fa-solid fa-gauge"></i><span>Dashboard</span></a>
                <a href="<?php echo URLROOT; ?>/admin/users"><i class="fa-solid fa-users"></i><span>Users</span></a>
                <a href="contents.php"><i class="fa-solid fa-book"></i><span>Study Materials</span></a>
                <a href="comments.php"><i class="fa-solid fa-gear"></i><span>Site Settings</span></a>
                <a href="<?php echo URLROOT; ?>/Logout"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a>
            </nav>
        </div><?php } ?>
    <!-- landing header  -->
    <?php if (!Auth::is_logged_in()) { ?>
        <header class="header" style="z-index: 1500;">
            <section class="flex">
                <div class="icons">
                    <div id="menu-btn" class="fas fa-bars"></div>
                </div>
                <div class="icons">
                    <a href="dashboard.php" class="logo">Welcome to IQube!</a>
                    <div id="user-btn" class="fas fa-user"></div>
                    <div id="toggle-btn" class="fas fa-sun"></div>
                </div>
                <div class="profile">
                    <img src="<?php echo URLROOT ?>/assets/img/landing/user.jpg" alt="">
                    <h3>Hello User</h3>
                    <a href="<?php echo URLROOT; ?>/Login" class="delete-btn">Login</a>
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
                <img src="<?php echo URLROOT ?>/assets/img/landing/user.jpg" alt="">
                <h3></h3>
                <span></span>
                <a href="<?php echo URLROOT; ?>/Login" class="btn">Login</a>
            </div>
            <nav class="navbar">
                <a href="#/"><i class="fa-solid fa-cube"></i><span>About Us</span></a>
                <a href="#/"><i class="fa-solid fa-book"></i><span>Study Materials</span></a>
                <a href="<?php echo URLROOT; ?>/Login"><i class="fa-solid fa-right-to-bracket"></i><span>Login</span></a>
            </nav>
        </div>
    <?php } ?>
    <!-- tutor header  -->
    <?php if (Auth::is_logged_in() && Auth::is_tutor()) { ?>
        <header class="header" style="z-index: 1500;">
            <section class="flex">
                <div class="icons">
                    <div id="menu-btn" class="fas fa-bars"></div>
                </div>
                <form action="search_page.php" method="post" class="search-form">
                    <input type="text" name="search" placeholder="search here..." required maxlength="100">
                    <button type="submit" class="fas fa-search" name="search_btn"></button>
                </form>
                <div class="icons">
                    <a href="dashboard.php" class="logo"><?php echo  ucfirst($role); ?></a>
                    <div id="search-btn" class="fas fa-search"></div>
                    <div id="user-btn" class="fas fa-user"></div>
                    <div id="toggle-btn" class="fas fa-sun"></div>
                    <div id="notification-btn" class="fa-regular fa-bell"></div>
                    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
                </div>
                <div class="profile">
                    <img src="<?php echo URLROOT . "/tutor/userimage/". $_SESSION['USER_DATA']['image'];?>" alt="">
                    <h3><?php echo  $_SESSION['USER_DATA']['email']; ?></h3>
                    <span><?php echo  ucfirst($_SESSION['USER_DATA']['subject']); ?> Tutor</span>
                    <a href="<?php echo URLROOT ?>/Tutor/profile" class="btn">View Profile</a>
                    <a href="<?php echo URLROOT; ?>/Logout" class="delete-btn">logout</a>
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
                <img src="<?php echo URLROOT . "/tutor/userimage/". $_SESSION['USER_DATA']['image'];?>" alt="">
                <h3></h3>
                <span></span>
                <a href="profile.php" class="btn"><?php echo  ucfirst($_SESSION['USER_DATA']['fname']) . " " . ucfirst($_SESSION['USER_DATA']['lname']); ?></a>
            </div>
            <nav class="navbar">
                <a href="<?php echo URLROOT; ?>/Tutor/"><i class="fa-solid fa-gauge"></i><span>Dashboard</span></a>
                <a href="<?php echo URLROOT; ?>/Tutor/students"><i class="fa-solid fa-user-pen"></i><span>My Students</span></a>
                <a href="<?php echo URLROOT; ?>/Tutor/contents"><i class="fa-solid fa-book"></i><span>My Contents</span></a>
                <a href="<?php echo URLROOT; ?>/Logout"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a>
            </nav>
        </div>
    <?php } ?>
    <!-- free student header  -->
    <?php if (Auth::is_logged_in() && Auth::is_student() && !Auth::is_premium()) { ?>
        <header class="header" style="z-index: 1500;">
            <section class="flex">
                <div class="icons">
                    <div id="menu-btn" class="fas fa-bars"></div>
                </div>
                <form action="search_page.php" method="post" class="search-form">
                    <input type="text" name="search" placeholder="search here..." required maxlength="100">
                    <button type="submit" class="fas fa-search" name="search_btn"></button>
                </form>
                <div class="icons">
                    <div id="cart" class="fa-solid fa-cart-shopping" style="opacity: 0.3;"></div>
                    <div id="fav" class="fa-regular fa-heart" style="opacity: 0.3;"></div>
                    <div id="search-btn" class="fas fa-search"></div>
                    <div id="user-btn" class="fas fa-user"></div>
                    <div id="toggle-btn" class="fas fa-sun"></div>
                    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
                </div>
                <div class="profile">
                    <img src="<?php echo "data:image/jpg;base64," . $_SESSION['USER_DATA']['image']; ?>" alt="">
                    <h3><?php echo  $_SESSION['USER_DATA']['email']; ?></h3>
                    <a href="<?php echo URLROOT ?>/Student/profile" class="btn">View Profile</a>
                    <a href="<?php echo URLROOT ?>/Student/purchase_premium" class="btn"><i class="fa-solid fa-crown"></i> Upgrade to Premium</a>
                    <a href="<?php echo URLROOT; ?>/Logout" class="delete-btn">logout</a>
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
                <img src="<?php echo URLROOT ?>/assets/img/Landing/iqube.png" alt="">
                <!-- <h3></h3>
        <span></span> -->
                <a href="#" class="btn">About Us</a>
            </div>
            <nav class="navbar">
                <a href="<?php echo URLROOT; ?>/Tutor/"><i class="fa-solid fa-school"></i><span>My Learning</span></a>
                <a href="<?php echo URLROOT; ?>/Tutor/students"><i class="fa-solid fa-person-chalkboard"></i><span>Tutors</span></a>
                <a href="<?php echo URLROOT; ?>/Student/study_materials"><i class="fa-solid fa-book-open"></i><span>Study Materials</span></a>
                <a href="<?php echo URLROOT; ?>/Tutor/contents" style="opacity: 0.5;"><i class="fa-solid fa-bars-progress"></i><span>My Progress<sup> (Pro)</sup></span></a>
                <a href="<?php echo URLROOT; ?>/Tutor/contents" style="opacity: 0.5;"><i class="fa-solid fa-calendar"></i><span>My Study Plan<sup> (Pro)</sup></span></a>
                <a href="<?php echo URLROOT; ?>/Logout"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a>
            </nav>
            <a href="<?php echo URLROOT ?>/Student/purchase_premium" class="btn"><i class="fa-solid fa-crown"></i> Upgrade to Premium</a>
        </div>
    <?php } ?>
    <!-- premium student header  -->
    <?php if (Auth::is_logged_in() && Auth::is_student() && Auth::is_premium()) { ?>
        <header class="header" style="z-index: 1500;">
            <section class="flex">
                <div class="icons">
                    <div id="menu-btn" class="fas fa-bars"></div>
                </div>
                <form action="search_page.php" method="post" class="search-form">
                    <input type="text" name="search" placeholder="search here..." required maxlength="100">
                    <button type="submit" class="fas fa-search" name="search_btn"></button>
                </form>
                <div class="icons">
                    <div id="cart" class="fa-solid fa-cart-shopping"></div>
                    <div id="fav" class="fa-regular fa-heart"></div>
                    <div id="search-btn" class="fas fa-search"></div>
                    <div id="user-btn" class="fas fa-user"></div>
                    <div id="toggle-btn" class="fas fa-sun"></div>
                    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
                </div>
                <div class="profile">
                    <img src="<?php echo "data:image/jpg;base64," . $_SESSION['USER_DATA']['image']; ?>" alt="">
                    <h3><?php echo  $_SESSION['USER_DATA']['email']; ?></h3>
                    <span>Premium Student</span>
                    <a href="<?php echo URLROOT ?>/Tutor/profile" class="btn">View Profile</a>
                    <a href="<?php echo URLROOT; ?>/Logout" class="delete-btn">logout</a>
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
                <img src="<?php echo "data:image/jpg;base64," . $_SESSION['USER_DATA']['image']; ?>" alt="">
                <h3></h3>
                <span></span>
                <a href="profile.php" class="btn"><i class="fa-solid fa-crown"></i> <?php echo  ucfirst($_SESSION['USER_DATA']['fname']) . " " . ucfirst($_SESSION['USER_DATA']['lname']); ?></a>
            </div>
            <nav class="navbar">
                <a href="<?php echo URLROOT; ?>/Tutor/"><i class="fa-solid fa-school"></i><span>My Learning</span></a>
                <a href="<?php echo URLROOT; ?>/Tutor/students"><i class="fa-solid fa-person-chalkboard"></i><span>Tutors</span></a>
                <a href="<?php echo URLROOT; ?>/Tutor/contents"><i class="fa-solid fa-book-open"></i><span>Study Materials</span></a>
                <a href="<?php echo URLROOT; ?>/Tutor/contents"><i class="fa-solid fa-bars-progress"></i><span>My Progress</span></a>
                <a href="<?php echo URLROOT; ?>/Tutor/contents"><i class="fa-solid fa-calendar"></i><span>My Study Plan</span></a>
                <a href="<?php echo URLROOT; ?>/Logout"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a>
            </nav>
        </div>
    <?php } ?>