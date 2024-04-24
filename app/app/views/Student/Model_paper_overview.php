<?php $this->view('inc/Header', $data) ?>
<?php $model_paper = $data['model_paper'];
// Accessing chapters array
$chapters = $model_paper->chapters;
?>
<!-- playlist section starts  -->
<section class="playlist">
    <h1 class="heading">Study Materials / model_papers / <?php echo $data['model_paper']->name; ?></h1>
    <div class="row">
        <div class="col">
            <form method="post" class="save-list">
                <button type="submit" name="save_list"><i class="fas fa-bookmark"></i><span>Add to favourite</span></button>
            </form>
            <div class="thumb">
                <span><?php echo $data['model_paper']->time_duration; ?> Minutes</span>
                <img src="<?php echo URLROOT; ?>/student/model_paper_thumbnail/<?php echo $data['model_paper']->thumbnail; ?>" alt="">
            </div>
        </div>
        <div class="col">
            <div class="tutor">
                <img src="<?php echo URLROOT; ?>/student/userimage/<?php echo $data['model_paper']->tutor_image; ?>" alt="">
                <div>
                    <h3><?php echo $data['model_paper']->tutor; ?></h3>
                    <span><i class="fa-solid fa-star"></i> 4.2</span>
                </div>
            </div>
            <div class="details">
                <h3><?php echo $data['model_paper']->name; ?></h3>
                <p><?php echo $data['model_paper']->description; ?></p>
                <div class="date">added date</span></div>
                <div class="chaptercontainer">
                    <h3>Covering Areas</h3>
                    <?php
                    // Initialize an array to hold sub-chapters grouped by level 1 chapters
                    $groupedChapters = [];
                    // Group sub-chapters by level 1 chapters
                    foreach ($chapters as $chapter) {
                        $level1 = $chapter->chapter_level_1;
                        // If the level 1 chapter doesn't exist in the grouped array, initialize it
                        if (!isset($groupedChapters[$level1])) {
                            $groupedChapters[$level1] = [];
                        }
                        // Add the current sub-chapter to its corresponding level 1 chapter
                        $groupedChapters[$level1][] = $chapter;
                    }
                    // Output the grouped chapters
                    foreach ($groupedChapters as $level1 => $subChapters) {
                        echo '<div class="chaptercontainer">';
                        echo '<ul>';
                        echo '<li>';
                        echo '<p><b>' . $level1 . '</b></p>';
                        echo '<ul>';
                        foreach ($subChapters as $subChapter) {
                            echo '<li><p style="margin-left:5px;"><i class="fa-solid fa-arrow-right"></i> ' . $subChapter->chapter_level_2 . '</p></li>';
                        }
                        echo '</ul>';
                        echo '</li>';
                        echo '</ul>';
                        echo '</div>';
                    }
                    ?>
                </div>
                <?php if(Auth::is_premium()){ ?>
                    
                <?php if (!$data['status'] == 'purchased') { ?>
                    <form action="<?php echo URLROOT; ?>/student/purchase_model_paper" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="model_paper_id" value="<?php echo  $model_paper->model_paper_content_id; ?>">
                        <button type="submit" class="btn" style="width: fit-content;"><?php echo $data['model_paper']->price; ?> LKR <i class="fa-solid fa-arrow-right"></i></button>
                    </form>
                <?php } else { ?>
                    <form action="<?php echo URLROOT; ?>/student/do_model_paper" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="model_paper_id" value="<?php echo  $model_paper->model_paper_content_id; ?>">
                        <button class="btn" style="width: fit-content;" type="submit" name="start_paper">Start Paper <i class="fa-solid fa-stopwatch-20"></i></button>
                    </form>
                <?php } ?>
                <?php if ($data['completed']) { ?>
                    <a href="<?php echo URLROOT; ?>/student/view_model_paper_answers/<?php echo $model_paper->model_paper_content_id; ?>" class="btn" style="width: fit-content;">View Answers <i class="fa-solid fa-eye"></i></a>
                <?php } ?>
                <?php } else { ?>
                <button type="submit" class="btn" style="width: fit-content;  opacity: 0.5;"><?php echo $data['model_paper']->price; ?> LKR <i class="fa-solid fa-arrow-right"></i></button>
                <a href="<?php echo URLROOT ?>/Student/purchase_premium" style="width: fit-content; " class="btn"><i class="fa-solid fa-crown"></i> Upgrade to Premium</a>
                <?php } ?>


            </div>
        </div>
    </div>
</section>
<!-- playlist section ends -->
<?php $this->view('inc/Footer') ?>
</body>
</html>