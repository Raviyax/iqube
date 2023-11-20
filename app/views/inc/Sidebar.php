<div id="mySidebar" class="sidebar">
     

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
                                <a href="#news"><span class="naviconBx"><i class="fa-solid fa-chart-line"></i></span><span class="naviconBx">Dashboard</span></a>
                                <a href="#news"><span class="naviconBx"><i class="fa-brands fa-leanpub"></i></span><span class="naviconBx">Courses</span></a>
                                <a href="#news"><span class="naviconBx"><i class="fa-solid fa-book"></i></span><span class="naviconBx">Syllabus</span></a>
                                <a href="#news"><span class="naviconBx"><i class="fa-solid fa-calendar-days"></i></span><span class="naviconBx">Study Plan</span></a>
                                <a href="#news"><span class="naviconBx"><i class="fa-solid fa-chalkboard-user"></i></span><span class="naviconBx">Tutors</span></a>
                                <a href="#about"><span class="naviconBx"><i class="fa-solid fa-gear"></i></span><span class="naviconBx">Settings</span></a>
                                <a href="<?php echo URLROOT; ?>/Logout"><span class="naviconBx"><i class="fa-solid fa-right-from-bracket"></i></span><span class="naviconBx">Logout</span></a>

                        <?php } ?>

                        <?php if (Auth::is_subject_admin()) { ?>
                                <a href="#news"><span class="naviconBx"><i class="fa-solid fa-headset"></i></span><span class="naviconBx">Dashboard</span></a>
                                <a href="#news"><span class="naviconBx"><i class="fa-solid fa-chalkboard-user"></i></span><span class="naviconBx">Tutors</span></a>
                                <a href=""><span class="naviconBx"><i class="fa-solid fa-comment-dots"></i></span><span class="naviconBx">Complains</span></a>
                                <a href="#about"><span class="naviconBx"><i class="fa-solid fa-gear"></i></span><span class="naviconBx">Settings</span></a>
                                <a href="<?php echo URLROOT; ?>/Logout"><span class="naviconBx"><i class="fa-solid fa-right-from-bracket"></i></span><span class="naviconBx">Logout</span></a>

                        <?php } ?>

                        <?php if (Auth::is_admin()) { ?>
                                <a href="#news"><span class="naviconBx"><i class="fa-solid fa-screwdriver-wrench"></i></span><span class="naviconBx">Dashboard</span></a>
                                <a href="#news"><span class="naviconBx"><i class="fa-solid fa-chalkboard-user"></i></span><span class="naviconBx">Tutors</span></a>
                                <a href="#news"><span class="naviconBx"><i class="fa-solid fa-headset"></i></span><span class="naviconBx">Subject Admins</span></a>
                                <a href="#news"><span class="naviconBx"><i class="fa-solid fa-child-reaching"></i></span><span class="naviconBx">Students</span></a>
                                <a href="#news"><span class="naviconBx"><i class="fa-solid fa-book-open"></i></span><span class="naviconBx">Subjects</span></a>
                                <a href="#about"><span class="naviconBx"><i class="fa-solid fa-gear"></i></span><span class="naviconBx">Settings</span></a>
                                <a href="<?php echo URLROOT; ?>/Logout"><span class="naviconBx"><i class="fa-solid fa-right-from-bracket"></i></span><span class="naviconBx">Logout</span></a>

                        <?php } ?>


                <?php } ?>
        </div>
</div>