<?php $this->view('inc/Header',$data) ?>
<?php $tutor = $data['tutor'];
$student_count = $data['student_count'];
$content_count = $data['content_count'];
$purchase_count = $data['purchase_count'];

?>
<section class="tutor-profile" style="min-height: calc(100vh - 19rem);">
   <h1 class="heading">Tutors / <?php echo $tutor->fname." ".$tutor->lname;?>'s Profile</h1>
   <div class="details">
      <div class="tutor">
         <img src="<?php echo URLROOT."/Student/userimage/". $data['tutor']->image;?>"alt="profile" >
         <h3><?php echo $tutor->fname." ".$tutor->lname;?></h3>
         <h3><?php echo  ucfirst($tutor->subject);?> Tutor</h3>
         <h3>Highest Qualification : <?php echo  ucfirst($tutor->qualification);?></h3>
   </div>
      <div class="flex">
   
      
            <div class="box">
                <p><i class="fa-solid fa-people-line"></i> <?php echo $student_count;?> Students</p>
            </div>
            <div class="box">
                <p><i class="fa-solid fa-circle-play"></i> <?php echo $content_count;?> Contents</p>
            </div>
            <div class="box">
                <p><i class="fa-solid fa-cart-shopping"></i> <?php echo $purchase_count;?> Total Purchases</p>
            </div>
      </div>
   </div>
   <div class="details">
   <div class="flex">
            <div class="box">
               <span>About Me</span>
                <p><?php if($tutor->about_me == ""){echo "No Information Available";}else{echo $tutor->about_me;}?></p>
            </div>
      </div>
   </div>
</section>
<?php $this->view('inc/Footer') ?>
</body>
</html>