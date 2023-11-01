
<?php  $this->view('inc/header',$data) ?>
<link rel="stylesheet" href="<?php echo URLROOT;?>/assets/css/Landing.css">
<body>
    <div class="container"> 
    <?php $this->view('inc/sidebar') ?>

        <!-- start of main part -->
        <div id="main" class="main">
            <!-- start of navbar -->
            <?php $this->view('inc/navbar') ?>
            <!-- end of navbar -->
             <!-- start -->
    
    
      <div id="home-sec" class="homemain">
        <div class="eye-grabber-img">
          <img src="<?php echo URLROOT;?>/assets/img/Landing/iqube.png" alt="" />
        </div>
        <div class="eye-grabber">
          <h1>A Personalized Learning Hub</h1>
          <h2>
            iQube is a platform for your academic personalization. As students of Advanced Level, it is not generally an easy task .
          </h2>
          <button class="btn" onclick="window.location.href='<?=URLROOT?>/Login';">
            Guide Me
          </button>
        </div>
      </div>

             

        </div>
    </div>

    
    <?php $this->view('inc/footer') ?>