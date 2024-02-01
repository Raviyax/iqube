<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
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
						<form method="post" action="#">
							<div class="row gtr-50 gtr-uniform">
								<div class="col-6 col-12-mobilep">
									<input type="text" name="Firstname" id="name" value="" placeholder="First Name" />
								</div>
                                <div class="col-6 col-12-mobilep">
                                    <input type="text" name="Lastname" id="name" value="" placeholder="Last Name" />
                                    </div>
								<div class="col-6 col-12-mobilep">
                                    <input type="text" name="cno" id="cmo" value="" placeholder="Contact number" />
                                    </div>



                                    <div class="col-6 col-12-mobilep">
									<input type="email" name="email" id="email" value="" placeholder="Email" />
								</div>
								<div class="col-12">
									<select name="subject" id="subject">
                                        <option value="" disabled selected>- Subject You Like to Teach -</option>

									</select>
								</div>
								<div class="col-12">
									<select name="Qualification" id="Qualification">
                                        <option value="" disabled selected>- Highest Qualification in your Field -</option>
                                        <option value="highschool">High School</option>
										<option value="diploma">Diploma</option>
										<option value="degree">Degree</option>
										<option value="masters">Masters</option>
										<option value="phd">PhD</option>
									</select>
								</div>

								<div class="col-12">





									<textarea name="message" id="message" placeholder="Enter your message" rows="6"></textarea>
								</div>
								<div class="col-12">
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