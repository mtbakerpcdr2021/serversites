<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="title" content="Mt Baker PC Dr. - Contact">
	<meta name="description" content="The home page for Mt Baker PC Dr. Maple Falls computer repair and Kendall computer repair in Whatcom County Wa is what we do.">
	<meta name="keywords" content="Baker Pc Repair, Maple Falls Computer Repair, Whatcom County pc repair, Kendall Computer Repair, Crypto Consulting">
	<meta name="robots" content="index, follow">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="English">
	<meta name="revisit-after" content="7 days">

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,700|Istok+Web:400,700&display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="style.css" type="text/css" />

	<link rel="stylesheet" href="css/dark.css" type="text/css" />
	<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="css/animate.css" type="text/css" />
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="css/components/ion.rangeslider.css" type="text/css" />

	<link rel="stylesheet" href="css/custom.css" type="text/css" />
	<meta name='viewport' content='initial-scale=1, viewport-fit=cover'>

	<!-- Hosting Demo Specific Stylesheet -->
	<link rel="stylesheet" href="css/colors.php?color=44aaac" type="text/css" /> <!-- Theme Color -->
	<link rel="stylesheet" href="hosting/css/fonts.css" type="text/css" />
	<link rel="stylesheet" href="hosting/hosting.css" type="text/css" />
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!-- / -->

	<!-- Document Title
	============================================= -->
	<title>Mt. Baker PC Dr.</title>

	
</head>

<body class="stretched">
		<?php 

	if(isset($_POST['contactform'])){

		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$subject = $_POST['subject'];
		$service = $_POST['service'];
		$message = $_POST['message'];

		$alldetails = "Name: ".$name."<br>";
		$alldetails = $alldetails."email: ".$email."<br>";
		$alldetails = $alldetails."phone: ".$phone."<br>";
		$alldetails = $alldetails."subject: ".$subject."<br>";
		$alldetails = $alldetails."service: ".$service."<br>";
		$alldetails = $alldetails."message: ".$message."<br>";

		$to = "mtbakerpcdr@hotmail.com";

		$subject = "Contact Form, MT. Baker PC DR.";
		$txt = $alldetails;
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		$headers .= 'X-Mailer: PHP/' . phpversion();


		if(mail($to,$subject,$txt,$headers)){  ?>
			<script>swal("Done","We've received your message, Will get back to you soon. Thanks","success");</script>
		<?php  
		   
		}else{?>
			<script>swal("Error","Error while sending message, please contact on email or phone.","error");</script>
			<?php
		   echo "no";
		}

	}
	 ?>

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Top Bar
		============================================= -->
		<div id="top-bar" class="center dark" style="background-color: #15888a">
			<p class="mb-0 text-white" style="font-size: 14px;">Get the finest and quality services.<a href="tel:(360)389-5136" class="ml-2 font-primary font-weight-bold text-white"><u>(360)389-5136 </u></a></p>
		</div>

		<?php include "header.php"; ?>
				<!-- Page Title
		============================================= -->
		<section id="page-title" class="page-title-parallax page-title-dark include-header" style="padding: 250px 0; background-image: url('hosting/images/background6.jpg'); background-size: cover; background-position: center center;" data-bottom-top="background-position:0px 400px;" data-top-bottom="background-position:0px -500px;">

			<div class="container clearfix">
				<h1> <p style="color:teal">Contact Us</h1></p>
				<span><p style="color:teal">Contact info for Mt. Baker PC Dr.</span></p>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index">Home</a></li>
					
					<li class="breadcrumb-item active" aria-current="page">Contact Us</li>
				</ol>
			</div>

		</section><!-- #page-title end -->
				

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap">
				<div class="container">

					<div class="row gutter-40 col-mb-80">
						<!-- Postcontent
						============================================= -->
						<div class="postcontent col-lg-9">

							<h3>Send us an Email</h3>

							<div class="form-widget">

								<div class="form-result"></div>

								<form class="mb-0"  action="contact" method="post">

									<div class="form-process">
										<div class="css3-spinner">
											<div class="css3-spinner-scaler"></div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-4 form-group">
											<label for="template-contactform-name">Name <small>*</small></label>
											<input type="text" id="template-contactform-name" name="name" value="" class="sm-form-control required" required />
										</div>

										<div class="col-md-4 form-group">
											<label for="email">Email <small>*</small></label>
											<input type="email" id="email" name="email" value="" class="required email sm-form-control" required/>
										</div>

										<div class="col-md-4 form-group">
											<label for="phone">Phone</label>
											<input type="text" id="phone" name="phone" value="" class="sm-form-control" required/>
										</div>

										<div class="w-100"></div>

										<div class="col-md-8 form-group">
											<label for="subject">Subject <small>*</small></label>
											<input type="text" id="subject" name="subject" value="" class="required sm-form-control" required/>
										</div>

										<div class="col-md-4 form-group">
											<label for="service">Services</label>
											<select id="service" name="service" class="sm-form-control" required>
												<option value="" selected disabled>-- Select One --</option>
												<option value="PC Repair">PC Repair</option>
												<option value="Web Development">Web Development</option>
												<option value="Web Hosting">Web Hosting</option>
												<option value="Crypto Currency">Crypto Currency</option>
											</select>
										</div>

										<div class="w-100"></div>

										<div class="col-12 form-group">
											<label for="message">Message <small>*</small></label>
											<textarea class="required sm-form-control" id="message" name="message" rows="6" cols="30" required></textarea>
										</div>


										<div class="col-12 form-group">
											<button class="button button-3d m-0" type="submit"  name="contactform" value="submit">Send Message</button>
										</div>
									</div>
								</form>
							</div>

						</div><!-- .postcontent end -->

						<!-- Sidebar
						============================================= -->
						<div class="sidebar col-lg-3">

							<address>
								<strong>Serving:</strong><br>
								Whatcom and Northern Skagit County<br>
							</address>
							<abbr title="Phone Number"><strong>Phone:</strong></abbr> (360)389-5136<br>
							
							<abbr title="Email Address"><strong>Email:</strong></abbr> mtbakerpcdr@hotmail.com


							<div class="widget border-0 pt-0">

								<!-- <a href="#" class="social-icon si-small si-dark si-facebook">
									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>

								<a href="#" class="social-icon si-small si-dark si-twitter">
									<i class="icon-twitter"></i>
									<i class="icon-twitter"></i>
								</a>

								<a href="#" class="social-icon si-small si-dark si-dribbble">
									<i class="icon-dribbble"></i>
									<i class="icon-dribbble"></i>
								</a> -->


							</div>

						</div><!-- .sidebar end -->
					</div>

				</div>
			</div>
		</section><!-- #content end -->
		<?php include "footer.php"; ?>

			</div><!-- #wrapper end -->

			<!-- Go To Top
			============================================= -->
			<div id="gotoTop" class="icon-angle-up"></div>

			<!-- JavaScripts
			============================================= -->
			<script src="js/jquery.js"></script>
			<script src="js/plugins.min.js"></script>

			<script src="js/jquery.hotspot.js"></script>
			<script src="js/components/rangeslider.min.js"></script>

			<!-- Footer Scripts
			============================================= -->
			<script src="js/functions.js"></script>


		</body>
		</html>
