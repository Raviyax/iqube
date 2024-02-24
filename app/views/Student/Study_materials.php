<?php $this->view('inc/Header',$data) ?>
<section class="contents">
   <h1 class="heading">your contents</h1>
   <div class="box-container">
      <div class="box">
         <div class="flex">
            <div><i class="fas fa-dot-circle" style="color:limegreen"></i><span style="color:red">Active</span></div>
            <div><i class="fas fa-calendar"></i><span>2002-05-10</span></div>
         </div>
         <img src="<?php echo URLROOT;?>/assets/img/iqube.png" class="thumb" alt="">
         <h3 class="title">Test title</h3>
         <form action="" method="post" class="flex-btn">
            <input type="hidden" name="video_id" value="1">
            <input type="submit" value="delete" class="delete-btn" onclick="return confirm('delete this video?');" name="delete_video">
         </form>
         <a href="view_content.php?get_id=<?= $video_id; ?>" class="btn">view content</a>
      </div>
   </div>
</section>
<?php $this->view('inc/Footer') ?>
</body>
</html>