<?php $this->view('inc/Header',$data) ?>
<?php $video = $data['video']; ?> 
<section class="watch-video">
<h1 class="heading">Study materials / video / <?php echo $video->name?></h1>
   <div class="video-details">
      <video src="<?php echo URLROOT;?>/student/retrieve_video/<?php echo $video->video;?>" class="video" poster="<?php echo URLROOT;?>/student/video_thumbnail/<?php echo $video->thumbnail;?>" controls></video>
      <h3 class="title"><?php echo $video->name?></h3>
      <div class="info">
         <p><i class="fas fa-calendar"></i><span><?php echo $video->date;?></span></p>
         <p><i class="fas fa-heart"></i><span>likes</span></p>
      </div>
      <?php if(!$data['is_rated'] && $data['is_completed']){ ?>
         <form class="rating">
  <label>
    <input type="radio" name="stars" value="1" />
    <span class="icon">★</span>
  </label>
  <label>
    <input type="radio" name="stars" value="2" />
    <span class="icon">★</span>
    <span class="icon">★</span>
  </label>
  <label>
    <input type="radio" name="stars" value="3" />
    <span class="icon">★</span>
    <span class="icon">★</span>
    <span class="icon">★</span>   
  </label>
  <label>
    <input type="radio" name="stars" value="4" />
    <span class="icon">★</span>
    <span class="icon">★</span>
    <span class="icon">★</span>
    <span class="icon">★</span>
  </label>
  <label>
    <input type="radio" name="stars" value="5" />
    <span class="icon">★</span>
    <span class="icon">★</span>
    <span class="icon">★</span>
    <span class="icon">★</span>
    <span class="icon">★</span>
  </label>
</form>
<?php } ?>
      <div class="description"><p><?php echo $video->description?></p></div>
      <a href="<?php echo URLROOT;?>/student/do_questions_of_video/<?php echo $video->video_content_id;?>" class="inline-btn">Try Questions</a>
      <?php if($data['is_completed']){ ?>
      <a href="<?php echo URLROOT;?>/student/video_results/<?php echo $video->video_content_id;?>" class="inline-btn">Result & Answers</a>
    
      <?php } ?>
      <div class="tutor">
         <img src="<?php echo URLROOT;?>/student/userimage/<?php echo $video->tutor_image?>" alt="">
         <div>
            <h3><?php echo $video->tutor;?></h3>
         </div>
      </div>
   
   </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
   const url = "<?php echo URLROOT;?>/api.php";
   const video_id = "<?php echo $video->video_content_id;?>";

   $(document).ready(function(){
      $(".rating input:radio").attr("checked", false);

      $('.rating input').click(function () {
         $(".rating span").removeClass('checked');
         $(this).parent().find('span').addClass('checked');
         var rating = $(this).val();
         $.ajax({
            url: url,
            type: 'POST',
            data: {
               video_id: video_id,
               rating: rating,
               action: 'rate_video'
            },
            success: function(response){
               console.log(response);
               alert("Rated successfully");
               location.reload();
            }
         });
      });
   });
</script>


<?php $this->view('inc/Footer') ?>