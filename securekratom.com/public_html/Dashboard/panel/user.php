

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Profile
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <!-- <link href="../assets/demo/demo.css" rel="stylesheet" /> -->
</head>

<body class="">
  <?php 
  session_start();
  include '../../connection.php';
  $con = connecttoDB();
  if(!isset($_SESSION['loggedIn'])){
      header("Location:../../login.php");
  }
    $sessionEmail=$_SESSION['email'];
    $sessionpass=$_SESSION['pass'];
    $sql = "SELECT * FROM customers WHERE email = '$sessionEmail'";
    $result = mysqli_query($con,$sql);
    $result1=mysqli_fetch_assoc($result);
    

  




 ?>
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="#" class="simple-text logo-normal">
          <?php 
          if(isset($_SESSION['name'])){
              echo $_SESSION['name'];
            }
           ?>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
        
          <li class="nav-item active ">
            <a class="nav-link" href="./user.php">
              <i class="material-icons">person</i>
              <p>User Profile</p>
            </a>
          </li>
          <li class="nav-item  ">
            <a class="nav-link" href="./cart.php">
              <i class="material-icons">add_shopping_cart</i>
              <p>Cart</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./tables.php">
              <i class="material-icons">content_paste</i>
              <p>Order History</p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <!-- <a class="navbar-brand" href="#">User Profile</a> -->
            <a class="navbar-brand" href="../../index.php">Home</a>
            <a class="navbar-brand" href="../../contactus.php">Contact</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            
            <ul class="navbar-nav">

              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>Profile
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="cart.php">My Cart</a>
                  <a class="dropdown-item" href="../../logout.php">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Profile</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body" style="margin-top: 20px;">
                  <form action="user.php" method="post">
                    <div class="row">
                      
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">First Name</label>
                          <input required type="text" name="fname" class="form-control" value="<?php echo $result1['Fname']; ?>">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input required type="text" name="lname" class="form-control" value="<?php echo $result1['Lname']; ?>" >
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">phone</label>
                          <input type="text" class="form-control" name="phone"  required="" value="<?php echo $result1['phone']; ?>">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">City</label>
                          <input type="text" class="form-control" name="citystate" required="" value="<?php echo $result1['City']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">State</label>
                          <input type="text" class="form-control" name="state"required="" value="<?php echo $result1['State']; ?>">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Zip</label>
                          <input type="text" class="form-control" name="zip" required="" value="<?php echo $result1['zipcode']; ?>">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Fax</label>
                          <input type="text" class="form-control" name="fax" value="<?php echo $result1['fax']; ?>">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Country</label>
                          <input type="text" class="form-control" required="" name="country" value="<?php echo $result1['country']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="email" class="form-control" required="" name="email" value="<?php echo $result1['email']; ?>">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">New Password</label>
                          <input type="text" class="form-control" name="newpassword">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input type="text" name="address" class="form-control" required="" value="<?php echo $result1['Address']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Company Name</label>
                          <input type="text" name="company" class="form-control" value="<?php echo $result1['company']; ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                      <div class="form-group">
                        
                        <div class="form-group" style="float: left; margin-left: 20px;">
                          <input type="radio" checked name="Addresstype"  class="form-check-input display-7" value="Residential"  >
                          <label class="form-check-label display-7">Residential</label>
                        </div>
                        <div class="form-group" style="float: left; margin-left: 30px;">
                          <input type="radio" name="Addresstype" class="form-check-input display-7" value="Business" >
                          <label class="form-check-label display-7">Business</label>
                        </div>
                      </div>
                      
                    </div>
                    <div class="col-md-4">
                      <div class="form-group" style="margin-top:14px; margin-left: 20px;">
                        <input type="checkbox" value="Yes" name="Newsletter" data-form-field="Recieve Newsletter" class="form-check-input display-7" id="Recieve Newsletter-formbuilder-w">
                        <label class="form-check-label display-7">Recieve Newsletter</label>
                      </div>
                    </div>
                    </div>
                    <!-- card body -->
                    </div>
                    <button type="submit" class="btn btn-primary pull-right" name="updateProfile"><b>Update Profile</b></button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            
          </div>
        
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="../../index.php">
                  Home
                </a>
              </li>
              <li>
                <a href="../../aboutus.php">
                  About Us
                </a>
              </li>
              <li>
                <a href="../../termsofservice.php">
                  Terms
                </a>
              </li>
              <li>
                <a href="../../contactus.php">
                  Contact
                </a>
              </li>
              
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, Copyright 2019 Indigo Rising Herbs LLC. All Rights Reserved.</a> 
          </div>
        </div>
      </footer>
    </div>
  </div>

  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="../assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="../assets/js/plugins/arrive.min.js"></script>

  
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <?php 
  if(isset($_POST['updateProfile'])){
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

    $password= $_POST['newpassword'];
    if(!empty($password)){
      $hashedPassword = hash('sha256', $password);
    }else{
      $hashedPassword=$sessionpass;
    }

    

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



    $insertQuery = "UPDATE customers SET email='$email',password='$hashedPassword',Fname='$fname',Lname='$lname',Address='$address',country='$country',company='$company',City='$citystate',State='$state',zipcode='$zip',phone='$phone',fax='$fax',AddressType='$Addresstype',newsLetter='$Newsletter' where email='$sessionEmail'";
    // $sql = "UPDATE users SET username='$ename',password='$epass',role='$erole',email='$email' WHERE id='$id'";
    if(mysqli_query($con,$insertQuery)){
      $_SESSION['name'] =  $fname;
      $_SESSION['email'] =  $email;
      $_SESSION['pass'] =  $hashedPassword;
      
      // header("Location:user.php");
      ?>
      <script type="text/javascript">
        // swal("Updated!", "Profile Updated", "success");
        // window.open("user.php","_self"); 
        swal("Profile Updated!")
        .then((value) => {
          window.open("user.php","_self"); 
        });
      </script>
      <?php
      
    }
    mysqli_close($con);

    
    
  } ?>
  <style type="text/css">
    .sidebar li.active > a{
      background-color:  #86b642 !important;
    }
     .card-header-primary{
      background: linear-gradient(60deg, #86b642, #b0e662) !important;
    }
    .btn.btn-primary{
      background-color: #86b642;
    }
    .btn.btn-primary:hover{
      background-color: #b0e662;

    }
    .dropdown-menu .dropdown-item:hover{
      background-color: #86b642;
    }
    .form-control, .is-focused .form-control {
    background-image: linear-gradient(to top, #86b642 2px, rgba(156, 39, 176, 0) 2px), linear-gradient(to top, #d2d2d2 1px, rgba(210, 210, 210, 0) 1px);
    }
  </style>
</body>

</html>
