<?php $this->view('inc/Header', $data) ?>
<?php $model_paper = $data['model_paper'];


// Accessing chapters array
$chapters = $data['covering_chapters'];

$mcqs = $data['mcqs'];

?>
<section class="dashboard">
    <section class="playlist">
        <h1 class="heading">My Content / model papers / <?php echo $model_paper->name; ?></h1>
        <div class="row">
            <div class="col">
                <div class="thumb">
                    <span><?php echo $model_paper->time_duration; ?> Minutes</span>
                    <img src="<?php echo URLROOT; ?>/Tutor/model_paper_thumbnail/<?php echo $model_paper->thumbnail; ?>" alt="">
                </div>
            </div>
            <div class="col">
                <div class="details">
                    <h3><?php echo $model_paper->name; ?></h3>
                    <p><?php echo $model_paper->description; ?></p>
                  
                    <div class="date">Added date: <?php echo $model_paper->date; ?></div>
                    <div class="chaptercontainer">
                        <h3>Covering Areas</h3>
                        <?php
                        // Check if $chapters is not empty
                        if (!empty($chapters)) {
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
                        } else {
                            echo "<p>No chapters available.</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="unit-container">
        <div class="box-container" style="margin-bottom: 10px;">
            <div class="box">
                <h3>Edit Model Paper</h3>
            </div>
        </div>
        <section class="courses" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
            <section class="form-container" style="display: block;">
                <form >
                    <section style="display: block;">
                        <div class="flex">
                            <div class="col">
                                <p>Paper Duration in Minutes</p>
                                <input id="duration" type="text" name="duration" placeholder="Enter the duration in minutes..." maxlength="400" required value="<?php echo $model_paper->time_duration; ?>" class="box">
                                <div style="display: none; flex-direction:row-reverse" id="saveDurationDiv">
                                    <button id="saveDuration" class="btn" style="width: fit-content; background-color:red;">Change Duration <i class="fa-solid fa-clock"></i></button>
                                </div>
                                <p>Description</p>
                                <textarea id="description" name="description" placeholder="Enter the description..." maxlength="400" required class="box"><?php echo $model_paper->description; ?></textarea>
                                <div style="display: none; flex-direction:row-reverse" id="saveDescriptionDiv">
                                    <button id="saveDescription" class="btn" style="width: fit-content; background-color:red;">Change Description <i class="fa-solid fa-file-alt"></i></button>
                                </div>
                                <p>Change Thumbnail</p>
                                <input id="thumbnail" type="file" name="thumbnail" class="box" accept="image/*">
                                <div style="display: none; flex-direction:row-reverse" id="saveThumbnailDiv">
                                    <button id="saveThumbnail" class="btn" style="width: fit-content; background-color:red;">Change Thumbnail <i class="fa-solid fa-image"></i></button>
                                </div>
                            </div>
                        </div>

                    </section>
                </form>
                <form id="new" style="display: none;">
                    <!-- section for mcqs from the video -->
                    <section style="display: block;">
                        <h3>New Question</h3>
                        <div class="flex">
                            <div class="col">
                                <p>Question<span>*</span></p>
                                <input type="text" name="question" placeholder="Enter the question..." maxlength="400" required class="box">
                                <p>Option 1<span>*</span></p>
                                <input type="text" name="option1" placeholder="Enter the first option..." maxlength="400" required class="box">
                                <p>Option 2<span>*</span></p>
                                <input type="text" name="option2" placeholder="Enter the second option..." maxlength="400" required class="box">
                                <p>Option 3<span>*</span></p>
                                <input type="text" name="option3" placeholder="Enter the third option..." maxlength="400" required class="box">
                                <p>Option 4<span>*</span></p>
                                <input type="text" name="option4" placeholder="Enter the fourth option..." maxlength="400" required class="box">
                                <p>Option 5<span>*</span></p>
                                <input type="text" name="option5" placeholder="Enter the fifth option..." maxlength="400" required class="box">
                                <p>Correct Answer<span>*</span></p>
                                <select name="correct" class="box" required>
                                    <option value="" disabled selected>-- Select the correct answer</option>
                                    <option value="option1">Option 1</option>
                                    <option value="option2">Option 2</option>
                                    <option value="option3">Option 3</option>
                                    <option value="option4">Option 4</option>
                                    <option value="option5">Option 5</option>
                                </select>
                            </div>
                        </div>
                        <div style="display: flex; flex-direction:row-reverse">
                            <button id="saveAddNew" class="btn" style="width: fit-content;">Save Question<i class="fa-solid fa-file-arrow-up"></i></button>
                        </div>
                        <div style="display:flex; flex-direction:row-reverse">
                            <button id="remove" class="btn" style="width: fit-content; background-color:red;">Remove <i class="fa-solid fa-xmark"></i></button>
                        </div>
                    </section>
                </form>
                <?php if ($mcqs) { ?>
                    <?php foreach ($mcqs as $key => $mcq) : ?>
                        <form action="" id="<?php echo $mcq->mcq_id; ?>" data-contains="backend" method="post" enctype="multipart/form-data">
                            <!-- section for mcqs from the video -->
                            <section style="display: block;">
                                <h3>Question <?php echo $key + 1; ?></h3>
                                <div class="flex">
                                    <div class="col">
                                        <p>Question<span>*</span></p>
                                        <input type="text" name="question" placeholder="Enter the question..." maxlength="400" required class="box" value="<?php echo $mcq->question; ?>">
                                        <p>Option 1<span>*</span></p>
                                        <input type="text" name="option1" placeholder="Enter the first option..." maxlength="400" required class="box" value="<?php echo $mcq->option1; ?>">
                                        <p>Option 2<span>*</span></p>
                                        <input type="text" name="option2" placeholder="Enter the second option..." maxlength="400" required class="box" value="<?php echo $mcq->option2; ?>">
                                        <p>Option 3<span>*</span></p>
                                        <input type="text" name="option3" placeholder="Enter the third option..." maxlength="400" required class="box" value="<?php echo $mcq->option3; ?>">
                                        <p>Option 4<span>*</span></p>
                                        <input type="text" name="option4" placeholder="Enter the fourth option..." maxlength="400" required class="box" value="<?php echo $mcq->option4; ?>">
                                        <p>Option 5<span>*</span></p>
                                        <input type="text" name="option5" placeholder="Enter the fifth option..." maxlength="400" required class="box" value="<?php echo $mcq->option5; ?>">
                                        <p>Correct Answer<span>*</span></p>
                                        <select name="correct" class="box" required>
                                            <option value="" disabled selected>-- Select the correct answer</option>
                                            <option value="option1" <?php echo ($mcq->correct === 'option1') ? 'selected' : ''; ?>>Option 1</option>
                                            <option value="option2" <?php echo ($mcq->correct === 'option2') ? 'selected' : ''; ?>>Option 2</option>
                                            <option value="option3" <?php echo ($mcq->correct === 'option3') ? 'selected' : ''; ?>>Option 3</option>
                                            <option value="option4" <?php echo ($mcq->correct === 'option4') ? 'selected' : ''; ?>>Option 4</option>
                                            <option value="option5" <?php echo ($mcq->correct === 'option5') ? 'selected' : ''; ?>>Option 5</option>
                                        </select>
                                    </div>
                                </div>
                                <div style="display:none; flex-direction:row-reverse" id="savechangesdiv">
                                    <button type="submit" id="save-mcq_<?php echo $mcq->mcq_id; ?>" class="btn" style="width: fit-content; background-color:red;">Save Changes <i class="fa-solid fa-file-arrow-up"></i></button>
                                </div>
                                <div style="display:flex; flex-direction:row-reverse">
                                    <button type="btn" id="delete-mcq_<?php echo $mcq->mcq_id; ?>" class="btn" style="width: fit-content; background-color:red;">Delete Question <i class="fa-solid fa-trash"></i></button>
                                </div>
                            </section>
                        </form>
                    <?php endforeach; ?>
                <?php } else { ?>
                    <p>No questions found</p>
                <?php } ?>
                <div style="display: flex;" id="addnewbuttondiv">
                    <button onclick="addNewQuestion()" class="btn" style="width: fit-content;">Add New Question <i class="fa-solid fa-circle-plus"></i></button>
                </div>
            </section>
        </section>
    </section>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
           

    $(document).ready(function() {
        const url = "<?php echo URLROOT; ?>/api.php";
        const model_paper_id = "<?php echo $model_paper->model_paper_content_id; ?>";


        // on change of duration
        $('#duration').change(function() {
            $('#saveDurationDiv').css('display', 'flex');
        });

        // on change of description
        $('#description').change(function() {
            $('#saveDescriptionDiv').css('display', 'flex');
        });

        // on change of thumbnail
        $('#thumbnail').change(function() {
            $('#saveThumbnailDiv').css('display', 'flex');
        });

       //on click saveDuration
        $('#saveDuration').click(function() {
            event.preventDefault();
            const duration = $('#duration').val();
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    model_paper_id: model_paper_id,
                    duration: duration,
                    action: 'tutor_update_model_paper_duration'
                },
                success: function(response) {
                    if (response === 'success') {
                        alert('Duration updated successfully');
                        $('#saveDurationDiv').css('display', 'none');
                        //reload the page
                        location.reload();
                    } else {
                        alert('Failed to update duration');
                    }
                }
            });
        });

        //on click saveDescription
        $('#saveDescription').click(function() {
            const description = $('#description').val();
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    model_paper_id: model_paper_id,
                    description: description,
                    action: 'tutor_update_model_paper_description'
                },
                success: function(response) {
                    if (response === 'success') {
                        alert('Description updated successfully');
                        $('#saveDescriptionDiv').css('display', 'none');
                        location.reload();
                    } else {
                        alert('Failed to update description');
                    }
                }
            });
        });

        //on click saveThumbnail
        $('#saveThumbnail').click(function() {
    const thumbnail = $('#thumbnail')[0].files[0];
    if (!thumbnail) {
        alert('Please select a thumbnail.');
        return;
    }

    const formData = new FormData();
    formData.append('thumbnail', thumbnail);
    formData.append('model_paper_id', model_paper_id);
    formData.append('action', 'tutor_update_model_paper_thumbnail');

    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function() {
            // Show loading spinner or progress bar
            // Optionally disable the button to prevent multiple submissions
        },
        success: function(response) {
            if (response === 'success') {
                alert('Thumbnail updated successfully');
                $('#saveThumbnailDiv').hide();
                // Reload the page
                location.reload();
            } else {
                alert('Failed to update thumbnail');
            }
        },
        error: function(xhr, status, error) {
            alert('An error occurred while uploading the thumbnail. Please try again later.');
            console.error(xhr, status, error);
        },
        complete: function() {
            // Hide loading spinner or progress bar
            // Optionally re-enable the button if disabled
        }
    });
});




    });
</script>
<?php $this->view('inc/Footer') ?>
</body>

</html>