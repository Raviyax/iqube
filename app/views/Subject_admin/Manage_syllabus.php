<?php $this->view('inc/header', $data) ?>
<section class="courses">
  <h1 class="heading">My contents / Add new video / Add MCQs from video</h1>
  <section class="form-container" style="display: block;">


    <form action="<?php echo URLROOT ?>/Tutor/add_new_video?video_content_id=" method="post" enctype="multipart/form-data">

    <!-- section for mcqs from the video -->

    <section id="unit1" style="display: block;">

        <div class="flex">
            <div class="col">
                <p>Unit 1<span>*</span></p>
                <input type="text" name="Unit" placeholder="" maxlength="400" required class="box">
                <div style="margin-left: 50px;">
                    <p>Subunit 1<span>*</span></p>
                    <div class="flex">
                        <input type="text" name="Unit1_subunit1" placeholder="" maxlength="400" required class="box">
                        <button class="btn" style="width:min-content; height:min-content;" name="addnewsubunit"><i
                                    class="fa-solid fa-circle-plus"></i></button>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <div style="display: flex;">
        <button class="btn" style="width: fit-content;" onclick="cloneSyllabus()">Add Unit<i
                    class="fa-solid fa-circle-plus"></i></button>
    </div>
    <div style="display: flex; flex-direction:row-reverse">
        <button type="submit" name="submit-mcq" class="btn" style="width: fit-content;">Submit <i
                    class="fa-solid fa-file-arrow-up"></i></button>
    </div>

</form>



  </section>
</section>
<!-- registe section ends -->
</body>

</html>
<script>
    var cloneCounter = 1; // Initialize the counter

    function cloneSyllabus() {
        // Clone the section
        var originalSection = document.getElementById('unit1');
        var clonedSection = originalSection.cloneNode(true);

        // Increment the counter
        cloneCounter++;

        // Function to increment ids and names and only <p>Unit 1<span>*</span></p>
        clonedSection.querySelectorAll('[id]').forEach(function (element) {
            element.id = element.id + cloneCounter;
        });
        clonedSection.querySelectorAll('[name]').forEach(function (element) {
            element.name = element.name + cloneCounter;
        });
        clonedSection.querySelectorAll('p').forEach(function (element) {
            element.textContent = element.textContent.replace('Unit 1', 'Unit ' + cloneCounter);
        });

        // Append the cloned section
        originalSection.parentNode.appendChild(clonedSection);
        
      





       

      
    }
</script>



<?php $this->view('inc/footer') ?>
</body>

</html>