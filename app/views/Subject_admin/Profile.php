<?php $this->view('inc/header',$data) ?>



   
<section class="tutor-profile" style="min-height: calc(100vh - 19rem);"> 

   <h1 class="heading">My Profile</h1>

   <div class="details">
      <div class="tutor">
         <img src="../uploaded_files/" alt="">
         <h3><?php echo ucwords($_SESSION['USER_DATA']['fname']." ".$_SESSION['USER_DATA']['lname']);?></h3>
         
            
            <span></span>
            
         <a href="update.php" class="inline-btn">update profile</a>
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

















<?php $this->view('inc/footer') ?>



</body>

</html>