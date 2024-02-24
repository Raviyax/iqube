<?php $this->view('inc/Header', $data) ?>
<section class="courses">
  <h1 class="heading">My contents / Add new video / General overview and upload video</h1>
  <section class="form-container" style="display: block;">


    <form action="<?php echo URLROOT ?>/Tutor/add_new_video" method="post" enctype="multipart/form-data">

      <!-- section for general overview -->

      <section id="general" style="display: block;">
        
        <div class="flex">
          <div class="col">
          <p>Name for the Video<span>*</span></p>
            <input type="text" name="name" placeholder="Enter the name for your content..." maxlength="50" required class="box">
            <p>Description<span>*</span></p>
            <textarea name="description" id="" cols="30" rows="10" class="box" placeholder="Enter the video description..." required></textarea>
            <p>Price in LKR<span>*</span></p>
            <input type="number" name="price" placeholder="Example : 2500" class="box"> 
            <p>Upload Video (100 MB Max)<span>*</span></p>
            <input type="file" name="video" accept="video/*" required class="box">
            <p>Upload Thumbnail<span>*</span></p>
            <input type="file" name="thumbnail" accept="image/*" required class="box"> 

            <p>Covering Chapters<span>*</span></p>
            <?php
            $chapters = $data['chapters'];
            foreach ($chapters as $chapter) {
              $elements = explode('--->>>', $chapter->chapter_level_2_list_with_id);
              $resultArray = [];
              foreach ($elements as $element) {
                list($id, $chapter_level_2) = explode('-->>', $element);
                $resultArray[] = ['id' => $id, 'chapter_level_2' => $chapter_level_2];
              }
              echo '<div class="chaptercontainer">';
              echo '<ul>';
              echo '<li>';
              echo '<input type="checkbox" id="option"><label for="option"><b>' . $chapter->chapter_level_1 . '</b></label>';
              echo '<ul>';
              
              foreach ($resultArray as $result) {
                  echo '<li><label><input type="checkbox" name="subOption[]" class="subOption" value="' . $result['id'] . '">' . $result['chapter_level_2'] . '</label></li>';
              }
            
              echo '</ul>';
              echo '</li>';
              echo '</ul>';
              echo '</div>';
            }
            ?>
          </div>
        </div>
        <div style="display: flex; flex-direction:row-reverse">
          <button type="submit" class="btn" style="width: fit-content;" name="submit-video">Next <i class="fa-solid fa-arrow-right"></i></button>
        </div>
        
      </section>

      <!-- section for content -->
      

     




    </form>


  </section>
</section>
<!-- registe section ends -->
</body>

</html>
<script>
  var containers = document.querySelectorAll('.chaptercontainer');
  containers.forEach(function(container) {
    var checkboxes = container.querySelectorAll('input.subOption'),
      checkall = container.querySelector('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
      checkboxes[i].onclick = function() {
        var checkedCount = container.querySelectorAll('input.subOption:checked').length;
        checkall.checked = checkedCount > 0;
        checkall.indeterminate = checkedCount > 0 && checkedCount < checkboxes.length;
      }
    }
    checkall.onclick = function() {
      for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = this.checked;
      }
    }
  });

</script>
<?php $this->view('inc/Footer') ?>
</body>

</html>