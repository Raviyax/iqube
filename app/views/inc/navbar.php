<div class="topbar">
                <div class="toggle" onclick="openNav()">
                    <i class="fa-solid fa-bars"></i>
                </div>

                <div class="dashboardtype">
                    <label> <?php if(!Auth::is_logged_in()){?>
                        About Us
                        <?php }else{?>
                        <?php echo ucwords($_SESSION['USER_DATA']['role'])?> <?php echo ucwords($data['view'])?>
                        <?php }?>
                    </label>
                </div>

                <div class="user">
                    
                </div>
            </div>