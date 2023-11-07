<?php $this->view('Inc/Header', $data); ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/Student/wishlist.css">
<div class="container">
    <!-- start of sidebar -->
    <?php $this->view('Inc/Sidebar'); ?>
    <!-- end of sidebar -->

    <!-- start of main part -->
    <div id="main" class="main">
        <!-- start of navbar -->
        <?php $this->view('Inc/Navbar', $data); ?>

        <!-- end of navbar -->

        <!-- start of content -->
        <div class="content">
        <h1>Enrolled Courses</h1>

<?php if (!empty($enrolled_courses)) : ?>
    <ul>
        <?php foreach ($enrolled_courses as $course) : ?>
            <li>
                <strong>Course Name:</strong> <?php echo $course['course_name']; ?><br>
                <span>Other Course Details: <?php echo $course['other_details']; ?></span>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p>No enrolled courses found.</p>
<?php endif; ?>
    </div>
        </div>

        <?php $this->view('Inc/Footer'); ?>