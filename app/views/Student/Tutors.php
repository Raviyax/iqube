<?php $this->view('inc/header',$data) ?>

<link rel="stylesheet" href="<?=URLROOT?>/assets/css/student/tutors.css">

<section class="container">

    <h1 class="heading">Hello <?php echo $_SESSION['USER_DATA']['username'];?>!</h1>

    <h1 class="spacing">Instructors <span style="font-size:1.5rem">(241)</span></h1>
    <br>
    <div class="filters">
        <div class="search">
            <span>Search</span>
            <form action="search_page.php" method="post" class="search-form">
                <input type="text" name="search" placeholder="search here..." required maxlength="100">
                <button type="submit" class="fas fa-search" name="search_btn"></button>
            </form>
        </div>
        <div class="subjects">
            <span>Subjects</span>
            <select name="subjects" id="subjects" >
                <option value="Physics">Physics</option>
                <option value="Biology">Biology</option>
                <option value="Com. Maths">Com. Maths</option>
                <option value="Chemistry">Chemistry</option>
                <option value="Commerce">Commerce</option>
                <option value="Geography">Geography</option>
                <option value="Accounting">Accounting</option>
                <option value="Economics">Economics</option>
                <option value="English">English</option>
                <option value="E. Tech.">E. Tech.</option>
                <option value="B. Tech.">B. Tech.</option>
            </select>
        </div>
        <!-- <div class="courses">
            <select name="courses" id="courses">
                <option value="Theory">Theory</option>
                <option value="Theory">Model Paper</option>
                <option value="Theory">Crash Course</option>
                <option value="Theory">Theory</option>
            </select>
        </div> -->
    </div>

    <div class="grid">
        <?php
            $tutorsPerPage = 12;
            $tutorChunks = array_chunk($data['tutors'], $tutorsPerPage);

            // Get the current page number from the URL parameter
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

            // Display tutors for the current page
            $currentTutors = isset($tutorChunks[$currentPage - 1]) ? $tutorChunks[$currentPage - 1] : [];

            foreach ($currentTutors as $tutor):
        ?>
        <div class="tutor">
            <img src="<?php echo "data:image/jpg;base64,".$data['profilepic'];?>" alt="">
            <div class="tutor-detail">
                <div class="tutor-name"><?php echo $tutor->fname." ".$tutor->lname; ?></div>
                <div class="tutor-subject"><?php echo $tutor->subject; ?></div>
            </div>
            <div class="tutor-cred">
                <div id="rating"><i class="fa-regular fa-star"></i></div>
                <div id="std-count">236</div>
            </div>
            <button class="btn">Send Message</button>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="paginator">
        <ul>
            <?php if ($currentPage > 1): ?>
                <li><a href="?page=<?php echo $currentPage - 1; ?>" class="prev">&lt; Prev</a></li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= count($tutorChunks); $i++): ?>
                <li><a href="?page=<?php echo $i; ?>" <?php echo ($i == $currentPage) ? 'class="active"' : ''; ?>><?php echo $i; ?></a></li>
            <?php endfor; ?>

            <?php if ($currentPage < count($tutorChunks)): ?>
                <li><a href="?page=<?php echo $currentPage + 1; ?>" class="next">Next &gt;</a></li>
            <?php endif; ?>
        </ul>
    </div>




</section>





<script src="<?=URLROOT?>/assets/js/student/tutors.js"></script>

<?php $this->view('inc/footer') ?>



</body>

</html>