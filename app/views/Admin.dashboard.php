<?php $data['title'] = 'Tutor Dashboard'; $this->view('inc/header',$data) ?>
<link rel="stylesheet" href="<?php echo URLROOT;?>/assets/css/Tutor.dashboard.css">
<body>
    <div class="container">
        <!-- start of sidebar -->
        <?php $this->view('inc/admin.sidebar',$data) ?>
        <!-- end of sidebar -->

        <!-- start of main part -->
        <div id="main" class="main">
            <!-- start of navbar -->
            <?php $this->view('inc/navbar',$data) ?>
            <!-- end of navbar -->
        </div>
    </div>
    <?php $this->view('inc/footer') ?>