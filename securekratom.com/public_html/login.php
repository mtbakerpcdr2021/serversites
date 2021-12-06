
<?php 
  session_start();
  include 'connection.php';
  ?>
<!DOCTYPE html>
<html  >
<head>
<meta property="og:title" content="Buy Kratom">
<meta property="og:site_name" content="Secure Kratom">
<meta property="og:url" content="https://securekratom.com">
<meta property="og:description" content="">
<meta property="og:type" content="website">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <meta name="title" content="Buy Kratom">
<meta name="description" content="The login for securekratom.com the number one spot to buy kratom on the web.">
<meta name="keywords" content="kratom powder, kratom capsules, kratom COD, Kratom Electronic Check, Kratom Echeck, Kratom Bitcoin, retail kratom, kratom products, kratom extract, quality kratom, buy kratom, easy pay kratom">
  <title>Login for securekratom.com to buy kratom</title>
  <link rel="shortcut icon" href="assets/images/logo-1.gif" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="assets/myStyle.css">

  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="assets/soundcloud-plugin/style.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/animate.css/animate.min.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
  <style type="text/css">
    .form-control {
     background-color: #fffdfd !important;
   }
    
      .navbar-brand{
        margin-left: -130px;
      
    }
 </style>
</head>
<body>
  <?php 
  if(isset($_POST['c_login2'])){
    $c_email2=$_POST['cemail'];
    // echo $c_email2;
    $con = connecttoDB();
    if(!$con){
      ?>
      <script type="text/javascript">
        swal("Database Error!", "Database not connected!", "error");
      </script>
      <?php 
      return;
    }else{

      if (!empty($c_email2)) {
        $sql = "SELECT * FROM customers WHERE email = '$c_email2'";
        $result = mysqli_query($con,$sql);
        $count = mysqli_num_rows($result);
        
        if ($count == 1) {
          $result1=mysqli_fetch_assoc($result);
        $Name= $result1['Fname'];
        $sessionemail= $result1['email'];
        $sessionpass= $result1['password'];
        $sessionid= $result1['C_id'];
        $sessionaddress= $result1['Address'];
        $sessionphone= $result1['phone'];
        $sessionzip= $result1['zipcode'];
          
          $_SESSION['loggedIn'] = "yes";
          $_SESSION['name'] =  $Name;
          $_SESSION['email'] =  $sessionemail;
          $_SESSION['pass'] =  $sessionpass;
          $_SESSION['C_id'] =  $sessionid;
          $_SESSION['caddress'] =  $sessionaddress;
          $_SESSION['cphone'] =  $sessionphone;
          $_SESSION['czip'] =  $sessionzip;
          header("Location:STORE.php"); 
        }else{
          // $error = "Wrong username or password";
          ?>
          <script type="text/javascript">
          swal("Error!", "Incorrect UserName or Password!", "error");
        </script>
        <?php 
        }
      }


    }
  }//main if isset




  if(isset($_POST['loginBtn'])){

    $con = connecttoDB();
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashedPassword = hash('sha256', $password);
    if(!$con){

      ?>
      <script type="text/javascript">
        swal("Database Error!", "Database not connected!", "error");
      </script>
      <?php 
      return;
    }else{

      if (!empty($email) && !empty($password)) {
        $sql = "SELECT * FROM customers WHERE email = '$email' and password = '$hashedPassword'";
        $result = mysqli_query($con,$sql);
        $count = mysqli_num_rows($result);
        
        if ($count == 1) {
          $result1=mysqli_fetch_assoc($result);
        $Name= $result1['Fname'];
        $sessionemail= $result1['email'];
        $sessionpass= $result1['password'];
        $sessionid= $result1['C_id'];
        $sessionaddress= $result1['Address'];
        $sessionphone= $result1['phone'];
        $sessionzip= $result1['zipcode'];
        $sessionCity= $result1['City'];
        $sessionState= $result1['State'];
        $_SESSION['sessionCity'] =  $sessionCity;
        $_SESSION['sessionState'] =  $sessionState;
        $_SESSION['loggedIn'] = "yes";
        $_SESSION['name'] =  $Name;
        $_SESSION['email'] =  $sessionemail;
        $_SESSION['pass'] =  $sessionpass;
        $_SESSION['C_id'] =  $sessionid;
        $_SESSION['caddress'] =  $sessionaddress;
        $_SESSION['cphone'] =  $sessionphone;
        $_SESSION['czip'] =  $sessionzip;
          header("Location:STORE.php"); 
        }else{
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
  
  if(isset($_POST['resgisterBtn'])){
    $con = connecttoDB();
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $citystate= $_POST['citystate'];
    $state= $_POST['state'];
    $zip= $_POST['zip'];
    $fax= $_POST['fax'];
    $Addresstype= $_POST['Addresstype'];
    $email= $_POST['email'];
    $password= $_POST['pass'];
    $hashedPassword = hash('sha256', $password);
    $address= $_POST['address'];
    $country= $_POST['country'];
    $company= " ";
    if(isset($_POST['company'])){
      $company=$_POST['company'];
    }
    $Newsletter= "N";

    if (isset($_POST['Newsletter'])) {
        $Newsletter= "Y";
    }
   if(!$con){
      ?>
      <script type="text/javascript">
        swal("Database Error!", "Database not connected!", "error");
      </script>
      <?php 
      return;
    }

    $insertQuery = "INSERT INTO customers(email,password,Fname,Lname,Address,country,company,City,State,zipcode,phone,fax,AddressType,newsLetter)VALUES ('$email', '$hashedPassword', '$fname','$lname','$address','$country','$company','$citystate','$state','$zip','$phone','$fax','$Addresstype','$Newsletter')";
    if(mysqli_query($con,$insertQuery)){
      ?>
      <script type="text/javascript">
        swal({
          title: "Account Created!",
          icon: "success",
          button: "Done",
        });
      document.getElementById('loginlink').click();
      </script>
      <?php
    }
    mysqli_close($con);

    
    
  }


  ?>
 <section id="ext_menu-v" data-rv-view="307">
  <nav class="navbar navbar-dropdown navbar-fixed-top ">
    <div class="container">
      <div class="mbr-table">
        <div class="mbr-table-cell">
          <div class="navbar-brand"> <a href="index.php" class="navbar-logo"><img src="assets/images/logo-300x120.png" alt="Secure Kratom"></a>
            <a
            class="navbar-caption text-white" href="index.php">SECUREKRATOM.COM</a>
          </div>
        </div>
        <div class="mbr-table-cell">
          <button class="navbar-toggler pull-xs-right hidden-mdd-block d-md-none d-lg-block-up"
          type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
          <div class="hamburger-icon"></div>
        </button>
        <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm"
        id="exCollapsingNavbar">
        <!-- <li class="nav-item"><a class="nav-link link" href="https://mobirise.com/">sss</a> -->
        </li>
        <li class="nav-item"><a class="nav-link link" href="newsletter.php">NEWS LETTER<br></a>
        </li>
        <li class="nav-item"><a class="nav-link link" href="aboutus.php">ABOUT US<br></a>
        </li>
        <li class="nav-item"><a class="nav-link link" href="howtobuy.php">HOW TO BUY BITCOIN</a>
        </li>
        <li class="nav-item"><a class="nav-link link" href="termsofservice.php">TERMS OF SERVICE</a>
        </li>
        <li class="nav-item nav-btn"><a class="nav-link btn btn-white btn-white-outline" href="contactus.php">CONTACT US</a>
        </li>
        <li class="nav-item nav-btn"><a class="nav-link btn btn-primary" href="STORE.php">SHOP NOW</a>
        </li>
      </ul>
      <button hidden class="navbar-toggler navbar-close" type="button" data-toggle="collapse"
      data-target="#exCollapsingNavbar">
      <div class="close-icon"></div>
    </button>
  </div>
</div>
</div>
</nav>
</section>

<br><br><br>
<div class="container register">
  <div class="row">
    <div class="col-md-3 register-left">
      <img src="assets/images/logo-1.gif" alt="Secure Kratom"/>
      <h1><span style="font-size: 40%">Welcome to the</br>login for </br>securekratom.com</span></h1>
      <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat.</p> -->

    </div>
    <div class="col-md-9 register-right">
      <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" id="loginlink">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">SignUp</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <h3 class="register-heading">Login</h3>
          <div class="row register-form">

            <div class="col-md-12">
              <form action="login.php" method="post">
                <div class="form-group">
                  <input type="email" class="form-control" placeholder="Email *"  required="" name="email" />
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="Password *" required="" name="password" />
                </div>   
                <button type="submit" class="btnRegister" name="loginBtn" id="loginBtn">Login</button>
              </form>
            </div>

          </div>
        </div>
        <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <h3  class="register-heading">SignUp</h3>
          <div class="row register-form">
            <div class="col-md-6">
              <form action="login.php" method="post">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="First Name *" name="fname" required/>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Last Name *" name="lname" required/>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Phone *" name="phone" required/>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="City *" name="citystate" required/>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="State *" name="state" required/>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Zip Code *" name="zip" required/>
                </div>
                
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Fax If available" name="fax" />
                </div>
                <div class="form-group">
                  <div class="form-control-label">
                    <label for="Type Of Address-formbuilder-w" class="mbr-fonts-style display-7">Type Of Address</label>
                  </div>
                  <div class="form-check">
                    <input type="radio" name="Addresstype"  class="form-check-input display-7" value="Residential" checked="">
                    <label class="form-check-label display-7">Residential</label>
                  </div>
                  <div class="form-check">
                    <input type="radio" name="Addresstype" class="form-check-input display-7" value="Business" id>
                    <label class="form-check-label display-7">Business</label>
                  </div>
                </div>


              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="email" class="form-control" placeholder="Email *" name="email" required  id="email" onkeyup="checkEmail();"/>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" placeholder="Confirm Email *"  required onkeyup="checkEmail();" id="cemail" />
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="Password *" name="pass" required onkeyup="checkpassword();" id="pass" />
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="Confirm Password *" required onkeyup="checkpassword();" id="cpass" />
                </div>
                <div class="form-group">
                  <textarea  placeholder="Shipping Address" data-form-field="Address" class="form-control display-7" id="Address-formbuilder-w" style="height: 92px;" required name="address"></textarea>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Country *" name="country" required/>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Company Name *" name="company"/>
                </div>
                <div class="form-control-label">
                  <label for="Would You Like To Join Our Mailing List?" class="mbr-fonts-style display-7">Would You Like To Join Our Mailing List?</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="Yes" name="Newsletter" data-form-field="Recieve Newsletter" class="form-check-input display-7" id="Recieve Newsletter-formbuilder-w">
                  <label class="form-check-label display-7">Receive Newsletter</label>
                </div>
                  <button type="submit" class="btnRegister" name="resgisterBtn" id="registerBtn">Register</div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
  </div>

  
  <script type="text/javascript">
    function checkEmail(){
      var email=document.getElementById("email").value;
      var cemail=document.getElementById("cemail").value;
      if(email!=cemail){
        document.getElementById("registerBtn").disabled = true;
        document.getElementById("cemail").classList.add("red");
        document.getElementById("email").classList.add("red");
      }else{
        document.getElementById("registerBtn").disabled = false;
        document.getElementById("cemail").classList.remove("red");
        document.getElementById("email").classList.remove("red");
        checkpassword();
      }


    }
    function checkpassword(){
      var pass=document.getElementById("pass").value;
      var cpass=document.getElementById("cpass").value;
      if(pass!=cpass){
        document.getElementById("registerBtn").disabled = true;
        document.getElementById("cpass").classList.add("red");
        document.getElementById("pass").classList.add("red");
      }else{
        document.getElementById("registerBtn").disabled = false;
        document.getElementById("cpass").classList.remove("red");
        document.getElementById("pass").classList.remove("red");
        checkEmail();
      }


    }
  </script>
  <style type="text/css">
    .red{
      border: 1px solid #f90000 !important;
    }
    #loginBtn:hover{
      color: #2b0680;
      
    }
    #registerBtn:hover{
      color: #2b0680;
    }
    .navbar{
      background: #282828 !important;
    }
    .nav-dropdown .link {
    color: #ffffff !important;
    }
    .nav-dropdown .link:hover {
    color: #eee35f !important;
    }
    

  </style>
  <!-- <script src="assets/web/assets/jquery/jquery.min.js"></script> -->
  <script src="assets/tether/tether.min.js"></script>
  <!-- <script src="assets/bootstrap/js/bootstrap.min.js"></script> -->
  <script src="assets/smooth-scroll/smooth-scroll.js"></script>
  <script src="assets/viewport-checker/jquery.viewportchecker.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/touch-swipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/theme/js/script.js"></script>
  <script src="assets/formoid/formoid.min.js"></script>
  
  
  <input name="animation" type="hidden">
</body>
</html>
