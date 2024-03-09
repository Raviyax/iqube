<?php $this->view('inc/header', $data) ?>
<section class="courses">
    <h1 class="heading">My contents / Add new video / Add MCQs from video</h1>
    <section class="form-container" style="display: block;">
        <form action="<?php echo URLROOT ?>/Tutor/add_new_video?video_content_id=" method="post" enctype="multipart/form-data">
            <section id="unit1" style="display: block;">
                <div class="flex">
                    <div class="col">
                        <p id="unitLabel1">Unit 1<span>*</span></p>
                        <input type="text" name="Unit1" placeholder="" maxlength="400" required class="box">
                        <div style="margin-left: 50px;" id="Unit1_subunit1">
                            <p id="subunitLabel1">Subunit 1</p>
                            <div class="flex">
                                <input type="text" name="Unit1_subunit1" placeholder="" maxlength="400" required class="box">
                            </div>
                        </div>
                        <button class="btn" style="width:min-content; height:min-content;" name="addnewsubunit" onclick="cloneSubunit(1)"><i class="fa-solid fa-circle-plus"></i></button>
                    </div>
                </div>
            </section>
            <div style="display: flex;">
                <button class="btn" style="width: fit-content;" onclick="cloneUnit()">Add Unit<i class="fa-solid fa-circle-plus"></i></button>
            </div>
            <div style="display: flex; flex-direction:row-reverse">
                <button type="submit" name="submit-mcq" class="btn" style="width: fit-content;">Submit <i class="fa-solid fa-file-arrow-up"></i></button>
            </div>
        </form>
    </section>
</section>
<script>
  var unitCounter = 1;
var subunitCounter = 0;
function cloneUnit() {
    unitCounter++;
    var newUnit = document.getElementById('unit1').cloneNode(true);
    newUnit.id = 'unit' + unitCounter;
    newUnit.querySelector('#unitLabel1').textContent = 'Unit ' + unitCounter;
    newUnit.querySelector('input[name="Unit1"]').name = 'Unit' + unitCounter;
    
    // Set the label and name for the first subunit of the new unit
    newUnit.querySelector('#subunitLabel1').textContent = 'Subunit 1';
    newUnit.querySelector('input[name="Unit1_subunit1"]').name = 'Unit' + unitCounter + '_subunit1';
    newUnit.querySelector('.flex').id = 'Unit' + unitCounter + '_subunit1';
    newUnit.querySelector('button[name="addnewsubunit"]').setAttribute('onclick', 'cloneSubunit(' + unitCounter + ')');
    newUnit.querySelector('#Unit1_subunit1').id = 'Unit' + unitCounter + '_subunit1';
    var lastUnit = document.querySelector('.form-container').querySelectorAll('section[id^="unit"]')[unitCounter - 2];
    lastUnit.parentNode.insertBefore(newUnit, lastUnit.nextSibling);
}
function cloneSubunit(unitNumber) {
    subunitCounter++;
    var unitId = 'Unit' + unitNumber + '_subunit' + subunitCounter;
    var newSubunit = document.getElementById('Unit' + unitNumber + '_subunit1').cloneNode(true);
    newSubunit.querySelector('input[name="Unit' + unitNumber + '_subunit1"]').name = 'Unit' + unitNumber + '_subunit' + subunitCounter;
    newSubunit.querySelector('#subunitLabel1').textContent = 'Subunit ' + (subunitCounter + 1); // Update the subunit label
    newSubunit.id = unitId;
    document.getElementById('unit' + unitNumber).appendChild(newSubunit);
    //clone before button
}
</script>
<?php $this->view('inc/Footer') ?>
</body>
</html>