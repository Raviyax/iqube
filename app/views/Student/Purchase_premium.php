<?php $this->view('inc/Header', $data); ?>
<section class="courses">
  <h1 class="heading">Upgarade to premium student</h1>
  <section class="form-container" style="display: block;">
    <form action="<?php echo URLROOT ?>/Student/purchase_premium" method="post" enctype="multipart/form-data">
      <!-- section for general overview -->
      <section id="general" style="display: block;">
        <div class="flex">
          <div class="col">
            <!-- form heading -->
            <h3>Enter your personal details </h3>
          <p>First Name<span>*</span></p>
            <input type="text" name="fname" placeholder="Example : Saman" maxlength="50" required class="box">
            <p>Last Name<span>*</span></p>
            <input type="text" name="lname" placeholder="Example : Perera" class="box"> 
            <!-- contact number -->
            <p>Contact Number<span>*</span></p>
            <input type="text" name="cno" placeholder="Example : 0712345678" class="box">
            <!-- adress -->
            <p>Address<span>*</span></p>
            <input type="text" name="address" placeholder="Example : UCSC Building Complex, 35, Reid Avenue" class="box">
            <!-- city -->
            <p>City<span>*</span></p>
            <input type="text" name="city" placeholder="Example : colombo" class="box">
            <!-- amount -->
            <p>Amount<span>*</span></p>
            <input type="text" value="1000.00 LKR" disabled class="box">
          </div>
        </div>
        <div style="display: flex; flex-direction:row-reverse">
          <button type="submit" class="btn" style="width: fit-content;" name="next-to-confirmation">Next <i class="fa-solid fa-arrow-right"></i></button>
        </div>
      </section>
      <!-- section for content -->
    </form>
  </section>
</section>
<script>
    // payhere.onCompleted = function onCompleted() {
    //     console.log("Payment completed. OrderID:");
    //     // Note: validate the payment and show success or failure page to the customer
    // };
    // // Payment window closed
    // payhere.onDismissed = function onDismissed() {
    //     // Note: Prompt user to pay again or show an error page
    //     console.log("Payment dismissed");
    // };
    // // Error occurred
    // payhere.onError = function onError(error) {
    //     // Note: show an error page
    //     console.log("Error:"  + error);
    // };
    // var payment = ;
    // function pay(){
    //     payhere.startPayment(payment);
    // }
</script>
<?php $this->view('inc/Footer'); ?>
</body>
</html>
