<?php $this->view('inc/header',$data) ?>
<section class="courses">
   <h1 class="heading">My Uploads</h1>
   <div class="box-container">
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
      <!-- <div class="box">
       
         <img src="uploaded_files/" class="thumb" alt="">
         <h3 class="title">title</h3>
         <div>
               <h3>name</h3>
               <span>date</span>
               <p>price</p>
            </div>
         <a href="playlist.php?get_id=" class="inline-btn">view playlist</a>
      </div> -->
   </div>
</section>
<?php $this->view('inc/footer') ?>
</body>
</html>