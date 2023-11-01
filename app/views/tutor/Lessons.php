<?php $this->view('inc/header',$data); ?>
<link rel="stylesheet" href="<?php echo URLROOT;?>/assets/css/tutor/lessons.css">
<body>
    <div class="container">
        <!-- start of sidebar -->
        <?php $this->view('inc/sidebar'); ?>
      
        <!-- end of sidebar -->

        <!-- start of main part -->
        <div id="main" class="main">
            <!-- start of navbar -->
            <?php $this->view('inc/navbar',$data); ?>

            <!-- end of navbar -->

            <!-- start of content -->




            <section class="main1">

                <div class="main-body">
                    <div class="searcharea">
                        <h1>My Uploads</h1>
                        <div class="sub-main">
                            <a href="<?php echo URLROOT; ?>/Tutor/upload"><button class="button-two"><span>Upload New</span></button></a>
                          </div>
                       


                        <div class="search_bar">
                            <input type="search" placeholder="Search course here...">
                            <select name="" id="">
                                <option>Material Type</option>
                                <option>All</option>
                                <option>Video</option>
                                <option>Model Papers</option>

                            </select>
                            <select class="filter">
                                <option>Sort by</option>
                                <option>Most Recent</option>
                                <option>Most Popular</option>
                                <option>Most Viewed</option>`
                                <option>Price</option>`




                            </select>
                        </div>

                        <div class="tags_bar">
                            <div class="tag">
                                <i class="fas fa-times"></i>
                                <span>electronics</span>
                            </div>
                            <div class="tag">
                                <i class="fas fa-times"></i>
                                <span>Magnetic Field</span>
                            </div>
                            <div class="tag">
                                <i class="fas fa-times"></i>
                                <span>Oscillation and waves</span>
                            </div>
                            <div class="tag">
                                <i class="fas fa-times"></i>
                                <span>Measurement.</span>
                            </div>
                        </div>
                      
                    </div>


                    <div class="job_cards">
                        <div class="job_card">
                            <div class="job_details">
                                <div class="img">
                                    <img src="../Lessons/assets/img/course.png"></img>
                                </div>
                                <div class="text">
                                    <h2>Measurements</h2>
                                    <span>25 Students Enrolled</span>


                                </div>
                            </div>
                            <div class="job_salary">
                                <h4>Rs.1500</h4>
                                <span>1 days ago</span>
                            </div>
                        </div>

                        <div class="job_card">
                            <div class="job_details">
                                <div class="img">
                                    <img src="../Lessons/assets/img/course.png"></img>
                                </div>
                                <div class="text">
                                    <h2>Mechanics</h2>
                                    <span>55 Students Enrolled</span>
                                </div>
                            </div>
                            <div class="job_salary">
                                <h4>Rs.1600</h4>
                                <span>2 days ago</span>
                            </div>
                        </div>

                        <div class="job_card">
                            <div class="job_details">
                                <div class="img">
                                    <img src="../Lessons/assets/img/course.png"></img>
                                </div>
                                <div class="text">
                                    <h2>Thermodynamics</h2>
                                    <span>128 Students Enrolled</span>
                                </div>
                            </div>
                            <div class="job_salary">
                                <h4>RS. 900</h4>
                                <span>2 days ago</span>
                            </div>
                        </div>

                        <div class="job_card">
                            <div class="job_details">
                                <div class="img">
                                    <img src="../Lessons/assets/img/course.png"></img>
                                </div>
                                <div class="text">
                                    <h2>Gravitational Fields</h2>
                                    <span>98 Students Enrolled</span>
                                </div>
                            </div>
                            <div class="job_salary">
                                <h4>Rs.2000</h4>
                                <span>3 days ago</span>
                            </div>
                        </div>

                        <div class="job_card">
                            <div class="job_details">
                                <div class="img">
                                    <img src="../Lessons/assets/img/course.png"></img>
                                </div>
                                <div class="text">
                                    <h2>Electronics</h2>
                                    <span>28 Students Enrolled</span>
                                </div>
                            </div>
                            <div class="job_salary">
                                <h4>Rs.1200</h4>
                                <span>4 days ago</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



            <!-- ================End of content ================= -->

        </div>
    </div>

    <?php $this->view('inc/footer'); ?>