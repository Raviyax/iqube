<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IQube Staff Login</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/styles.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <style>
        /* Add the CSS styles here */
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

        /* Style for each MCQ section */
        section {
            margin-bottom: 20px;
        }

        /* Style for MCQ question */
        .col p {
            font-weight: bold;
            margin-bottom: 10px;
        }

        /* Style for MCQ options */
        .col input[type="radio"] {
            margin-right: 10px;

        }
    </style>
    <script>
        function startTimer(duration) {
            var timerDisplay = document.getElementById('timer');
            var timer = duration * 60; // Convert minutes to seconds
            var interval = setInterval(function() {
                var minutes = Math.floor(timer / 60);
                var seconds = timer % 60;
                minutes = minutes < 10 ? '0' + minutes : minutes;
                seconds = seconds < 10 ? '0' + seconds : seconds;
                timerDisplay.textContent = minutes + ':' + seconds;
                if (--timer < 0) {
                    clearInterval(interval);
                    timerDisplay.textContent = '00:00'; // Timer reaches 0
                }
            }, 1000); // Update the timer every second
        }

        window.onload = function() {
            history.pushState(null, null, document.URL);
            window.addEventListener('popstate', function() {
                history.pushState(null, null, document.URL);
            });
        }





        window.addEventListener('contextmenu', function(e) {
            e.preventDefault();
        });

        // Prevent navigation using back and forward buttons
        window.onload = function() {
            history.pushState(null, null, document.URL);
            window.addEventListener('popstate', function() {
                history.pushState(null, null, document.URL);
            });
        };

        window.addEventListener('keydown', function(e) {
            e.preventDefault();
            alert("Keyboard inputs are disabled for this exam.");
        });

        var lastClickTime = 0;
        document.querySelectorAll('.answer-choice').forEach(function(answerChoice) {
            answerChoice.addEventListener('click', function(event) {
                var currentTime = new Date().getTime();
                if (currentTime - lastClickTime < 1000) { // Less than 1 second between clicks
                    alert("Please answer the questions without rushing.");
                }
                lastClickTime = currentTime;
            });
        });
    </script>
</head>
<?php $questions = $data['questions']; ?>
<?php $model_paper = $data['model_paper']; ?>

<body onload="startTimer(<?php echo $model_paper->time_duration; ?>)" style="padding-left: 0;">
    <div id="timer"></div>

    <section class="courses">
        <h1 class="heading"><?php echo $model_paper->name; ?> - <?php echo $model_paper->time_duration; ?> Mins </h1>
        <section class="form-container" style="display: block;">
            <form action="<?php echo URLROOT; ?>/student/submit_model_paper" method="post" enctype="multipart/form-data">

                <?php $i = 1;
                foreach ($questions as $question) : ?>
                    <section style="display: block;">
                        <div class="flex">
                            <div class="col">
                                <p><?php echo $i;
                                    $i++; ?>. <?php echo $question->question; ?></p>
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
                    <input type="hidden" name="model_paper_content_id" value="<?php echo $model_paper->model_paper_content_id; ?>">
                    <button type="submit" name="submit" class="btn" style="width: fit-content;">Submit <i class="fa-solid fa-file-arrow-up"></i></button>
                </div>
            </form>
        </section>
    </section>

</body>

</html>