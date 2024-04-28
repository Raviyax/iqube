<?php $this->view('inc/Header', $data) ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<?php $subjects = $data['subjects']; 

?>
<section class="contents">
    <h1 class="heading">Study Materials</h1>

    <header class="header" style="margin-bottom:20px; box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
        <section>
            <form class="search-form">
                <input type="text" name="searchbar" placeholder="Search name..." id="tutorsearchbar" maxlength="100">
     
                           <select name="sort" id="sort" style="margin-right:10px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px; padding:5px;">
                    <option value="none" selected disabled>Sort by</option>
                    <option value="rate">Rating</option>
                    <option value="price">price</option>
                </select>

                <select name="content_type" id="subject" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px; padding:5px;">
                    <option value="all" selected>All subjects</option>
                    <?php foreach ($subjects as $subject) : ?>
                        <option value="<?php echo $subject; ?>"><?php echo $subject; ?></option>
                    <?php endforeach; ?>
                </select>
                   
                </select>
            </form>
        </section>
    </header>

    <div class="box-container">
    <?php foreach ($data['study_materials'] as $materials): ?>
    <?php foreach ($materials as $material): ?>
        <?php
        $type = $material->type;
        $tutor = $material->tutor;
        $content_id = ($type == 'video') ? $material->video_content_id : $material->model_paper_content_id;
        $thumbnail_directory = ($type == 'video') ? 'video_thumbnail' : 'model_paper_thumbnail';
        ?>
        <div class="box" data-price="<?php echo $material->price; ?>" data-rate="<?php echo round($material->rating, 1); ?>" style="cursor: pointer;box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;" id="<?php echo $content_id; ?>" data-type="<?php echo $type; ?>" data-subject="<?php echo $material->subject; ?>">
            <div class="flex">
                <div><i class="fas fa-dot-circle" style="color:limegreen"></i><span style="color:red">Active</span></div>
                <div><i class="fas fa-calendar"></i><span><?php echo $material->date; ?></span></div>
            </div>
            <img src="<?php echo URLROOT; ?>/student/<?php echo $thumbnail_directory; ?>/<?php echo $material->thumbnail; ?>" class="thumb" alt="">
            <h3 class="title"><?php echo $material->name; ?></h3>
            <h2 class="type"><?php echo ucfirst($tutor); ?></h2>
            <h2  class="type"><?php echo $material->price; ?> LKR</h2>
            <p ><i class="fa-solid fa-star-half-stroke"></i> <?php echo round($material->rating, 1); ?></p>
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

    $(document).ready(function(){
        $('#tutorsearchbar').on('keyup', function(){
            var search = $(this).val().toLowerCase();
            $('.box').each(function(){
                var title = $(this).find('.title').text().toLowerCase();
                if(title.indexOf(search) == -1){
                    $(this).hide();
                }else{
                    $(this).show();
                }
            });
        });

    //sort from subject
    $('#subject').change(function(){
        var subject = $(this).val();
        var boxes = $('.box');
        if(subject != 'all'){
            boxes.each(function(){
                if($(this).data('subject') != subject){
                    $(this).hide();
                }else{
                    $(this).show();
                }
            });
        }else{
            boxes.show();
        }
    });


    //sort from rate and price from data-rate and data-price
    $('#sort').change(function(){
        var sort = $(this).val();
        var boxes = $('.box');
        if(sort == 'rate'){
            boxes.sort(function(a, b){
                return $(b).data('rate') - $(a).data('rate');
            });
        }else if(sort == 'price'){
            boxes.sort(function(a, b){
                return $(a).data('price') - $(b).data('price');
            });
        }
        $('.box-container').html(boxes);


    });

    });



    //sort from rate and price from data-rate and data-price

</script>
<?php $this->view('inc/Footer') ?>
</body>
</html>
