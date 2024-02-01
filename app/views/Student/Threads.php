<?php $this->view('inc/header',$data) ?>

<link rel="stylesheet" href="<?=URLROOT?>/assets/css/student/threads.css">

<section class="dashboard">

    <h1 class="heading">Hello <?php echo $_SESSION['USER_DATA']['username'];?>!</h1>

    <div class="forum">
        <div class="forum-header">
            <h3>Categories</h3>
            <input type="text" placeholder="search">
        </div>
    </div>

    <div class="thread">

    </div>
    

</section>



<script src="<?=URLROOT?>/assets/js/student/threads.js"></script>

<?php $this->view('inc/footer') ?>


<script src="https://kit.fontawesome.com/3f6144a6ea.js" crossorigin="anonymous"></script>
</body>

</html>