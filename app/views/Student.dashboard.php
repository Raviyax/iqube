<?php  $this->view('inc/header',$data) ?>
<link rel="stylesheet" href="<?php echo URLROOT;?>/assets/css/Student.dashboard.css">
<body>
    <div class="container">
        <!-- start of sidebar -->
        <?php $this->view('inc/student.sidebar',$data) ?>
        <!-- end of sidebar -->

        <!-- start of main part -->
        <div id="main" class="main">
            <!-- start of navbar -->
            <?php $this->view('inc/navbar',$data) ?>
            <!-- end of navbar -->
        </div>
    </div>
    <?php $this->view('inc/footer') ?>