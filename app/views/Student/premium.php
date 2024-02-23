<?php $this->view('inc/header',$data) ?>
<section class="about">

<div class="row">

   <div class="image">
      <img src="<?php echo URLROOT;?>/assets/img/iqube.png" alt="">
   </div>

   <div class="content">
    <form action="<?php echo URLROOT;?>/Student/purchase_premium" method="post">
      <h3>Why IQube Premium?</h3>
 
        <p>Get access to personalized study plan</p>
        <p>Get access to progress tracking</p>
        <p>Get access to expert teachers</p>
        <p>Get access to 24/7 support</p>
        <p>Just for 1000 LKR</p>

      
        <button type="submit" class="inline-btn" name="premium">Upgrade to Premium</button>
    </form>

   </div>

</div>

<div class="box-container">

   <div class="box">
      <i class="fas fa-graduation-cap"></i>
      <div>
         <h3>+1k</h3>
         <span>online courses</span>
      </div>
   </div>

   <div class="box">
      <i class="fas fa-user-graduate"></i>
      <div>
         <h3>+25k</h3>
         <span>brilliants students</span>
      </div>
   </div>

   <div class="box">
      <i class="fas fa-chalkboard-user"></i>
      <div>
         <h3>+5k</h3>
         <span>expert teachers</span>
      </div>
   </div>

   <div class="box">
      <i class="fas fa-briefcase"></i>
      <div>
         <h3>100%</h3>
         <span>job placement</span>
      </div>
   </div>

</div>

</section>
<?php $this->view('inc/footer') ?>
</body>
</html>