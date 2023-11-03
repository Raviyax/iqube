<?php $this->view('inc/header', $data); ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/Student/courses.css">
<div class="container">
    <!-- start of sidebar -->
    <?php $this->view('inc/sidebar'); ?>
    <!-- end of sidebar -->

    <!-- start of main part -->
    <div id="main" class="main">
        <!-- start of navbar -->
        <?php $this->view('inc/navbar', $data); ?>

        <!-- end of navbar -->

        <!-- start of content -->
        

        <div class="content">
            <div class="filter-section">
              <div class="filter">
              <div class="icon">
                  <i class="fas fa-sliders-h"></i>
                  </div>
                  <div class="text" style="padding:5px;">
                    Filters
                  </div>
              </div>
              <div class="search">
                <div class="info">
                  <div class="icon">
                  <i class="fas fa-search"></i>
                  </div>
                  <div>
                    <input type="text" placeholder="course title" class="searchbar">
                  </div>
                </div>
              </div>
            </div>

            
            <div class="coursePane">
              <?php
              $results = $data['result'];
              foreach ($results as $result) {
                  $chapter = $result['chapter'];
                  $price = $result['price'];
                  $stcount = $result['stcount'];
              ?>
                  <div class="courseCard">
                      <a href="<?= URLROOT ?>/Student/singleCourse">
                          <div class="img">
                              <img src="<?= URLROOT ?>/assets/img/Student/physics.png" alt="">
                          </div>
                          <div class="course-info">
                              <div class="tag">
                                  <div class="categ">Physics</div>
                                  <div class="price">Rs. <?= $price ?> /=</div>
                              </div>
                              <div class="name">
                                  <?= $chapter ?>
                              </div>
                          </div>
                          <div class="courseFoot">
                              <div class="rate">
                                  <div class="star">
                                      <i class="fas fa-star" style="color: gold;"></i>
                                  </div>
                                  <div class="rating">
                                      4.8
                                  </div>
                              </div>
                              <div class="stu">
                                  <div class="stu-icon">
                                      <i class="fa-solid fa-users-line"></i>
                                  </div>
                                  <div class="stu-cnt">
                                      <div class="no"><?= $stcount ?></div>
                                      <div class="stu-tag">Students</div>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>
              <?php } ?>
            </div>

        </div>


        <!-- ================End of content ================= -->

    </div>
</div>

<!-- =========== Scripts =========  -->
<?php $this->view('inc/footer'); ?>