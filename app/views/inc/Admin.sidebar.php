<div id="mySidebar" class="sidebar">
            <div class="sidebar-top" id="sidebar_top">
                <div class="usericon" id="usericon" href="#home"><img src="assets/imgs/user.jpg" alt=""></div>
                <div class="userdetails" id="userdetails" href="#home">
                    <ul>
                        <li><?php echo $data['user_name']?></li>
                        <li style="font-size: 10px; opacity: 0.5;"><?php echo $data['user_role']?></li>
                    </ul>
                </div>
            </div>

            <div class="sidebar_content">
                <a class="active" href="#home"><span class="naviconBx"><i class="fa fa-tachometer"
                            aria-hidden="true"></i> </span><span class="naviconBx">Dashboard</span></a>
                <a href="#news"><span class="naviconBx"><i class="fa-solid fa-person-chalkboard"></i></span><span
                        class="naviconBx">Tutors</span></a>
                <a href="#contact"><span class="naviconBx"><i class="fa-solid fa-download"></i></span><span
                        class="naviconBx">Statistics</span></a>
                <a href="#about"><span class="naviconBx"><i class="fa-solid fa-graduation-cap"></i></span><span
                        class="naviconBx">Total Students</span></a>
                
                <a href="#about"><span class="naviconBx"><i class="fa-solid fa-gear"></i></span><span
                        class="naviconBx">Settings</span></a>
                <a href="<?php echo URLROOT;?>/Login/Logout"><span class="naviconBx"><i class="fa-solid fa-right-from-bracket"></i></span><span
                        class="naviconBx">Logout</span></a>
            </div>
        </div>