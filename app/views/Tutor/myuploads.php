<?php $this->view('inc/header',$data) ?>
<section class="courses">
   <h1 class="heading">My Courses</h1>
   <div class="box-container">
      <div class="box">
         <div class="tutor">
            <img src="uploaded_files/" alt="">
            <div>
               <h3>name</h3>
               <span>date</span>
            </div>
         </div>
         <img src="uploaded_files/" class="thumb" alt="">
         <h3 class="title">title</h3>
         <a href="playlist.php?get_id=" class="inline-btn">view playlist</a>
      </div>
   </div>
</section>
<?php $this->view('inc/footer') ?>
</body>
</html>