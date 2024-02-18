<?php $this->view('inc/header',$data) ?>
<section class="dashboard">
    <h1 class="heading">Purchase Premium</h1>
    <div class="box-container">
        <!-- purchase_premium.php -->
        <div class="box">
    <h2>Purchase Premium</h2>
    <form action="<?php echo URLROOT?>/Student/purchase_premium" method="post">
        <label for="card_number">Card Number:</label>
        <input type="text" id="card_number" name="card_number" required>
        <label for="expiry_date">Expiry Date:</label>
        <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YYYY" required>
        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv" required>
        <button type="submit" class="btn" name="pay">Pay Now</button>
    </form>
</div>
    </div>
    </div>
</section>
<?php $this->view('inc/footer') ?>
</body>
</html>