<?php $this->view('inc/Header',$data) ?>

<?php
$student_count = $data['student_count'];
$content_count = $data['content_count'];
$purchase_count = $data['purchase_count'];
$last_month_earnings = $data['last_month_earnings'];

?>
<section class="tutor-profile" style="min-height: calc(100vh - 19rem);">
   <div class="details">

      <div class="flex">
            <div class="box">
                <p><i class="fa-solid fa-star"></i> 4.7 Tutor Ratings</p>
            </div>
      
            <div class="box">
                <p><i class="fa-solid fa-people-line"></i> <?php echo $student_count;?> Students</p>
            </div>
            <div class="box">
                <p><i class="fa-solid fa-circle-play"></i> <?php echo $content_count;?> Contents</p>
            </div>
            <div class="box">
                <p><i class="fa-solid fa-cart-shopping"></i> <?php echo $purchase_count;?> Total Purchases</p>
            </div>
            <div class="box">
                <p><i class="fa-solid fa-money-bill"></i> <?php echo $last_month_earnings;?>LKR Last Month Earnings</p>
            </div>
      </div>
   </div>

</section>
<?php $this->view('inc/Footer') ?>
</body>
</html>