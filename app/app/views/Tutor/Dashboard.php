<?php $this->view('inc/Header', $data) ?>

<?php
$student_count = $data['student_count'];
$content_count = $data['content_count'];
$purchase_count = $data['purchase_count'];
$last_month_earnings = $data['last_month_earnings'];

?>
<section class="dashboard">
    <section class="tutor-profile" >
        <div class="details">

            <div class="flex">
                <div class="box">
                    <p><i class="fa-solid fa-star"></i> 4.7 Tutor Ratings</p>
                </div>

                <div class="box">
                    <p><i class="fa-solid fa-people-line"></i> <?php echo $student_count; ?> Students</p>
                </div>
                <div class="box">
                    <p><i class="fa-solid fa-circle-play"></i> <?php echo $content_count; ?> Contents</p>
                </div>
                <div class="box">
                    <p><i class="fa-solid fa-cart-shopping"></i> <?php echo $purchase_count; ?> Total Purchases</p>
                </div>
                <div class="box">
                    <p><i class="fa-solid fa-money-bill"></i> <?php echo $last_month_earnings; ?>LKR Last Month Earnings</p>
                </div>
            </div>
        </div>

    </section>

    <section class="contents unit-container" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
        <h1 class="heading">Analytics</h1>
        <div class="flex-btn" style="flex-direction: row; align-items: center; justify-content: center;">

            <button id="" class="button-17" role="button">Videos</button>
            <button id="" class="button-17" role="button">Model Papers</button>

        </div>
        <section class="unit-container" id="video">
            <!-- table for tutor contents -->
            <table id="table" class="table">
                <thead>
                    <tr>
                    
                        <th>Video Name</th>
                        <th>Purchases</th>
                        <th>Rating</th>
                        <th>Price</th>
                        <th>Revenue</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
             
                </tbody>
            </table>


        </section>

    </section>
</section>
<?php $this->view('inc/Footer') ?>
</body>

</html>