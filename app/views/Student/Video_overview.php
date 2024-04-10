<?php $this->view('inc/Header', $data) ?>

<?php $video = $data['video'];

// Accessing chapters array
$chapters = $video->chapters;
?>

<!-- playlist section starts  -->
<section class="playlist">
    <h1 class="heading">Study Materials / Videos / <?php echo $data['video']->name; ?></h1>
    <div class="row">
        <div class="col">
            <form action="" method="post" class="save-list">
                <button type="submit" name="save_list"><i class="fas fa-bookmark"></i><span>Add to favourite</span></button>
            </form>
            <div class="thumb">
                <span>30 Minutes</span>
                <img src="<?php echo URLROOT; ?>/student/video_thumbnail/<?php echo $data['video']->thumbnail; ?>" alt="">
            </div>
        </div>
        <div class="col">
            <div class="tutor">
                <img src="<?php echo URLROOT; ?>/student/userimage/<?php echo $data['video']->tutor_image; ?>" alt="">
                <div>
                    <h3><?php echo $data['video']->tutor; ?></h3>
                    <span><i class="fa-solid fa-star"></i> 4.2</span>
                </div>
            </div>
            <div class="details">
                <h3><?php echo $data['video']->name; ?></h3>
                <p><?php echo $data['video']->description; ?></p>
                <div class="date"><?php echo $data['video']->price; ?> LKR</span></div>
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
        echo '<li><p style="margin-left:5px;">' . $subChapter->chapter_level_2 . '</p></li>';
    }
    echo '</ul>';
    echo '</li>';
    echo '</ul>';
    echo '</div>';
}
?>
                </div>



            </div>
        </div>
    </div>
</section>
<!-- playlist section ends -->

<?php $this->view('inc/Footer') ?>
</body>
</html>
