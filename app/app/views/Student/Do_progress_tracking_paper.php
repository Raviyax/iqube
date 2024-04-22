<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IQube Staff Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/styles.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <style>
        #timer {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #333;
            color: #fff;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 16px;
        }

        section {
            margin-bottom: 20px;
        }

        .col p {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .col input[type="radio"] {
            margin-right: 10px;
        }
    </style>
</head>
<?php $subunit = $data['subunit']; ?>
<?php $mcqs = $data['mcqs']; ?>

<body>
    <div id="timer"></div>
    <section class="courses">
        <h1 class="heading"><?php echo $subunit->chapter_level_2; ?> - <?php echo $subunit->model_paper_duration; ?> Mins </h1>
        <section class="form-container" style="display: block;">
            <form id="modelPaperForm" action="<?php echo URLROOT; ?>/student/submit_progress_tracking_paper" method="post" enctype="multipart/form-data">
                <?php $i = 1;
                foreach ($mcqs as $mcq) : ?>
                    <section style="display: block;">
                        <div class="flex">
                            <div class="col">
                                <p><?php echo $i;
                                    $i++; ?>. <?php echo $mcq->question; ?></p>
                                <input type="radio" hidden checked name="<?php echo $mcq->mcq_id; ?>" value="null">
                                <input type="radio" name="<?php echo $mcq->mcq_id; ?>" value="option1"> <?php echo $mcq->option1; ?><br>
                                <input type="radio" name="<?php echo $mcq->mcq_id; ?>" value="option2"> <?php echo $mcq->option2; ?><br>
                                <input type="radio" name="<?php echo $mcq->mcq_id; ?>" value="option3"> <?php echo $mcq->option3; ?><br>
                                <input type="radio" name="<?php echo $mcq->mcq_id; ?>" value="option4"> <?php echo $mcq->option4; ?><br>
                                <input type="radio" name="<?php echo $mcq->mcq_id; ?>" value="option5"> <?php echo $mcq->option5; ?><br>
                            </div>
                        </div>
                    </section>
                <?php endforeach; ?>
                <div style="display: flex; flex-direction:row-reverse">
                    <input type="hidden" name="subunit_id" value="<?php echo $subunit->id; ?>">
                    <button type="submit" id="submit" name="submit" class="btn" style="width: fit-content;">Submit <i class="fa-solid fa-file-arrow-up"></i></button>
                </div>
            </form>
        </section>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var timerDisplay = $('#timer');
            var timerInMinutes = <?php echo $subunit->model_paper_duration; ?>;
            var timerInSeconds = timerInMinutes * 60; // Convert minutes to seconds
            var minutes = Math.floor(timerInMinutes);
            var seconds = 0;
            var interval = setInterval(function() {
                minutes = minutes < 10 ? '0' + minutes : minutes;
                seconds = seconds < 10 ? '0' + seconds : seconds;
                timerDisplay.text(minutes + ':' + seconds);
                if (timerInSeconds <= 10) {
                    timerDisplay.css({
                        color: 'red',
                        fontWeight: 'bold'
                    });
                }
                if (--timerInSeconds < 0) {
                    clearInterval(interval);
                    timerDisplay.text('00:00');
                    $('#submit').click();
                } else {
                    minutes = Math.floor(timerInSeconds / 60);
                    seconds = timerInSeconds % 60;
                }
            }, 1000);

            $(document).on('contextmenu', function(e) {
                e.preventDefault();
            });
            $(document).on('keydown', function(e) {
                e.preventDefault();
                alert("Keyboard inputs are disabled for this exam.");
            });
            var lastClickTime = 0;
            $('input[type="radio"]').on('click', function(event) {
                var currentTime = new Date().getTime();
                if (currentTime - lastClickTime < 1000) {
                    alert("Please answer the questions without rushing.");
                }
                lastClickTime = currentTime;
            });
        });
    </script>
</body>

</html>