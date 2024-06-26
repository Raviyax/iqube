<?php $this->view('inc/Header', $data) ?>
<section class="dashboard" id="users">
    <h1 class="heading">Manage Users </h1>
    <div class="flex-btn" style="flex-direction: row; align-items: center; justify-content: center; margin-bottom:30px;">

        <button onclick="displaysubjectadmins()" class="button-17" role="button">Subject Admins</button>
        <button onclick="displaytutors()" class="button-17" role="button">Tutors</button>

    </div>
<section class="unit-container">
  
    <div class="box-container" id="tutorlist" style="display: block;">
        <h1 class="heading" style="border-bottom:none; text-align:center;">Tutors</h1>
        <div class="box-container" id="view" style=" display:flex">
            <a href="<?php echo URLROOT ?>/admin/all_tutors" class="btn" style="width: fit-content;" id="viewalltutorsbtn">View All Tutors</a>
        </div>
        <header class="header">
            <section class="flex">
                <form class="search-form">
                    <button type="submit" class="fas fa-search" name="search_btn"></button>
                    <input type="text" name="searchbar" placeholder="Search by subject..." id="tutorsearchbar" onkeyup="search('tutorlist','tutorsearchbar')" maxlength="100">
                </form>
            </section>
        </header>
        <div class="box-container" style="padding: 10px;">
            <table id="table" style="padding-top: 20px;">
                <tr>
                    <th>Subject</th>
                    <th>Count</th>
                </tr>
                <?php if ($data['subjects'] && $data['tutorcount']) : ?>
                    <?php foreach ($data['subjects'] as $subject) : ?>
                        <tr onclick="window.location='<?php echo URLROOT; ?>/Admin/all_tutors/<?php echo $subject->subject_name; ?>'">
                            <td>
                                <?php echo ucfirst($subject->subject_name) ?>
                            </td>
                            <td>
                                <?php
                                $subjectFound = false;
                                foreach ($data['tutorcount'] as $tutorCount) {
                                    if ($tutorCount->subject == $subject->subject_name) {
                                        echo $tutorCount->count;
                                        $subjectFound = true;
                                        break;
                                    }
                                }
                                if (!$subjectFound) {
                                    echo '0';
                                }
                                ?> Tutors
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
        </div>
    </div>
    <div id="subjectadminlist" style=" display:none;">
    <h1 class="heading" style="border-bottom:none; text-align:center;">Subject Admins</h1>
        <div class="box-container" id="view" style=" display:flex; padding: 10px">
            <button class="btn" style="width: fit-content; " onclick="addnewsubjectadmin()"><i class="fa-solid fa-square-plus"></i> Add New Subject Admin</button>
            <a href="<?php echo URLROOT ?>/admin/All_subject_admins" class="btn" style="width: fit-content;" id="viewallsubjectadminsbtn">View All Subject Admins</a>
        </div>
        <header class="header">
            <section class="flex">
                <form class="search-form">
                    <button type="submit" class="fas fa-search" name="search_btn"></button>
                    <input type="text" name="searchbar" placeholder="Search by subject.." id="subjectadminsearchbar" onkeyup="search('subjectadminlist', 'subjectadminsearchbar')" maxlength="100">
                </form>
            </section>
        </header>
        <div class="box-container" style="padding: 10px;">
            <table id="table" style="padding-top: 20px;">
                <tr>
                    <th>Subject</th>
                    <th>Count</th>
                </tr>
                <?php if ($data['subjects'] && $data['subjectadmincount']) : ?>
                    <?php foreach ($data['subjects'] as $subject) : ?>
                        <tr onclick="window.location='<?php echo URLROOT; ?>/Admin/all_subject_admins/<?php echo $subject->subject_name; ?>'">
                            <td>
                                <?php echo ucfirst($subject->subject_name) ?>
                            </td>
                            <td>
                                <?php
                                $subjectFound = false;
                                foreach ($data['subjectadmincount'] as $subjectAdminCount) {
                                    if ($subjectAdminCount->subject == $subject->subject_name) {
                                        echo $subjectAdminCount->count;
                                        $subjectFound = true;
                                        break;
                                    }
                                }
                                if (!$subjectFound) {
                                    echo '0';
                                }
                                ?> Subject Admins
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
        </div>
    </div>
</section>

    </div>
</section>
<div id="addnewsubjectadmin" class="overlay">
    <section class="video-form">
        <form action="<?php echo URLROOT ?>/admin/users" method="post" enctype="multipart/form-data">
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
            <input type="submit" value="Add Subject Admin" name="submit" class="btn">
        </form>
    </section>
</div>
<script>
    function displaytutors() {
        document.getElementById("tutorlist").style.display = "block";
        document.getElementById("subjectadminlist").style.display = "none";
        document.getElementById("studentlist").style.display = "none";
    }

    function displaysubjectadmins() {
        document.getElementById("tutorlist").style.display = "none";
        document.getElementById("subjectadminlist").style.display = "block";
        document.getElementById("studentlist").style.display = "none";
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

    function search(sectionID, searchbarId) {
        var input, filter, table, tr, td, i, txtValue, section;
        input = document.getElementById(searchbarId);
        filter = input.value.toUpperCase();
        section = document.getElementById(sectionID);
        table = section.querySelector("table"); // Corrected this line
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0]; // Assuming you want to search in the first column
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
<?php $this->view('inc/Footer') ?>
</body>

</html>