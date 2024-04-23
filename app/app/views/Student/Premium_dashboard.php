<?php $this->view('inc/Header', $data) ?>
<?php $not_completed_study_materials = $data['not_completed_study_materials'];
$subjects = $data['chapters'];
$studied_subunits = $data['studied_subunits'];
$progress_tracked_subunits = $data['progress_tracked_subunits'];
//  print_r($subjects);
$mainunit_progresses = $data['mainunit_progresses'];
?>

<body>

    <section class="dashboard">
        <section class="contents unit-container" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
            <h1 class="heading">Ongoing Studies</h1>
            <div class="box-container">
               <?php if ($not_completed_study_materials == null) : ?>
                    <div class="box" id="no_study_materials" data-type="no_study_materials">
                        <h2>No ongoing Study Materials</h2>
                    </div>
                <?php else : ?>
                    <?php foreach ($not_completed_study_materials as $not_completed_study_material) : ?>
                        <div class="box" id="<?php echo $not_completed_study_material->id; ?>" data-type="where_am_i">
                            <h2><?php echo $not_completed_study_material->chapter_level_1; ?></h2>
                            <p><?php echo $not_completed_study_material->chapter_level_2; ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>
        <section class="contents unit-container" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
            <h1 class="heading">My Progress</h1>
            <div class="flex-btn" style="flex-direction: row; align-items: center; justify-content: center;">
                <?php foreach ($subjects as $subjectData) : ?>
                    <button id="<?php echo htmlspecialchars($subjectData[0]->subject); ?>" class="button-17" role="button"><?php echo ucfirst(htmlspecialchars($subjectData[0]->subject)); ?></button>
                <?php endforeach; ?>
            </div>
            <?php
            foreach ($subjects as $subjectData) {
                echo '<section class="courses" id="' . htmlspecialchars($subjectData[0]->subject) . '">';
                $currentChapter = null;
                foreach ($subjectData as $chapter) {
                    if ($currentChapter !== $chapter->chapter_level_1) {
                        if ($currentChapter !== null) {
                            echo '</table>'; // Assuming this table was opened correctly before
                            echo '</section>';
                        }
                        echo '<section class="unit-container" id="chapter_level_1" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">';
                        echo '<h2 class="heading" style="border:none;">' . htmlspecialchars($chapter->chapter_level_1) . '</h2>';
                        $currentProgress = null;
                        foreach ($mainunit_progresses as $mainunit_progress) {
                            if ($mainunit_progress['chapter_level_1_name'] === $chapter->chapter_level_1) {
                                $currentProgress = $mainunit_progress['overall_progress_percentage'];
                                break;
                            }
                        }
                        // Output the progress
                        if ($currentProgress !== null) {
                            echo '<div class="ongoing"><p>Sub Unit Overall Progress</p><div class="ongoing-bar ongoing1 wow slideInLeft animated" style="width:' . htmlspecialchars($currentProgress) . '%"><span class="ongoing-count">' . htmlspecialchars($currentProgress) . '%</span></div></div>';
                        }
                        echo '<table id="table">';
                        echo '<tr>';
                        echo '<th>Sub unit</th>';
                        echo '<th>Summary</th>';
                        echo '<th>Progress</th>';
                        echo '</tr>';
                        $currentChapter = $chapter->chapter_level_1;
                    }
                    echo '<tr onclick="window.location.href = \'' . htmlspecialchars(URLROOT . '/student/where_am_i/' . $chapter->id) . '\'">';
                    echo '<td>' . htmlspecialchars($chapter->chapter_level_2) . '</td>';
                    echo '<td style="display:flex; flex-direction:horizontal;">';

                    $studied = false;
                    if ($studied_subunits == null) {
                        echo '<button class="button-34" style="background-color:red" role="button">Not Studied</button>';
                    }
                    foreach ($studied_subunits as $studied_subunit) {
                        if ($studied_subunit == $chapter->id) {
                            echo '<button class="button-34" style="background-color:green" role="button">Studied</button>';
                            $studied = true;
                            break;
                        }
                    }
                    if (!$studied) {
                        echo '<button class="button-34" style="background-color:red" role="button">Not Studied</button>';
                    }

                    $progress_tracked = false;
                    if ($progress_tracked_subunits == null) {
                        echo '<button class="button-34" style="background-color:red" role="button">Progress Not Tracked</button>';
                    } else {
                        foreach ($progress_tracked_subunits as $progress_tracked_subunit) {
                            if ($progress_tracked_subunit->subunit_id == $chapter->id) {
                                echo '<button class="button-34" style="background-color:green" role="button">Progress Tracked</button>';
                                $progress_tracked = true;
                                break;
                            }
                        }
                        if (!$progress_tracked) {
                            echo '<button class="button-34" style="background-color:red" role="button">Progress Not Tracked</button>';
                        }
                    }

                    echo '</td>';
                    echo '<td>' . htmlspecialchars($chapter->score) . '%</td>';
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
        $('#<?php echo $subjectData[0]->subject; ?>').click(function() {
            $('.courses').hide();
            $('.courses#<?php echo $subjectData[0]->subject; ?>').show();
        });
    <?php endforeach; ?>
</script>

</html>