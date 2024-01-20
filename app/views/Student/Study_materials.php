<?php $this->view('inc/header',$data) ?>


<?php include 'components/user_header.php'; ?>

<!-- courses section starts  -->

<section class="courses">

   <h1 class="heading">all courses</h1>

   <div class="box-container">


      <div class="box">
         <div class="tutor">
            <img src="uploaded_files/" alt="">
            <div>
               <h3>test</h3>
               <span>test</span>
            </div>
         </div>
         <img src="uploaded_files/" class="thumb" alt="">
         <h3 class="title">test</h3>
         <a href="playlist.php?get_id" class="inline-btn">view playlist</a>
      </div>
 

   </div>

</section>

<!-- courses section ends -->












<!-- custom js file link  -->
<script src="js/script.js"></script>
   

</html>



<?php $this->view('inc/footer') ?>



</body>

</html>