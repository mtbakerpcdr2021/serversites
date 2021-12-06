<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
		<?php 
	session_start();
	include '../../connection.php';
	$con = connecttoDB();
	
	// $hashedPassword = hash('sha256', "admin");
	
	// $insertQuery = "INSERT INTO admin(username,password)VALUES ('admin', '$hashedPassword')";
 //    mysqli_query($con,$insertQuery);

	if(isset($_POST['loginBtn'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    // echo $username;
    // echo $password;
    $hashedPassword = hash('sha256', $password);
    echo $hashedPassword;
    if(!$con){

      ?>
      <script type="text/javascript">
        swal("Database Error!", "Database not connected!", "error");
      </script>
      <?php 
      return;
    }else{

      if (!empty($username) && !empty($password)) {
        $sql = "SELECT * FROM admin WHERE username = '$username' and password = '$hashedPassword'";
        $result = mysqli_query($con,$sql);
        $count = mysqli_num_rows($result);
        if ($count == 1) {         
          $_SESSION['AdminloggedIn'] = "yes";
          header("Location:../panel/CoinProofs.php");
          // echo "yes";
        }else{
        	echo $count;
          // $error = "Wrong username or password";
          ?>
          <script type="text/javascript">
          swal("Error!", "Incorrect UserName or Password!", "error");
        </script>
        <?php 
        }
      }


    }

  }
     ?>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/38.png');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Admin Login
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" action="adminlogin.php" method="post" style="background-color: transparent;">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" type="submit" name="loginBtn">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
