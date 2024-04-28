<?php $this->view('inc/Header', $data) ?>
<section class="tutor-profile">

    <h1 class="heading">My Profile</h1>
    <div class="details">
        <div class="tutor">
            <img id="changeProfilePic" style="cursor: pointer" src=<?php echo URLROOT . "/Student/userimage/" . $_SESSION['USER_DATA']['image']; ?> alt="profile">

            <?php if ($_SESSION['USER_DATA']['premium'] == 1) { ?>
                
            <h3><?php echo ucwords($_SESSION['USER_DATA']['fname'] . " " . $_SESSION['USER_DATA']['lname']); ?></h3>
            <button class="button-34" style="background-color:red;"><i class="fa-solid fa-crown"></i> Premiun Student</button>
            <?php } else { ?>
                <h3><?php echo ucwords($_SESSION['USER_DATA']['username']); ?></h3>
                <h3><?php echo ucwords($_SESSION['USER_DATA']['email']); ?></h3>
            <?php } ?>



        </div>
    </div>
</section>

    
<section class="form-container" style="display: block;">
    <form>
    <?php if ($_SESSION['USER_DATA']['premium'] == 1) { ?>
        <div class="flex">
            <div class="col">
                <p>Username</p>
                <input type="text" name="username" value="<?php echo $_SESSION['USER_DATA']['username']; ?>" disabled class="box">
                <p>Email</p>
                <input type="email" name="email" value="<?php echo $_SESSION['USER_DATA']['email']; ?>" disabled class="box">
                <p>First Name</p>
                <input type="text" name="fname" value="<?php echo $_SESSION['USER_DATA']['fname']; ?>" required class="box">
                <button id="saveFname" class="btn" style="display: none; width: fit-content;">Save Firstname <i class="fa-solid fa-pencil"></i></button>
                <p>Last Name</p>
                <input type="text" name="lname" value="<?php echo $_SESSION['USER_DATA']['lname']; ?>" required class="box">
                <button id="saveLname" class="btn" style="display: none; width: fit-content;">Save Lastname <i class="fa-solid fa-pencil"></i></button>
                <p>Contact Number</p>
                <input type="text" name="cno" value="<?php echo $_SESSION['USER_DATA']['cno']; ?>" required class="box">
                <button id="saveCno" class="btn" style="display: none; width: fit-content;">Save Contact Number <i class="fa-solid fa-pencil"></i></button>
                <p>Address</p>
                <input type="text" name="address" value="<?php echo $_SESSION['USER_DATA']['address']; ?>" required class="box">
                <button id="saveAddress" class="btn" style="display: none; width: fit-content;">Save Address <i class="fa-solid fa-pencil"></i></button>
                <p>City</p>
                <input type="text" name="city" value="<?php echo $_SESSION['USER_DATA']['city']; ?>" required class="box">
                <button id="saveCity" class="btn" style="display: none; width: fit-content;">Save City <i class="fa-solid fa-pencil"></i></button>


            </div>
        </div>
        <?php } ?>

        <div style="display: flex;">
            <button id="changePassword" class="btn" style="width: fit-content; background-color:red;">Change Password <i class="fa-solid fa-key"></i></button>
        </div>

    </form>


    <div id="changePasswordDiv" class="overlay" style="min-height: 100%;">
        <section class="video-form">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="flex-btn" style="justify-content: flex-end;">
                    <button class="option-btn" id="closechangePassword" style="width: fit-content;" background-color:rgba(0, 0, 0, 0);><i class="fa-solid fa-xmark"></i></button>
                </div>
                <h1 class="heading">Update Password</h1>
                <p>Old Password</p>
                <input type="password" name="oldpassword" maxlength="100" required placeholder="Enter Old Password" class="box">
                <p>New Password</p>
                <input type="password" name="newpassword" maxlength="100" required placeholder="Enter New Password" class="box">
                <p>Confirm Password</p>
                <input type="password" name="confirmpassword" maxlength="100" required placeholder="Enter Confirm Password" class="box">
                <input type="file" name="file" accept="image/*" style="display: none;">
                <button id="savePassword" class="btn">Save</button>
            </form>
        </section>
    </div>


</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    const api_url = "<?php echo URLROOT ?>/api.php";
    $(document).ready(function() {

        <?php if ($_SESSION['USER_DATA']['premium'] == 1) { ?>
        //on update input fields
        $("input").on('input', function() {
            $(this).next().show();
        });

   

        //on click saveFname
        $("#saveFname").click(function() {
            event.preventDefault();
            var fname = $("input[name='fname']").val();
            $.ajax({
                url: api_url,
                type: 'POST',
                data: {
                    'action': 'studentUpdateFname',
                    'fname': fname
                },
                success: function(data) {
                    location.reload();

                    alert("Firstname Updated Successfully");
                }
            });
        });

        //on click saveLname
        $("#saveLname").click(function() {
            event.preventDefault();
            var lname = $("input[name='lname']").val();
            $.ajax({
                url: api_url,
                type: 'POST',
                data: {
                    'action': 'studentUpdateLname',
                    'lname': lname
                },
                success: function(data) {
                    location.reload();
                    alert("Lastname Updated Successfully");
                }
            });
        });

        //on click saveCno
        $("#saveCno").click(function() {
            event.preventDefault();
            var cno = $("input[name='cno']").val();
            $.ajax({
                url: api_url,
                type: 'POST',
                data: {
                    'action': 'studentUpdateCno',
                    'cno': cno
                },
                success: function(data) {
                    location.reload();
                    alert("Contact Number Updated Successfully");
                }
            });
        });

        //on click saveAddress
        $("#saveAddress").click(function() {
            event.preventDefault();
            var address = $("input[name='address']").val();
            $.ajax({
                url: api_url,
                type: 'POST',
                data: {
                    'action': 'studentUpdateAddress',
                    'address': address
                },
                success: function(data) {
                    location.reload();
                    alert("Address Updated Successfully");
                }
            });
        });

        //on click saveCity
        $("#saveCity").click(function() {
            event.preventDefault();
            var city = $("input[name='city']").val();
            $.ajax({
                url: api_url,
                type: 'POST',
                data: {
                    'action': 'studentUpdateCity',
                    'city': city
                },
                success: function(data) {
                    location.reload();
                    alert("City Updated Successfully");
                }
            });
        });

        <?php } ?>

             //on click change password
             $("#changePassword").click(function() {
            event.preventDefault();
            $("#changePasswordDiv").css("display", "block");
            $('html, body').animate({
                scrollTop: 0
            }, 'fast');
        });

        //on click close change password
        $("#closechangePassword").click(function() {
            event.preventDefault();
            $("#changePasswordDiv").css("display", "none");
        });
        

        //on click savePassword
        $("#savePassword").click(function() {
            event.preventDefault();
            var oldpassword = $("input[name='oldpassword']").val();
            var newpassword = $("input[name='newpassword']").val();
            var confirmpassword = $("input[name='confirmpassword']").val();
            if (newpassword != confirmpassword) {
                alert("New Password and Confirm Password does not match");
            } else {
                $.ajax({
                    url: api_url,
                    type: 'POST',
                    data: {
                        'action': 'studentUpdatePassword',
                        'oldpassword': oldpassword,
                        'newpassword': newpassword
                    },
                    success: function(data) {
                        if (data == "success") {
                            alert("Password Updated Successfully");
                            $("#changePasswordDiv").css("display", "none");
                        } else {
                            alert("Old Password is Incorrect");
                        }
                    }
                });
            }
        });

        //on click changeProfilePic open a file dialog
        $("#changeProfilePic").click(function() {
            event.preventDefault();
            $("input[type='file']").click();
            //after selecting a file
            $("input[type='file']").change(function() {
                var file = this.files[0];
                var formdata = new FormData();
                formdata.append("file", file);
                formdata.append("action", "studentUpdateProfilePic");
                $.ajax({
                    url: api_url,
                    type: 'POST',
                    data: formdata,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        location.reload();
                        alert("Profile Picture Updated Successfully");
                    }
                });
            });
        });

    });
</script>

<?php $this->view('inc/Footer') ?>
</body>

</html>