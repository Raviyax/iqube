<?php $this->view('inc/Header', $data) ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<section class="contents">
    <h1 class="heading">Study Materials</h1>
    <div class="box-container">
    <?php foreach ($data['study_materials'] as $materials): ?>
    <?php foreach ($materials as $material): ?>
        <?php
        $type = $material->type;
        $tutor = $material->tutor;
        $content_id = ($type == 'video') ? $material->video_content_id : $material->model_paper_content_id;
        $thumbnail_directory = ($type == 'video') ? 'video_thumbnail' : 'model_paper_thumbnail';
        ?>
        <div class="box" style="cursor: pointer; box-shadow: rgba(0, 0, 0, 0.17) 0px -23px 25px 0px inset, rgba(0, 0, 0, 0.15) 0px -36px 30px 0px inset, rgba(0, 0, 0, 0.1) 0px -79px 40px 0px inset, rgba(0, 0, 0, 0.06) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px;" id="<?php echo $content_id; ?>" data-type="<?php echo $type; ?>">
            <div class="flex">
                <div><i class="fas fa-dot-circle" style="color:limegreen"></i><span style="color:red">Active</span></div>
                <div><i class="fas fa-calendar"></i><span><?php echo $material->date; ?></span></div>
            </div>
            <img src="<?php echo URLROOT; ?>/student/<?php echo $thumbnail_directory; ?>/<?php echo $material->thumbnail; ?>" class="thumb" alt="">
            <h3 class="title"><?php echo $material->name; ?></h3>
            <h2 class="type"><?php echo ucfirst($tutor); ?></h2>
            <h2 class="type"><?php echo $material->price; ?> LKR</h2>
            <p><i class="fa-solid fa-star-half-stroke"></i> 4.2</p>
        </div>
    <?php endforeach; ?>
<?php endforeach; ?>
    </div>
</section>
<script>
   //on click of div class box
    $('.box').click(function() {
        var content_id = $(this).attr('id');
        var type = $(this).data('type');
        window.location.href = "<?php echo URLROOT; ?>/student/" + type + "_overview/" + content_id;
    });
</script>
<?php $this->view('inc/Footer') ?>
</body>
</html>
