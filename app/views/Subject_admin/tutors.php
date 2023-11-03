<?php $this->view('inc/header', $data); ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/Subject_admin/tutors.css">
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
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

        

	<!-- SIDEBAR -->

	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<div class="content" style="margin-top: 100px;">
    <div class="admin-panel">
            <h2>Physical-Science Admin Panel</h2>
            <button onclick="openCreateForm()">Create New Tutor</button>
            <form method="post" action="<?php echo URLROOT;?>/subject_admin/tutors">
            <table class="tutors-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Subject</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php $results = $data['result'];
                        foreach ($results as $result) {
                            $id = $result['id'];
                           $name = $result['name'];
                            $subject = $result['subject'];
                            $email = $result['email'];
                           
                         ?>
                <tr>
                <td><?php echo $id?></td>
                    <td><?php echo $name?></td>
                    <td><?php echo $subject?></td>
                    <td><?php echo $email?></td>
                    <td>
                       
                        <button name="delete" value=<?php echo $email?> onclick="">Delete</button>
                    </td>
                    </tr>
                    <?php } ?>
                    
                    <!-- Tutor data will be populated dynamically here -->
                </tbody>
            </table>
            </form>
        </div>

        <!-- Modal for creating new tutor -->
        <div class="modal" id="createTutorModal">
            <div class="modal-content">
                <span class="close" onclick="closeCreateForm()">&times;</span>
                <h3>Create New Tutor</h3>
                <form id="createForm" method="post" action="<?php echo URLROOT;?>/subject_admin/tutors">
                    <label for="tutorName">Tutor Name:</label>
                    <input type="text" name="name" required><br><br>
                    
                    <label for="tutorSubject">Subject:</label>
                    <input type="text" name="subject" required><br><br>
                    
                    <label for="tutorCourses">email</label>
                    <input type="email" name="email" required><br><br>

                    <label for="tutorCourses">Password</label>
                    <input type="password" name="password" required><br><br>
                    
                    <button type="submit">Add Tutor</button>
                </form>
            </div>
        </div>
    </div>
	<!-- CONTENT -->
	



            <!-- ================End of content ================= -->

        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script>

        // Function to open create new tutor modal
        function openCreateForm() {
            const createTutorModal = document.getElementById('createTutorModal');
            createTutorModal.style.display = 'block';
            // Additional logic to display the form for creating a new tutor
        }

        // Function to close create new tutor modal
        function closeCreateForm() {
            const createTutorModal = document.getElementById('createTutorModal');
            createTutorModal.style.display = 'none';
        }

        // Function to edit tutor
        function editTutor(tutorId) {
            // Logic to edit the selected tutor's details
            alert(`Editing tutor with ID: ${tutorId}`);
        }

        // Function to delete tutor
        function deleteTutor(tutorId) {
            // Logic to delete the selected tutor's account
            alert(`Deleting tutor with ID: ${tutorId}`);
        }

        // Initially display tutors when the page loads
        document.addEventListener("DOMContentLoaded", function() {
            displayTutors();
        });

    </script>
    <?php $this->view('inc/footer'); ?>