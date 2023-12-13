<?php $this->view('inc/header') ?>
<section class="dashboard" id="users">
    <h1 class="heading">Manage Users <a href="#" class="btn" style="width: fit-content;">View All Users</a></h1>
    <div class="flex-btn">
        <a class="option-btn " onclick="displaysubjectadmins()">Subject Admins</a>
        <a class="option-btn option-btn-active" onclick="displaytutors()">Tutors</a>
        <a class="option-btn" onclick="displaystudents()">Students</a>
    </div>
    <div class="box-container" id="view" style=" display:flex">
        <a href="<?php echo URLROOT?>/admin/All_subject_admins" class="btn" style="width: fit-content;display:none;" id="viewallsubjectadminsbtn">View All Subject Admins</a>
        <a href="<?php echo URLROOT?>/admin/tutors" class="btn" style="width: fit-content;" id="viewalltutorsbtn">View All Tutors</a>
        <a href="<?php echo URLROOT?>/admin/students" class="btn" style="width: fit-content;display:none;" id="viewallstudentsbtn">View All Students</a>
    </div>
    <div class="box-container" id="tutorlist">
        <div class="box">
            <h3>Physics</h3>
            <p>524 Tutors</p>
            <a href="#" class="btn">View</a>
        </div>
        <div class="box">
            <h3>Chemistry</h3>
            <p>659 Tutors</p>
            <a href="#" class="btn">View</a>
        </div>
    </div>
    <div class="box-container" id="subjectadminlist" style=" display:none;">
   
        <div class="box">
            <button class="btn" onclick="addnewsubjectadmin()"><i class="fa-solid fa-square-plus"></i> Add New Subject Admin</button>
        </div>
    
        <?php foreach ($data['subjects'] as $subject) : ?>
        <div class="box">
            <h3><?php echo ucfirst($subject->subject_name) ?></h3>
            <p> <?php $count=0; $i = 0; while($i < sizeof($data['subjectadmins'])) {if($data['subjectadmins'][$i]->subject == $subject->subject_name){$count++;} $i++;}echo $count;?> Subject Admins</p>
            <a href="#" class="btn">View</a>
        </div>
        <?php endforeach; ?>
      
    </div>
    <div class="box-container" id="studentlist" style=" display:none;">
        <div class="box">
            <h3>Premium Students</h3>
            <p>833 Students</p>
            <a href="#" class="btn">View</a>
        </div>
        <div class="box">
            <h3>Free Students</h3>
            <p>2543 Students</p>
            <a href="#" class="btn">View</a>
        </div>
    </div>
    </div>
</section>

<div id="addnewsubjectadmin" class="overlay">
    <section class="video-form">


        <form action="<?php echo URLROOT?>/admin/users" method="post" enctype="multipart/form-data">
            <div class="flex-btn" style="justify-content: flex-end;">


                <button class="option-btn" onclick="closeadd()" style="width: fit-content;" background-color:rgba(0, 0, 0, 0);><i class="fa-solid fa-xmark"></i></button>
            </div>
            <h1 class="heading">Add New Subject Admin</h1>
            




            


            <p>Subject <span>*</span></p>
            <select name="subject" class="box" required>
                <option value="" selected disabled>-- select subject</option>
                <?php foreach ($data['subjects'] as $subject) : ?>
                <option value="<?php echo $subject->subject_name ?>">
                    <?php echo ucfirst($subject->subject_name) ?>
                </option>
                <?php endforeach; ?>
                
            </select>
            <p>Firstname <span>*</span></p>
            <input type="text" name="fname" maxlength="100" required placeholder="Enter first name" class="box">
            <p>Lastname <span>*</span></p>
            <input type="text" name="lname" maxlength="100" required placeholder="Enter Last Name" class="box">
            <p>Contact Number <span>*</span></p>
            <input type="text" name="cno" maxlength="100" required placeholder="Enter Contact Number" class="box">

            <p>Username <span>*</span></p>
            <input type="text" name="username" maxlength="100" required placeholder="Enter username" class="box">
            <p>Email <span>*</span></p>
            <input type="email" name="email" maxlength="100" required placeholder="Enter email" class="box">

            <p>Password <span>*</span></p>
            <input type="password" name="password" maxlength="100" required placeholder="Enter Password" class="box">

            <p>Confirm Password <span>*</span></p>
            <input type="password" name="confirm_password" maxlength="100" required placeholder="Enter Password" class="box">


            <input type="submit" value="add_subject_admin" name="submit" class="btn">
        </form>
    </section>
</div>

<script>
    function displaystudents() {
        document.getElementById("tutorlist").style.display = "none";
        document.getElementById("subjectadminlist").style.display = "none";
        document.getElementById("studentlist").style.display = "grid";
        document.getElementById("viewallsubjectadminsbtn").style.display = "none";
        document.getElementById("viewalltutorsbtn").style.display = "none";
        document.getElementById("viewallstudentsbtn").style.display = "block";
    }

    function displaytutors() {
        document.getElementById("tutorlist").style.display = "grid";
        document.getElementById("subjectadminlist").style.display = "none";
        document.getElementById("studentlist").style.display = "none";
        document.getElementById("viewallsubjectadminsbtn").style.display = "none";
        document.getElementById("viewalltutorsbtn").style.display = "block";
        document.getElementById("viewallstudentsbtn").style.display = "none";
    }

    function displaysubjectadmins() {
        document.getElementById("tutorlist").style.display = "none";
        document.getElementById("subjectadminlist").style.display = "grid";
        document.getElementById("studentlist").style.display = "none";
        document.getElementById("viewallsubjectadminsbtn").style.display = "block";
        document.getElementById("viewalltutorsbtn").style.display = "none";
        document.getElementById("viewallstudentsbtn").style.display = "none";
    }

    function addnewsubjectadmin() {
        
        document.getElementById("addnewsubjectadmin").style.display = "block";

    }

    function closeadd() {
        
        document.getElementById("addnewsubjectadmin").style.display = "none";

    }
    var dashboard = document.getElementById("users");
    var btns = dashboard.getElementsByClassName("option-btn");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("option-btn-active");
            current[0].className = current[0].className.replace(" option-btn-active", "");
            this.className += " option-btn-active";
        });
    }
</script>
<?php $this->view('inc/footer') ?>
</body>

</html>