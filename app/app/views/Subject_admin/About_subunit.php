<?php $this->view('inc/Header', $data) ?>
<?php $subunit = $data['subunit'];
if (isset($data['videos_by_subunit'])) {
    $videos_by_subunit = $data['videos_by_subunit'];
}
if (isset($data['model_papers_by_subunit'])) {
    $model_papers_by_subunit = $data['model_papers_by_subunit'];
}
if (isset($data['mcqs'])) {
    $mcqs = $data['mcqs'];
}
?>
<section class="dashboard">
    <h1 class="heading"><?php echo ucfirst($_SESSION['USER_DATA']['subject']); ?> syllabus / <?php echo $subunit->chapter_level_1; ?> / <?php echo $subunit->chapter_level_2; ?></h1>






    <section class="unit-container" style="margin-bottom:20px;">
        <div class="box-container" style="margin-bottom: 10px;">

            <div class="box">
                <h3>Materials for <?php echo ucfirst($subunit->chapter_level_2); ?> </h3>
            </div>
        </div>
        <section class="courses" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; margin-bottom:20px;">
            >
            <section class="unit-container" id="chapter_level_1">
                <h2 class="heading" style="border:none;">Model Papers</h2>
                <?php if (isset($model_papers_by_subunit) && count($model_papers_by_subunit) > 0) : ?>
                    <table id="table">
                        <tr>
                            <th>ID</th>
                            <th>Model Paper Name</th>
                            <th>Tutor Name</th>
                            <th>Price</th>
                            <th>Added Date</th>
                            <th>Active</th>
                        </tr>
                        <?php foreach ($model_papers_by_subunit as $model_paper) : ?>
                            <tr>
                                <td><?php echo $model_paper->model_paper_content_id; ?></td>
                                <td><?php echo $model_paper->name; ?></td>
                                <td><?php echo $model_paper->tutor_name; ?></td>
                                <td><?php echo $model_paper->price; ?></td>
                                <td><?php echo $model_paper->date; ?></td>
                                <td><?php echo $model_paper->active; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php else : ?>
                    <p>No model papers found</p>
                <?php endif; ?>
            </section>
        </section>



        <section class="courses" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
            <section class="unit-container">
                <h2 class="heading" style="border:none;">Videos</h2>
                <?php if (isset($videos_by_subunit) && count($videos_by_subunit) > 0) : ?>

                    <table id="table">
                        <tr>
                            <th>ID</th>
                            <th>Video Name</th>
                            <th>Tutor Name</th>
                            <th>Price</th>
                            <th>Added Date</th>
                            <th>Active</th>
                        </tr>
                        <?php foreach ($videos_by_subunit as $video) : ?>
                            <tr>
                                <td><?php echo $video->video_content_id; ?></td>
                                <td><?php echo $video->name; ?></td>
                                <td><?php echo $video->tutor_name; ?></td>
                                <td><?php echo $video->price; ?></td>
                                <td><?php echo $video->date; ?></td>
                                <td><?php echo $video->active; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>

                <?php else : ?>
                    <p>No videos found</p>
                <?php endif; ?>
            </section>
        </section>
    </section>


    <section class="unit-container">
        <div class="box-container" style="margin-bottom: 10px;">

            <div class="box">
                <h3>Questions for track progress in <?php echo ucfirst($subunit->chapter_level_2); ?> </h3>
            </div>
        </div>
        <section class="courses" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">


            <section class="form-container" style="display: block;">

            <form action="" id="new" method="post" enctype="multipart/form-data" style="display: none;">
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
                                <button type="submit" class="btn" style="width: fit-content;">Save Question<i class="fa-solid fa-file-arrow-up"></i></button>
                            </div>
                        </section>
                    </form>

                <?php foreach ($mcqs as $key => $mcq) : ?>
                    <form action="" id="<?php echo $mcq->mcq_id; ?>"  data-contains="backend" method="post" enctype="multipart/form-data">
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
                        </section>
                    </form>
                <?php endforeach; ?>

                <div style="display: flex;" id="addnewbuttondiv">
                    <button onclick="addNewQuestion()" class="btn" style="width: fit-content;">Add New Question <i class="fa-solid fa-circle-plus"></i></button>
                </div>
            </section>
        </section>
    </section>
</section>
<!-- registe section ends -->
</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
//on click addnewquestion clone the form id = new and add before addnewquestion button and display flex 
    function addNewQuestion() {
        $('#new').clone().attr('id', 'newmcq').insertBefore('#addnewbuttondiv').css('display', 'block');
    }
    
//if any form with data-contains="backend" is changed then display savechangesdiv of respective form
$('form[data-contains="backend"]').change(function() {
    //display only the save changes button of the form that is changed
    $(this).find('#savechangesdiv').css('display', 'flex');
});



    const URLROOT = '<?= URLROOT ?>';
    const api_root = URLROOT + '/api.php';

    //on click of save button
    $('[id^=save-mcq_]').click(function(e) {
        e.preventDefault();
        var id = $(this).attr('id').split('_')[1];
        var form = $('#' + id);
        var data = form.serialize();
        $.ajax({
            url: api_root,
            type: 'POST',
            data: data + '&action=subject_admin_save_mcq&mcq_id=' + id,
            success: function(response) {
                if (response === 'success') {
                    alert('Question saved successfully');
                    window.location.reload();
                } else {
                    alert('Failed to save question');
                }
            }
        });
    });
</script>
<?php $this->view('inc/Footer') ?>
</body>

</html>