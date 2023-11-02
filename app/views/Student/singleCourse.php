<?php $this->view('inc/header', $data); ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/Student/singleCourse.css">
<div class="container">
    <!-- start of sidebar -->
    <?php $this->view('inc/sidebar'); ?>
    <!-- end of sidebar -->

    <!-- start of main part -->
    <div id="main" class="main">
        <!-- start of navbar -->
        <?php $this->view('inc/navbar', $data); ?>

        <!-- end of navbar -->

        <!-- start of content -->
        <div class="content">
        <div class="course-detail">
            <div class="course-content">
                <div class="course-title">Mechanics for G.C.E. A/L 2025</div>
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
                    <source src="../public/assets/img/video.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="course-description">
                <strong>Description</strong>
                <p>It gives you a huge self-satisfaction when you look at your work and say, "I made this!". I love that feeling after I'm done working on something. When I lean back in my chair, look at the final result with a smile, and have this little "spark joy" moment. It's especially satisfying when I know I just made $5,000.</p>
                <p>I do! And that's why I got into this field. Not for the love of Web Design, which I do now. But for the LIFESTYLE! There are many ways one can achieve this lifestyle. This is my way. This is how I achieved a lifestyle I've been fantasizing about for five years. And I'm going to teach you the same. Often people think Web Design is complicated. That it needs some creative talent or knack for computers. Sure, a lot of people make it very complicated. People make the simplest things complicated. Like most subjects taught in the universities. But I don't like complicated. I like easy. I like life hacks. I like to take the shortest and simplest route to my destination. I haven't gone to an art school or have a computer science degree. I'm an outsider to this field who hacked himself into it, somehow ending up being a sought-after professional. That's how I'm going to teach you Web Design. So you're not demotivated on your way with needless complexity. So you enjoy the process because it's simple and fun. So you can become a Freelance Web Designer in no time.
                </p>
            </div>
            <div class="curriculum">
                <div class="facts">
                    <div class="text">Physics</div>
                    <div class="text">Mechanics</div>
                    <div class="text">Lectures</div>
                    <div class="text">19h 31m</div>
                </div>
            </div>
        </div>
        <div class="purchase-btn" id="purchaseButton">Purchase Now</div>
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
    
    <script>
        // Get the modal and buttons
    var purchaseButton = document.getElementById("purchaseButton");
    var purchaseModal = document.getElementById("purchaseModal");
    var closeModal = document.getElementById("closeModal");
    var purchaseForm = document.getElementById("purchaseForm");

    // Add event listener to open the modal when the "Purchase Now" button is clicked
    purchaseButton.addEventListener("click", function() {
    purchaseModal.style.display = "block";
    });

    // Close the modal when the close button is clicked
    closeModal.addEventListener("click", function() {
    purchaseModal.style.display = "none";
    });

    // Close the modal when clicking outside the modal content
    window.addEventListener("click", function(event) {
    if (event.target == purchaseModal) {
        purchaseModal.style.display = "none";
    }
    });

    // Handle form submission
    purchaseForm.addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent the form from submitting
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;

    // Process the form data (you can customize this part)
    alert("Purchase information submitted:\nName: " + name + "\nEmail: " + email);

    // Close the modal after form submission
    purchaseModal.style.display = "none";
    });

    </script>
<?php $this->view('inc/footer'); ?>