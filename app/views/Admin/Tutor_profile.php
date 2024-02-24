<?php $this->view('inc/Header',$data) ?>
<?php $tutor = $data['tutor'];?>
<section class="tutor-profile" style="min-height: calc(100vh - 19rem);">
   <h1 class="heading"><?php echo $tutor->fname." ".$tutor->lname;?>'s Personal Profile</h1>
   <div class="details">
      <div class="tutor">
         <img src=<?php echo URLROOT."/Admin/userimage/". $data['tutor']->image?> alt="profile" >
         <h3><?php echo $tutor->fname." ".$tutor->lname;?></h3>
            <span><?php echo ucfirst($tutor->subject)?>  Tutor </span>
         <a href="" class="inline-btn"><i class="fa-solid fa-lock"></i> Change Password</a>
      </div>
      <div class="flex">
            <div class="box">
                <span>Username</span>
                <p><?php echo $tutor->username;?></p>
            </div>
            <div class="box">
                <span>Firstname</span>
                <p><?php echo  $tutor->fname;?></p>
            </div>
            <div class="box">
                <span>Lastname</span>
                <p><?php echo  $tutor->lname;?></p>
            </div>
            <div class="box">
                <span>Joined At</span>
                <p>date eka danna oni</p>
            </div>
         <div class="box">
            <span>Email</span>
            <p><?php echo  $tutor->email;?></p>
         </div>
         <div class="box">
            <span>Subject</span>
            <p><?php echo  ucfirst($tutor->subject);?></p>
         </div>
         <div class="box">
            <span>Contact Number</span>
            <p><?php echo  $tutor->cno;?></p>
         </div>
      </div>
   </div>
</section>
<?php $this->view('inc/Footer') ?>
</body>
</html>