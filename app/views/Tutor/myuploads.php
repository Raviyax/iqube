<?php $this->view('inc/Header',$data) ?>
<section class="courses">
   <h1 class="heading">My Uploads</h1>
   <header class="header">
            <section style="border-radius: 10px; ">
                <form class="search-form">
                    <!-- <button type="submit" class="fas fa-search" name="search_btn"></button> -->
                    <input type="text" name="searchbar" placeholder="Search by subject..." id="tutorsearchbar" onkeyup="search('tutorlist','tutorsearchbar')" maxlength="100">
                    
                     <select name="sort" id="sort" onchange="sort('tutorlist','sort')">
                           <option value="none" selected disabled>Sort by</option>
                           <option value="date">Date</option>
                           <option value="price">Price</option>

                     </select>

                     <!-- content type -->
                     <select name="content_type" id="content_type" onchange="sort('tutorlist','content_type')">
                           <option value="none" selected disabled>Content Type</option>
                           <option value="video">Video</option>
                           <option value="document">Model Paper</option>
                     </select>


                </form>
                <!-- //sorting inputs -->
                  
                     
                 
            </section>
        </header>
   <div class="box-container" style="margin-top: 10px;">
      <?php $courses = $data['courses']; ?>
      <?php if (empty($courses)) : ?>
      <h3 class="title">No Courses Found</h3>
      <?php endif; ?>
      <?php foreach ($courses as $course) : ?>
      <div class="box">
         <img src="<?php echo URLROOT; ?>/Tutor/thumbnail/<?php echo $course->thumbnail; ?>" class="thumb" alt="">
         <h3 class="title"><?php echo $course->name; ?></h3>
         <div>
            <span><?php echo $course->date; ?></span>
            <p><?php echo $course->price; ?> LKR</p>
         </div>
         <a href="<?php echo URLROOT; ?>/playlist.php?get_id=<?php echo $course->id; ?>" class="inline-btn">view playlist</a>
      </div>
      <?php endforeach; ?>

   </div>
</section>
<?php $this->view('inc/Footer') ?>
</body>
</html>