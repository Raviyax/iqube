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
              <div class="course-col">
                <a href="<?=URLROOT?>/Student/singleCourse">
                <div class="courseCard">
                  <div class="img">
                    <img src="<?=URLROOT?>/assets/img/Student/physics.png" alt="">
                  </div>
                  <div class="course-info">
                    <div class="tag">
                      <div class="categ">Physics</div>
                      <div class="price">Rs. 4000/=</div>
                    </div>
                    <div class="name">
                      Physics | Mechanics
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
                        <div class="no">55</div>
                        <div class="stu-tag">Students</div>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
                <div class="courseCard">
                  <div class="img">
                    <img src="https://t2.gstatic.com/licensed-image?q=tbn:ANd9GcQTuuXWfjM-tRGEKLl6HVc_jXC0wbaI36kxP0qaeHOYR9_MUMeUqnUyTvgURC963DNe" alt="">
                  </div>
                  <div class="course-info">
                    <div class="tag">
                      <div class="categ">Physics</div>
                      <div class="price">Rs. 4000/=</div>
                    </div>
                    <div class="name">
                      Physics | Mechanics
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
                        <div class="no">55</div>
                        <div class="stu-tag">Students</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="courseCard">
                  <div class="img">
                  <img src="https://t2.gstatic.com/licensed-image?q=tbn:ANd9GcQTuuXWfjM-tRGEKLl6HVc_jXC0wbaI36kxP0qaeHOYR9_MUMeUqnUyTvgURC963DNe" alt="">
                  </div>
                  <div class="course-info">
                    <div class="tag">
                      <div class="categ">Physics</div>
                      <div class="price">Rs. 4000/=</div>
                    </div>
                    <div class="name">
                      Physics | Mechanics
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
                        <div class="no">55</div>
                        <div class="stu-tag">Students</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="courseCard">
                  <div class="img">
                  <img src="<?=URLROOT?>/assets/img/Student/physics.png" alt="">
                  </div>
                  <div class="course-info">
                    <div class="tag">
                      <div class="categ">Physics</div>
                      <div class="price">Rs. 4000/=</div>
                    </div>
                    <div class="name">
                      Physics | Mechanics
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
                        <div class="no">55</div>
                        <div class="stu-tag">Students</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="course-col">
                <div class="courseCard">
                  <div class="img">
                  <img src="<?=URLROOT?>/assets/img/Student/physics.png" alt="">
                  </div>
                  <div class="course-info">
                    <div class="tag">
                      <div class="categ">Physics</div>
                      <div class="price">Rs. 4000/=</div>
                    </div>
                    <div class="name">
                      Physics | Mechanics
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
                        <div class="no">55</div>
                        <div class="stu-tag">Students</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="courseCard">
                  <div class="img">
                  <img src="https://t2.gstatic.com/licensed-image?q=tbn:ANd9GcQTuuXWfjM-tRGEKLl6HVc_jXC0wbaI36kxP0qaeHOYR9_MUMeUqnUyTvgURC963DNe" alt="">
                  </div>
                  <div class="course-info">
                    <div class="tag">
                      <div class="categ">Physics</div>
                      <div class="price">Rs. 4000/=</div>
                    </div>
                    <div class="name">
                      Physics | Mechanics
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
                        <div class="no">55</div>
                        <div class="stu-tag">Students</div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="courseCard">
                  <div class="img">
                    <img src="https://www.snexplores.org/wp-content/uploads/2019/11/860_main_quantum_explainer.png" alt="">
                  </div>
                  <div class="course-info">
                    <div class="tag">
                      <div class="categ">Physics</div>
                      <div class="price">Rs. 4000/=</div>
                    </div>
                    <div class="name">
                      Physics | Mechanics
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
                        <div class="no">55</div>
                        <div class="stu-tag">Students</div>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
                <div class="courseCard">
                  <div class="img">
                    <img src="https://www.marietta.edu/sites/default/files/styles/hero_image_internal/public/2021-05/Banner2021_RSSI-science.jpg?h=0223e307&itok=-t7zW2Br" alt="">
                  </div>
                  <div class="course-info">
                    <div class="tag">
                      <div class="categ">Physics</div>
                      <div class="price">Rs. 4000/=</div>
                    </div>
                    <div class="name">
                      Physics | Mechanics
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
                        <div class="no">55</div>
                        <div class="stu-tag">Students</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="course-col">
                <div class="courseCard">
                  <div class="img">
                    <img src="https://qph.cf2.quoracdn.net/main-qimg-9e96b92ec2e1d42f8cb5378f9c7540c7-pjlq" alt="">
                  </div>
                  <div class="course-info">
                    <div class="tag">
                      <div class="categ">Physics</div>
                      <div class="price">Rs. 4000/=</div>
                    </div>
                    <div class="name">
                      Physics | Mechanics
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
                        <div class="no">55</div>
                        <div class="stu-tag">Students</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="courseCard">
                  <div class="img">
                    <img src="https://static.vecteezy.com/system/resources/previews/022/006/509/large_2x/science-background-illustration-scientific-design-flasks-glass-and-chemistry-physics-elements-generative-ai-photo.jpeg" alt="">
                  </div>
                  <div class="course-info">
                    <div class="tag">
                      <div class="categ">Physics</div>
                      <div class="price">Rs. 4000/=</div>
                    </div>
                    <div class="name">
                      Physics | Mechanics
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
                        <div class="no">55</div>
                        <div class="stu-tag">Students</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="courseCard">
                  <div class="img">
                    <img src="https://static.vecteezy.com/system/resources/previews/022/006/509/large_2x/science-background-illustration-scientific-design-flasks-glass-and-chemistry-physics-elements-generative-ai-photo.jpeg" alt="">
                  </div>
                  <div class="course-info">
                    <div class="tag">
                      <div class="categ">Physics</div>
                      <div class="price">Rs. 4000/=</div>
                    </div>
                    <div class="name">
                      Physics | Mechanics
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
                        <div class="no">55</div>
                        <div class="stu-tag">Students</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="courseCard">
                  <div class="img">
                    <img src="https://static.vecteezy.com/system/resources/previews/022/006/509/large_2x/science-background-illustration-scientific-design-flasks-glass-and-chemistry-physics-elements-generative-ai-photo.jpeg" alt="">
                  </div>
                  <div class="course-info">
                    <div class="tag">
                      <div class="categ">Physics</div>
                      <div class="price">Rs. 4000/=</div>
                    </div>
                    <div class="name">
                      Physics | Mechanics
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
                        <div class="no">55</div>
                        <div class="stu-tag">Students</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>


        <!-- ================End of content ================= -->

    </div>
</div>

<!-- =========== Scripts =========  -->
<?php $this->view('inc/footer'); ?>