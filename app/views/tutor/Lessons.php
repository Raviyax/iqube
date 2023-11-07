<?php $this->view('Inc/Header', $data); ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/tutor/lessons.css">

<body>
    <div class="container">
        <!-- start of sidebar -->
        <?php $this->view('Inc/Sidebar'); ?>

        <!-- end of sidebar -->

        <!-- start of main part -->
        <div id="main" class="main">
            <!-- start of navbar -->
            <?php $this->view('Inc/Navbar', $data); ?>

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
                        <?php $results = $data['result'];
                        foreach ($results as $result) {
                            $courseid = $result['id'];

                           $chapter = $result['chapter'];
                           $price = $result['price'];
                           $stcount = $result['stcount'];
                           
                         ?>
                         <form method="post" action="<?php echo URLROOT;?>/tutor/lessons">
                        <div class="job_card">
                            <div class="job_details">
                                <div class="img">
                                    <img src="../Lessons/assets/img/course.png"></img>
                                </div>
                                <div class="text">
                                    <h2><?php echo $chapter ?></h2>
                                    <span><?php echo $stcount ?> Students Enrolled</span>


                                </div>
                            </div>
                            <div class="job_salary">
                                <h4>Rs.<?php echo $price ?></h4>
                                <span>1 days ago</span>
                        </br>
                                <button class="button-two" name="delete" value=<?php echo $courseid?>><span>Delete</span></button>
                            </div>
                        </div>
                        </form>
                            <?php } ?>
                    
                    </div>
                </div>
            </section>



            <!-- ================End of content ================= -->

        </div>
    </div>

    <?php $this->view('Inc/Footer'); ?>