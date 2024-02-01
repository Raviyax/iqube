<?php $this->view('inc/header',$data) ?>

<section class="dashboard">

    <h1 class="heading"><?php echo ucwords($data['view']);?></h1>
    

    <div class="box-container">

        <div class="box">
            <h3>test</h3>
            <p>test</p>
            <a href="#" class="btn"><?php echo $_SESSION['USER_DATA']['subject'];?></a>
        </div>







    </div>

    </div>

</section>















<?php $this->view('inc/footer') ?>



</body>

</html>