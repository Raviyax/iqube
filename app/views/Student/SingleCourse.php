<?php $this->view('Inc/Header', $data); ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/Student/singleCourse.css">
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
         <?php
        //  $results = $data['result'];
        //  foreach ($results as $result) {
        //      $courseid = $result['id'];

        //     $chapter = $result['chapter'];
        //     $price = $result['price'];
        //     $stcount = $result['stcount'];
        //     $desc = $result['description'];
            try {
                $db = new PDO('mysql:host=localhost;dbname=iqube', 'root', '');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }
            if (isset($_GET['course_id'])) {
                $courseid = $_GET['course_id'];

                $query = "SELECT chapter, price, stcount, description FROM courses WHERE id = :courseid";
                $statement = $db->prepare($query);
                $statement->bindParam(':courseid', $courseid);
                $statement->execute();
                $courseDetails = $statement->fetch(PDO::FETCH_ASSOC);

                
                $chapter = $courseDetails['chapter'];
                $price = $courseDetails['price'];
                $stcount = $courseDetails['stcount'];
                $desc = $courseDetails['description'];
            }
            ?> 
            
        <div class="course-detail">
            <div class="course-content">
                <div class="course-title"><?php echo $chapter;?></div>
                <div class="course-subtitle">A crash course</div>
                <div class="course-info">
                    <div class="course-tutor">Created by: <br>Hanafe Mira</div>
                    <div class="course-rating">
                        <i class="fa-solid fa-star" style="color:gold;"></i>
                        <i class="fa-solid fa-star" style="color:gold;"></i><i class="fa-solid fa-star" style="color:gold;"></i><i class="fa-solid fa-star" style="color:gold;"></i><i class="fa-solid fa-star" style="color:gold;"></i>
                        4.8
                    </div>
                </div>
            </div>
            <div class="course-trailer">
                <video controls>
                    <source src="<?=URLROOT?>/assets/img/measurements.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="course-description">
                <strong>Description</strong>
                <p><?php echo $desc; ?></p>
            </div>
            <div class="curriculum">
                <div class="facts">
                    <div class="text">Physics</div>
                    <div class="text">Mechanics</div>
                    <div class="text">Lectures</div>
                    <div class="text">19h 31m</div>
                </div>
            </div>
            <div class="card">Price: Rs. <?php echo $price; ?> /=</div>
            <div class="card">Students Enrolled: <?php echo $stcount; ?></div>
            <div class="purchase-btn" id="purchaseButton">Purchase Now</div>
            <form  method="post" action="<?=URLROOT?>/Student/wishlist">
                <input type="hidden" name="course_id" value="<?php echo $result['id']; ?>"> 
                <button class="purchase-btn" type="submit" name="add_to_wishlist">Add to Wishlist</button>
            </form>
        <div id="purchaseModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeModal">&times;</span>
                <h2>Enter Your Purchase Information</h2>
                <form id="purchaseForm">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <button type="submit" class="submit-button">Submit</button>
                </form>
            </div>
        </div>

        </div>
        <!-- Your HTML content -->
        

<script>
    var purchaseButton = document.getElementById("purchaseButton");
    var purchaseModal = document.getElementById("purchaseModal");
    var closeModal = document.getElementById("closeModal");
    var purchaseForm = document.getElementById("purchaseForm");

    // Event listener to open the modal
    purchaseButton.addEventListener("click", function() {
        purchaseModal.style.display = "block";
    });

    // Event listener to close the modal
    closeModal.addEventListener("click", function() {
        purchaseModal.style.display = "none";
    });

    window.addEventListener("click", function(event) {
        if (event.target == purchaseModal) {
            purchaseModal.style.display = "none";
        }
    });

    // Event listener to handle form submission
    purchaseForm.addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent form submission
        
        // Get form data
        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;

        // AJAX submission to process form data
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "purchase_handler.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Close modal and handle success message
                purchaseModal.style.display = "none";
                alert("Purchase information submitted:\nName: " + name + "\nEmail: " + email);
            }
        };
        var formData = "name=" + name + "&email=" + email;
        xhr.send(formData);
    });
</script>

<?php $this->view('Inc/Footer'); ?>