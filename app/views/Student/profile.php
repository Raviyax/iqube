<?php $this->view('Inc/Header', $data); ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/Student/profile.css">
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
            <div class="profile">
                <div class="profile-header">
                    <div class="profile-avatar">
                        <!-- Add an image for the user's avatar -->
                        <img src="<?=URLROOT?>/assets/img/hanafe.jpg" alt="User Avatar">
                    </div>
                    <div class="profile-info">
                        <h2>Hanafe Mira</h2>
                        <p>Email: hanafe@email.com</p>
                        <p>Location: Colombo, Sri Lanka</p>
                    </div>
                </div>
                <div class="profile-content">
                    <div class="profile-section">
                        <h3>About Me</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis libero sed nisl consequat.</p>
                    </div>
                    <div class="profile-section">
                        <h3>Interests</h3>
                        <p>Interests, hobbies, and activities</p>
                    </div>
                </div>
            </div>
            <div class="cardBox">
                <div class="card">
                    <div class="numbers">5</div>
                    <div class="cardName" style="padding-top: 5px;">Courses Enrolled</div>
                </div>
                <div class="card">
                    <div class="numbers">10</div>
                    <div class="cardName" style="padding-top: 5px;">Tutors Following</div>
                </div>
                <div class="card">
                    <div class="numbers">29</div>
                    <div class="cardName" style="padding-top: 5px;">Quizzes Taken</div>
                </div>
                <div class="card">
                    <div class="numbers">3</div>
                    <div class="cardName" style="padding-top: 5px;">Subjects Chosen</div>
                </div>
            </div>

            <div class="analytics-card">
                <div class="card-header">
                    <h2>Profile Analytics</h2>
                </div>
                <div class="card-body">
                    <canvas id="profile-analytics-chart"></canvas>
                </div>
            </div>
        </div>
    </div> 

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
        // Data for the chart (example data)
        const chartData = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
            datasets: [{
                label: 'Profile Views',
                data: [500, 800, 600, 1000, 800, 1200], // Replace with your profile analytics data
                borderColor: '#2e86de',
                backgroundColor: 'rgba(46, 134, 222, 0.2)',
                tension: 0.4, // Eased curve
                borderWidth: 2
            }]
        };

        // Get canvas element
        const ctx = document.getElementById('profile-analytics-chart').getContext('2d');

        // Create the chart
        new Chart(ctx, {
            type: 'line',
            data: chartData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });

    </script>
<?php $this->view('Inc/Footer'); ?>