<?php $this->view('inc/Header',$data) ?>
<section class="courses">
    <h1 class="heading">Hello <?php echo $_SESSION['USER_DATA']['username'];?>!</h1>
   

        <div class="ongoing">
            
        <h1 class="heading">Kinematics</h1>
                <div class="percent">
                    <svg>
                        <circle cx="70" cy="70" r="70"></circle>
                        <circle style=" stroke-dashoffset:calc(440 - (440 * 20) / 100); stroke:#03a9f4;" cx="70" cy="70" r="70"></circle>
                    </svg>
                    <div class="num">
                        <h2>50<span>%</span></h2>
                    </div>
                </div>
                <h2 class="text">Progress</h2>
            </div>

</section>
<?php $this->view('inc/Footer') ?>
</body>
</html>