<?php $this->view('inc/header',$data) ?>

<section class="dashboard">

    <h1 class="heading">Purchase Premium</h1>
    

    <div class="box-container">

        <div class="box">
           
            <a href="<?php echo URLROOT?>/Student/Signup_premium" class="btn">Signup to Premium</a>
            <form action="<?php echo URLROOT?>/Student/purchase_premium" method="post">
            <button href="#" class="btn" name="pay">Pay</button>
            </form>


            
        </div>







    </div>

    </div>

</section>















<?php $this->view('inc/footer') ?>



</body>

</html>