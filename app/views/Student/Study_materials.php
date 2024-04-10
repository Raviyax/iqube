<?php $this->view('inc/Header',$data) ?>
<section class="contents">
   <h1 class="heading">Study Materials</h1>
   <div class="box-container">
      <a href="">
      <div class="box" style="cursor: pointer;">
         <div class="flex">
            <div><i class="fas fa-dot-circle" style="color:limegreen"></i><span style="color:red">Active</span></div>
            <div><i class="fas fa-calendar"></i><span>2002-05-10</span></div>
         </div>
         <img src="<?php echo URLROOT;?>/assets/img/iqube.png" class="thumb" alt="">
         <h3 class="title">Name</h3>
        
         <h2 class="type">Tutor</h2>
         <p ><i class="fa-solid fa-star-half-stroke"></i> 4.2</p>
      </div>
      </a>
   </div>
</section>
<?php $this->view('inc/Footer') ?>
</body>
</html>