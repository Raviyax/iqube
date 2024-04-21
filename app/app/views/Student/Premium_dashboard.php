<?php $this->view('inc/Header', $data) ?>
<?php $not_completed_study_materials = $data['not_completed_study_materials'];
 $subjects = $data['chapters'];
?>
<body>
    <section class="dashboard">
        <section class="contents unit-container" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
            <h1 class="heading">Ongoing Studies</h1>
            <div class="box-container">
                <?php foreach ($not_completed_study_materials as $material) : ?>
                    <?php
                    $type = $material->type;
                    $tutor = $material->tutor;
                    $content_id = ($type == 'video') ? $material->video_content_id : $material->model_paper_content_id;
                    $thumbnail_directory = ($type == 'video') ? 'video_thumbnail' : 'model_paper_thumbnail';
                    ?>
                    <div class="box" style="cursor: pointer; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;" id="<?php echo $content_id; ?>" data-type="<?php echo $type; ?>">
                        <h1 class="heading"><?php echo $material->subject; ?></h1>
                        <img src="<?php echo URLROOT; ?>/student/<?php echo $thumbnail_directory; ?>/<?php echo $material->thumbnail; ?>" class="thumb" alt="">
                        <h3 class="title"><?php echo $material->name; ?></h3>
                        <h2 class="type">By <?php echo ucfirst($tutor); ?></h2>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <section class="contents unit-container" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
        <h1 class="heading">My Progress</h1>
        <div class="flex-btn" style="flex-direction: row; align-items: center; justify-content: center;">
       <?php foreach ($subjects as $subjectData) : ?>
            <button id="<?php echo $subjectData[0]->subject;?>" class="button-17" role="button"><?php echo ucfirst($subjectData[0]->subject);?></button>
        <?php endforeach; ?>
    </div>
            <?php
            foreach ($subjects as $subjectData) {
                echo'<section class="courses" id="'.$subjectData[0]->subject.'">';
                $currentChapter = null;
                foreach ($subjectData as $chapter) {
                    if ($currentChapter !== $chapter->chapter_level_1) {
                        if ($currentChapter !== null) {
                            echo '</table>';
                            echo '</section>';
                        }
                        echo '<section class="unit-container" id="chapter_level_1" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">';
                        echo '<h2 class="heading" style="border:none;">' . $chapter->chapter_level_1 . '</h2>';
                        echo '<table id="table">';
                        echo '<tr>';
                        echo '<th>ID</th>';
                        echo '<th>Sub unit</th>';
                        echo '<th>Completion Status</th>';
                        echo '<th>Progress</th>';
                        echo '</tr>';
                        $currentChapter = $chapter->chapter_level_1;
                    }
                    echo '<tr>';
                    echo '<td>' . $chapter->id . '</td>';
                    echo '<td >' . $chapter->chapter_level_2 . '</td>';
                    echo '<td>completed</td>';
                    echo '<td style="display:flex; flex-direction:row;">20%</td>';
                    echo '</tr>';
                }
                if ($currentChapter !== null) {
                    echo '</table>';
                    echo '</section>';
                }
                echo '</section>';
            }
            ?>
        </section>
    </section>
    <?php $this->view('inc/Footer') ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    //on click of div class box
    $('.box').click(function() {
        var content_id = $(this).attr('id');
        var type = $(this).data('type');
        window.location.href = "<?php echo URLROOT; ?>/student/" + type + "_overview/" + content_id;
    });
 //hide all courses except the first one
    $('.courses').hide();
    //<section class="courses" id="physics"> is shown
    $('.courses').first().show();
    //on click of button
<?php foreach ($subjects as $subjectData) : ?>
    $('#<?php echo $subjectData[0]->subject;?>').click(function() {
        $('.courses').hide();
        $('.courses#<?php echo $subjectData[0]->subject;?>').show();
    });
<?php endforeach; ?>
</script>
</html>