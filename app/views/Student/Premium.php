<?php $this->view('inc/Header',$data) ?>
<section class="about">
<div class="row">
   <div class="image">
      <img src="<?php echo URLROOT;?>/assets/img/iqube.png" alt="">
   </div>
   <div class="content">
    <form action="<?php echo URLROOT;?>/Student/purchase_premium" method="post">
      <h3>Why IQube Premium?</h3>
        <p>Get access to progress tracking</p>
        <p>Get access to expert teachers</p>
        <p>Get access to 24/7 support</p>
        <p>Just for 1000 LKR</p>
        <button type="submit" class="inline-btn" name="premium">Upgrade to Premium</button>
    </form>
   </div>
</div>

</section>
<?php $this->view('inc/Footer') ?>
</body>
</html>
