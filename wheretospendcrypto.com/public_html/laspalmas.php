<!DOCTYPE html>
<html>
<head>
	<title>Las Palmas Bar and Resturaunt</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/likeDislike.css">

	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="javascript/likeDislike.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<section class="mbr-section content1 cid-rvR0QwUMzs" id="content1-t">
    
     

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <p class="mbr-text mbr-fonts-style mbr-light display-7">Click Thumbs up to Verify Business Accepts Crypto, Thumbs Down if They Don't</p>
            </div>
        </div>
    </div>
</section>

<section class="footer1 cid-rv8tljIIgM" id="footer1-3">
	<?php
		//connecting to database 
		$servername = "localhost";
		$username = "admin_root";
		$password = "RootCanal";
		$dbname="admin_laspalmas";

		$con=mysqli_connect($servername,$username,$password,$dbname);

		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to Database: " . mysqli_connect_error();
		  }
		  else{
		  	// echo "connected";
		  }
		  //getting likes from database
		  $likesQuery = mysqli_query($con, "SELECT likes FROM likedislikecounter");
		  $likes=mysqli_fetch_assoc($likesQuery);
		  //getting dislikes from database
		  $dislikesQuery = mysqli_query($con, "SELECT dislikes FROM likedislikecounter");
		  $dislikes=mysqli_fetch_assoc($dislikesQuery);
		  //setting values of likes and dislikes
		  $likes=	$likes['likes'];
		  $dislikes= $dislikes['dislikes'];

		  //checking if like button is pressed
		  if(isset($_POST['likebtn'])){
		  	$likes=$likes+1;
		  	$updateLikes = "UPDATE likedislikecounter SET likes = $likes";
			mysqli_query($con,$updateLikes);
		  }
		  if(isset($_POST['dislikebtn'])){
		  	$dislikes=$dislikes+1;
		  	$updatedisLikes = "UPDATE likedislikecounter SET dislikes = $dislikes";
			mysqli_query($con,$updatedisLikes);

			//sending email on each dislike pressed
			$to = "projectfts@protonmail.com";
		    $subject = "Dislike from Las Palmas";
		    $message = '<html><body>';
		    $message .= '<p style="color:#000;font-size:18px;">Dislike button pressed on laspalmas.php</p>';
		    $message .= '</body></html>';
	        $headers  = 'MIME-Version: 1.0' . "\r\n";
		    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		    $headers .= 'From: '."admin@ftsmaps.com".
		    mail($to,$subject,$message,$headers);
		  }
	 ?>
	<form action="laspalmas.php" method="POST">
		<div class="container">
			<div class="jumbotron row">				
				<div class="col-lg-6 col-md-6" id="likebtnDiv">
					<button type="submit" id="likebtn" name="likebtn">
						<img src="images/like.png" class="img-fluid mx-auto d-block">
					</button>
					<br>
					<p id="Likenumbers"><?php echo $likes; ?></p>
				</div>
				<div class="col-lg-6 col-md-6" id="dislikebtnDiv">
					<button type="submit" id="dislikebtn" name="dislikebtn">
						<img src="images/dislike.png" class="img-fluid mx-auto d-block ">
					</button>
					<br>
					<p id="Dislikenumbers"><?php echo $dislikes; ?></p>
				</div>
			</div>
		</div>
	</form>
<section class="mbr-section content1 cid-rvR0QwUMzs" id="content1-t">
    
     

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <p class="mbr-text mbr-fonts-style mbr-light display-7">Las Palmas</br>Mexican food and bar</br><a href="http://laspalmasrestaurantnj.com/" class="text-info">Click For Website</a></br>Crypto Accepted:Bitcoin</br><a href="https://projectfts.org" class="text-info">Click For Projectfts.org</a></br><a href="https://ftsmaps.com" class="text-info">Click here to go Back To FTSMAPS</a></p>
            </div>
        </div>
    </div>
</section>

<section class="footer1 cid-rv8tljIIgM" id="footer1-3">
</body>
</html>
