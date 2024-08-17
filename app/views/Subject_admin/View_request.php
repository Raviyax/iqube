<?php $this->view('inc/Header', $data) ?>
<?php $tutor = $data['tutor'];
?>
<form action="<?php echo URLROOT ?>/Subjectadmin/view_request/<?php echo $tutor->request_id; ?>" method="post" enctype="multipart/form-data">
<section class="tutor-profile" style="min-height: calc(100vh - 19rem);">
    <h1 class="heading"><?php echo $_SESSION['USER_DATA']['subject']; ?> Tutor Requests / <?php echo $tutor->fname . " " . $tutor->lname; ?></h1>
    <div class="details">
        <div class="tutor">
            <h3><?php echo ucfirst($tutor->fname) . " " . ucfirst($tutor->lname); ?></h3>
            <span></span>
            <button  name="accept" class="inline-btn"><i class="fa-solid fa-check"></i></i> Approve</button>
            <a href="" class="inline-btn"><i class="fa-solid fa-xmark"></i></i> Reject</a>
        </div>
        <div class="flex">
            <div class="box">
                <span>Username</span>
                <p><?php echo $tutor->username; ?></p>
            </div>
            <div class="box">
                <span>Firstname</span>
                <p><?php echo  $tutor->fname; ?></p>
            </div>
            <div class="box">
                <span>Lastname</span>
                <p><?php echo  $tutor->lname; ?></p>
            </div>
            <div class="box">
                <span>Email</span>
                <p><?php echo  $tutor->email; ?></p>
            </div>
            <div class="box">
                <span>Highest Qualifcation</span>
                <p><?php echo  $tutor->qualification; ?></p>
            </div>
            <div class="box">
                <span>Contact Number</span>
                <p><?php echo  $tutor->cno; ?></p>
            </div>
            <div class="box">
                <span>Resume</span>
                <a href="<?php echo URLROOT;?>/Subjectadmin/cv/<?php echo  $tutor->cv; ?>" class="inline-btn"><i class="fa-solid fa-download"></i> Download CV</a>
            </div>
            <div class="box">
                <span>Joined At</span>
                <p><?php echo  $tutor->requested_date; ?></p>
            </div>
        </div>
    </div>
</section>
</form>
<?php $this->view('inc/Footer') ?>
</body>
</html>
