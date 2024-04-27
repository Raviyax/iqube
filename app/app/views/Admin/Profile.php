<?php $this->view('inc/Header', $data) ?>
<section class="tutor-profile" style="min-height: calc(100vh - 19rem);">
    <h1 class="heading">IQube Admin Profile</h1>
    <div class="details">
        <div class="tutor">
            <img src="<?php echo URLROOT ?>/assets/img/Landing/user.jpg" alt="profile">
            <h3><?php echo ucwords($_SESSION['USER_DATA']['username']); ?></h3>
            <span><?php echo ($_SESSION['USER_DATA']['email']); ?></span>
            <a id="showChangePassword" class="inline-btn"><i class="fa-solid fa-lock"></i> Change Password</a>
        </div>
    </div>
</section>
<div id="changePassword" class="overlay">
    <section class="video-form">
        <form action="">
            <div class="flex-btn" style="justify-content: flex-end;">
                <button class="option-btn" id="closeChangePassword" style="width: fit-content;" background-color:rgba(0, 0, 0, 0);><i class="fa-solid fa-xmark"></i></button>
            </div>
            <h1 class="heading">Change Password</h1>

            <p for="current">Current Password</p>
            <input type="password" name="current" id="current" required class="box">


            <p for="new">New Password</p>
            <input type="password" name="new" id="new" required class="box">


            <p for="confirm">Confirm Password</p>
            <input type="password" name="confirm" id="confirm" required class="box">

            <button id="saveChangePassword" value="Change Password" class="btn">Save Password</button>
        </form>
    </section>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    const url = "<?php echo URLROOT; ?>/api.php";
    $(document).ready(function() {
        $('#showChangePassword').click(function() {
            event.preventDefault();
            $('#changePassword').css('display', 'block');
        });

        $('#closeChangePassword').click(function() {
            event.preventDefault();
            $('#changePassword').css('display', 'none');
        });

        $('#saveChangePassword').click(function() {
            event.preventDefault();
            const current = $('#current').val();
            const newPass = $('#new').val();
            const confirm = $('#confirm').val();
            if (newPass !== confirm) {
                alert('Passwords do not match');
                return;
            }
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    action: 'admin_change_password',
                    current: current,
                    new: newPass,
                },
                success: function(response) {
                    if (response === 'success') {
                        alert('Password changed successfully');
                        $('#changePassword').css('display', 'none');

                    } else {
                        alert(response);
                    }


                }
            });

        });



    });
</script>
<?php $this->view('inc/Footer') ?>
</body>

</html>