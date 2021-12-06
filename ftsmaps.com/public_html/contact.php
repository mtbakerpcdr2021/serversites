<!DOCTYPE html>
<html  >
<head>
  <!-- Site made with Mobirise Website Builder v4.10.1, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.10.1, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logoloadingpage-128x170.png" type="image/x-icon">
  <meta name="description" content="">
  
  <title>Contact Us</title>
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

<section class="form cid-rvbOVtrGc3" id="formbuilder-r">
    
    
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto mbr-form">
<!--Formbuilder Form-->
<form action="contact.php" method="POST" >
<div class="form-row">
<div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Thanks for filling out the form!</div>
<div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">Oops...! some problem!</div>
</div>
<div class="dragArea form-row">
<div class="col-lg-12 col-md-12 col-sm-12">
<h4 class="mbr-fonts-style display-5">Questions, comments or concerns? Contact us! </br>Or E-Mail us at projectfts@protonmail.com </h4>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<hr>
</div>
<div data-for="name (Optional)" class="col-lg-12 col-md-12 col-sm-12 form-group">
<input type="text" name="name" placeholder="Name (Optional)" data-form-field="name (Optional)" class="form-control display-7" value="" id="name (Optional)-formbuilder-r">
</div>
<div data-for="email" class="col-lg-12 col-md-12 col-sm-12 form-group">
<input type="email" name="email" placeholder="Email (Optional)" data-form-field="email" class="form-control display-7" value="" id="email-formbuilder-r">
</div>
<div data-for="checkbox" class="col-lg-12 col-md-12 col-sm-12 form-group">
<div class="form-control-label">
<label for="checkbox" class="mbr-fonts-style display-7">Question/Concern/Comment?</label>
</div>
<div class="form-check">
<input type="checkbox" value="Yes" name="question" data-form-field="Question" class="form-check-input display-7" id="Question-formbuilder-r">
<label class="form-check-label display-7">Question</label>
</div>
<div class="form-check">
<input type="checkbox" value="Yes" name="concern" data-form-field="Concern" class="form-check-input display-7" id="Concern-formbuilder-r">
<label class="form-check-label display-7">Concern</label>
</div>
<div class="form-check">
<input type="checkbox" value="Yes" name="comment" data-form-field="Comment" class="form-check-input display-7" id="Comment-formbuilder-r">
<label class="form-check-label display-7">Comment</label>
</div>
</div>
<div class="col-lg-12 form-group" data-for="message">
<textarea name="msg" placeholder="What is your question or concern?" data-form-field="message" class="form-control display-7" required="required" id="message-formbuilder-r"></textarea>
</div>
<div class="col-auto"><button type="submit" name="contactSubmit" class="btn btn-primary">Submit</button></div>
</div>
</form><!--Formbuilder Form-->
</div>
        </div>
    </div>
</section>

<?php 
  if(isset($_POST['contactSubmit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];

    if(isset($_POST['question'])){
      $question=$_POST['question'];
    }else{
      $question="No";
    }
    if(isset($_POST['concern'])){
      $concern=$_POST['concern'];
    }else{
      $concern="No";
    }
    if(isset($_POST['comment'])){
      $comment=$_POST['comment'];
    }else{
      $comment="No";
    }

    $msg=$_POST['msg'];

    $message="Customer Name: ".$name."<br>";
    $message=$message. "Customer Email: ".$email."<br>";
    $message=$message. "Question: ".$question."<br>";
    $message=$message. "Concern: ".$concern."<br>";
    $message=$message. "Comment: ".$comment."<br>";
    $message=$message. "Message: ".$msg."<br>";
    
    $to = "projectfts@protonmail.com";
    $subject = "Contact Form Submition";
    
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'X-Mailer: PHP/' . phpversion();

    if(mail($to,$subject,$message,$headers)){
      ?>
        <script type="text/javascript">alert("Message Received!");</script>
      <?php
    }else{
      ?>
        <script type="text/javascript">alert("Error, Please Try Later!");</script>
      <?php

    }

    
    
  }
  
 ?>
<section class="footer1 cid-rv8GmUt9kq" id="footer1-e">

    

    

    <div class="container">
        <div class="media-container-row content text-white">
            <div class="col-12 col-lg-4 col-md-6">
                <div class="media-wrap">
                    <a href="https://projectfts.org/">
                        <img src="assets/images/logo-fair-trade-system-page-1-192x255.jpg" alt="" title="">
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
