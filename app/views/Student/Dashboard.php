<?php $this->view('inc/Header',$data) ?>
<section class="courses">
    <h1 class="heading">Hello <?php echo $_SESSION['USER_DATA']['username'];?>!</h1>
    <div class="box-container">
        <div class="box">
            <h3>test</h3>
            <?php print_r($_SESSION['USER_DATA']) ?>
            <p>test</p>
        </div>
    </div>
</section>
<?php $this->view('inc/Footer') ?>
</body>
</html>