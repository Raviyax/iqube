<?php $this->view('inc/Header', $data) ?>
<?php $subunit = $data['about_subunit'];
$completed = $data['completed'];
?>
<section class="dashboard">
   <h1 class="heading">Where am i on <?php echo $subunit->chapter_level_2; ?></h1>
   <section class="contents unit-container" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
      <!-- <div class="box-container" style="margin-bottom: 10px;">
         <div class="box">
            <h3>About Chapter</h3>
         </div>
      </div> -->
      <div class="chaptercontainer" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
         <ul>
            <li>
            <h2 class="heading" style="border:none;"><i class="fa-solid fa-arrow-right"></i> <b><?php echo $subunit->subject; ?></b></h2>
               <ul>
                  <li>
                     <h2 class="heading" style="border:none; margin-left:10px;"><i class="fa-solid fa-arrow-right"></i> <?php echo $subunit->chapter_level_1; ?></h2>
                  </li>
                  <li>
                     <h2 class="heading" style="border:none; margin-left:20px;"><i class="fa-solid fa-arrow-right"></i> <?php echo $subunit->chapter_level_2; ?></h2>
                  </li>
               </ul>
            </li>
         </ul>
      </div>
   </section>
</section>
<section class="tutor-profile" >
   <div class="details"  style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
      <div class="tutor">
      <h3>My Progress</h3>
      </div>
      <div class="flex">
         <?php if (!$completed) { ?>
            <div class="box" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px; cursor:pointer;" onclick="window.location.href='<?php echo URLROOT; ?>/Student/do_progress_tracking_paper/<?php echo $subunit->id; ?>'" >
               <span>Status</span>
               <p>Click to start</p>
            </div>
         <?php } else{ ?>
            <div class="box" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px; cursor:pointer;">
               <span>Status</span>
               <p>Completed</p>
            </div>
            <div class="box" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px; cursor:pointer;">
               <span>Score</span>
               <p>Completed</p>
            </div>
         <?php } ?>
         <div class="box">
            <span>Firstname</span>
            <p>rewa</p>
         </div>
         <div class="box">
            <span>Lastname</span>
            <p>argt</p>
         </div>
         <div class="box">
            <span>Joined At</span>
            <p>date eka danna oni</p>
         </div>
         <div class="box">
            <span>Email</span>
            <p>arewf</p>
         </div>
         <div class="box">
            <span>Subject</span>
            <p>rw4y5</p>
         </div>
         <div class="box">
            <span>Contact Number</span>
            <p>ewt</p>
         </div>
      </div>
   </div>
</section>
<?php $this->view('inc/Footer') ?>
</body>
</html>