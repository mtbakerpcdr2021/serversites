<head>
<meta property="og:title" content="Buy Kratom with Electronic Check at SecureKratom.com">
<meta property="og:site_name" content="Secure Kratom">
<meta property="og:url" content="https://securekratom.com">
<meta property="og:description" content="">
<meta property="og:type" content="website">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <meta name="title" content="Secure Kratom Contact Us">
<meta name="description" content="This is the contact page for securekratom.com the best place to buy kratom easy">
<meta name="keywords" content="kratom powder, kratom capsules, kratom COD, Kratom Electronic Check, Kratom Echeck, Kratom Bitcoin, retail kratom, kratom products, kratom extract, quality kratom, buy kratom, easy pay kratom">
<title>Contact Us if you have questions about buying kratom</title></head>
<?php 
include 'headerNavBar.php';
 ?>

<section class="engine"><a href="https://mobirise.info/f">easy web builder</a></section><div id="extHeader9-r" class="mbr-after-navbar"><section class="mbr-section mbr-section-hero mbr-section-full extHeader9 mbr-after-navbar" data-rv-view="60" style="background-image: url(assets/images/jungle5-1600x1200.jpg);">

    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(0, 0, 0);">
    </div>

    <div class="mbr-table mbr-table-full">
        <div class="mbr-table-cell">

            <div class="container">
                <div class="mbr-section row">
                    <div class="mbr-table-md-up">
                        <div class="mbr-table-cell mbr-right-padding-md-up col-md-7 text-xs-center text-md-right">

                            <h1 class="mbr-section-title display-2 mbr-editable-content">Contact Us If You Have Questions</h1>

                            <div class="mbr-section-text lead">
                                <p class="mbr-editable-content">If you have any questions about buying bitcoin, or any questions in general please email <a href="mailto:admin@goldstarbotanicals.com" class="text-warning">admin@goldstarbotanicals.com</a>Thanks!</p></br></br><p>We look forward to helping you with the best kratom available and will reply to your message as promptly as possible</p>
                            </div>
                        </div>
                        <div class="form-table mbr-valign-top col-md-12  formblock" data-form-type="formoid">
                            <h2 class="mbr-section-title display-2 form-title mbr-editable-content">Or Contact Us Here</h2>
                            <div data-form-alert="true">
                                <div hidden="" data-form-alert-success="true" class="alert alert-form alert-success text-xs-center">Thanks for reaching out to us! We will contact your or reply, if needed, as soon as possible.</div>
                            </div>
                            <form action="contactus.php" method="post" data-form-title="Contact Us">
                                <input type="hidden" value="xOoo2vyWENEnHtuQUOP7Xkg1PV2RcX1N4YEs2mYIe6LusU7FSZHh56fncvH+ASFX2u/VgqfWnH/kKCR6pT9q98bm/YGkeve710xnrM3/4GA9zylxI79e2VJJSN8cZQgj" data-form-email="true">
<input type="text" id="fill-me-in" style="display:none" />
                                    <div class="col-xs-12">
                                         <input type="text" class="form-control" name="name" required="" data-form-field="Name" placeholder="Name*">
                                    </div>

                                    <div class="col-xs-12"> 
                                         <input type="email" class="form-control" style="margin-top: 7px;" name="email" required="" data-form-field="Email" placeholder="Email*">    
                                    </div>

                                    

                                    <div class="col-xs-12">
                                        <textarea class="form-control" style="margin-top: 7px;"  name="message" rows="7" data-form-field="Message" style="resize:none" placeholder="Message"></textarea>
                                    </div>
                                    <div class="col-xs-12" >
                                     <div style="background: transparent; margin-top: 7px; border:none;" class="g-recaptcha form-control" data-sitekey="6Lf6xK0ZAAAAAHRzmDdE0ZpJGTG4PV-MKQritYOo" data-theme="dark"></div>
                                     </div>
                                     
                                <div class="col-xs-12" style=" text-align: center">
                                  <button type="submit" class="btn btn-primary mbr-editable-button" name="getstart">GET STARTED</button>
                                </div>
                                <div><p class="display-2 form-subtitle mbr-editable-content"></p></div>
                        </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

      <?php 
    include 'connection.php';
    $con = connecttoDB();
    $result4 = mysqli_query($con, "SELECT * FROM admin");   
    $admindetails=mysqli_fetch_assoc($result4);
    $adminemail= $admindetails['email'];

      if(isset($_POST['getstart'])){


         $secretKey = '6Lf6xK0ZAAAAALnV9B81vN8aArU-0QqAAolVYfuK';
        $captcha = $_POST['g-recaptcha-response'];

        if(!$captcha){
          ?>
          <script>alert("captcha Required!")</script>
          <?php
          // exit;
        }else{

          $ip = $_SERVER['REMOTE_ADDR'];
          $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
          $responseKeys = json_decode($response,true);

          if(intval($responseKeys["success"]) !== 1) {
            ?>
            <script>alert("Captcha Error!");</script>
            <?php
          } else {


          $name=$_POST['name'];
          $email=$_POST['email'];
          $msg=$_POST['message'];

          $alldetails=$alldetails. "Customer Name: ".$name."<br>";
          $alldetails=$alldetails. "Customer Email: ".$email."<br>";
          $alldetails=$alldetails. "Customer Msg: ".$msg."<br>";

          // $to = 'shahabsafdar01@gmail.com';
          $to = $adminemail;
          $subject = "Contact Us";
          $txt = $alldetails;

          $headers  = 'MIME-Version: 1.0' . "\r\n";
          $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
          $headers .= 'From: noreply@securekratom.com' . "\r\n";
          $headers .= 'X-Mailer: PHP/' . phpversion();


          if(mail($to,$subject,$txt,$headers)){
            ?>
            <script type="text/javascript">

              swal("Done!","We Received Your Msg, Thanks!","success")
            </script>
              <?php 
          }else{
            ?>
            <script type="text/javascript">

              swal("Error!","Server Error, Try later!","error")
            </script>

          <script type="text/javascript">
            $(document).ready(function() {
              $('form').submit(function() { 
                if ($('input[type="text"]#fill-me-in').val().length > 0) {
                  return false; // submitted by bot, field is not empty, so do nothing
                }
              });
            });
          </script>
              <?php 
          }
        }//captcha reponse else
      }//check captcha set or not else
    }//main if
     ?>
</section></div>

<footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-d" data-rv-view="345" style="background-color: rgb(0, 0, 0); padding-top: 0.875rem; padding-bottom: 0.875rem;">
    
    <div class="container text-xs-center">

        <p>Copyright 2019 Gold Star Botanicals LLC. All Rights Reserved.</p>
    </div>
</footer>


  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smooth-scroll/smooth-scroll.js"></script>
  <script src="assets/viewport-checker/jquery.viewportchecker.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/touch-swipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/theme/js/script.js"></script>
  <script src="assets/mobirise3-blocks-plugin/js/script.js"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
  
  <input name="animation" type="hidden">
  </body>
</html>
