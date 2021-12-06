<!DOCTYPE html>
<html>
<head>
	<title>FTS Coin-Proof Of Business</title>
</head>
<body class="index-page sidebar-collapse">
	<!-- navbar -->
	<?php include "navbar.php"; ?>
	<div class="wrapper">


		<div class="page-header page-header-small">
	      <div class="page-header-image" data-parallax="true" style="background-image:url('./assets/img/7.jpg');">
	      </div>
	      <div class="container">
	        <div class="content-center2">
	          <!-- <img class="n-logo" src="./assets/img/now-logo.png" alt="LOGO"> -->
	          <h1 class="h1-seo">FTS Coin-Proof Of Business</h1>
	          <h3>Welcome to the FTS Coin POB!
	        </div>
	        
	      </div>
	    </div>
	    <div class="container">
	        <div class="row">
	          <div class="col-md-8 ml-auto mr-auto text-center">
	            <h2 class="title">FTS Coin-Proof Of Business</h2>
	            <h5 class="description">This is where you can submit a quick video of a business owner holding up a business card, and thanking you for showing them how to accept cryptocurrency at their business. Once you have submitted the video and required info it will be reviewed and you will earn FTS Coin for it! Videos must be under 500mb and are best sent in .mp4 format tho others will work. The current reward is 50 FTS Coin. POB Will be halved after the first 2000 videos are submitted.</h5>
	          </div>
	        </div>
    	</div>
        <div class="section section-contact-us text-center">
      <div class="container">
        <form enctype="multipart/form-data" method="post" action="">
        <h2 class="title">FTS Coin-Proof Of Business</h2>
        <!-- <p class="description">Your project is very important to us.</p> -->
        <div class="row">
          <div class="col-lg-6 text-center col-md-8 ml-auto mr-auto">
          	<div class="input-group input-lg">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-envelope"></i>
                </span>
              </div>
              <input type="Email" class="form-control" placeholder="Email" name="email">
            </div>
            <div class="input-group input-lg">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-address-card"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="FTS Coin wallet Address" name="walletaddress">
            </div>
            <div class="input-group input-lg">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-question-circle"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Business Info That Accepts Crypto" name="bussinessinfo">
            </div>
            <div class="input-group input-lg">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-info"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Your Info" name="clientinfo">
            </div>
            <div class="input-group input-lg">
              <div class="input-group-prepend">
                <span class="input-group-text">
                	Upload proof Video
                  <i class="fas fa-file"></i>
                </span>
              </div>
              <input type="file" class="form-control" name="inputvideo" accept="video/mp4,video/x-m4v,video/*">
            </div>
            <!-- <div class="textarea-container">
              <textarea class="form-control" name="name" rows="4" cols="80" placeholder="Type a message..."></textarea>
            </div> -->
            <div class="send-button">
              <button class="btn btn-primary btn-round btn-block btn-lg" name="proofBtn">Send</button>
            </div>
          </div>
        </div>
      </form>
      </div>
    </div>
    <!-- contact section -->
  <?php 
  include 'connection.php';
  $con = connecttoDB();

    if(isset($_POST['proofBtn'])){

        $email=$_POST['email'];
        $walletaddress=$_POST['walletaddress'];
        $bussinessinfo=$_POST['bussinessinfo'];
        $clientinfo=$_POST['clientinfo'];


        $target_dir = "assets/uploadedvids/";
        $filename=basename($_FILES["inputvideo"]["name"]);  
        $target_file = $target_dir . $filename;
        move_uploaded_file($_FILES["inputvideo"]["tmp_name"], $target_file);


        $alldetails="<h4>FTS Coin-Proof Of Business FORM (MotherShip)</h4> check admin panel for Attachment<br>";
        $alldetails=$alldetails. "Email: ".$email."<br>";
        $alldetails=$alldetails. "wallet Address: ".$walletaddress."<br>";
        $alldetails=$alldetails. "Bussiness Info: ".$bussinessinfo."<br>";
        $alldetails=$alldetails. "Client Info: ".$clientinfo."<br>";
        

        //admin email coming from navbar file
        $to = $adminemail;
        $subject = "Become UFO Form (MotherShip)";
        $txt = $alldetails;

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        // $headers .= 'From: noreply@securekratom.com' . "\r\n";
        $headers .= 'X-Mailer: PHP/' . phpversion();


        $insertQuery = "INSERT INTO coinproofs(email,walletaddress,businessinfo,yourinfo,uploadedfile)VALUES ('$email', '$walletaddress','$bussinessinfo','$clientinfo','$filename')";
        mysqli_query($con,$insertQuery);

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
