<?php $this->view('inc/header',$data) ?>
    <section class="video-form">
        <form action="<?php echo URLROOT?>/Student/signup_premium" method="post" enctype="multipart/form-data">
            <div class="flex-btn" style="justify-content: flex-end;">
                <button class="option-btn"  style="width: fit-content;" ><i class="fa-solid fa-xmark"></i></button>
            </div>
            <h1 class="heading">Say bit more about you</h1>
            </select>
            <p>Firstname <span>*</span></p>
            <input type="text" name="fname" maxlength="100" required placeholder="Enter first name" class="box">
            <p>Lastname <span>*</span></p>
            <input type="text" name="lname" maxlength="100" required placeholder="Enter Last Name" class="box">
            <p>Contact Number <span>*</span></p>
            <input type="text" name="cno" maxlength="100" required placeholder="Enter Contact Number" class="box">
            <input type="submit" value="Signup" name="submit" class="btn">
        </form>
    </section>
<?php $this->view('inc/footer') ?>
</body>
</html>