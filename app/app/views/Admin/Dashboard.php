<?php $this->view('inc/Header', $data) ?>


<section class="courses">

    <section style="margin-top: 10px; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px; padding: 50px;">

        <div class="box-container">

            <div class="box" style="cursor:pointer;">
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col">
                        <div class="tutor">
                            <img src="<?php echo URLROOT; ?>/public/assets/img/student.png" alt="">
                            <div>
                                <h3>Total Students</h3>
                                <H3><?php echo $data['student_count']; ?></H3>
                                <span style="color: red;"><i class="fa-solid fa-arrow-trend-up"></i> <?php echo $data['new_student_percentage']; ?>% </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box" style="cursor:pointer;">
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col">
                        <div class="tutor">
                            <img src="<?php echo URLROOT; ?>/public/assets/img/tutor.png" alt="">
                            <div>
                                <h3>Total Tutors</h3>
                                <H3><?php echo $data['tutor_count']; ?></H3>
                                <span style="color: red;"><i class="fa-solid fa-arrow-trend-up"></i> <?php echo $data['new_tutor_percentage']; ?>% </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box" style="cursor:pointer;">
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col">
                        <div class="tutor">
                            <img src="<?php echo URLROOT; ?>/public/assets/img/subject_admin.png" alt="">
                            <div>
                                <h3>Total Subject Admins</h3>
                                <H3><?php echo $data['subject_admin_count']; ?></H3>
                                <span style="color: red;"><i class="fa-solid fa-arrow-trend-up"></i> <?php echo $data['new_subject_admin_percentage']; ?>% </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box" style="cursor:pointer;">
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col">
                        <div class="tutor">
                            <img src="<?php echo URLROOT; ?>/public/assets/img/premium.jpeg" alt="">
                            <div>
                                <h3>Total Premium Students</h3>
                                <H3><?php echo $data['premium_student_count']; ?></H3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box" style="cursor:pointer;">
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col">
                        <div class="tutor">
                            <img src="<?php echo URLROOT; ?>/public/assets/img/subject.png" alt="">
                            <div>
                                <h3>Total Subjects</h3>
                                <H3><?php echo $data['subjects']; ?></H3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </section>


    <section style="margin-top: 50px;">
        <h1 class="heading" style="border-bottom:none;">Revenue</h1>
        <div class="box-container">
            <div class="box" style="cursor:pointer">
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col">
                        <div class="tutor">
                            <img src="<?php echo URLROOT; ?>/public/assets/img/video.WEBP" alt="Video Purchases">
                            <div>
                                <h3>Video Purchases</h3>
                                <h3><?php echo $data['video_purchases']->count; ?></h3>
                                <span>Last Month</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box" style="cursor:pointer">
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col">
                        <div class="tutor">
                            <img src="<?php echo URLROOT; ?>/public/assets/img/video_revenue.jpg" alt="Video Sales">
                            <div>
                                <h3>Video Sales</h3>
                                <h3><?php echo $data['video_purchases']->total; ?> LKR</h3>
                                <span>Last Month</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box" style="cursor:pointer">
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col">
                        <div class="tutor">
                            <img src="<?php echo URLROOT; ?>/public/assets/img/profit.jpg" alt="Revenue From Video">
                            <div>
                                <h3>Revenue From Videos</h3>
                                <h3><?php echo $data['video_purchases']->total * 0.2; ?> LKR</h3>
                                <span>Last Month</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box" style="cursor:pointer">
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col">
                        <div class="tutor">
                            <img src="<?php echo URLROOT; ?>/public/assets/img/model_paper.png" alt="Model Paper Purchases">
                            <div>
                                <h3>Model Paper Purchases</h3>
                                <h3><?php echo $data['model_paper_purchases']->count; ?></h3>
                                <span>Last Month</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box" style="cursor:pointer">
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col">
                        <div class="tutor">
                            <img src="<?php echo URLROOT; ?>/public/assets/img/model_paper_revenue.jpg" alt="Model Paper Sales">
                            <div>
                                <h3>Model Paper Sales</h3>
                                <h3><?php echo $data['model_paper_purchases']->total; ?> LKR</h3>
                                <span>Last Month</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box" style="cursor:pointer">
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col">
                        <div class="tutor">
                            <img src="<?php echo URLROOT; ?>/public/assets/img/profit.jpg" alt="Revenue From Model Papers">
                            <div>
                                <h3>Revenue From Papers</h3>
                                <h3><?php echo $data['model_paper_purchases']->total * 0.2; ?> LKR</h3>
                                <span>Last Month</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>



</section>

<?php $this->view('inc/Footer') ?>
</body>

</html>