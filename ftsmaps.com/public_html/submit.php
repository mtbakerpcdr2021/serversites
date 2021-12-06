<!DOCTYPE html>
<html  >
<head>
<meta name="title" content="Submit Businesses That Take Cryptocurrency">
<meta name="description" content="This is a map listing all the businesses that accept cryptocurrency. If your business accepts bitcoin or other crypto please list it here!">
<meta name="keywords" content="bitcoin, cryptocurrency, businesses that take bitcoin, btc, where to spend cryptocurrency, tell people I take bitcoin">
<meta name="robots" content="index, follow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="English">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.10.1, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logoloadingpage-128x170.png" type="image/x-icon">
  <meta name="description" content="">
  
  <center><h1>Submit A Business That Takes Cryptocurrency</h1></center>
  <link rel="stylesheet" href="assets/bootstrap-material-design-font/css/material.css">
  <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/soundcloud-plugin/style.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/formstyler/jquery.formstyler.css">
  <link rel="stylesheet" href="assets/formstyler/jquery.formstyler.theme.css">
  <link rel="stylesheet" href="assets/datepicker/jquery.datetimepicker.min.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
</head>
<body>
<style>.topnav {
  background-color:  #d0fffd ;
  overflow: hidden;}.topnav a {
  display: inline-block;
  text-align: center;
  list-style: none;
  color: #333;
  padding: 8px;
  text-decoration: none;
  font-size: 25px;
}.topnav a:hover {
  background-color: #ddd;
  color: black;
}.topnav a.active {
  background-color: #4CAF50;
  color: white;
}</style>
 <div class="topnav"><center>
  <a href="submit.php">Submit Business</a>
  <a href="online.php">Online Businesses</a>
  <a href="contact.php">Contact</a>
  <a href="maps.php">StoreFront Businesses</a>
</div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

<section class="form cid-rvbMF8ZQUS" id="formbuilder-q">
    
    
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto mbr-form">
<!--Formbuilder Form-->
<!-- class="mbr-form form-with-styler" -->
<form action="submit.php" method="POST"  >
<div class="form-row">
<div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Thanks for filling out the form!</div>
<div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">Oops...! some problem!</div>
</div>
<div class="dragArea form-row">
<div class="col-lg-12">
<center><h4 class="mbr-fonts-style display-5">Submit A Business For Free!</h4></center>
</div>
<div class="col-lg-12">
<hr>
</div>
<div data-for="Business Name" class="col-lg-12 col-sm-12 form-group">
<input type="text" name="b_name" placeholder="Business Name" data-form-field="name (Optional)" class="form-control display-7" required="required" value="" id="Business Name-formbuilder-q">
</div>
<div class="col-lg-12 col-md-12 col-sm-12 form-group">
<div class="form-row">
<div class="col">
<input type="text" name="name" placeholder="Name" data-form-field="nameFirst" class="form-control text-multiple" value="" id="nameFirst-formbuilder-q">
</div>
<div class="col">
<input type="text" name="position" placeholder="Position at Company" data-form-field="nameLast" class="form-control text-multiple" value="" id="nameLast-formbuilder-q">
</div>
</div>
</div>
<div data-for="email" class="col-lg-12 col-sm-12 form-group">
<input type="email" name="email" placeholder="Email" data-form-field="email" required="required" class="form-control display-7" value="" id="email-formbuilder-q">
</div>
<div class="col-lg-12 form-group" data-for="message">
<textarea name="msg" placeholder="Business address or URL AND types of crypto accepted" data-form-field="message" required="required" class="form-control display-7" id="message-formbuilder-q"></textarea>
</div>
<div class="col-auto">
<button type="submit" name="formsubmit" class="btn btn-primary display-7">Submit</button>
</div>
</div>
</form><!--Formbuilder Form-->
</div>
        </div>
    </div>
</section>

<section class="features5 cid-rv8Ncij2jQ" id="features5-k">

<?php 
	if(isset($_POST['formsubmit'])){
    $businessName=$_POST['b_name'];
    $name=$_POST['name'];
    $position=$_POST['position'];
    $email=$_POST['email'];
    $msg=$_POST['msg'];
		$message="Business Name: ".$businessName."<br>";
    $message=$message. "Customer Name: ".$name."<br>";
    $message=$message. "Position at company: ".$position."<br>";
    $message=$message. "email: ".$email."<br>";
    $message=$message. "Message: ".$msg."<br>";
    // echo $message;

    $to = "projectfts@protonmail.com";
    $subject = "Business Submition";
    
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'X-Mailer: PHP/' . phpversion();

    if(mail($to,$subject,$message,$headers)){
      ?>
        <script type="text/javascript">alert("Details Received!");</script>
      <?php
    }else{
      ?>
        <script type="text/javascript">alert("Error, Please Try Later!");</script>
      <?php

    }
		
	}
	
 ?>
	
	<div class="container">
		
		

		<div class="row justify-content-left">
			<div class="col-md-6 row-item col-lg-4">
				<div class="wrapper card1">
					<h4 class="mbr-fonts-style mbr-card-title align-left mbr-white display-5"><a href="upgrade.html">Upgrade Web Listing</a></h4>

					<p class="mbr-text mbr-fonts-style align-left display-7">You can upgrade web listings both with an extra display color, or being top search for your category.</p>
                    <div class="mbr-section-btn align-left"><a class="btn-underline mr-3 text-white display-4" href="upgrade.html">Upgrade Web Listing</a></div>
				</div>
			</div>

			<div class="col-md-6 row-item col-lg-4">
				<div class="wrapper card2">
					<h4 class="mbr-fonts-style mbr-card-title align-left mbr-white display-5"><a href="upgrade.html">Upgrade Map Listing</a></h4>

					<p class="mbr-text mbr-fonts-style align-left display-7">You can upgrade the marker visibility and the business page for any map listing.&nbsp;</p>
                    <div class="mbr-section-btn align-left"><a class="btn-underline text-white mr-3 display-4" href="upgrade.html">Upgrade Map Listing Now</a></div>
				</div>
			</div>

			<div class="col-md-6 row-item col-lg-4">
				<div class="wrapper card3">
					<h4 class="mbr-fonts-style mbr-card-title align-left mbr-white display-5">Get Banner AD</h4>
					<p class="mbr-text mbr-fonts-style align-left display-7">FTSMaps.com has paid banner ad space for sale. Contact us for further details.</p>
                    <div class="mbr-section-btn align-left"><a class="btn-underline text-white mr-3 display-4" href="mailto:projectfts@protonmail.com">Contact US</a></div>
				</div>
			</div>

			
		</div>
	</div>
</section>

<section class="footer1 cid-rv8HZFJGDh" id="footer1-i">

    

    

    <div class="container">
        <div class="media-container-row content text-white">
            <div class="col-12 col-lg-4 col-md-6">
                <div class="media-wrap">
                    <a href="https://projectfts.org/">
                        <img src="assets/images/logo-fair-trade-system-page-1-192x255.jpg" alt="Mobirise" title="">
                    </a>
                </div>
                
            </div>
            <div class="col-12 col-lg-3 mbr-fonts-style mbr-black col-lg-4 col-md-6">
                <h5 class="pb-3 column-title display-5"><a href="upgrade.html" class="text-info">
                    ADVERTISE WITH US</a></h5>
                <div class="contact-list display-7">
                    
                    
                <div class="list-item">
                        
                        <p>© Copyright 2019 Mt. Baker PC Dr. 
<br>&amp; Project Fair Trade System- All Rights Reserved</p>
                    </div><div class="list-item">
                        
                        <p></p>
                    </div></div>
            </div>
            
            
        </div>

        
    </div>
</section>


  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/formstyler/jquery.formstyler.js"></script>
  <script src="assets/formstyler/jquery.formstyler.min.js"></script>
  <script src="assets/datepicker/jquery.datetimepicker.full.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/theme/js/script.js"></script>
  <script src="assets/formoid/formoid.min.js"></script>
  
  
</body>
</html>
