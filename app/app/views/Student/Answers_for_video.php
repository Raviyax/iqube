<?php $this->view('inc/Header', $data) ?>
<?php $video = $data['video']; ?>
<?php $video = $data['video'];
$result = $data['result'];
$questions = $data['questions'];
$student_answers = $data['students_answers'];
?>
<section class="watch-video">
    <h1 class="heading">Study Materials / Videos / <?php echo $video->name; ?> / Answers</h1>
    <section class="playlist">
        <div class="row" style="margin-bottom: 10px;">
            <div class="col">
                <div class="tutor" style="flex-direction: column;">
                    <div>
                        <h3>Result of the last attempt - <?php echo $result . ' / ' . count($questions); ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="video-details">
        <video src="<?php echo URLROOT; ?>/student/retrieve_video/<?php echo $video->video; ?>" class="video" poster="<?php echo URLROOT; ?>/student/video_thumbnail/<?php echo $video->thumbnail; ?>" controls></video>
    </div>
</section>
<section class="courses">
    <?php $i = 1; ?>
    <?php foreach ($questions as $question) : ?>
        <div class="chaptercontainer">
            <ul>
                <li>
                    <p><b><?php echo $i;
                            $i++; ?>. <?php echo $question->question; ?></b></p>
                    <ul>
                        <li>
                            <p style="margin-left:5px;">I. <?php echo $question->option1; ?></p>
                        </li>
                        <li>
                            <p style="margin-left:5px;">II. <?php echo $question->option2; ?></p>
                        </li>
                        <li>
                            <p style="margin-left:5px;">III. <?php echo $question->option3; ?></p>
                        </li>
                        <li>
                            <p style="margin-left:5px;">IV. <?php echo $question->option4; ?></p>
                        </li>
                        <li>
                            <p style="margin-left:5px;">V. <?php echo $question->option5; ?></p>
                        </li>
                    </ul>
                </li>
            </ul>
            <?php
            $matched_answer = null;
            foreach ($student_answers as $student_answer) {
                if ($student_answer->mcq_id == $question->mcq_id) {
                    $matched_answer = $student_answer;
                    break;
                }
            }
            ?>
            <?php if ($matched_answer !== null) : ?>
                <?php if ($matched_answer->answer == $question->correct) : ?>
                    <p style="color: green;"><b>Answer - <?php echo $question->correct; ?></b></p>
                <?php else : ?>
                    <p style="color: red;"><b>Selected - <?php echo $matched_answer->answer; ?></b></p>
                    <p style="color: green;"><b>Correct Answer - <?php echo $question->correct; ?></b></p>
                <?php endif; ?>
            <?php else : ?>
                <p style="color: red;"><b>Not Marked</b></p>
                <p style="color: green;"><b>Correct Answer - <?php echo $question->correct; ?></b></p>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
    <a href="<?php echo URLROOT . '/student/video_overview/' . $video->video_content_id; ?>" class="btn" type="button" style="width: fit-content;" id="attemptAgain">Try again</a>
</section>
<section class="comments">
    <h1 class="heading">add a comment</h1>
    <form action="" method="post" class="add-comment">
        <input type="hidden" name="content_id" value="<?= $get_id; ?>">
        <textarea name="comment_box" required placeholder="write your comment..." maxlength="1000" cols="30" rows="10"></textarea>
        <input type="submit" value="add comment" name="add_comment" class="inline-btn">
    </form>
</section>
<?php $this->view('inc/Footer') ?>