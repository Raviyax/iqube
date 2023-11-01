<?php $this->view('inc/header'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link rel="stylesheet" href="<?php echo URLROOT;?>/assets/css/tutor/dashboard.css">
    <div class="container">
        <!-- start of sidebar -->
        <?php $this->view('inc/sidebar'); ?>   
        <!-- end of sidebar -->

        <!-- start of main part -->
        <div id="main" class="main">
            <!-- start of navbar -->
            <div class="topbar">
                <div class="toggle" onclick="openNav()">
                    <i class="fa-solid fa-bars"></i>
                </div>

                <div class="dashboardtype">
                    <label>
                        Tutor Dashboard
                    </label>
                </div>

                <div class="user">
                    <img src="assets/imgs/customer01.jpg" alt="">
                </div>
            </div>

            <!-- end of navbar -->

            <!-- start of content -->
            
    <!-- ======================= Cards ================== -->
    <div class="cardBox">
        <div class="card">
            <div>
                <div class="numbers">1,504</div>
                <div class="cardName">Total Students</div>
            </div>

            <div class="iconBx">
                <ion-icon name="eye-outline"></ion-icon>
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers">1000</div>
                <div class="cardName">Purchases</div>
            </div>

            <div class="iconBx">
                <ion-icon name="cart-outline"></ion-icon>
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers">10</div>
                <div class="cardName">New Students</div>
            </div>

            <div class="iconBx">
                <ion-icon name="chatbubbles-outline"></ion-icon>
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers">Rs.25,000</div>
                <div class="cardName">Total Earnings</div>
            </div>

            <div class="iconBx">
                <ion-icon name="cash-outline"></ion-icon>
            </div>
        </div>
    </div>

    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Recent Course Materials</h2>
                <a href="#" class="btn">View All</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <td>Course Material</td>
                        <td>Material Type</td>
                        <td>Total Revenue</td>
                        <td>Total Purchases</td>
                       
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Linear Motion</td>
                        <td>Video</td>
                        <td>Rs.1200</td>
                        <td>10</td>
                        
                       
                    </tr>

                    <tr>
                        <td>Newton's Laws</td>
                        <td>Model Paper</td>
                        <td>Rs.1200</td>
                        <td>10</td>
                        
                      
                    </tr>

                    <tr>
                        <td>Linear Motion</td>
                        <td>Model Paper</td>
                        <td>Rs.500</td>
                        <td>10</td>
                      
                       
                    </tr>

                    <tr>
                        <td>Gravitational Fields</td>
                        <td>Video</td>
                        <td>Rs.1000</td>
                        <td>25</td>
                    
                    </tr>

                    <tr>
                        <td>Model Paper 10</td>
                        <td>Model Paper</td>
                        <td>Rs.900</td>
                        <td>48</td>
                    
                     
                    </tr>

                    <tr>
                        <td>Model Paper 11</td>
                        <td>Model Paper</td>
                        <td>Rs.900</td>
                        <td>62</td>
                      
                    </tr>

                    <tr>
                        <td>Electronics</td>
                        <td>Video</td>
                        <td>Rs.1500</td>
                        <td>120</td>
                      
                    </tr>

                    <tr>
                        <td>Model Paper 12</td>
                        <td>Model Paper</td>
                        <td>Rs.900</td>
                        <td>62</td>
                    
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- ================= New Customers ================ -->
        <div class="recentCustomers">
            <div class="cardHeader">
                <h2>Top Students</h2>
                <a href="#" class="btn">View All</a>
            </div>

            <table>
                <tr>
                    <td width="60px">
                        <div class="imgBx"><img src="../Dashboard/assets/imgs/customer01.jpg" alt=""></div>
                    </td>
                    <td>
                        <h4>Hanafe Mira <br> <span>1050 Points</span></h4>
                    </td>
                </tr>

                <tr>
                    <td width="60px">
                        <div class="imgBx"><img src="../Dashboard/assets/imgs/customer01.jpg" alt=""></div>
                    </td>
                    <td>
                        <h4>Ravishan jayathilake <br> <span>984 Points</span></h4>
                    </td>
                </tr>

                <tr>
                    <td width="60px">
                        <div class="imgBx"><img src="../Dashboard/assets/imgs/customer02.jpg" alt=""></div>
                    </td>
                    <td>
                        <h4>Madasha Liyanage<br> <span>950 Points</span></h4>
                    </td>
                </tr>

                <tr>
                    <td width="60px">
                        <div class="imgBx"><img src="../Dashboard/assets/imgs/customer01.jpg" alt=""></div>
                    </td>
                    <td>
                        <h4>Rumal Hettiarachchi<br> <span>875 Points</span></h4>
                    </td>
                </tr>

                <tr>
                    <td width="60px">
                        <div class="imgBx"><img src="../Dashboard/assets/imgs/customer02.jpg" alt=""></div>
                    </td>
                    <td>
                        <h4>Nisal Wishwajith<br> <span>850 Points</span></h4>
                    </td>
                </tr>

                <tr>
                    <td width="60px">
                        <div class="imgBx"><img src="../Dashboard/assets/imgs/customer01.jpg" alt=""></div>
                    </td>
                    <td>
                        <h4>Rishmi Dissanayake<br> <span>799 Points</span></h4>
                    </td>
                </tr>

                <tr>
                    <td width="60px">
                        <div class="imgBx"><img src="../Dashboard/assets/imgs/customer02.jpg" alt=""></div>
                    </td>
                    <td>
                        <h4>Raveen Dalpatadu<br> <span>750 Points</span></h4>
                    </td>
                </tr>

                <tr>
                    <td width="60px">
                        <div class="imgBx"><img src="../Dashboard/assets/imgs/customer01.jpg" alt=""></div>
                    </td>
                    <td>
                        <h4>Ashan Lakshitha<br> <span>800 Points</span></h4>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <!-- ================End of content ================= -->

        </div>
    </div>
    <?php $this->view('inc/footer'); ?>


