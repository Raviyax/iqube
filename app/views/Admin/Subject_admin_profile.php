<?php $this->view('inc/header',$data) ?>
<?php $subjectadmin = $data['subjectadmin'];?>




   
<section class="tutor-profile" style="min-height: calc(100vh - 19rem);"> 

   <h1 class="heading"><?php echo $subjectadmin->fname." ".$subjectadmin->lname;?>'s Personal Profile</h1>

   <div class="details">
      <div class="tutor">
    
        
        
         <img src=<?php echo URLROOT."/Admin/userimage/". $data['subjectadmin']->image?> alt="profile" >
         

         <h3><?php echo $subjectadmin->fname." ".$subjectadmin->lname;?></h3>
         
            
            <span><?php echo ucfirst($subjectadmin->subject)?>Tutor </span>
            
         <a class="inline-btn" onclick="openedit()"><i class="fa-solid fa-user-pen" ></i> Edit <?php echo $subjectadmin->fname."'s"?> Profile</a>
         <a href="" class="inline-btn"><i class="fa-solid fa-lock"></i> Change Password</a>
      </div>
      <div class="flex">
            <div class="box">
                <span>Username</span>
                <p><?php echo $subjectadmin->username;?></p>

            </div>

            <div class="box">
                <span>Firstname</span>
                <p><?php echo  $subjectadmin->fname;?></p>

            </div>
            <div class="box">
                <span>Lastname</span>
                <p><?php echo  $subjectadmin->lname;?></p>
            </div>

            <div class="box">
                <span>Joined At</span>
                <p>date eka danna oni</p>
            </div>



        

         <div class="box">
            <span>Email</span>
            <p><?php echo  $subjectadmin->email;?></p>
            
         </div>
         <div class="box">
            <span>Subject</span>
            <p><?php echo  ucfirst($subjectadmin->subject);?></p>
          
         </div>
         <div class="box">
            <span>Contact Number</span>
            <p><?php echo  $subjectadmin->cno;?></p>
      
         </div>
      
      </div>
   </div>

</section>

<div id="editprofile" class="overlay">
    <section class="video-form">


        <form action="<?php echo URLROOT?>/admin/Subject_admin_profile/<?php echo $subjectadmin->subject_admin_id;?>" method="post" enctype="multipart/form-data">
            <div class="flex-btn" style="justify-content: flex-end;">


                <a class="option-btn" onclick="closeedit()" style="width: fit-content;" background-color:rgba(0, 0, 0, 0);><i class="fa-solid fa-xmark"></i></a>
            </div>
            <h1 class="heading">Edit <?php echo $subjectadmin->fname." ".$subjectadmin->lname;?> Profile</h1>

            <div class="profile">

<img src="<?php echo "data:image/jpg;base64,".$data['profilepic'];?>" alt="">




      



</div>
            <p>Firstname</p>
            <input type="text" name="fname" maxlength="100" required placeholder="Enter first name" class="box" value="<?php echo  $subjectadmin->fname;?>">
            <p>Lastname</p>
            <input type="text" name="lname" maxlength="100" required placeholder="Enter Last Name" class="box" value="<?php echo  $subjectadmin->lname;?>">
            <p>Email</p>
            <input type="email" name="email" maxlength="100" required placeholder="Enter Email" class="box" value="<?php echo  $subjectadmin->email;?>">

            <p>Contact Number</p>
            <input type="text" name="cno" maxlength="100" required placeholder="Enter Contact Number" class="box" value="<?php echo  $subjectadmin->cno;?>">

            <p>Username</p>
            <input type="text" name="username" maxlength="100" required placeholder="Enter username" class="box" value="<?php echo  $subjectadmin->username;?>">
          

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