<?php $this->view('inc/Header', $data); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<section class="courses">
  <h1 class="heading">Study Materials / Videos / <?php echo $data['video']->name; ?> / Purchase Confirmation</h1>
  <section class="form-container" style="display: block;">
    <form>
      <?php if (isset($data['premiumdata'])) {
        $premiumdata = $data['premiumdata'];
        $video = $data['video'];
      } ?>
      <!-- section for general overview -->
      <section class="playlist chaptercontainer">
        <h3>Purchase Summary of Video</h3>
        <div class="row">
          <div class="col">
            <div class="tutor">
              <img src="<?php echo URLROOT; ?>/student/userimage/<?php echo $data['video']->tutor_image; ?>" alt="">
              <div>
                <h3><?php echo $data['video']->name; ?></h3>
                <p>By <?php echo $data['video']->tutor; ?></p>
                <p><?php echo $data['video']->price; ?> LKR</p>
              </div>

            </div>

          </div>
          <div class="col">
            <div class="thumb">
              <span>30 Minutes</span>
              <img src="<?php echo URLROOT; ?>/student/video_thumbnail/<?php echo $data['video']->thumbnail; ?>" alt="">
            </div>
          </div>

        </div>
      </section>

      <section id="general" style="display: block;">
        <div class="flex">
          <div class="col">
            <!-- form heading -->
            <h3>Payment Confirmation</h3>
            <p>First Name<span>*</span></p>
            <input type="text" value="<?php if (isset($premiumdata)) {
                                        echo $premiumdata->fname;
                                      } ?>" disabled class="box">
            <p>Last Name<span>*</span></p>
            <input type="text" value="<?php if (isset($premiumdata)) {
                                        echo $premiumdata->lname;
                                      } ?>" disabled class="box">
            <!-- contact number -->
            <p>Contact Number<span>*</span></p>
            <input type="text" value="<?php if (isset($premiumdata)) {
                                        echo $premiumdata->cno;
                                      } ?>" disabled class="box">
            <!-- adress -->
            <p>Address<span>*</span></p>
            <input type="text" value="<?php if (isset($premiumdata)) {
                                        echo $premiumdata->address;
                                      } ?>" disabled class="box">
            <!-- city -->
            <p>City<span>*</span></p>
            <input type="text" value="<?php if (isset($premiumdata)) {
                                        echo $premiumdata->city;
                                      } ?>" disabled class="box">
            <!-- email -->
            <p>Email<span>*</span></p>
            <input type="text" value="<?php echo $_SESSION['USER_DATA']['email'] ?>" disabled class="box">
            <!-- amount -->
            <p>Amount<span>*</span></p>
            <input type="text" value="<?php echo $data['video']->price; ?> LKR" disabled class="box">

            <input type="hidden" name="video_content_id" value="<?php echo $data['video']->video_content_id; ?>">
          </div>
        </div>
      </section>
      </form>
      <!-- section for content -->
   
    <div style="display: flex; flex-direction:row-reverse">
      <button class="btn" style="width: fit-content;" onclick="pay();" type="button">Confirm & Proceed
        <i class="fa-solid fa-arrow-right"></i></button>
    </div>
    
  </section>
</section>
<!-- 
Not the correct method to verify payment. Notify url is not working in payhere
        Therefore payment verification is done in js as follow +  -->
</body>
<script>
   payhere.onCompleted = function onCompleted() {
        // Create a FormData object and append the data you want to send
        var formData = new FormData();
        formData.append('status', 'ok');
        formData.append('video_content_id', document.querySelector('input[name="video_content_id"]').value);
        // Make a POST request using the fetch API
        fetch('<?= URLROOT ?>/student/purchase_video', {
            method: 'POST',
            body: formData,
            // Add any headers if needed (e.g., content-type)
        })
        .then(response => response.json())
        .then(data => {
            if(data.message == 'ok'){
                window.location.href = "<?= URLROOT ?>/student";
            }
            console.log(data);
        })
    };
  payhere.onDismissed = function onDismissed() {
    console.log("Payment dismissed");
  };
  payhere.onError = function onError(error) {
    console.log("Error:" + error);
  };
  var payment = <?php echo  $data['payment']; ?>;

  function pay() {
    payhere.startPayment(payment);
  }
</script>

<?php $this->view('inc/Footer'); ?>
</html>