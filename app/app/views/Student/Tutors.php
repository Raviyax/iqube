<?php $this->view('inc/Header', $data); ?>
<section class="courses">
<?php $subjects = $data['subjects'];?>
<!-- omplode the subjects in the array with , -->
<?php $printsubjects = implode(', ', $subjects); ?>
<!-- print the subjects -->
    <h1 class="heading">Tutors for <?php echo $printsubjects; ?></h1>
    <header class="header">
        <section style="border-radius: 10px; ">
            <form class="search-form">
                <input type="text" name="searchbar" placeholder="Search by subject..." id="tutorsearchbar" onkeyup="search('tutorlist', 'tutorsearchbar')" maxlength="100">
                <select name="sort" id="sort" onchange="sortBoxes()" >
    <option value="none" selected disabled>Sort by</option>
    <option value="date">Rating</option>
    <option value="price">Purchases</option>
</select>
                <select name="content_type" id="content_type" onchange="filterContainer()">
                    <option value="all" selected>All subjects</option>
                    <?php foreach ($subjects as $subject) : ?>
                        <option value="<?php echo $subject; ?>"><?php echo $subject; ?></option>
                    <?php endforeach; ?>
                </select>
            </form>
        </section>
    </header>
    <div class="box-container" style="margin-top: 10px;">
        <?php $tutors = $data['tutors'];
        if (empty($tutors)) {
            echo "<h3 class='title'>No Tutors Found</h3>";
        } else {
            foreach ($tutors as $subjectTutors) {
                foreach ($subjectTutors as $tutor) {
                    // Access each tutor's specific relevant data
                    $tutor_id = $tutor->tutor_id;
                    $subject = ucfirst($tutor->subject);
                    $fname = ucfirst($tutor->fname);
                    $lname = ucfirst($tutor->lname);
                    $image = $tutor->image;
                    $approved_date = $tutor->approved_date;
                    echo '  <div class="box" id="tutor">
                    <img src="'.URLROOT.'/Student/userimage/'.$image.'" class="thumb" alt="">
                    <h3 class="title">'.$fname.' '.$lname.'</h3>
                    <h2 class="type">'.$subject.'</h2>
                    <div>
                        <span>'.$approved_date.'</span>
                        <p>4.2 Rate</p>
                    </div>
                    <a href="'. URLROOT.'/Student/tutor_profile/'.$tutor_id.'" class="inline-btn">view Tutor</a>
                </div>';
                }
                // Display each tutor's data in a box
            }
        } ?>
    </div>
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
        boxes.sort(function (a, b) {
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
        boxes.forEach(function (box) {
            container.appendChild(box);
        });
    }
</script>
<?php $this->view('inc/Footer'); ?>
</body>
</html>
