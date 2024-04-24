<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <link href="<?php echo URLROOT; ?>/assets/css/Chat.css" rel="stylesheet" id="bootstrap-css">
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
                <div class="profile" id="profile">
                    <img src="<?php echo URLROOT . "/Subjectadmin/userimage/" . $_SESSION['USER_DATA']['image']; ?>" alt="">
                    <h3><?php echo  $_SESSION['USER_DATA']['email']; ?></h3>
                    <span><?php echo  ucfirst($_SESSION['USER_DATA']['subject']); ?></span>
                    <a href="<?php echo URLROOT ?>/subjectadmin/profile" class="btn">View Profile</a>
                    <a href="<?php echo URLROOT; ?>/Logout" class="delete-btn">logout</a>
                </div>
                <div class="profile" id="notifications" style="overflow-y: scroll;">
                    <?php
                    if ($data['notifications']) {
                        $notifications = $data['notifications'];
                        if ($notifications['last_tutor_requests']) {
                            echo '<div id="tutorrequests" style="margin-bottom: 10px;">';
                            echo '<h3 class="heading">Tutor Requests</h3>';
                            foreach ($notifications['last_tutor_requests'] as $last_tutor_request) {
                                echo "<div class='notification'>";
                                echo "<h3>" . $last_tutor_request['fname'] . " " . $last_tutor_request['lname'] . "</h3>";
                                echo "<span>" . $last_tutor_request['requested_days_passed'] . " days ago</span>";
                                echo "<div class='flex-btn'>";
                                echo "<a href='' class='option-btn'>Dismiss</a>";
                                echo "<a href='' class='option-btn'>View</a>";
                                echo "</div>";
                                echo "</div>";
                            }
                            echo '<a href="' . URLROOT . '/Subjectadmin/tutor_requests" class="option-btn">View All</a>';
                            echo '</div>';
                        }
                    }
                    ?>
                    <div id="complains">
                        <h3 class="heading">complains</h3>
                        <div class="notification">
                            <h3>Kasun Chamara</h3>
                            <span>5 days ago</span>
                            <div class="flex-btn">
                                <a href="login.php" class="option-btn">login</a>
                                <a href="register.php" class="option-btn">register</a>
                            </div>
                        </div>
                        <div class="notification">
                            <h3>Kasun Chamara</h3>
                            <span>5 days ago</span>
                            <div class="flex-btn">
                                <a href="login.php" class="option-btn">login</a>
                                <a href="register.php" class="option-btn">register</a>
                            </div>
                        </div>
                    </div>
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
                <ul>
                    <li><a href="<?php echo URLROOT; ?>/subjectadmin/"><i class="fa-solid fa-gauge"></i><span>Dashboard</span></a></li>
                    <li><a href="<?php echo URLROOT; ?>/Subjectadmin/tutors"><i class="fa-solid fa-person-chalkboard"></i><span><?php echo ucfirst($_SESSION['USER_DATA']['subject']); ?> Tutors</a></span>
                        <div class="dropdown-content">
                            <ul>
                                <li><a href="<?php echo URLROOT; ?>/Subjectadmin/tutors"><i class="fa-solid fa-person-chalkboard"></i>View Tutors</a></li>
                                <li><a href="<?php echo URLROOT; ?>/Subjectadmin/tutor_requests"><i class="fa-solid fa-user-plus"></i>Tutor Requests</a></li>
                            </ul>
                            <!-- <p>
                                <i class="fa-solid fa-user-plus"></i>Tutor Requests
                            </p> -->
                        </div>
                    </li>
                    <li><a href="<?php echo URLROOT; ?>/Subjectadmin/students"><i class="fa-solid fa-user-pen"></i><span>Students</span></a></li>
                    <li><a href="contents.php"><i class="fa-solid fa-book"></i><span>Study Materials</span></a></li>
                    <li><a href="<?php echo URLROOT; ?>/Subjectadmin/manage_syllabus"><i class="fa-solid fa-book"></i><span><?php echo ucfirst($_SESSION['USER_DATA']['subject']); ?> Syllabus</span></a></li>
                    <li><a href="comments.php"><i class="fa-solid fa-person-circle-question"></i><span>Complaints</span></a></li>
                    <li><a href="<?php echo URLROOT; ?>/Logout"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a></li>
                </ul>
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
                <ul>
                    <li><a href="<?php echo URLROOT; ?>/admin/"><i class="fa-solid fa-gauge"></i><span>Admin Dashbard</span></a></li>
                    <li><a href="<?php echo URLROOT; ?>/admin/users"><i class="fa-solid fa-users"></i><span>Users</span></a></li>
                    <li><a href="contents.php"><i class="fa-solid fa-book"></i><span>Study Materials</span></a></li>
                    <li><a href="comments.php"><i class="fa-solid fa-gear"></i><span>Site Settings</span></a></li>
                    <li><a href="<?php echo URLROOT; ?>/Logout"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a></li>
                </ul>
            </nav>
        </div><?php } ?>
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
                <div class="profile" id="profile">
                    <img src="<?php echo URLROOT . "/tutor/userimage/" . $_SESSION['USER_DATA']['image']; ?>" alt="">
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
                <img src="<?php echo URLROOT . "/tutor/userimage/" . $_SESSION['USER_DATA']['image']; ?>" alt="">
                <h3></h3>
                <span></span>
                <a href="profile.php" class="btn"><?php echo  ucfirst($_SESSION['USER_DATA']['fname']) . " " . ucfirst($_SESSION['USER_DATA']['lname']); ?></a>
            </div>
            <nav class="navbar">
                <ul>
                    <li><a href="<?php echo URLROOT; ?>/Tutor/"><i class="fa-solid fa-gauge"></i><span>Dashboard</span></a></li>
                    <li><a href="<?php echo URLROOT; ?>/Tutor/students"><i class="fa-solid fa-user-pen"></i><span>My Students</span></a></li>
                    <li><a href="<?php echo URLROOT; ?>/Tutor/myuploads"><i class="fa-solid fa-book"></i><span>My Contents</span></a>
                        <div class="dropdown-content">
                            <ul>
                                <li><a href="<?php echo URLROOT; ?>/Tutor/myuploads"><i class="fa-solid fa-folder-open"></i>Overview</a></li>
                                <li><a href="<?php echo URLROOT; ?>/Tutor/add_new_video"><i class="fa-brands fa-youtube"></i>Add New video</a></li>
                                <li><a href="<?php echo URLROOT; ?>/Tutor/add_new_model_paper"><i class="fa-regular fa-file-lines"></i>New Model Paper</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="<?php echo URLROOT; ?>/Logout"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a></li>
                </ul>
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
                <div class="profile" id="profile">
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
      
                <a href="#" class="btn">About Us</a>
            </div>
            <nav class="navbar">
                <ul>
                    <li><a href="<?php echo URLROOT; ?>/Student/dashboard"><i class="fa-solid fa-school"></i><span>My Learning</span></a></li>
                    <li><a href="<?php echo URLROOT; ?>/Student/tutors"><i class="fa-solid fa-person-chalkboard"></i><span>Tutors</span></a></li>
                    <li><a href="<?php echo URLROOT; ?>/Student/study_materials"><i class="fa-solid fa-book-open"></i><span>Study Materials</span></a></li>
                    <li><a href="<?php echo URLROOT; ?>/Tutor/contents" style="opacity: 0.5;"><i class="fa-solid fa-bars-progress"></i><span>My Progress<sup> (Pro)</sup></span></a></li>
                    <li><a href="<?php echo URLROOT; ?>/Tutor/contents" style="opacity: 0.5;"><i class="fa-solid fa-calendar"></i><span>My Study Plan<sup> (Pro)</sup></span></a></li>
                    <li><a href="<?php echo URLROOT; ?>/Logout"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a></li>
                </ul>
            </nav>
            <div class="profile">
                <a href="<?php echo URLROOT ?>/Student/purchase_premium" class="btn"><i class="fa-solid fa-crown"></i> Upgrade to Premium</a>
            </div>
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
                <div class="profile" id="profile">
                    <img src="<?php echo URLROOT . "/student/userimage/" . $_SESSION['USER_DATA']['image']; ?>" alt="">
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
                <img src="<?php echo URLROOT . "/student/userimage/" . $_SESSION['USER_DATA']['image']; ?>" alt="">
                <h3></h3>
                <span></span>
                <a href="profile.php" class="btn"><i class="fa-solid fa-crown"></i> <?php echo  ucfirst($_SESSION['USER_DATA']['fname']) . " " . ucfirst($_SESSION['USER_DATA']['lname']); ?></a>
            </div>
            <nav class="navbar">
                <ul>
                    <li><a href="<?php echo URLROOT; ?>/Student/dashboard"><i class="fa-solid fa-school"></i><span>My Learning</span></a></li>
                    <li><a href="<?php echo URLROOT; ?>/Student/tutors"><i class="fa-solid fa-person-chalkboard"></i><span>Tutors</span></a></li>
                    <li><a href="<?php echo URLROOT; ?>/Student/study_materials"><i class="fa-solid fa-book-open"></i><span>Study Materials</span></a></li>
                    <li><a href="<?php echo URLROOT; ?>/Tutor/contents"><i class="fa-solid fa-bars-progress"></i><span>My Progress</span></a></li>
                    <li><a href="<?php echo URLROOT; ?>/Tutor/contents"><i class="fa-solid fa-calendar"></i><span>My Study Plan</span></a></li>
                    <!-- iqube support chat -->
                    <li><a href="<?php echo URLROOT; ?>/Logout"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a></li>
                </ul>
            </nav>
        </div>
        <button class="open-chat" id="openchat"><i class="fa-solid fa-headset"></i> IQube Support</button>
        <div class="chat-popup"  id="chat">
            <?php $this->view('Student/Support_chat'); ?>
        </div>
        <script>
            document.getElementById("openchat").addEventListener("click", function() {
                if (document.getElementById("chat").style.display == "block") {
                    document.getElementById("chat").style.display = "none";
                } else {
                    document.getElementById("chat").style.display = "block";
                }
            });
        </script>
    <?php } ?>