<!DOCTYPE html>
<html>
<head>
	<title>Communicate</title>
</head>
<body class="index-page sidebar-collapse">
	<!-- navbar -->
	<?php include "navbar.php"; ?>
	<div class="wrapper">


		<div class="page-header page-header-small">
	      <div class="page-header-image" data-parallax="true" style="background-image:url('./assets/img/4.jpg');">
	      </div>
	      <div class="container">
	        <div class="content-center2">
	          <!-- <img class="n-logo" src="./assets/img/now-logo.png" alt="LOGO"> -->
	          <h1 class="h1-seo">COMMUNICATION</h1>
	          <h3>Join the Project FTS Private Listserv!</h3>
	        </div>
	        
	      </div>
	    </div>
	    <div class="container">
	        <div class="row">
	          <div class="col-md-8 ml-auto mr-auto text-center">
	            <h2 class="title">Want to be in the inner circle?</h2>
	            <h5 class="description">Well if you want to be the first in-the-know for anything FTS join our email newsletter now!</h5>
	          </div>
	        </div>
    	</div>
    	    <!-- contact us section below -->
        <div class="section section-contact-us text-center">
      <div class="container">
        <form method="post" action="">
        <h2 class="title">Sign up for Newsletter</h2>
        <!-- <p class="description">Your project is very important to us.</p> -->
        <div class="row">
          <div class="col-lg-6 text-center col-md-8 ml-auto mr-auto">
            <div class="input-group input-lg">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-user"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="First Name..." name="name">
            </div>
            <div class="input-group input-lg">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-envelope"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Email..." name="email">
            </div>
            <!-- <div class="textarea-container">
              <textarea class="form-control" name="name" rows="4" cols="80" placeholder="Type a message..."></textarea>
            </div> -->
            <div class="send-button">
              <button class="btn btn-primary btn-round btn-block btn-lg" name="Subscribebtn">Subscribe</button>
            </div>
          </div>
        </div>
      </form>
      </div>
    </div>
    <?php 
    if(isset($_POST['Subscribebtn'])){
        $name=$_POST['name'];
        $email=$_POST['email'];

        

        $alldetails="<h4>Subscription FORM (MotherShip)</h4>";
        $alldetails=$alldetails. "Name: ".$name."<br>";
        $alldetails=$alldetails. "Email: ".$email."<br>";

        //admin email coming from navbar file
        $to = $adminemail;
        $subject = "Newsletter Subscription (MotherShip)";
        $txt = $alldetails;

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        // $headers .= 'From: noreply@securekratom.com' . "\r\n";
        $headers .= 'X-Mailer: PHP/' . phpversion();


        if(mail($to,$subject,$txt,$headers)){
          ?>
          <script type="text/javascript">

            swal("Done!","We've Received Your Subscription, Thanks!","success")
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
    <!-- contact section -->
<?php include "footer.php"; ?>
	</div>
<!-- wraper div main -->




</body>
</html>
