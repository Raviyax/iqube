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
                    <li><a href="<?php echo URLROOT; ?>/Subjectadmin/manage_syllabus"><i class="fa-solid fa-book"></i><span><?php echo ucfirst($_SESSION['USER_DATA']['subject']); ?> Syllabus</span></a></li>
                    <li><a href="<?php echo URLROOT; ?>/Subjectadmin/iqube_support"><i class="fa-solid fa-person-circle-question"></i><span>iQube Support</span></a></li>
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
                <a href="<?php echo URLROOT; ?>/admin/profile" class="btn">Howdy, iQubeAdmin!</a>
            </div>
            <nav class="navbar">
                <ul>
                    <li><a href="<?php echo URLROOT; ?>/admin/"><i class="fa-solid fa-gauge"></i><span>iQube Summary</span></a></li>
                    <li><a href="<?php echo URLROOT; ?>/admin/users"><i class="fa-solid fa-users"></i><span>Manage Users</span></a></li>
                    <li><a href="<?php echo URLROOT; ?>/admin/revenue"><i class="fa-solid fa-credit-card"></i><span>View Revenue</span></a></li>
                    <li><a href="<?php echo URLROOT; ?>/admin/site_backup"><i class="fa-solid fa-database"></i><span>Site Backups</span></a></li>
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

                <h3><?php echo ucfirst($_SESSION['USER_DATA']['subject']); ?></h3>
                <a href="<?php echo URLROOT; ?>/Tutor/profile" class="btn"><?php echo  ucfirst($_SESSION['USER_DATA']['fname']) . " " . ucfirst($_SESSION['USER_DATA']['lname']); ?></a>
            </div>
            <nav class="navbar">
                <ul>
                    <li><a href="<?php echo URLROOT; ?>/Tutor/"><i class="fa-solid fa-chalkboard-user"></i><span>My Teaching</span></a></li>
                    <li><a href="<?php echo URLROOT; ?>/Tutor/add_new_video"><i class="fa-brands fa-youtube"></i><span>New video</span></a></li>
                    <li><a href="<?php echo URLROOT; ?>/Tutor/add_new_model_paper"><i class="fa-regular fa-file-lines"></i><span>New Model Paper</span></a></li>



                    </li>
                    <li><a href="<?php echo URLROOT; ?>/Logout"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a></li>
                </ul>
            </nav>
            <div class="profile" style=" box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                <img style="width: 20rem; height:20rem;" src="<?php echo URLROOT; ?>/public/assets/img/iqube.png" alt="">
                <h3>By Group 22</h3>

            </div>
        </div>
    <?php } ?>
    <!-- free student header  -->
    <?php if (Auth::is_logged_in() && Auth::is_student() && !Auth::is_premium()) { ?>
        <header class="header" style="z-index: 1500;">
            <section class="flex">
                <div class="icons">
                    <div id="menu-btn" class="fas fa-bars"></div>
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
                <img src="<?php echo URLROOT ?>/student/userimage/<?php echo $_SESSION['USER_DATA']['image']; ?>" alt="">

                <a href="<?php echo URLROOT; ?>/Student/profile" class="btn"><?php echo  ucfirst($_SESSION['USER_DATA']['username']); ?></a>
            </div>
            <nav class="navbar">
                <ul>
                    <li><a href="<?php echo URLROOT; ?>/Student/dashboard"><i class="fa-solid fa-school"></i><span>My Learning</span></a></li>
                    <li><a href="<?php echo URLROOT; ?>/Student/tutors"><i class="fa-solid fa-person-chalkboard"></i><span>Tutors</span></a></li>
                    <li><a href="<?php echo URLROOT; ?>/Student/study_materials"><i class="fa-solid fa-book-open"></i><span>Study Materials</span></a></li>

                    <li><a href="<?php echo URLROOT; ?>/Logout"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a></li>
                </ul>
            </nav>
            <div class="profile" style="padding:unset; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                <img style="width: 20rem; height:20rem;" src="<?php echo URLROOT; ?>/public/assets/img/iqube.png" alt="">
                <h3>By Group 22</h3>
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
                <a href="<?php echo URLROOT; ?>/Student/profile" class="btn"><i class="fa-solid fa-crown"></i> <?php echo  ucfirst($_SESSION['USER_DATA']['fname']) . " " . ucfirst($_SESSION['USER_DATA']['lname']); ?></a>
            </div>
            <nav class="navbar">
                <ul>
                    <li class=""><a href="<?php echo URLROOT; ?>/Student/dashboard"><i class="fa-solid fa-school"></i><span>My Learning</span></a></li>
                    <li><a href="<?php echo URLROOT; ?>/Student/tutors"><i class="fa-solid fa-person-chalkboard"></i><span>Tutors</span></a></li>
                    <li><a href="<?php echo URLROOT; ?>/Student/study_materials"><i class="fa-solid fa-book-open"></i><span>Study Materials</span></a></li>
                    <!-- iqube support chat -->
                    <li><a href="<?php echo URLROOT; ?>/Logout"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a></li>
                </ul>
            </nav>
            <div class="profile" style=" box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                <img style="width: 20rem; height:20rem;" src="<?php echo URLROOT; ?>/public/assets/img/iqube.png" alt="">
                <h3>By Group 22</h3>

            </div>
        </div>
        <button class="open-chat" style="z-index: 99999;" id="openchat"><i class="fa-solid fa-headset"></i> IQube Support</button>
        <div class="chat-popup" id="chat">
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