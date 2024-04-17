<?php $this->view('inc/Header', $data) ?>
<?php $model_paper = $data['model_paper'];
    $result = $data['result'];
    $questions = $data['questions'];
    $student_answers = $data['students_answers'];
    ?>
<section class="courses">
    <h1 class="heading">Study Materials / Model Papers / <?php echo $model_paper->name;?> / Answers</h1>

    <section class="playlist">

    <div class="row" style="margin-bottom: 10px;">

<div class="col">
    <div class="tutor" style="flex-direction: column;">
        
        <div>
            <!-- numver of correct answers out of number of questions -->
            <h3>Result of the last attempt - <?php echo $result . ' / ' . count($questions); ?></h3>
            

        </div>
    </div>
</div>
</div>
    </section>
   <?php $i = 1; ?>
    <?php foreach ($questions as $question) : ?>
        <div class="chaptercontainer">
            <ul>
                <li>
                    <p><b><?php echo $i; $i++;?>. <?php echo $question->question; ?></b></p>
                    <ul>
                        <li><p style="margin-left:5px;">I. <?php echo $question->option1; ?></p></li>
                        <li><p style="margin-left:5px;">II. <?php echo $question->option2; ?></p></li>
                        <li><p style="margin-left:5px;">III. <?php echo $question->option3; ?></p></li>
                        <li><p style="margin-left:5px;">IV. <?php echo $question->option4; ?></p></li>
                        <li><p style="margin-left:5px;">V. <?php echo $question->option5; ?></p></li>
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

    <button class="btn" style="width: fit-content;" onclick="window.location.href='<?php echo URLROOT . '/Student/Model_paper/' . $model_paper->model_paper_id; ?>'">Attempt Again</button>
</section>
<?php $this->view('inc/Footer') ?>
