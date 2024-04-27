<?php $this->view('inc/Header', $data) ?>
<?php $model_paper = $data['model_paper'];

?>
<section class="dashboard">
    <section class="playlist">
        <h1 class="heading"><?php $_SESSION['USER_DATA']['subject'];?> model papers / <?php echo $model_paper->name; ?></h1>
        <div class="row">
            <div class="col">
                <div class="thumb">
                    <span><?php echo $model_paper->time_duration; ?> Minutes</span>
                    <img src="<?php echo URLROOT; ?>/subjectadmin/model_paper_thumbnail/<?php echo $model_paper->thumbnail; ?>" alt="">
                </div>
            </div>
            <div class="col">
                <div class="details">
                    <h3><?php echo $model_paper->name; ?></h3>
                    <p><?php echo $model_paper->description; ?></p>

                    <div class="date">Added date: <?php $date = $model_paper->date;
                                                    $formattedDate = date('Y-m-d', strtotime($date));
                                                    echo $formattedDate; ?></div>
                    <div style="margin-top: 10px;">
                        <?php if ($model_paper->active == 1) { ?>
                            <button id="deactivate" class="button-34" style="background-color:Green" role="button">Active</button>
                        <?php } else { ?>
                            <button id="activate" class="button-34" style="background-color:Red" role="button">Inactive</button>
                        <?php } ?>
                    </div>
                 
                </div>
            </div>
        </div>
    </section>

</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
 

    $(document).ready(function() {
        const url = "<?php echo URLROOT; ?>/api.php";
        const model_paper_id = "<?php echo $model_paper->model_paper_content_id; ?>";


      
        //active and deactive
        $('#activate').click(function() {
            event.preventDefault();
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    model_paper_id: model_paper_id,
                    action: 'subject_admin_activate_model_paper'
                },
                success: function(response) {
                    if (response === 'success') {
                        alert('Model paper activated successfully');
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
                    model_paper_id: model_paper_id,
                    action: 'subject_admin_deactivate_model_paper'
                },
                success: function(response) {
                    if (response === 'success') {
                        alert('Model paper deactivated successfully');
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