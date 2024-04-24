<?php $this->view('inc/Header', $data) ?>
<?php
// Accessing tutor_count from $data
if (isset($data['tutor_count']) && is_array($data['tutor_count']) && count($data['tutor_count']) > 0) {
    $tutorCountArray = $data['tutor_count'];
    // Accessing the count property from the object inside the tutor_count array
    if (isset($tutorCountArray[0]->count)) {
        $tutorCount = $tutorCountArray[0]->count;
    } else {
        $tutorCount = 'Data not available'; // Or any suitable default value
    }
} else {
    $tutorCount = 'Data not available'; // Or any suitable default value
}


if (isset($data['student_count']) && is_array($data['student_count']) && count($data['student_count']) > 0) {
    $studentCountArray = $data['student_count'];
    if (isset($studentCountArray[0]->student_count)) {
        $studentCount = $studentCountArray[0]->student_count;
    } else {
        $studentCount = 'Data not available';
    }
} else {
    $studentCount = 'Data not available';
}

if (isset($data['premium_student_count']) && is_array($data['premium_student_count']) && count($data['premium_student_count']) > 0) {
    $premiumStudentCountArray = $data['premium_student_count'];
    if (isset($premiumStudentCountArray[0]->student_count)) {
        $premiumStudentCount = $premiumStudentCountArray[0]->student_count;
    } else {
        $premiumStudentCount = 'Data not available';
    }
} else {
    $premiumStudentCount = 'Data not available';
}

if (isset($data['open_support_count']) && is_array($data['open_support_count']) && count($data['open_support_count']) > 0) {
    $openSupportCountArray = $data['open_support_count'];
    if (isset($openSupportCountArray[0]->count)) {
        $openSupportCount = $openSupportCountArray[0]->count;
    } else {
        $openSupportCount = 'Data not available';
    }
} else {
    $openSupportCount = 'Data not available';
}

if (isset($data['tutor_requests']) && is_array($data['tutor_requests']) && count($data['tutor_requests']) > 0) {
    $tutorRequestsArray = $data['tutor_requests'];
    if (isset($tutorRequestsArray[0]->count)) {
        $tutorRequests = $tutorRequestsArray[0]->count;
    } else {
        $tutorRequests = 'Data not available';
    }
} else {
    $tutorRequests = 'Data not available';
}

if (isset($data['model_paper_count']) && is_array($data['model_paper_count']) && count($data['model_paper_count']) > 0) {
    $modelPaperCountArray = $data['model_paper_count'];
    if (isset($modelPaperCountArray[0]->count)) {
        $modelPaperCount = $modelPaperCountArray[0]->count;
    } else {
        $modelPaperCount = 'Data not available';
    }
} else {
    $modelPaperCount = 'Data not available';
}

if (isset($data['video_count']) && is_array($data['video_count']) && count($data['video_count']) > 0) {
    $videoCountArray = $data['video_count'];
    if (isset($videoCountArray[0]->count)) {
        $videoCount = $videoCountArray[0]->count;
    } else {
        $videoCount = 'Data not available';
    }
} else {
    $videoCount = 'Data not available';
}
?>
<section class="dashboard">
    <h1 class="heading"><?php echo ucfirst($_SESSION['USER_DATA']['subject']); ?> Analytics</h1>
    <section class="tutor-profile" style="min-height: calc(100vh - 19rem);">
        <div class="details">
            <div class="flex">
                <div class="box">
                    <span><?php echo ucfirst($_SESSION['USER_DATA']['subject']); ?> Tutors</span>
                    <p><?php echo $tutorCount; ?></p>
                </div>

                <div class="box">
                    <span>Total Students</span>
                    <p><?php echo $studentCount; ?></p>
                </div>
                <div class="box">
                    <span>Premium Students</span>
                    <p><?php echo $premiumStudentCount; ?></p>
                </div>
                <div class="box">
                    <span>New Complains</span>
                    <p><?php echo $openSupportCount; ?></p>
                </div>
                <div class="box">
                    <span>New Tutor Requests</span>
                    <p><?php echo $tutorRequests; ?></p>
                </div>
                <div class="box">
                    <span>Model Papers</span>
                    <p><?php echo $modelPaperCount; ?></p>
                </div>
                <div class="box">
                    <span>Videos</span>
                    <p><?php echo $videoCount; ?></p>
                </div>
            </div>
        </div>
    </section>
    </div>
</section>
<?php $this->view('inc/Footer') ?>
</body>

</html>