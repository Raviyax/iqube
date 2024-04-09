<?php $this->view('inc/header', $data) ?>
<section class="courses">
    <h1 class="heading">Manage <?php echo $_SESSION['USER_DATA']['subject'];?> Syllabus</h1>
   
    <section class="form-container" style="display: block;">
        <form action="" method="post" enctype="multipart/form-data">

            <section class="unit-container chaptercontainer" id="unit-"  style="display:none;">
                <div class="flex">
                    <div class="col">
                        <p class="unitLabel">Unit 1<span>*</span></p>
                        <input type="text" name="Unit1" placeholder="" maxlength="400" required class="box">
                        <div style="margin-left: 50px;" class="subunit" id="Unit1_subunit1">
                            <p class="subunitLabel">Subunit 1</p>
                            <div class="flex">
                                <input type="text" name="Unit1_subunit1" placeholder="" maxlength="400" required class="box">
                            </div>
                        </div>
                        <button class="btn addnewsubunit" style="width:min-content; height:min-content;" name="addnewsubunit" onclick="cloneSubunit(0)"><i class="fa-solid fa-circle-plus"></i></button>
                    </div>
                </div>
            </section>

            <?php
            $chapters = $data['syllabus'];
            foreach ($chapters as $chapter) {
              $elements = explode('--->>>', $chapter->chapter_level_2_list_with_id);
              $resultArray = [];
              foreach ($elements as $element) {
                list($id, $chapter_level_2) = explode('-->>', $element);
                $resultArray[] = ['id' => $id, 'chapter_level_2' => $chapter_level_2];
              }
              echo '<section class="unit-container chaptercontainer" id="unit1" >';
              echo '<div class="flex">';
              echo '<div class="col">';
            //   echo '<p class="unitLabel">Unit number x<span>*</span></p>';
                echo '<input type="text" name="Unit1" placeholder="" maxlength="400" required class="box" value="'.$chapter->chapter_level_1.'">';
              foreach ($resultArray as $result) {
                  echo '<div class="subunit" id="Unit1_subunit1" style="margin-left: 50px;">';
                    // echo '<p class="subunitLabel">Subunit number x</p>';
                    echo '<div class="flex">';
                      echo '<input type="text" name="Unit1_subunit1" placeholder="" maxlength="400" required class="box" value="'.$result['chapter_level_2'].'">';
                    echo '</div>';
                    echo '</div>';

              }
                echo '<button class="btn addnewsubunit" style="width:min-content; height:min-content;" name="addnewsubunit" onclick="cloneSubunit(0)"><i class="fa-solid fa-circle-plus"></i></button>';
                echo '</div>';
                echo '</div>';
                echo '</section>';


            }
            ?>

            <!-- <section class="unit-container" id="unit1" class="chaptercontainer">
                <div class="flex">
                    <div class="col">
                        <p class="unitLabel">Unit 1<span>*</span></p>
                        <input type="text" name="Unit1" placeholder="" maxlength="400" required class="box">
                        <div style="margin-left: 50px;" class="subunit" id="Unit1_subunit1">
                            <p class="subunitLabel">Subunit 1</p>
                            <div class="flex">
                                <input type="text" name="Unit1_subunit1" placeholder="" maxlength="400" required class="box">
                            </div>
                        </div>
                        <button class="btn addnewsubunit" style="width:min-content; height:min-content;" name="addnewsubunit" onclick="cloneSubunit(1)"><i class="fa-solid fa-circle-plus"></i></button>
                    </div>
                </div>
            </section> -->
      
            <div style="display: flex;">
                <button class="btn addUnitBtn" style="width: fit-content;" onclick="cloneUnit()">Add Unit<i class="fa-solid fa-circle-plus"></i></button>
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
        var newUnit = document.getElementById('unit-').cloneNode(true);
        newUnit.id = 'unit' + unitCounter;
        newUnit.querySelector('.unitLabel').textContent = 'Unit ' + unitCounter;
        newUnit.querySelector('input[name="Unit1"]').name = 'Unit' + unitCounter;
        newUnit.querySelector('.subunitLabel').textContent = 'Subunit 1';
        newUnit.querySelector('input[name="Unit1_subunit1"]').name = 'Unit' + unitCounter + '_subunit1';
        newUnit.querySelector('.flex').id = 'Unit' + unitCounter + '_subunit1';
        newUnit.querySelector('.addnewsubunit').setAttribute('onclick', 'cloneSubunit(' + unitCounter + ')');
        newUnit.querySelector('.subunit').id = 'Unit' + unitCounter + '_subunit1';
        var lastUnit = document.querySelector('.form-container').querySelectorAll('.unit-container')[unitCounter - 2];
        lastUnit.parentNode.insertBefore(newUnit, lastUnit.nextSibling);
        newUnit.style.display = 'block';
        newUnit.querySelector('input').removeAttribute('disabled');
    }

    function cloneSubunit(unitNumber) {
        subunitCounter++;
        var unitId = 'Unit' + unitNumber + '_subunit' + subunitCounter;
        var newSubunit = document.querySelector('.unit-container').querySelector('.subunit').cloneNode(true);
        newSubunit.querySelector('input[name="Unit1_subunit1"]').name = 'Unit' + unitNumber + '_subunit' + subunitCounter;
        newSubunit.querySelector('.subunitLabel').textContent = 'Subunit ' + (subunitCounter + 1); // Update the subunit label
        newSubunit.id = unitId;
        document.getElementById('unit' + unitNumber).appendChild(newSubunit);
        //se;ect the button with calling clonesubunit with current unit number
        var button = document.getElementById('unit' + unitNumber).querySelector('button[name="addnewsubunit"]'); 
       
        //insert the newSubunit before the button
        button.parentNode.insertBefore(newSubunit, button);
    }
</script>
<?php $this->view('inc/Footer') ?>
</body>
</html>
