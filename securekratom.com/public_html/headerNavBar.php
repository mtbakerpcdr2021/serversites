<!DOCTYPE html>
<html  >
<head> 
<!-- Meta -->
<meta name="robots" content="index, follow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="English">
<meta name="revisit-after" content="2 days">
  <html lang="en">
  <link rel="shortcut icon" href="assets/images/logo-1.gif" type="image/x-icon">
  <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&subset=latin">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/soundcloud-plugin/style.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/animate.css/animate.min.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
  <!-- meta -->
 <?php 

  session_start();
  if (isset($_SESSION['loggedIn'])){
    ?>
        <script type="text/javascript">
            window.onload = function() {
             document.getElementById("userLi").classList.remove("hidden");
             // document.getElementById("userLi").innerHTML="a"
             document.getElementById("loginLi").classList.add("hidden");
             

          }
        </script>    
    <?php 

  }else{

    ?>
        <script type="text/javascript">
            window.onload = function() {
             
             document.getElementById("userLi").classList.add("hidden");
             document.getElementById("loginLi").classList.remove("hidden");

          }
        </script>    
    <?php 
  }


 ?>

</head>
<body>
  <section id="ext_menu-0" data-rv-view="327">

    <nav class="navbar navbar-dropdown navbar-fixed-top">
        <div class="container">

            <div class="mbr-table">
                <!-- <div class="mbr-table-cell"> -->

                    <div class="navbar-brand">
                        <a href="index.php" class="navbar-logo"><img src="assets/images/logo-300x120.png" alt="Secure Kratom"></a>
                        <a class="navbar-caption text-white" href="index.php">SECURE</br> KRATOM</a>
                    </div>

                <!-- </div> -->
                <div class="mbr-table-cell">

                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>

                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar">
                      <li class="nav-item" ><a class="nav-link link" href="newsletter.php" >NEWS LETTER<br></a></li>

                      <li class="nav-item"><a class="nav-link link" href="aboutus.php">ABOUT US<br></a></li>
                      <li class="nav-item"><a class="nav-link link" href="howtobuy.php">HOW TO BUY BITCOIN</a></li>
                      <li class="nav-item"><a class="nav-link link" href="termsofservice.php">TERMS OF SERVICE</a></li>
                      <li class="nav-item"><a class="nav-link link" href="contactus.php">Contact US<br></a></li>

                      <li class="nav-item nav-btn"><a class="nav-link btn btn-primary" href="STORE.php">SHOP NOW</a></li>
                      <li class="nav-item"><a class="nav-link link" href="login.php" id="loginLi">Login</a></li>

                      <!-- <li class="dropdown"> -->
                    <li class="nav-item dropdown hidden" id="userLi">
                      <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" >
                        <i class="fa fa-user"></i> Profile </a>
                      <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                        <a class="dropdown-item" href="Dashboard/panel/user.php"><b>My account</b></a>
                        <a class="dropdown-item" href="Dashboard/panel/cart.php"><b>My Cart</b></a>
                        <a class="dropdown-item" href="logout.php" ><b>Log out</b></a>
                      </div>
                    </li>

                    </ul>
                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>

                </div>
            </div>

        </div>
    </nav>

</section>

<style type="text/css">
  .dropdown-toggle{
    color: white;
    margin-left: 20px;
  }
  .dropdown-toggle:hover{
    cursor: pointer;
    color: #eee35f;
  }
  .link:hover{
    color: #eee35f !important;
  }
  .dropdown-item:hover{
    color: #eee35f !important;
  }

  /*.navbar-nav .nav-link:last-child { margin-right: 20px;}*/

  .navbar-brand{
    margin-left: -100px;
  }
  @media screen and (max-width: 768px ) {
      .navbar-brand{
        margin-left: -20px;
      }
    }
</style>

