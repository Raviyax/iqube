<?php $this->view('inc/header',$data) ?>
<?php $tutor = $data['tutor'];?>
<section class="tutor-profile" style="min-height: calc(100vh - 19rem);">
   <h1 class="heading"><?php echo $_SESSION['USER_DATA']['subject'];?> Tutors > <?php echo $tutor->fname." ".$tutor->lname;?>'s Profile</h1>
   <div class="details">
      <div class="tutor">
         <img src="<?php echo URLROOT."/Subjectadmin/userimage/". $data['tutor']->image;?>"alt="profile" >
         <h3><?php echo $tutor->fname." ".$tutor->lname;?></h3>
            <span></span>
         <a href="" class="inline-btn"><i class="fa-solid fa-lock"></i> Change <?php echo $tutor->fname;?>'s' Password</a>
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
            <a onclick="openedit()" class="inline-btn"><i class="fa-solid fa-envelope"></i> Change Email</a>
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
<div id="editprofile" class="overlay">
    <section class="video-form">
        <form action="<?php echo URLROOT?>/subjectadmin/tutor_profile/<?php echo $tutor->tutor_id?>" method="post" enctype="multipart/form-data">
            <div class="flex-btn" style="justify-content: flex-end;">
                <a class="option-btn" onclick="closeedit()" style="width: fit-content;" background-color:rgba(0, 0, 0, 0);><i class="fa-solid fa-xmark"></i></a>
            </div>
            <h1 class="heading">Change <?php echo  ucfirst($tutor->fname);?>'s Email</h1>
            <div class="profile">

</div>
            <p>New Email</p>
            <input type="email" maxlength="100" required placeholder="New Email" class="box" name = "email">
            <p>Confirm Email</p>
            <input type="email" maxlength="100" required placeholder="Confirm Email" name="confirmemail" class="box">
            <p>Your Password</p>
            <input type="password" maxlength="100" required placeholder="Password" name="subjectadminpassword" class="box">


         <input type="submit" value="Change Email" name="changeemail" class="btn">
        </form>
    </section>
</div>
<script>
    function openedit() {
        document.getElementById("editprofile").style.display = "block";
    }
    function closeedit() {
        document.getElementById("editprofile").style.display = "none";
    }
</script>
<?php $this->view('inc/footer') ?>
</body>
</html>