<!DOCTYPE HTML>
<html>
	<head>
		<title>Contact - Alpha by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="<?php echo URLROOT?>/assets/css/Landing.css">
	</head>
	<body class="is-preload">
		<div id="page-wrapper">
			<!-- Header -->
            <header id="header" class="alt">
					<h1><a href="index.html">IQube</a> by Group 08</h1>
					<nav id="nav">
						<ul>
							<li><a href="<?php echo URLROOT?>/Landing">Home</a></li>
							<li><a href="<?php echo URLROOT?>/Landing/be_an_IQube_tutor">Tutors</a></li>
							<li><a href="<?php echo URLROOT?>/Landing/Login_as_a_tutor" class="button">Login as Tutor</a></li>
						</ul>
					</nav>
				</header>
			<!-- Main -->
				<section id="main" class="container medium">
					<header>
						<h2>Sign up as a Tutor</h2>
						<p>Join IQube's Islandwide Community
of Expert Instructors</p>
					</header>
					<div class="box">
						<form method="post" action="<?php echo URLROOT?>/Landing/make_a_tutor_request" enctype="multipart/form-data">
							<div class="row gtr-50 gtr-uniform">
								<div class="col-6 col-12-mobilep">
								<?php
								if(isset($data['errors']['name_err'])){
									echo '<p style="color: red;">'.$data['errors']['fname_err'].'</p>';
								}
								?>
									<input type="text" name="fname" id="name" value="<?php if(isset($data['fname'])){echo $data['fname'];}?>"placeholder="First Name" required/>
								</div>
                                <div class="col-6 col-12-mobilep">
								<?php
								if(isset($data['errors']['lname_err'])){
									echo '<p style="color: red;">'.$data['errors']['lname_err'].'</p>';
								}
								?>
                                    <input type="text" name="lname" id="name" value="<?php if(isset($data['lname'])){echo $data['lname'];}?>" placeholder="Last Name" required />
                                    </div>
								<div class="col-6 col-12-mobilep">
								<?php
								if(isset($data['errors']['cno_err'])){
									echo '<p style="color: red;">'.$data['errors']['cno_err'].'</p>';
								}
								?>
                                    <input type="text" name="cno" id="cno" value="<?php if(isset($data['cno'])){echo $data['cno'];}?>" placeholder="Contact number" required />
                                    </div>
								<div class="col-6 col-12-mobilep">
								<?php
								if(isset($data['errors']['email_err'])){
									echo '<p style="color: red;">'.$data['errors']['email_err'].'</p>';
								}
								?>
									<input type="text" name="username" id="username" value="<?php if(isset($data['username'])){echo $data['username'];}?>" placeholder="Username" required />
								</div>
                                    <div class="col-12">
									<?php
									if(isset($data['errors']['email_err'])){
										echo '<p style="color: red;">'.$data['errors']['email_err'].'</p>';
									}
									?>
									<input type="email" name="email" id="email" value="<?php if(isset($data['email'])){echo $data['email'];}?>" placeholder="Email" required />
								</div>
								<div class="col-12">
									<?php
									if(isset($data['errors']['subject_err'])){
										echo '<p style="color: red;">'.$data['errors']['subject_err'].'</p>';
									}
									?>
									<select name="subject" id="subject" required>
                                        <option value="" disabled selected>- Subject You Like to Teach -</option>
										<?php
										foreach($data['subjects'] as $subject){
											echo '<option value="'.$subject->subject_name.'">'.$subject->subject_name.'</option>';
										}
										?>
									</select>
								</div>
								<div class="col-12">
									<?php
									if(isset($data['errors']['qualification_err'])){
										echo '<p style="color: red;">'.$data['errors']['qualification_err'].'</p>';
									}
									?>
									<select name="qualification" id="qualification" required>
                                        <option value="" disabled selected>- Highest Qualification in your Field -</option>
                                        <option value="highschool">High School</option>
										<option value="diploma">Diploma</option>
										<option value="degree">Degree</option>
										<option value="masters">Masters</option>
										<option value="phd">PhD</option>
									</select>
								</div>
								<div class="col-12">
								<label for="terms">Upload your CV (Only pdf)</a>.</label><br>
								<?php
								if(isset($data['errors']['file_err'])){
									echo '<p style="color: red;">'.$data['errors']['file_err'].'</p>';
								}
								?>
									<input type="file" name="fileToUpload" id="file_ToUpload" required>
								</div>
							 	<div class="col-12">
									<textarea name="message" id="message" placeholder="Enter your message" rows="6"></textarea>
								</div>
								<div class="col-12">
								<?php
								if(isset($data['errors']['terms_err'])){
									echo '<p style="color: red;">'.$data['errors']['terms_err'].'</p>';
								}
								?>
								<input type="checkbox" id="terms" name="terms" value="terms">
								<label for="terms">I agree to the <a href="#">terms and conditions</a>.</label><br>
								</div>
								<div class="col-12">
									<ul class="actions special">
										<button type="submit" class="button primary">Submit</button>
									</ul>
								</div>
							</div>
						</form>
					</div>
				</section>
			<!-- Footer -->
				<footer id="footer">
					<ul class="copyright">
						<li>&copy; Untitled. All rights reserved.</li><li>IQUbe: <a >Group 08</a></li>
					</ul>
				</footer>
		</div>
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
	</body>
</html>