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
    <?php $subunit = $data['subunit'];
    ?>
    <section class="playlist">
        <h1 class="heading">Progress Tracking for <?php echo $subunit->chapter_level_2; ?></h1>
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
                    <h3>Make sure that you have covered the following chapter</h3>
                    <div class="chaptercontainer" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
                        <ul>
                            <li>
                                <h2 class="heading" style="border:none;"><i class="fa-solid fa-arrow-right"></i> <b><?php echo $subunit->subject; ?></b></h2>
                                <ul>
                                    <li>
                                        <h2 class="heading" style="border:none; margin-left:10px;"><i class="fa-solid fa-arrow-right"></i> <?php echo $subunit->chapter_level_1; ?></h2>
                                    </li>
                                    <li>
                                        <h2 class="heading" style="border:none; margin-left:20px;"><i class="fa-solid fa-arrow-right"></i> <?php echo $subunit->chapter_level_2; ?></h2>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-bottom: 10px;">
            <div class="col">
                <div class="details">
                    <h3>Time Duration</h3>
                    <p><?php echo $subunit->model_paper_duration; ?> Minutes</p>
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
                </div>
                <button class="btn" onclick="openPaper()">Start Paper <i class="fa-solid fa-stopwatch-20"></i></button>
            </div>
    </section>
</body>
<script>
    function openPaper() {
        <?php if (isset($subunit) && isset($subunit->id)) : ?>
            var subUnitId = "<?php echo urlencode($subunit->id); ?>";
            var url = "<?php echo URLROOT; ?>/Student/do_progress_tracking_paper/" + subUnitId + "?start=true";
            var childWindow = window.open(url, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");
            // Listen for message from the child window
            window.addEventListener('message', function(event) {
                // Check if the message is a redirection request
                if (event.data && event.data.type === 'redirect') {
                    // Redirect to the specified URL
                    var redirectUrl = "<?php echo URLROOT; ?>/student/where_am_i/<?php echo $subunit->id; ?>";
                    window.location.href = redirectUrl;
                }
            });
        <?php else : ?>
            console.error("Model paper data is missing or invalid.");
        <?php endif; ?>
    }
</script>
</html>
</body>
</html>