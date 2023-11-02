<?php $this->view('inc/header', $data); ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/Student/wishlist.css">
<div class="container">
    <!-- start of sidebar -->
    <?php $this->view('inc/sidebar'); ?>
    <!-- end of sidebar -->

    <!-- start of main part -->
    <div id="main" class="main">
        <!-- start of navbar -->
        <?php $this->view('inc/navbar', $data); ?>

        <!-- end of navbar -->

        <!-- start of content -->
        <div class="content">
            <?php $results = $data['result'];
                        foreach ($results as $result) {

                            $student = $result['name'];
                           $course = $result['chapter'];
                           
                         ?>

        <!-- Enroll in a New Course Form -->
        <form method="post" action="enrolled_courses_view.php" class="enroll-form">
            <label for="course_id">Course ID:</label>
            <input type="text" name="course_id" id="course_id" placeholder="Enter Course ID">
            <button type="submit" name="enroll_course">Enroll</button>
        </form>
    </div>
        </div>

        <?php $this->view('inc/footer'); ?>