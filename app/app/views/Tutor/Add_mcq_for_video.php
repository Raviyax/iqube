<?php $this->view('inc/Header', $data) ?>
<section class="courses">
  <h1 class="heading">My contents / Add new video / Add MCQs from video</h1>
  <section class="form-container" style="display: block;">
    <form action="<?php echo URLROOT ?>/Tutor/add_new_video?video_content_id=<?php echo $data['video_content_id'] ?>" method="post" enctype="multipart/form-data">
      <!-- section for mcqs from the video -->
      <section id="question1" style="display: block;">
  <h3>Question 1</h3>
  <div class="flex" >
    <div class="col">
      <p>Question<span>*</span></p>
      <input type="text" name="1question" placeholder="Enter the question..." maxlength="400" required class="box">
      <p>Option 1<span>*</span></p>
      <input type="text" name="1option1" placeholder="Enter the first option..." maxlength="400" required class="box">
      <p>Option 2<span>*</span></p>
      <input type="text" name="1option2" placeholder="Enter the second option..." maxlength="400" required class="box">
      <p>Option 3<span>*</span></p>
      <input type="text" name="1option3" placeholder="Enter the third option..." maxlength="400" required class="box">
      <p>Option 4<span>*</span></p>
      <input type="text" name="1option4" placeholder="Enter the fourth option..." maxlength="400" required class="box">
      <p>Option 5<span>*</span></p>
      <input type="text" name="1option5" placeholder="Enter the fifth option..." maxlength="400" required class="box">
      <p>Correct Answer<span>*</span></p>
      <select name="1correct" class="box" required>
        <option value="" disabled selected>-- Select the correct answer</option>
        <option value="option1">Option 1</option>
        <option value="option2">Option 2</option>
        <option value="option3">Option 3</option>
        <option value="option4">Option 4</option>
        <option value="option5">Option 5</option>
      </select>
    </div>
  </div>
</section>
<div style="display: flex;">
<button onclick="addNewQuestion()" class="btn" style="width: fit-content;" >Add New Question <i class="fa-solid fa-circle-plus"></i></button>
  </div>
  <div style="display: flex; flex-direction:row-reverse">
  <button type="submit" name="submit-mcq" class="btn" style ="width: fit-content;">Submit <i class="fa-solid fa-file-arrow-up"></i></button>
  </div>
    </form>
  </section>
</section>
<!-- registe section ends -->
</body>
</html>
<script>
function addNewQuestion() {
    var existingSections = document.querySelectorAll('[id^=question]');
    if (existingSections.length >= 50) {
        alert("You have reached the maximum limit of 50 questions.");
        return;
    }
    var lastExistingSection = existingSections[existingSections.length - 1];
    var newSection = lastExistingSection.cloneNode(true);
    var newInputs = newSection.querySelectorAll('input, select');
    newInputs.forEach(function(input) {
        if (input.type !== 'button') {
            input.value = '';
        }
    });
    var currentId = parseInt(newSection.id.replace('question', ''));
    var newId = currentId + 1;
    newSection.id = 'question' + newId;
    var question = newSection.querySelector('h3');
    question.textContent = 'Question ' + newId;
    var inputs = newSection.querySelectorAll('input, select');
    inputs.forEach(function(input) {
        if (input.type !== 'button') {
            input.name = input.name.replace(/\d+/, newId);
        }
    });
    lastExistingSection.parentNode.insertBefore(newSection, lastExistingSection.nextSibling);
}
  function displaycontent() {
    document.getElementById("general").style.display = "none";
    document.getElementById("content").style.display = "block";
  }
  function displaygeneral() {
    document.getElementById("general").style.display = "block";
    document.getElementById("content").style.display = "none";
  }
</script>
<?php $this->view('inc/Footer') ?>
</body>
</html>