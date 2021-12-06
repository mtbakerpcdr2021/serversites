<!DOCTYPE html>
<html>
<head>
	<title>Become A Project FTS UFOs</title>
</head>
<body  class="index-page sidebar-collapse">
	<!-- navbar -->
	<?php include "navbar.php"; ?>
	<div class="wrapper">


		<div class="page-header page-header-small">
	      <div class="page-header-image" data-parallax="true" style="background-image:url('./assets/img/5.jpg');">
	      </div>
	      <div class="container">
	        <div class="content-center2">
	          <!-- <img class="n-logo" src="./assets/img/now-logo.png" alt="LOGO"> -->
	          <h1 class="h1-seo">Become A Project FTS UFOs</h1>
	          <h3>Become a Project FTS UFOs and earn FTS Coin!</h3>
	        </div>
	        
	      </div>
	    </div>
	    <div class="container">
	        <div class="row">
	          <div class="col-md-8 ml-auto mr-auto text-center">
	            <h2 class="title">What is a Project FTS UFOs?</h2>
	            <h5 class="description">A Project FTS Urban FUD Opposition System, or UFOs is a Project FTS volunteer that is rewarded with Project FTS free gear (stickers, tshirts, etc) and FTS Coin for teaching local businesses how to accept cryptocurrency safely and in a way that will be free to their business! Also, using their knowledge of crypto, FTS UFOs will help business owners calm any fears they may have about accepting cryptocurrency!</h5>
	          </div>
	        </div>
    	</div>
    	    <!-- contact us section below -->
        <div class="section section-contact-us text-center">
      <div class="container">
         <form method="post" action="">
        <h2 class="title">Fill The Form to Join</h2>
        <!-- <p class="description">Your very important to us.</p> -->
        <div class="row">
          <div class="col-lg-6 text-center col-md-8 ml-auto mr-auto">
            <div class="input-group input-lg">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-user"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Name..." name="name">
            </div>
            <div class="input-group input-lg">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-envelope"></i>
                </span>
              </div>
              <input type="Email" class="form-control" placeholder="Email..." name="email">
            </div>
            <div class="input-group input-lg">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-phone"></i>
                </span>
              </div>
              <input type="number" class="form-control" placeholder="Phone..." name="phone">
            </div>
             <div class="input-group input-lg">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-address-card"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Mailing Address..." name="mailingaddress">
            </div>
            <div class="textarea-container">
              <textarea class="form-control"  rows="4" cols="80"  name="msg" placeholder="How and why do you want to help the mass adoption of cryptocurrency?"></textarea>
            </div>
            <div class="send-button">
              <button class="btn btn-primary btn-round btn-block btn-lg" name="Subscribebtn">Beam Me UP!</button>
            </div>
          </div>
        </div>
      </form>
      </div>
    </div>
    <!-- contact section -->

        <?php 
    if(isset($_POST['Subscribebtn'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $mailingaddress=$_POST['mailingaddress'];
        $msg=$_POST['msg'];

        $alldetails="<h4>Become UFO FORM (MotherShip)</h4>";
        $alldetails=$alldetails. "Name: ".$name."<br>";
        $alldetails=$alldetails. "Email: ".$email."<br>";
        $alldetails=$alldetails. "Phone: ".$phone."<br>";
        $alldetails=$alldetails. "Mailing Address: ".$mailingaddress."<br>";
        $alldetails=$alldetails. "Message: ".$msg."<br>";

        //admin email coming from navbar file
        $to = $adminemail;
        $subject = "Become UFO Form (MotherShip)";
        $txt = $alldetails;

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        // $headers .= 'From: noreply@securekratom.com' . "\r\n";
        $headers .= 'X-Mailer: PHP/' . phpversion();


        if(mail($to,$subject,$txt,$headers)){
          ?>
          <script type="text/javascript">

            swal("Done!","We've Received Your Details, Thanks!","success")
          </script>
            <?php 
        }else{
          ?>
          <script type="text/javascript">

            swal("Error!","Server Error, Try later!","error")
          </script>
            <?php 
        }
      }
  
 ?>
<?php include "footer.php"; ?>
	</div>
<!-- wraper div main -->




</body>
</html>
