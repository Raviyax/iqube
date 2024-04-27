<?php $this->view('inc/Header', $data) ?>
<?php $video = $data['video'];

?>

<section class="dashboard">
    <section class="playlist">
        <h1 class="heading"><?php echo $_SESSION['USER_DATA']['subject'];?> videos / <?php echo $video->name; ?></h1>
        <div class="row">
            <div class="col">
                <div class="thumb">

                    <img src="<?php echo URLROOT; ?>/subjectadmin/video_thumbnail/<?php echo $video->thumbnail; ?>" alt="">

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
           
                </div>
            </div>
        </div>



        <div class="row" style="margin-bottom: 7px;">
            <section class="watch-video">
                <div class="video-details">
                    <video src="<?php echo URLROOT; ?>/subjectadmin/video/<?php echo $video->video; ?>" class="video" poster="<?php echo URLROOT; ?>/subjectadmin/video_thumbnail/<?php echo $video->thumbnail; ?>" controls></video>

                </div>
            </section>
        </div>
    

  
</section>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  

    $(document).ready(function() {
        const url = "<?php echo URLROOT; ?>/api.php";
        const video_id = "<?php echo $video->video_content_id; ?>";





        //active and deactive
        $('#activate').click(function() {
            event.preventDefault();
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    video_id: video_id,
                    action: 'subject_admin_activate_video'
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
                    action: 'subject_admin_deactivate_video'
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


    });
</script>
<?php $this->view('inc/Footer') ?>
</body>

</html>