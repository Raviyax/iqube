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
</head>

<body style="padding-left: 0;">
    <?php $model_paper = $data['model_paper'];

    // Accessing chapters array
    $chapters = $model_paper->chapters;
    ?>

    <section class="playlist">
        <h1 class="heading"><?php echo $data['model_paper']->name; ?></h1>
        <div class="row" style="margin-bottom: 10px;">

            <div class="col">
                <div class="tutor">
                    <img src="<?php echo URLROOT; ?>/assets/img/iqube.png" alt="">
                    <div>
                        <h3>Please read following carefully</h3>

                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-bottom: 10px;">

            <div class="col">
                <div class="details">
                    <h3>Make sure that you have covered following chapters in <?php echo $data['model_paper']->subject; ?> syllabus </h3>
                    <?php
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
                    ?>
                </div>
            </div>
        </div>

        <div class="row" style="margin-bottom: 10px;">
            <div class="col">
                <div class="details">
                    <h3>Time Duration</h3>
                    <p><?php echo $data['model_paper']->time_duration; ?> Minutes</p>
                </div>
            </div>
        </div>

        <div class="row" style="margin-bottom: 10px;">
            <div class="col">
                <div class="details">
                    <h3>Instructions</h3>
                    <p>Each question only has only one correct answer. </p>
                    <p>There is no negative marking for wrong answers. </p>
                    <p>Do not refresh the page during the test. </p>
                    <p>Do not close the browser during the test. </p>
                    <p>Do not use the back and forward button during the test. </p>
                    <p>Do not use the browser search bar during the test. </p>
                    <p>Questions will be displayed one at a time. A next button is provided at the bottom of the test page for navigating to the next question.</p>
                </div>
                <button class="btn" onclick="openPaper()">Start Paper <i class="fa-solid fa-stopwatch-20"></i></button>
            </div>

           
    </section>

  
</body>

<script>
    function openPaper() {
        <?php if(isset($data['model_paper']) && isset($data['model_paper']->model_paper_content_id)): ?>
            var modelPaperId = "<?php echo urlencode($data['model_paper']->model_paper_content_id); ?>";
            var url = "<?php echo URLROOT; ?>/Student/Do_model_paper?model_paper_id=" + modelPaperId;
            var childWindow = window.open(url, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");

            // Listen for message from the child window
            window.addEventListener('message', function(event) {
                // Check if the message is a redirection request
                if (event.data && event.data.type === 'redirect') {
                    // Redirect to the specified URL
                    var redirectUrl = "<?php echo URLROOT; ?>/Student/view_model_paper_answers/<?php echo $data['model_paper']->model_paper_content_id; ?>";
                    window.location.href = redirectUrl;
                }
            });
        <?php else: ?>
            console.error("Model paper data is missing or invalid.");
        <?php endif; ?>
    }
</script>


</html>
</body>

</html>