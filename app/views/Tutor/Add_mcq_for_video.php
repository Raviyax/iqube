<?php $this->view('inc/header', $data) ?>
<section class="courses">
  <h1 class="heading">My Contents / Add New Content</h1>
  <section class="form-container" style="display: block;">


    <form action="<?php echo URLROOT ?>/Tutor/add_new" method="post" enctype="multipart/form-data">

    

      <!-- section for mcqs from the video -->

          <section id="mcqs" style="display: block;">
            <h3>MCQs from your Video</h3>
            <div class="flex">
              <div class="col">
                <p>Question<span>*</span></p>
                <input type="text" name="1question" placeholder="Enter the question..." maxlength="50" required class="box">
                <p>Option 1<span>*</span></p>
                <input type="text" name="1option1" placeholder="Enter the first option..." maxlength="50" required class="box">
                <p>Option 2<span>*</span></p>
                <input type="text" name="1option2" placeholder="Enter the second option..." maxlength="50" required class="box">
                <p>Option 3<span>*</span></p>
                <input type="text" name="1option3" placeholder="Enter the third option..." maxlength="50" required class="box">
                <p>Option 4<span>*</span></p>
                <input type="text" name="1option4" placeholder="Enter the fourth option..." maxlength="50" required class="box">
                <p>Correct Answer<span>*</span></p>
                <select name="1correct" class="box" required>
                  <option value="" disabled selected>-- Select the correct answer</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                  <option value="3">Option 3</option>
                  <option value="4">Option 4</option>
                </select>
              </div>
            </div>
            <div style="display: flex;">
              <button onclick="displaycontent()" class="btn" style ="width: fit-content;"><i class="fa-solid fa-arrow-left"></i> Previous</button>
            </div>
            <div style="display: flex; flex-direction:row-reverse">
              <button  class="btn" style="width: fit-content;" >Add New Question <i class="fa-solid fa-circle-plus"></i></button>
            </div>
          </section>




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

  function displaycontent() {
    document.getElementById("general").style.display = "none";
    document.getElementById("content").style.display = "block";
  }

  function displaygeneral() {
    document.getElementById("general").style.display = "block";
    document.getElementById("content").style.display = "none";
  }
</script>
<?php $this->view('inc/footer') ?>
</body>

</html>