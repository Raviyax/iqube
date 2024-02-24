<?php $this->view('inc/Header',$data) ?>
<link rel="stylesheet" href="<?=URLROOT?>/assets/css/student/syllabus.css">
<section>
    <h1 class="heading">Hello <?php echo $_SESSION['USER_DATA']['username'];?>!</h1>
    <div class="container">
        <div class="choice">Choose your Stream</div>
        <div class="streams">
            <div class="stream" onclick="showSubject(bio)" id="bio">
                <h2>Biological Sciences</h2>
                <div class="subjects" id="sub-bio">
                    <a href="biology.php" class="subject" style="--subject-color: var(--main-color);">
                        Biology
                    </a>
                    <a href="chemistry.php" class="subject" style="--subject-color: var(--color2);">
                        Chemistry
                    </a>
                    <a href="physics.php" class="subject" style="--subject-color: var(--color3);">
                        Physics
                    </a>
                </div>
            </div>
            <div class="stream" onclick="showSubject(physical)" id="physical">
                <h2>Physical Science</h2>
                <div class="subjects" id="sub-physical">
                    <a href="math.php" class="subject" style="--subject-color: var(--main-color);">
                        Combined Mathematics
                    </a>
                    <a href="physics.php" class="subject" style="--subject-color: var(--color2);">
                        Chemistry
                    </a>
                    <a href="chemistry.php" class="subject" style="--subject-color: var(--color3);">
                        Physics
                    </a>
                </div>
            </div>
            <div class="stream" onclick="showSubject(commerce)" id="commerce">
                <h2>Commerce</h2>
                <div class="subjects" id="sub-commerce">
                    <a href="math.php" class="subject" style="--subject-color: var(--main-color);">
                        Combined Mathematics
                    </a>
                    <a href="physics.php" class="subject" style="--subject-color: var(--color2);">
                        Chemistry
                    </a>
                    <a href="chemistry.php" class="subject" style="--subject-color: var(--color3);">
                        Physics
                    </a>
                </div>
            </div>
            <div class="stream" onclick="showSubject(arts)" id="arts">
                <h2>Arts</h2>
                <div class="subjects" id="sub-arts">
                    <a href="math.php" class="subject" style="--subject-color: var(--main-color);">
                        Combined Mathematics
                    </a>
                    <a href="physics.php" class="subject" style="--subject-color: var(--color2);">
                        Chemistry
                    </a>
                    <a href="chemistry.php" class="subject" style="--subject-color: var(--color3);">
                        Physics
                    </a>
                </div>
            </div>
            <div class="stream" onclick="showSubject(tech)" id="tech">
                <h2>Technology</h2>
                <div class="subjects" id="sub-tech">
                    <a href="math.php" class="subject" style="--subject-color: var(--main-color);">
                        Combined Mathematics
                    </a>
                    <a href="physics.php" class="subject" style="--subject-color: var(--color2);">
                        Chemistry
                    </a>
                    <a href="chemistry.php" class="subject" style="--subject-color: var(--color3);">
                        Physics
                    </a>
                </div>
            </div>
        </div>
    </section>
    <?php $this->view('inc/Footer') ?>
</body>
</html>