<?php $this->view('inc/Header',$data) ?>
<section class="tutor-profile" style="min-height: calc(100vh - 19rem);">
   <h1 class="heading">My Profile</h1>
   <div class="details">
      <div class="tutor">
         <img src=<?php echo "data:image/jpg;base64,".$_SESSION['USER_DATA']['image'];?> alt="profile" >
         <h3><?php echo ucwords($_SESSION['USER_DATA']['fname']." ".$_SESSION['USER_DATA']['lname']);?></h3>
            <span></span>
         <a class="inline-btn" onclick="openedit()"><i class="fa-solid fa-user-pen" ></i> Edit Profile</a>
         <a href="" class="inline-btn"><i class="fa-solid fa-lock"></i> Change Password</a>
      </div>
      <div class="flex">
            <div class="box">
                <span>Username</span>
                <p><?php echo  $_SESSION['USER_DATA']['username'];?></p>
            </div>
            <div class="box">
                <span>Firstname</span>
                <p><?php echo  $_SESSION['USER_DATA']['fname'];?></p>
            </div>
            <div class="box">
                <span>Lastname</span>
                <p><?php echo  $_SESSION['USER_DATA']['lname'];?></p>
            </div>
            <div class="box">
                <span>Joined At</span>
                <p><?php echo  $_SESSION['USER_DATA']['created_at'];?></p>
            </div>
         <div class="box">
            <span>Email</span>
            <p><?php echo  $_SESSION['USER_DATA']['email'];?></p>
         </div>
         <div class="box">
            <span>Subject</span>
            <p><?php echo  ucfirst($_SESSION['USER_DATA']['subject']);?></p>
         </div>
         <div class="box">
            <span>Contact Number</span>
            <p><?php echo  $_SESSION['USER_DATA']['cno'];?></p>
         </div>
      </div>
   </div>
</section>
<div id="editprofile" class="overlay">
    <section class="video-form">
        <form action="<?php echo URLROOT?>/tutor/profile" method="post" enctype="multipart/form-data">
            <div class="flex-btn" style="justify-content: flex-end;">
                <button class="option-btn" onclick="closeedit()" style="width: fit-content;" background-color:rgba(0, 0, 0, 0);><i class="fa-solid fa-xmark"></i></button>
            </div>
            <h1 class="heading">Edit My Profile</h1>
            <div class="profile">
<img src="<?php echo "data:image/jpg;base64,".$_SESSION['USER_DATA']['image'];?>" alt="">
 <p style="text-align: center;">Change Profile Picture</p>
      <input type="file" name="image" accept="image/*"  class="box">
</div>
            <p>Firstname</p>
            <input type="text" name="fname" maxlength="100" required placeholder="Enter first name" class="box" value="<?php echo  $_SESSION['USER_DATA']['fname'];?>">
            <p>Lastname</p>
            <input type="text" name="lname" maxlength="100" required placeholder="Enter Last Name" class="box" value="<?php echo  $_SESSION['USER_DATA']['lname'];?>">
            <p>Email</p>
            <input type="email" maxlength="100" required placeholder="<?php echo  $_SESSION['USER_DATA']['email'];?>" class="box" disabled >
            <p>Contact Number</p>
            <input type="text" name="cno" maxlength="100" required placeholder="Enter Contact Number" class="box" value="<?php echo  $_SESSION['USER_DATA']['cno'];?>">
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
<?php $this->view('inc/Footer') ?>
</body>
</html>