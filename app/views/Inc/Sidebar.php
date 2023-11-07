<div id="mySidebar" class="sidebar">
        <div class="sidebar-top" id="sidebar_top">
                <div class="usericon" id="usericon" href="#home"><img src="<?php echo URLROOT;?>/assets/img/landing/user.jpg" alt=""></div>
                <div class="userdetails" id="userdetails" href="#home">
                        <ul>
                                
                                <?php if (Auth::is_logged_in()) { ?>
                                        <li><?php echo ucfirst($_SESSION['USER_DATA']['name']) ?></li>
                                <li style="font-size: 10px; opacity: 0.5;"><?php echo ucfirst($_SESSION['USER_DATA']['role']) ?></li>
                                <?php } ?>
                                <?php if (!Auth::is_logged_in()) { ?>
                                        <li>User</li>
                                <li style="font-size: 10px; opacity: 0.5;"><a href="<?php echo URLROOT?>/Login">Login</a></li>
                                <?php } ?>
                        </ul>
                </div>
        </div>

        <div class="sidebar_content">
                <?php if (!Auth::is_logged_in()) { ?>

                        <a class="active" href="#home"><span class="naviconBx"><i class="fa-solid fa-cube"></i></i> </span><span class="naviconBx">Dashboard</span></a>
                        <a href="<?php echo URLROOT?>/Login"><span class="naviconBx"><i class="fa-solid fa-arrow-right-to-bracket"></i></span><span class="naviconBx">Login</span></a>
                <?php } ?>


                <?php if (Auth::is_logged_in()) { ?>

                        <?php if (Auth::is_tutor()) { ?>
                                <a href="<?php echo URLROOT; ?>/Tutor"><span class="naviconBx"><i class="fa-solid fa-chalkboard-user"></i></span><span class="naviconBx">Dashboard</span></a>
                                <a href="<?php echo URLROOT; ?>/Tutor/Lessons"><span class="naviconBx"><i class="fa-solid fa-person-chalkboard"></i></span><span class="naviconBx">My Lessons</span></a>
                                <a href="#contact"><span class="naviconBx"><i class="fa-solid fa-download"></i></span><span class="naviconBx">My Status</span></a>
                                <a href="#about"><span class="naviconBx"><i class="fa-solid fa-graduation-cap"></i></span><span class="naviconBx">My Students</span></a>
                                <a href="<?php echo URLROOT; ?>/Tutor/Messages"><span class="naviconBx"><i class="fa-solid fa-comment-dots"></i></span><span class="naviconBx">Messages</span></a>
                                <a href="#about"><span class="naviconBx"><i class="fa-solid fa-gear"></i></span><span class="naviconBx">Settings</span></a>
                                <a href="<?php echo URLROOT; ?>/Logout"><span class="naviconBx"><i class="fa-solid fa-right-from-bracket"></i></span><span class="naviconBx">Logout</span></a>
                        <?php } ?>


                        <?php if (Auth::is_student()) { ?>
                                <a href="<?php echo URLROOT; ?>/Student"><span class="naviconBx"><i class="fa-solid fa-chart-line"></i></span><span class="naviconBx">Dashboard</span></a>
                                <a href="<?php echo URLROOT; ?>/Student/courses"><span class="naviconBx"><i class="fa-brands fa-leanpub"></i></span><span class="naviconBx">Courses</span></a>
                                <a href="<?php echo URLROOT; ?>/Student/syllabus"><span class="naviconBx"><i class="fa-solid fa-book"></i></span><span class="naviconBx">Syllabus</span></a>
                                <a href="<?php echo URLROOT; ?>/Student/schedule"><span class="naviconBx"><i class="fa-solid fa-calendar-days"></i></span><span class="naviconBx">Study Plan</span></a>
                                <a href="<?php echo URLROOT; ?>/Student/tutors"><span class="naviconBx"><i class="fa-solid fa-chalkboard-user"></i></span><span class="naviconBx">Tutors</span></a>
                                <a href="<?php echo URLROOT; ?>/Student/Messages"><span class="naviconBx"><i class="fa-solid fa-comment-dots"></i></span><span class="naviconBx">Messages</span></a>
                                <a href="<?php echo URLROOT; ?>/Student/wishlist"><span class="naviconBx"><i class="fa-solid fa-cart-arrow-down"></i></span><span class="naviconBx">WishList</span></a>
                                <a href="<?php echo URLROOT; ?>/Logout"><span class="naviconBx"><i class="fa-solid fa-right-from-bracket"></i></span><span class="naviconBx">Logout</span></a>
                                

                        <?php } ?>

                        <?php if (Auth::is_subject_admin()) { ?>
                                <a href="<?php echo URLROOT; ?>/Subject_admin"><span class="naviconBx"><i class="fa-solid fa-headset"></i></span><span class="naviconBx">Dashboard</span></a>
                                <a href="<?php echo URLROOT; ?>/Subject_admin/tutors"><span class="naviconBx"><i class="fa-solid fa-chalkboard-user"></i></span><span class="naviconBx">Tutors</span></a>
                                <a href="<?php echo URLROOT; ?>/Subject_admin/complaints"><span class="naviconBx"><i class="fa-solid fa-comment-dots"></i></span><span class="naviconBx">Complaints</span></a>
                                <a href="<?php echo URLROOT; ?>/Subject_admin/settings"><span class="naviconBx"><i class="fa-solid fa-gear"></i></span><span class="naviconBx">Settings</span></a>
                                <a href="<?php echo URLROOT; ?>/Logout"><span class="naviconBx"><i class="fa-solid fa-right-from-bracket"></i></span><span class="naviconBx">Logout</span></a>

                        <?php } ?>

                        <?php if (Auth::is_admin()) { ?>
                                <a href="#news"><span class="naviconBx"><i class="fa-solid fa-screwdriver-wrench"></i></span><span class="naviconBx">Dashboard</span></a>
                                <a href="<?php echo URLROOT; ?>/Admin/users"><span class="naviconBx"><i class="fa-solid fa-users"></i></span><span class="naviconBx">Users</span></a>
                                <a href="#news"><span class="naviconBx"><i class="fa-solid fa-book-open"></i></span><span class="naviconBx">Subjects</span></a>
                                <a href="#about"><span class="naviconBx"><i class="fa-solid fa-gear"></i></span><span class="naviconBx">Settings</span></a>
                                <a href="<?php echo URLROOT; ?>/Logout"><span class="naviconBx"><i class="fa-solid fa-right-from-bracket"></i></span><span class="naviconBx">Logout</span></a>

                        <?php } ?>


                <?php } ?>
        </div>
</div>