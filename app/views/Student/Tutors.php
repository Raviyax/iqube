<?php $this->view('inc/header',$data) ?>

<link rel="stylesheet" href="<?=URLROOT?>/assets/css/student/tutors.css">

<section class="dashboard">

    <h1 class="heading">Hello <?php echo $_SESSION['USER_DATA']['username'];?>!</h1>

    <div class="grid">
        <div class="tutor">
            <img src="#" alt="">
            
        </div>
    </div>






</section>

    



<script src="<?=URLROOT?>/assets/js/student/tutors.js"></script>

<?php $this->view('inc/footer') ?>



</body>

</html>