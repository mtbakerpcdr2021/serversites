<head>
<meta property="og:title" content="Sign up for the newsletter of the best place to buy kratom, securekratom.com">
<meta property="og:site_name" content="Secure Kratom">
<meta property="og:url" content="https://securekratom.com">
<meta property="og:description" content="">
<meta property="og:type" content="website">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <meta name="title" content="Secure Kratom Newsletter">
<meta name="description" content="Sign up for the newsletter of the best place to buy kratom, securekratom.com">
<meta name="keywords" content="kratom powder, kratom capsules, kratom COD, Kratom Electronic Check, Kratom Echeck, Kratom Bitcoin, retail kratom, kratom products, kratom extract, quality kratom, buy kratom, easy pay kratom">
<title>News Letter about Kratom</title></head>

<?php 
include 'headerNavBar.php';
 ?>
 
<section class="engine"><a href="https://mobirise.info/h">how to create your own web page</a></section><section class="mbr-section mbr-section-hero mbr-section-full extHeader2 mbr-after-navbar" id="extHeader2-t" data-rv-view="336" style="background-image: url(assets/images/jungle6-1600x1200.jpg);">

    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(0, 0, 0);">
    </div>
        <div class="mbr-table-cell">
            <div class="container">
                <div class="mbr-section row">
                    <div>
                            <h1 class="mbr-section-title display-2 text-center">Subscribe the securekratom.com newsletter!</h1></br><p><span style="color:white">Our newsletter is your number one source for securekratom and Gold Star Botanicals News</span></p>

                            <div class="mbr-section-text lead text-center">
                                
                            </div>

                            

                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
                                
                                <form  action="newsletter.php" method="post">
                                
                                    <div class="mbr-subscribe mbr-subscribe-dark input-group">
                                        <input type="email" class="form-control" name="email" required="" data-form-field="Email" placeholder="Enter Your Email Here">
                                        <span class="input-group-btn">
                                          <button type="submit" class="btn btn-primary" name="subscribe">SUBSCRIBE</button>
                                        </span>
                                    </div>
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
    
      if(isset($_POST['subscribe'])){
        $email=$_POST['email'];

        // $alldetails=$alldetails. "Customer Name: ".$name."<br>";
        $alldetails="Customer Email: ".$email."<br>";

        // $to = 'shahabsafdar01@gmail.com';
        $to = $adminemail;
        $subject = "News Letter Subscription";
        $txt = $alldetails;

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: goldstarbotanicalssales@gmail.com' . "\r\n";
        $headers .= 'X-Mailer: PHP/' . phpversion();
        if(mail($to,$subject,$txt,$headers)){

          $alldetails="Thank you for signing up for the Securekratom.com Newsletter. Please make sure to mark this email as 'not junk' so the newsletters from us will reach your inbox. Thank you and we hope you have a comfortable day!";

          $to = $email;
          $subject = "News Letter Subscription";
          $txt = $alldetails;

          $headers  = 'MIME-Version: 1.0' . "\r\n";
          $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
          $headers .= 'From: goldstarbotanicalssales@gmail.com' . "\r\n";
          $headers .= 'X-Mailer: PHP/' . phpversion();
          mail($to,$subject,$txt,$headers);

          ?>
          <script type="text/javascript">

            swal("Done!","We Received Your Email, Thanks!","success")
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
</section>

<footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-f" data-rv-view="334" style="background-color: rgb(0, 0, 0); padding-top: 0.875rem; padding-bottom: 0.875rem;">
    
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
  <script src="assets/formoid/formoid.min.js"></script>
  
  
  <input name="animation" type="hidden">
  </body>
</html>
