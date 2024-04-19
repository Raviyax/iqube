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
      <div class="description"><p><?php echo $video->description?></p></div>
      <a href="<?php echo URLROOT;?>/student/do_questions_of_video/<?php echo $video->video_content_id;?>" class="inline-btn">Try Questions</a>
      <div class="tutor">
         <img src="<?php echo URLROOT;?>/student/userimage/<?php echo $video->tutor_image?>" alt="">
         <div>
            <h3><?php echo $video->tutor;?></h3>
            <span>review</span>
         </div>
      </div>
      <form action="" method="post" class="flex">
         <input type="hidden" name="content_id" value="id">
         <button type="submit" name="like_content"><i class="far fa-heart"></i><span>like</span></button>
      </form>
   </div>
</section>
<!-- watch video section ends -->
<!-- comments section starts  -->
<section class="comments">
   <h1 class="heading">add a comment</h1>
   <form action="" method="post" class="add-comment">
      <input type="hidden" name="content_id" value="<?= $get_id; ?>">
      <textarea name="comment_box" required placeholder="write your comment..." maxlength="1000" cols="30" rows="10"></textarea>
      <input type="submit" value="add comment" name="add_comment" class="inline-btn">
   </form>
   <h1 class="heading">user comments</h1>
   <div class="show-comments">
      <div class="box" style="">
         <div class="user">
            <img src="" alt="">
            <div>
               <h3>name</h3>
               <span>date</span>
            </div>
         </div>
         <p class="text">comment</p>
         <form action="" method="post" class="flex-btn">
            <input type="hidden" name="comment_id" value="<?= $fetch_comment['id']; ?>">
            <button type="submit" name="edit_comment" class="inline-option-btn">edit comment</button>
            <button type="submit" name="delete_comment" class="inline-delete-btn" onclick="return confirm('delete this comment?');">delete comment</button>
         </form>
      </div>
      </div>
</section>
<?php $this->view('inc/Footer') ?>