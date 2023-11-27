<?php $this->view('inc/header') ?>


<section class="dashboard" id="users">



    <h1 class="heading">Manage Users <a href="#" class="btn" style="width: fit-content;">View All Users</a></h1>
    <div class="flex-btn">
        <a class="option-btn " onclick="displaysubjectadmins()">Subject Admins</a>

        <a class="option-btn option-btn-active" onclick="displaytutors()">Tutors</a>
        <a class="option-btn" onclick="displaystudents()">Students</a>
    </div>




    <div class="box-container" id="view" style=" display:flex">

        <a href="#" class="btn" style="width: fit-content;display:none;" id="viewallsubjectadminsbtn">View All Subject Admins</a>
        <a href="#" class="btn" style="width: fit-content;" id="viewalltutorsbtn">View All Tutors</a>
        <a href="#" class="btn" style="width: fit-content;display:none;" id="viewallstudentsbtn">View All Students</a>

    </div>


    <div class="box-container" id="tutorlist" >



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
            <h3>Combined Mathematics</h3>
            <p>2 Subject Admins</p>
            <a href="#" class="btn">View</a>
        </div>
        <div class="box">
            <h3>Biology</h3>
            <p>1 Subject Admins</p>
            <a href="#" class="btn">View</a>
        </div>
        <div class="box">
            <h3>Chemistry</h3>
            <p>3 Subject Admins</p>
            <a href="#" class="btn">View</a>
        </div>





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