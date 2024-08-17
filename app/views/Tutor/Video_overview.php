<?php $this->view('inc/Header', $data) ?>
<?php $video = $data['video'];


// Accessing chapters array
$chapters = $data['covering_chapters'];
$students = $data['students'];

$mcqs = $data['mcqs'];

?>

<section class="dashboard">
    <section class="playlist">
        <h1 class="heading">My Content / videos / <?php echo $video->name; ?></h1>
        <div class="row">
            <div class="col">
                <div class="thumb">

                    <img src="<?php echo URLROOT; ?>/Tutor/video_thumbnail/<?php echo $video->thumbnail; ?>" alt="">

                </div>

            </div>
            <div class="col">
                <div class="details">
                    <h3><?php echo $video->name; ?></h3>
                    <p><?php echo $video->description; ?></p>

                    <div class="date">Added date: <?php $date = $video->date;
                                                    $formattedDate = date('Y-m-d', strtotime($date));
                                                    echo $formattedDate; ?></div>

                    <p><?php echo $video->price; ?> LKR</p>
                    <div style="margin-top: 10px;">
                        <?php if ($video->active == 1) { ?>
                            <button id="deactivate" class="button-34" style="background-color:Green" role="button">Active</button>
                        <?php } else { ?>
                            <button id="activate" class="button-34" style="background-color:Red" role="button">Inactive</button>
                        <?php } ?>
                    </div>
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

        <?php if ($students) { ?>
            <section class="unit-container">
                <section class="unit-container" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                    <div class="box-container" style="margin-bottom: 10px;">
                        <div class="box">
                            <h3>Purchased Students</h3>
                        </div>
                    </div>
                    <!-- table for tutor contents -->
                    <?php
                    echo '<table id="table" class="table">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>Student Name</th>';
                    echo '<th>Purchased On</th>';
                    echo '<th>Score</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';

                    foreach ($students as $student) {
                        echo '<tr>';
                        echo '<td>' . $student->name . '</td>';
                        echo '<td>' . date("Y-m-d", strtotime($student->purchased_date)) . '</td>';
                        echo '<td>';
                        if ($student->completed == 0) {
                            echo 'Not Completed'; // Display "Not Completed" if completed is 0
                        } else {
                            echo $student->score; // Otherwise, display the score
                        }
                        echo '</td>';
                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>';
                    ?>
                </section>
            </section>
        <?php } else { ?>
            <section class="unit-container">
                <section class="unit-container" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                    <div class="box-container" style="margin-bottom: 10px;">
                        <div class="box">
                            <h3>Purchased Students</h3>
                        </div>
                    </div>
                    <p>No students have purchased this video yet.</p>
                </section>
            </section>
        <?php } ?>


        <div class="row" style="margin-bottom: 7px;">
            <section class="watch-video">
                <div class="video-details">
                    <video src="<?php echo URLROOT; ?>/Tutor/video_content/<?php echo $video->video; ?>" class="video" poster="<?php echo URLROOT; ?>/Tutor/video_thumbnail/<?php echo $video->thumbnail; ?>" controls></video>

                </div>
            </section>
        </div>


        <section class="unit-container">
            <div class="box-container" style="margin-bottom: 10px;">
                <div class="box">
                    <h3>Edit Content</h3>
                </div>
            </div>
            <section class="courses" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                <section class="form-container" style="display: block;">
                    <form>
                        <section style="display: block;">
                            <div class="flex">
                                <div class="col">

                                    <p>Description</p>
                                    <textarea id="description" name="description" placeholder="Enter the description..." maxlength="400" required class="box"><?php echo $video->description; ?></textarea>
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
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function addNewQuestion() {
        $('#new').clone().attr('id', 'newmcq').insertBefore('#addnewbuttondiv').css('display', 'block');
    }

    $(document).ready(function() {
        const url = "<?php echo URLROOT; ?>/api.php";
        const video_id = "<?php echo $video->video_content_id; ?>";




        // on change of description
        $('#description').change(function() {
            $('#saveDescriptionDiv').css('display', 'flex');
        });

        // on change of thumbnail
        $('#thumbnail').change(function() {
            $('#saveThumbnailDiv').css('display', 'flex');
        });



        //on click saveDescription
        $('#saveDescription').click(function() {
            const description = $('#description').val();
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    video_id: video_id,
                    description: description,
                    action: 'tutor_update_video_description'
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
            event.preventDefault();
            const thumbnail = $('#thumbnail')[0].files[0];
            if (!thumbnail) {
                alert('Please select a thumbnail.');
                return;
            }

            const formData = new FormData();
            formData.append('thumbnail', thumbnail);
            formData.append('video_id', video_id);
            formData.append('action', 'tutor_update_video_thumbnail');

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
                    console.log(response);
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

        //active and deactive
        $('#activate').click(function() {
            event.preventDefault();
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    video_id: video_id,
                    action: 'tutor_activate_video'
                },
                success: function(response) {
                    if (response === 'success') {
                        alert('Video activated successfully');
                        location.reload();
                    } else {
                        alert('Failed to activate model paper');
                    }
                }
            });
        });


        $('#deactivate').click(function() {
            event.preventDefault();
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    video_id: video_id,
                    action: 'tutor_deactivate_video'
                },
                success: function(response) {
                    if (response === 'success') {
                        alert('Video deactivated successfully');
                        location.reload();
                    } else {
                        alert('Failed to deactivate model paper');
                    }
                }
            });
        });

        $('form[data-contains="backend"]').change(function() {
            $(this).find('#savechangesdiv').css('display', 'flex');
        });

        //remove the new question form
        $(document).on('click', '#remove', function(event) {
            event.preventDefault(); // Prevent default form submission behavior
            // Remove the form which contains the remove button
            $(this).closest('form').remove();
        });


        //on click of delete button
        $(document).on('click', '[id^=delete-mcq_]', function(event) {

            if (confirm('Are you sure you want to delete this question?')) {
                const mcq_id = $(this).attr('id').split('_')[1];
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        mcq_id: mcq_id,
                        action: 'tutor_delete_video_mcq'
                    },
                    success: function(response) {
                        if (response === 'success') {
                            alert('Question deleted successfully');
                            location.reload();
                        } else {
                            alert('Failed to delete question');
                        }
                    }
                });
            }
        });

        //save question
        $(document).on('click', '#saveAddNew', function(event) {
            event.preventDefault();
            var form = $(this).closest('form');
            var data = form.serialize();
            data += '&video_id=' + video_id + '&action=tutor_add_video_mcq';
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function(response) {
                    if (response === 'success') {
                        console.log(response);
                        alert('Question added successfully');
                        location.reload();
                    } else {
                        alert('Failed to add question');
                    }
                }
            });
        });

        $('[id^=save-mcq_]').click(function(e) {
            e.preventDefault();
            var id = $(this).attr('id').split('_')[1];
            var form = $('#' + id);
            var data = form.serialize();
            data += '&action=tutor_update_video_mcq&mcq_id=' + id;
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function(response) {
                    if (response === 'success') {
                        alert('Question updated successfully');
                        location.reload();
                    } else {
                        alert('Failed to update question');
                    }
                }
            });
        });




    });
</script>
<?php $this->view('inc/Footer') ?>
</body>

</html>