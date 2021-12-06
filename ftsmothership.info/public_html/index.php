
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <!-- <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png"> -->
  <!-- <link rel="icon" type="image/png" href="./assets/img/favicon.png"> -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    FTSMothership
  </title>

</head>

<body class="index-page sidebar-collapse">
  <!-- Navbar -->
  <?php include "navbar.php" ?>
  <!-- End Navbar -->
  <div class="wrapper">
    <div class="page-header clear-filter" id="particles-js">
      <div class="page-header-image" data-parallax="true" style="background-image:url('./assets/img/bg.jpg');">
      </div>
      <div class="container">
        <div class="content-center content-center1 brand">
          <!-- <img class="n-logo" src="./assets/img/now-logo.png" alt="LOGO"> -->
          <h1 class="h1-seo">FTS MOTHERSHIP</h1>
          <h3 >Welcome to the gathering and recruiting center for Project FTS!</br><a href="coinproof.php">Click Here To Submit A Business for 50 FTS Coin!</a></h3>
        </div>
        
      </div>
    </div>
        <div class="section section-about-us">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto text-center">
            <h2 class="title">Who are we?</h2>
            <h4 class="description">Project FTS is a multi-branched project; FTS Maps guides people to businesses that accept cryptocurrency, Project FTS's .org site helps teach businesses how to accept cryptocurrency for free using easy to follow cartoons, FTS Mothership organizes people that wish to assist with helping spread cryptocurrency mass adoption to the businesses of the world, and FTS Coin provides people and businesses with an optional open source privacy coin with a fast transaction time that is used to incentivize mass adoption. </h4>
          </div>
        </div>
        <div class="separator separator-primary"></div>
        <div class="section-story-overview">
          <div class="row">
            <div class="col-md-6">
              <div class="image-container image-left" style="background-image: url('assets/img/3.jpg')">
                <!-- First image on the left side -->
                <p class="blockquote blockquote-primary">"The key to mass adoption's understanding that cryptocurrency's value isn't speculative, it's the ability to perform transactions, and then spreading this transactional use case as agressively as possible."-Jeremy (CEO Project FTS)
                
                </p>
              </div>
              <!-- Second image on the left side of the article -->
              <div class="image-container" style="background-image: url('assets/img/1.jpeg')"></div>
            </div>
            <div class="col-md-5">
              <!-- First image on the right side, above the article -->
              <div class="image-container image-right" style="background-image: url('assets/img/2.jpg')"></div>
              <h3>So what does UFOS even mean?</h3>
              <p>UFOS Stands for Unified Fud Opposition Systems. These people will be given free Project FTS stickers and tshirts, for them to keep, along with educational material they can pass out to businesses about cryptocurrency. If one of the Project FTS UFOS gets a business to accept cryptocurrency they can submit that on the POB page for a set amount of FTS Coin!
              <p>
                Doing the right thing should come with a reward, let us reward you for your assistance with cryptocurrency mass adoption!
              </p>
              <p>The world is big enough for all coins. Instead of looking for one crypto for all uses, lets find all the use cases crypto can fill. Transactions are the start, so let's finish spreading this part first!
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- contact us section below -->
        <div class="section section-contact-us text-center">
      <div class="container">
        <form method="post" action="">
        <h2 class="title">Contact us!</h2>
        <p class="description">Questions, comments, concerns?</p>
        <div class="row">
          <div class="col-lg-6 text-center col-md-8 ml-auto mr-auto">
            <div class="input-group input-lg">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-user"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="First Name..." required="" name="name">
            </div>
            <div class="input-group input-lg">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-envelope"></i>
                </span>
              </div>
              <input type="email" class="form-control" placeholder="Email..." required="" name="email">
            </div>
            <div class="textarea-container">
              <textarea class="form-control" rows="4" cols="80" placeholder="Type a message..." required="" name="msg"></textarea>
            </div>
            <div class="send-button">
              <button class="btn btn-primary btn-round btn-block btn-lg" name="contactbtn">Send Message</button>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
    <!-- contact section -->
<?php 
    if(isset($_POST['contactbtn'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $msg=$_POST['msg'];

        

        $alldetails="<h4>Contact FORM (MotherShip)</h4>";
        $alldetails=$alldetails. "Name: ".$name."<br>";
        $alldetails=$alldetails. "Email: ".$email."<br>";
        $alldetails=$alldetails. "Message: ".$msg."<br>";

        $to = $adminemail;
        $subject = "Contact Us(MotherShip)";
        $txt = $alldetails;

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        // $headers .= 'From: noreply@securekratom.com' . "\r\n";
        $headers .= 'X-Mailer: PHP/' . phpversion();


        if(mail($to,$subject,$txt,$headers)){
          ?>
          <script type="text/javascript">

            swal("Done!","We've Received Your Message, Thanks!","success")
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
  <!--   Core JS Files   -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/0.7.0/jquery.velocity.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/0.7.0/velocity.ui.min.js"></script>
  <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
  <script src="https://threejs.org/examples/js/libs/stats.min.js"></script>
  <script src="assets/js/myScript.js"></script>
</body>

</html>
