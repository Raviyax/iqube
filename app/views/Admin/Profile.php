<?php $this->view('inc/header',$data) ?>
<section class="tutor-profile" style="min-height: calc(100vh - 19rem);">
   <h1 class="heading">IQube Admin Profile</h1>
   <div class="details">
      <div class="tutor">
         <img src="<?php echo URLROOT?>/assets/img/Landing/user.jpg" alt="profile" >
         <h3><?php echo ucwords($_SESSION['USER_DATA']['username']);?></h3>
            <span><?php echo ($_SESSION['USER_DATA']['email']);?></span>
         <a class="inline-btn" onclick="openedit()"><i class="fa-solid fa-user-pen" ></i> Edit Admin Profile</a>
         <a href="" class="inline-btn"><i class="fa-solid fa-lock"></i> Change Password</a>
      </div>
   </div>
</section>
<div id="editprofile" class="overlay">
    <section class="video-form">
        <form action="<?php echo URLROOT?>/Admin/profile" method="post" enctype="multipart/form-data">
            <div class="flex-btn" style="justify-content: flex-end;">
                <button class="option-btn" onclick="closeedit()" style="width: fit-content;" background-color:rgba(0, 0, 0, 0);><i class="fa-solid fa-xmark"></i></button>
            </div>
            <h1 class="heading">Edit Admin Profile</h1>
            <div class="profile">
<img src="<?php echo URLROOT?>/assets/img/Landing/user.jpg" alt="">
</div>
            <p>Email</p>
            <input type="email" maxlength="100" required placeholder="Enter Email" value="<?php echo  $_SESSION['USER_DATA']['email'];?>" class="box" >
            <p>Username</p>
            <input type="text" name="username" maxlength="100" required placeholder="Enter username" class="box" value="<?php echo  $_SESSION['USER_DATA']['username'];?>">
            <input type="submit" value="Save" name="submit" class="btn">
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