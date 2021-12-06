<?php 
      $to = "admin@ftscoin.xyz";


	if(isset($_POST['contactmsg'])){
		$name=$_POST['name'];
		$cus_email=$_POST['email'];
		$msg=$_POST['msg'];

            $subject = "Contact Form FTS COIN!";
            $txt="Contact form is filled FTSCOIN!<br>";
            $txt =$txt. "Name: ".$name. "<br>";
            $txt=$txt."Email: ".$cus_email. "<br>";
            $txt=$txt."Message: ".$msg. "<br>";
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            // $headers .= 'Bcc: secondemail@gmail.com' . "\r\n";
            // $headers .= 'From: noreply@securekratom.com' . "\r\n";
            $headers .= 'X-Mailer: PHP/' . phpversion();
            // echo $to;
            if(mail($to,$subject,$txt,$headers)){     
            	echo "yes";  
            }else{
            	echo "Error In mail!";
            }
	}

      if(isset($_POST['subscription'])){
            $subemail=$_POST['email'];
            $subject = "Subscription Form FTS COIN!";
            $txt="Subscription form is filled FTSCOIN!<br>";
            $txt=$txt."Email: ".$subemail. "<br>";
            
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            // $headers .= 'Bcc: secondemail@gmail.com' . "\r\n";
            // $headers .= 'From: noreply@securekratom.com' . "\r\n";
            $headers .= 'X-Mailer: PHP/' . phpversion();
            // echo $to;
            if(mail($to,$subject,$txt,$headers)){     
                  echo "yes";  
            }else{
                  echo "Error In mail!";
            }
      }


      if(isset($_POST['commentBtn'])){
            $name=$_POST['name'];
            $cus_email=$_POST['email'];
            $msg=$_POST['msg'];

            $subject = "Blog Comment Form FTS COIN!";
            $txt="Blog comment FTSCOIN!<br>";
            $txt =$txt. "Name: ".$name. "<br>";
            $txt=$txt."Email: ".$cus_email. "<br>";
            $txt=$txt."Message: ".$msg. "<br>";
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            // $headers .= 'Bcc: secondemail@gmail.com' . "\r\n";
            // $headers .= 'From: noreply@securekratom.com' . "\r\n";
            $headers .= 'X-Mailer: PHP/' . phpversion();
            // echo $to;
            if(mail($to,$subject,$txt,$headers)){     
                  echo "yes";  
            }else{
                  echo "Error In mail!";
            }
      }
 ?>