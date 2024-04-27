<?php $this->view('inc/Header', $data); ?>
<?php $subjects = $data['subjects']; ?>
<?php $printsubjects = implode(', ', $subjects); ?>


<!-- omplode the subjects in the array with , -->



<section class="playlist">
    <h1 class="heading">Tutors for <?php echo $printsubjects; ?></h1>

    <header class="header" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
        <section>
            <form class="search-form">
                <input type="text" name="searchbar" placeholder="Search by subject..." id="tutorsearchbar" onkeyup="search('tutorlist', 'tutorsearchbar')" maxlength="100">
                <select name="sort" id="sort" onchange="sortBoxes()" style="margin-right:10px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px; padding:5px;">
                    <option value="none" selected disabled>Sort by</option>
                    <option value="date">Rating</option>
                    <option value="price">Purchases</option>
                </select>
                <select name="content_type" id="content_type" onchange="filterContainer()" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px; padding:5px;">
                    <option value="all" selected>All subjects</option>
                    <?php foreach ($subjects as $subject) : ?>
                        <option value="<?php echo $subject; ?>"><?php echo $subject; ?></option>
                    <?php endforeach; ?>
                </select>
            </form>
        </section>
    </header>

    <section class="courses">
        <div class="box-container" style="margin-top: 10px; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px; padding: 50px;">
            <?php $tutors = $data['tutors'];
            if (empty($tutors)) {
                echo "<h3 class='title'>No Tutors Found</h3>";
            } else {
                foreach ($tutors as $subjectTutors) {
                    foreach ($subjectTutors as $tutor) {
                        $tutor_id = $tutor->tutor_id;
                        $subject = ucfirst($tutor->subject);
                        $fname = ucfirst($tutor->fname);
                        $lname = ucfirst($tutor->lname);
                        $image = $tutor->image;
                        $approved_date = $tutor->approved_date;
                        $flagged = $tutor->flagged;
                        if ($flagged == 1) {
                            $flagged = '<h3 style="color:red;"><i class="fa-solid fa-flag"></i></h3>';
                        } else {
                            $flagged = '';
                        }
                        echo '
            <div class="box" style="cursor:pointer"; id="tutor" onclick="window.location.href=\'' . URLROOT . '/Student/tutor_profile/' . $tutor_id . '\'">
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col">
                        <div class="tutor">
                            <img src="' . URLROOT . '/Student/userimage/' . $image . '" alt="">
                            ' . $flagged . '
                            <div>
                                <h3>' . $fname . ' ' . $lname . ' </h3>
                                <span>' . $subject . '</span>
                               
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
                    }
                }
            } ?>

        </div>
    </section>
</section>



<script>
    // JavaScript function to filter and show/hide the entire box-container based on the selected content type 
    function filterContainer() {
        var selectedType = document.getElementById("content_type").value;
        var boxes = document.getElementsByClassName("box");
        for (var i = 0; i < boxes.length; i++) {
            var box = boxes[i];
            var boxType = box.getAttribute("data-type");
            if (selectedType === "all" || boxType === selectedType) {
                box.style.display = "block";
            } else {
                box.style.display = "none";
            }
        }
    }

    function sortBoxes() {
        var sortOption = document.getElementById("sort").value;
        var container = document.querySelector('.box-container');
        var boxes = Array.from(container.getElementsByClassName('box'));
        boxes.sort(function(a, b) {
            var aValue, bValue;
            if (sortOption === "date") {
                aValue = new Date(a.dataset.date);
                bValue = new Date(b.dataset.date);
            } else if (sortOption === "price") {
                aValue = parseFloat(a.dataset.price);
                bValue = parseFloat(b.dataset.price);
            }
            return aValue - bValue;
        });
        // Clear the container
        container.innerHTML = "";
        // Append sorted boxes back to the container
        boxes.forEach(function(box) {
            container.appendChild(box);
        });
    }
</script>
<?php $this->view('inc/Footer'); ?>
</body>

</html>