<?php $this->view('inc/Header', $data) ?>
<?php $subunit = $data['about_subunit'];
$completed = $data['completed'];
$score = $data['score'];
?>
<section>
   <section class="dashboard">
      <h1 class="heading">Where am i on <?php echo $subunit->chapter_level_2; ?></h1>
      <section class="contents unit-container" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
         <div class="chaptercontainer" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
            <ul>
               <li>
                  <h2 class="heading" style="border:none;"><i class="fa-solid fa-arrow-right"></i> <b><?php echo $subunit->subject; ?></b></h2>
                  <ul>
                     <li>
                        <h2 class="heading" style="border:none; margin-left:10px;"><i class="fa-solid fa-arrow-right"></i> <?php echo $subunit->chapter_level_1; ?></h2>
                     </li>
                     <li>
                        <h2 class="heading" style="border:none; margin-left:20px;"><i class="fa-solid fa-arrow-right"></i> <?php echo $subunit->chapter_level_2; ?></h2>
                     </li>
                  </ul>
               </li>
            </ul>
         </div>
         <section class="chaptercontainer tutor-profile" style="box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
            <div class="details">
               <div class="tutor">
                  <h3>My Chapter Progress</h3>
                  <br>
               </div>
               <div class="flex">
                  <?php if (!$completed) { ?>
                     <div class="box" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px; cursor:pointer;" onclick="window.location.href='<?php echo URLROOT; ?>/Student/do_progress_tracking_paper/<?php echo $subunit->id; ?>'">
                        <span>Status</span>
                        <p>Click to start</p>
                     </div>
                  <?php } else { ?>
                     <div class="box" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px; cursor:pointer;">
                        <span>Chapter Status</span>
                        <p>Progress Tracked</p>
                     </div>
                     <div class="box" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px; cursor:pointer;">
                        <span>Score</span>
                        <p><?php echo $score; ?>%</p>
                     </div>
                  <?php } ?>
               </div>
            </div>
         </section>
      </section>
   </section>
   <section class="tutor-profile">
      <div class="details" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
         <h1 class="heading" style="margin-top: 10px;">Progress on purchased study materials covering <?php echo $subunit->chapter_level_2; ?> </h1>
         <section class="contents chaptercontainer" style="box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
            <div class="tutor">
               <h3>Video Materials</h3>
               <br>
            </div>
            <div class="box-container">
               <?php if(Auth::is_premium()){ ?>
               <?php if ($data['my_videos']) { ?>
                  <?php foreach ($data['my_videos'] as $my_video) : ?>
                     <?php
                     $tutor = $my_video->tutor;
                     $content_id = $my_video->video_content_id;
                     $videothumbnail = 'video_thumbnail';
                     ?>
                     <div class="box" style="cursor: pointer; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px, rgb(51, 51, 51) 0px 0px 0px 3px;" id="<?php echo $content_id; ?>" onclick="window.location.href='<?php echo URLROOT; ?>/Student/video_overview/<?php echo $content_id; ?>'" >

                        <img src="<?php echo URLROOT; ?>/student/<?php echo $videothumbnail; ?>/<?php echo $my_video->thumbnail; ?>" class="thumb" alt="">
                        <h3 class="title">Score : <?php echo $my_video->score; ?></h3>
                        <h2 class="type"><?php echo $my_video->name; ?></h2>
                        <h2 class="type">By <?php echo ucfirst($my_video->tutor); ?></h2>
                     </div>
                  <?php endforeach; ?>
               <?php } else { ?>
                  <div class="box">
                     <h2 class="title">No study materials purchased yet</h2>
                  </div>
               <?php } ?>
               <?php } else { ?>
               <div class="box">
                  <h2 class="title"><a href="<?php echo URLROOT ?>/Student/purchase_premium" class="btn"><i class="fa-solid fa-crown"></i> Upgrade to Premium</a></h2>
               </div>
               <?php } ?>
               

            </div>
         </section>
         <section class="contents chaptercontainer" style="box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
            <div class="tutor">
               <h3>Video Materials</h3>
               <br>
            </div>
            <div class="box-container">
               <?php if(Auth::is_premium()){ ?>
               <?php if (!empty($data['my_model_papers'])) : ?>
                  <?php foreach ($data['my_model_papers'] as $model_paper) : ?>
                     <?php
                     $tutor = $model_paper->tutor;
                     $content_id = $model_paper->model_paper_content_id;
                     $model_paperthumbnail = 'model_paper_thumbnail';
                     ?>
                     <div class="box" style="cursor: pointer; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px, rgb(51, 51, 51) 0px 0px 0px 3px;" id="<?php echo $content_id; ?>" onclick="window.location.href='<?php echo URLROOT; ?>/Student/model_paper_overview/<?php echo $content_id; ?>'" >
                        <img src="<?php echo URLROOT; ?>/student/<?php echo $model_paperthumbnail; ?>/<?php echo $model_paper->thumbnail; ?>" class="thumb" alt="">
                        <h3 class="title">Score: <?php echo $model_paper->score; ?></h3>
                        <h2 class="type"><?php echo $model_paper->name; ?></h2>
                        <h2 class="type">By <?php echo ucfirst($tutor); ?></h2>
                     </div>
                  <?php endforeach; ?>
               <?php else : ?>
                  <div class="box">
                     <h2 class="title">No study materials purchased yet</h2>
                  </div>
               <?php endif; ?>
               <?php } else { ?>
               <div class="box">
                  <h2 class="title"><a href="<?php echo URLROOT ?>/Student/purchase_premium" class="btn"><i class="fa-solid fa-crown"></i> Upgrade to Premium</a></h2>
               </div>
               <?php } ?>
            </div>
         </section>
      </div>
   </section>
   <!-- horizontal line break -->
   <hr style="border: 1px solid rgb(157, 153, 153); margin-top:10px; width: 100%;">
   <h1 class="heading" style="border:none; margin-top:20px;">Recomended videos for <?php echo $subunit->chapter_level_2; ?> </h1>
   <section class="contents">
      <div class="box-container">
         
         <?php if (!empty($data['not_purchased_videos'])) : ?>
            <?php foreach ($data['not_purchased_videos'] as $material) : ?>
               <?php
               $type = 'video'; // Assuming type is always 'video' for not purchased videos
               $tutor = $material->tutor;
               $content_id = $material->video_content_id;
               $thumbnail_directory = 'video_thumbnail';
               ?>
               <div class="box"  style="cursor: pointer;box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;" id="<?php echo $content_id; ?>" data-type="<?php echo $type; ?>">
                  <div class="flex">
                     <div><i class="fas fa-dot-circle" style="color: limegreen;"></i><span style="color: red;">Active</span></div>
                     <div><i class="fas fa-calendar"></i><span><?php echo $material->date; ?></span></div>
                  </div>
                  <img src="<?php echo URLROOT; ?>/student/<?php echo $thumbnail_directory; ?>/<?php echo $material->thumbnail; ?>" class="thumb" alt="">
                  <h3 class="title"><?php echo $material->name; ?></h3>
                  <h2 class="type"><?php echo ucfirst($tutor); ?></h2>
                  <h2 class="type"><?php echo $material->price; ?> LKR</h2>
                  <p><i class="fa-solid fa-star-half-stroke"></i> <?php echo round($material->rating,1); ?></p>
               </div>
            <?php endforeach; ?>
         <?php else : ?>
            <div class="box">
               <h2 class="title">No more recommendations to show</h2>
            </div>
         <?php endif; ?>
      </div>
      </section>
      <hr style="border: 1px solid rgb(157, 153, 153); margin-top:10px; width: 100%;">
   <h1 class="heading" style="border:none; margin-top:20px;">Recomended model papers for <?php echo $subunit->chapter_level_2; ?> </h1>
      <section class="contents">
      <div class="box-container">
         <?php if (!empty($data['not_purchased_model_papers'])) : ?>
            <?php foreach ($data['not_purchased_model_papers'] as $material) : ?>
               <?php
               $type = 'model_paper'; // Assuming type is always 'model_paper' for not purchased model papers
               $tutor = $material->tutor;
               $content_id = $material->model_paper_content_id;
               $thumbnail_directory = 'model_paper_thumbnail';
               ?>
               <div class="box"  style="cursor: pointer;box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;" id="<?php echo $content_id; ?>" data-type="<?php echo $type; ?>" >
                  <div class="flex">
                     <div><i class="fas fa-dot-circle" style="color: limegreen;"></i><span style="color: red;">Active</span></div>
                     <div><i class="fas fa-calendar"></i><span><?php echo $material->date; ?></span></div>
                  </div>
                  <img src="<?php echo URLROOT; ?>/student/<?php echo $thumbnail_directory; ?>/<?php echo $material->thumbnail; ?>" class="thumb" alt <h3 class="title"><?php echo $material->name; ?></h3>
                  <h2 class="type"><?php echo ucfirst($tutor); ?></h2>
                  <h2 class="type"><?php echo $material->price; ?> LKR</h2>
                  <p><i class="fa-solid fa-star-half-stroke"></i> <?php echo round($material->rating,1); ?></p>
               </div>
            <?php endforeach; ?>
         <?php else : ?>
            <div class="box">
               <h2 class="title">No more recommendations to show</h2>
            </div>
         <?php endif; ?>
      </div>
   </section>
</section>
<?php $this->view('inc/Footer') ?>
</body>
</html>