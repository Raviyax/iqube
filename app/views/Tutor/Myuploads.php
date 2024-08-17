<?php $this->view('inc/Header', $data); ?>
<section class="courses">
    <h1 class="heading">My Uploads</h1>
    <header class="header">
        <section style="border-radius: 10px; ">
            <form class="search-form">
                <input type="text" name="searchbar" placeholder="Search by subject..." id="tutorsearchbar" onkeyup="search('tutorlist', 'tutorsearchbar')" maxlength="100">
                <select name="sort" id="sort" onchange="sortBoxes()" >
    <option value="none" selected disabled>Sort by</option>
    <option value="date">Date</option>
    <option value="price">Price</option>
</select>
                <select name="content_type" id="content_type" onchange="filterContainer()">
                    <option value="all" selected>All</option>
                    <option value="video">Video</option>
                    <option value="Model Paper">Model Paper</option>
                </select>
            </form>
        </section>
    </header>
    <div class="box-container" style="margin-top: 10px;">
        <?php $courses = $data['courses']; ?>
        <?php if (empty($courses)) : ?>
            <h3 class="title">No Courses Found</h3>
        <?php else : ?>
            <?php foreach ($courses as $course) : ?>
                <div class="box" data-type="<?php echo $course->type; ?>" id="course" data-price="<?php echo $course->price; ?>" data-date="<?php echo $course->date; ?>">
                    <img src="<?php echo URLROOT . '/tutor/' . ($course->type == 'video' ? 'video_thumbnail' : 'model_paper_thumbnail') . '/' . $course->thumbnail; ?>" class="thumb" alt="">
                    <h3 class="title"><?php echo $course->name; ?></h3>
                    <h2 class="type"><?php echo $course->type; ?></h2>
                    <div>
                        <span><?php echo $course->date; ?></span>
                        <p><?php echo $course->price; ?> LKR</p>
                    </div>
                    <a href="<?php echo URLROOT; ?>/playlist.php?get_id=<?php echo $course->id; ?>" class="inline-btn">view playlist</a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
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
