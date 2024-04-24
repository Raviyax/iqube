<?php $this->view('inc/Header', $data) ?>
<?php $tutor = $data['tutor']; ?>
<section class="tutor-profile" style="min-height: calc(100vh - 19rem);">
    <h1 class="heading"><?php echo $_SESSION['USER_DATA']['subject']; ?> Tutors > <?php echo $tutor->fname . " " . $tutor->lname; ?>'s Profile</h1>
    <div class="details">
        <div class="tutor">
            <img src="<?php echo URLROOT . "/Subjectadmin/userimage/" . $data['tutor']->image; ?>" alt="profile">
            <h3><?php echo $tutor->fname . " " . $tutor->lname; ?></h3>
            <span></span>
            <a id="markFlagged" class="inline-btn" style="background-color: red;"><i class="fa-solid fa-triangle-exclamation"></i> Mark as flagged</a>
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
                <span>Joined At</span>

                <p><?php
                    $date_only = date('Y-m-d', strtotime($tutor->approved_date)); echo $date_only; ?></p>
            </div>
            <div class="box">
                <span>Email</span>
                <p><?php echo  $tutor->email; ?></p>

            </div>
            <div class="box">
                <span>Subject</span>
                <p><?php echo  ucfirst($tutor->subject); ?></p>
            </div>
            <div class="box">
                <span>Contact Number</span>
                <p><?php echo  $tutor->cno; ?></p>
            </div>
        </div>
    </div>
</section>
<div id="editprofile" class="overlay">
    <section class="video-form">
        <form action="<?php echo URLROOT ?>/subjectadmin/tutor_profile/<?php echo $tutor->tutor_id ?>" method="post" enctype="multipart/form-data">
            <div class="flex-btn" style="justify-content: flex-end;">
                <a class="option-btn" onclick="closeedit()" style="width: fit-content;" background-color:rgba(0, 0, 0, 0);><i class="fa-solid fa-xmark"></i></a>
            </div>
            <h1 class="heading">Change <?php echo  ucfirst($tutor->fname); ?>'s Email</h1>
            <div class="profile">
            </div>
            <p>New Email</p>
            <input type="email" maxlength="100" required placeholder="New Email" class="box" name="email">
            <p>Confirm Email</p>
            <input type="email" maxlength="100" required placeholder="Confirm Email" name="confirmemail" class="box">
            <p>Your Password</p>
            <input type="password" maxlength="100" required placeholder="Password" name="subjectadminpassword" class="box">
            <input type="submit" value="Change Email" name="changeemail" class="btn">
        </form>
    </section>
</div>
<script>
    function openedit() {
        document.getElementById("editprofile").style.display = "block";
    }

    function closeedit() {
        document.getElementById("editprofile").style.display = "none";
    }
</script>
<?php $this->view('inc/Footer') ?>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#markFlagged').click(function() {
        var tutor_id = '<?php echo $tutor->tutor_id; ?>'; // Ensure tutor_id is properly quoted
        $.ajax({
            url: '<?php echo URLROOT; ?>/api.php',
            type: 'POST',
            data: {
                Action: 'markFlagged',
                tutor_id: tutor_id
            },
            success: function(response) {
                if (response == 'success') {
                    alert('Tutor has been marked as flagged');
                    location.reload();
                } else {
                    alert('Something went wrong');
                }
            }
        });
    });
});

</script>

</html>