<?php $this->view('inc/Header', $data) ?>
<?php $questions = $data['questions']; ?>
<?php $video = $data['video']; ?>
<body>
    <div id="timer"></div>
    <section class="courses">
        <h1 class="heading"><?php echo $video->name; ?> Model questions</h1>
        <section class="form-container" style="display: block;">
            <form id="modelPaperForm" action="<?php echo URLROOT; ?>/student/submit_video_answers" method="post" enctype="multipart/form-data">
                <?php $i = 1;
                foreach ($questions as $question) : ?>
                    <section style="display: block;">
                        <div class="flex">
                            <div class="col">
                                <p><?php echo $i; $i++; ?>. <?php echo $question->question; ?></p>
                                <input type="radio" hidden checked name="<?php echo $question->mcq_id; ?>" value="null">
                                <input type="radio" name="<?php echo $question->mcq_id; ?>" value="option1"> <?php echo $question->option1; ?><br>
                                <input type="radio" name="<?php echo $question->mcq_id; ?>" value="option2"> <?php echo $question->option2; ?><br>
                                <input type="radio" name="<?php echo $question->mcq_id; ?>" value="option3"> <?php echo $question->option3; ?><br>
                                <input type="radio" name="<?php echo $question->mcq_id; ?>" value="option4"> <?php echo $question->option4; ?><br>
                                <input type="radio" name="<?php echo $question->mcq_id; ?>" value="option5"> <?php echo $question->option5; ?><br>
                            </div>
                        </div>
                    </section>
                <?php endforeach; ?>
                <div style="display: flex; flex-direction:row-reverse">
                    <input type="hidden" name="video_content_id" value="<?php echo $video->video_content_id; ?>">
                    <button type="submit" id="submit" name="submit" class="btn" style="width: fit-content;">Submit <i class="fa-solid fa-file-arrow-up"></i></button>
                </div>
            </form>
        </section>
    </section>
    <?php $this->view('inc/Footer') ?>
