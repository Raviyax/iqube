<?php $this->view('inc/Header',$data) ?>
<?php $tutor = $data['tutor'];
$student_count = $data['student_count'];
$content_count = $data['content_count'];
$purchase_count = $data['purchase_count'];

?>
<section class="tutor-profile" style="min-height: calc(100vh - 19rem);">
   <h1 class="heading">Tutors / <?php echo $tutor->fname." ".$tutor->lname;?>'s Profile</h1>
   <div class="details">
      <div class="tutor">
         <img src="<?php echo URLROOT."/Student/userimage/". $data['tutor']->image;?>"alt="profile" >
         <h3><?php echo $tutor->fname." ".$tutor->lname;?></h3>
         <h3><?php echo  ucfirst($tutor->subject);?> Tutor</h3>
         <h3>Bsc. University of colombo</h3>
            <span></span>
         <a href="" class="inline-btn"><i class="fa-regular fa-comments"></i> Talk to <?php echo $tutor->fname." ".$tutor->lname;?> </a>
      </div>
      <div class="flex">
            <div class="box">
                <p><i class="fa-solid fa-star"></i> 4.7 Tutor Ratings</p>
            </div>
      
            <div class="box">
                <p><i class="fa-solid fa-people-line"></i> <?php echo $student_count;?> Students</p>
            </div>
            <div class="box">
                <p><i class="fa-solid fa-circle-play"></i> <?php echo $content_count;?> Contents</p>
            </div>
            <div class="box">
                <p><i class="fa-solid fa-cart-shopping"></i> <?php echo $purchase_count;?> Total Purchases</p>
            </div>
      </div>
   </div>
   <div class="details">
   <div class="flex">
            <div class="box">
                <p> Stephane is a solutions architect, consultant and software developer that has a particular interest in all things related to Big Data, Cloud & API. He's also a many-times best seller instructor on Udemy for his courses in AWS and Apache Kafka.
[See FAQ below to see in which order you can take my courses]
Stéphane is recognized as an AWS Hero and is an AWS Certified Solutions Architect Professional & AWS Certified DevOps Professional. He loves to teach people how to use the AWS properly, to get them ready for their AWS certifications, and most importantly for the real world.
He also loves Apache Kafka. He sits on the 2019 Program Committee organizing the Kafka Summit in New York, London and San Francisco. He is also an active member of the Apache Kafka community, authoring blogs on Medium and a guest blog for Confluent.  
During his spare time he enjoys cooking, practicing yoga, surfing, watching TV shows, and traveling to awesome destinations!
</p>
            </div>
      </div>
   </div>
</section>
<?php $this->view('inc/Footer') ?>
</body>
</html>