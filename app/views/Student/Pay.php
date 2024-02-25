<?php $this->view('inc/Header', $data); ?>

<section class="courses">
  <h1 class="heading">Upgarade to premium student</h1>
  <section class="form-container" style="display: block;">


    <form >
      <?php if(isset($data['premiumdata'])){
        $premiumdata = $data['premiumdata'];
      
      } ?>

      <!-- section for general overview -->

      <section id="general" style="display: block;">
        
        <div class="flex">
          <div class="col">
            <!-- form heading -->
            <h3>Payment Confirmation</h3>
          <p>First Name<span>*</span></p>
            <input type="text" value="<?php if(isset($premiumdata)){echo $premiumdata->fname;} ?>" disabled class="box">
            <p>Last Name<span>*</span></p>
            <input type="text" value="<?php if(isset($premiumdata)){echo $premiumdata->lname;} ?>" disabled class="box">
        
            <!-- contact number -->
            <p>Contact Number<span>*</span></p>
            <input type="text" value="<?php if(isset($premiumdata)){echo $premiumdata->cno;} ?>" disabled class="box">
          
            <!-- adress -->
            <p>Address<span>*</span></p>
            <input type="text" value="<?php if(isset($premiumdata)){echo $premiumdata->address;} ?>" disabled class="box">

           
            <!-- city -->
            <p>City<span>*</span></p>
            <input type="text" value="<?php if(isset($premiumdata)){echo $premiumdata->city;} ?>" disabled class="box">
            
            <!-- email -->
            <p>Email<span>*</span></p>
            <input type="text" value="<?php echo $_SESSION['USER_DATA']['email'] ?>" disabled class="box">
           
            <!-- amount -->
            <p>Amount<span>*</span></p>
            <input type="text" value="1000.00 LKR" disabled class="box">
           



            
          </div>
        </div>
        
        
      </section>
      

      <!-- section for content -->
      

     




    </form>
    <div style="display: flex; flex-direction:row-reverse">
          <button  class="btn" style="width: fit-content;" onclick="pay();">Confirm Payment
           <i class="fa-solid fa-arrow-right"></i></button>
        </div>

  </section>
</section>





<script>
   

    payhere.onCompleted = function onCompleted() {
        console.log("Payment completed. OrderID:");
        // Note: validate the payment and show success or failure page to the customer
    };

    // Payment window closed
    payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
    };

    // Error occurred
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:"  + error);
    };
    var payment = <?php echo  $data['payment']; ?>;

    function pay(){
        payhere.startPayment(payment);
    }




</script>
<?php $this->view('inc/Footer'); ?>
</body>
</html>
