<?php 
  include '../../connection.php';
  $con=connecttoDB();
if(isset($_POST['oid'])){
	$oid=$_POST['oid'];
	// echo $oid;
  
	$query = mysqli_query($con, "SELECT * FROM orderitems where OrderID='$oid'");
    while($itemid = mysqli_fetch_assoc($query)){
    	$pid=$itemid['P_id'];
      

    	$selectproduct=mysqli_query($con, "SELECT * FROM products where id='$pid'");
    	$product = mysqli_fetch_assoc($selectproduct);
    	echo "<b>Product Name:</b> ".$product['name']."  <b>Price:</b> ".$product['price']." <b>Quantity:</b> ".$product['quantity'].$product['quantityunit']."<br>";

    }
}
  //couponcode
  if(isset($_POST['couponcode'])) {
    $couponcode=$_POST['couponcode'];
    $totalproductscost=$_POST['totalproductscost'];
    $result = mysqli_query($con, "SELECT * FROM coupons where couponcode='$couponcode'");   
    $count = mysqli_num_rows($result);
        
        if ($count == 1) {
          $row=mysqli_fetch_array($result);
          $validdate=$row['validtill'];
          $currentdate=date("Y-m-d");
          if($currentdate<$validdate){
            // echo "valid";
            $usedcoupons=$row['numberofusage'];
            $usagelimit=$row['usagelimit'];
            if($usedcoupons<$usagelimit){
              // echo "Coupon Code available!";
              
              $usedcoupons=$usedcoupons+1;
              $id=$row['id'];

              mysqli_query($con,"update coupons set numberofusage='$usedcoupons' WHERE id = '$id'");
              if($row['type']=='p'){

                $discount=$row['discountpercent'];
                $discountpercent=$totalproductscost*($discount/100);
                $discountedamout=$totalproductscost-$discountpercent;
                $totalproductscost=$discountedamout;
                echo $totalproductscost;
                // echo $discount.' p';
              }else if($row['type']=='s'){
                $straightdisc=$row['straightdisc'];
                // echo $straightdisc.' s';
                $discountedamout=$totalproductscost-$straightdisc;
                $totalproductscost=$discountedamout;
                echo $totalproductscost;

              }

            }else{
              echo "Coupon Code Not available!";
            }
          }else{
            echo "Coupon Code Expired!";
          }

        }else{
          echo "Wrong Coupon Code!";
        }
    // mysqli_fetch_array($result);

  }

//cryptocheckout
   if(isset($_POST['cryptocheckout']) && $_POST['check']=="1"){

            $zipCustomer=$_POST['szip'];
            // $zipCustomer=12345;

            $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp" )); 
            $vcountry="United States";
            // $vcountry="Pakistan";
            $cCountry=$ipdat->geoplugin_countryName;
            if(strcasecmp($cCountry, $vcountry) == 0){
               
                if ($fh = fopen('zipcodes.txt', 'r')) {
                    while (!feof($fh)) {
                        $line = fgets($fh);
                        // echo $line."1";
                    }
                    $aarray=explode(" ",$line);
                    for($i=0;$i<count($aarray);$i++){
                        if($zipCustomer==$aarray[$i]){
                          echo "zipcodeBlocked";
                          return;
                        }
                     // echo $aarray[$i];

                    }
                    fclose($fh);
                }

            }else{
                echo "countryError";
                return;
            }

              
              $totalcheckout=$_POST['totalcheckout'];
              $sessionid=$_POST['sessionid'];
              $shipType=$_POST['shipType'];
              $couponcode=$_POST['couponcode1'];
            $discount=$_POST['discount1'];
            $alldetails="";
            $sadminemail=$_POST['sadminemail'];
            $alldetails=$alldetails. "Customer Name: ".$_POST['sessionname']."<br>";
            $alldetails=$alldetails. "Customer Address: ".$_POST['saddress']."<br>";
            $alldetails=$alldetails. "Customer Phone: ".$_POST['sphone']."<br>";
            $alldetails=$alldetails. "Customer Email: ".$_POST['semail']."<br>";
            $alldetails=$alldetails. "Customer ZipCode: ".$_POST['szip']."<br>";
            $alldetails=$alldetails. "ship via: ".$_POST['shipType']."<br>";
            $alldetails=$alldetails. "Order Details: "."<br>".$_POST['codetail']."<br>";
            $alldetails=$alldetails. "You used Coupon: ".$couponcode." and got -".$discount." Off on this order<br><br>";
            $alldetails=$alldetails. "Total Amount(shipping Included): $".$_POST['totalcheckout']."<br>";

               $p_ids=$_POST['pIDS'];
            $weightozJS=$_POST['weightozJS'];

                $length = count($p_ids);

                for ($i = 0; $i < $length; $i++) {
                  $value= $p_ids[$i];
                
                 // $productids = $productids . $value;

               $result = mysqli_query($con, "SELECT * FROM categories where c_id='$value'");   

                $row = mysqli_fetch_array($result);
                $availableweight=$row['c_availableweight'];
                $availableweight=$availableweight-$weightozJS[$i];
                $updateproduct ="update categories set c_availableweight='$availableweight' WHERE c_id = $value";

                mysqli_query($con, $updateproduct);
              }


              $to = $sadminemail;
            $subject = "Order Confirmation, Securekratom!";
            $txt = $alldetails;
            $cusemail=$_POST['semail'];
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'Bcc: '.$sadminemail."\r\n";
            $headers .= 'From: noreply@securekratom.com' . "\r\n";

            $headers .= 'X-Mailer: PHP/' . phpversion();


            if(mail($cusemail,$subject,$txt,$headers)){       
            }

              // echo $txt;

              $insertOrder="insert into orders(C_id,ordertype,total,shipType,couponcode,discount) values('$sessionid','Gateway Checkout','$totalcheckout','$shipType','$couponcode','$discount')";
              $itemsfromcart=mysqli_query($con,$insertOrder);
              $Neworderid= $con->insert_id;


              $selectItemsFromCart="select * from cart where C_id='$sessionid'";
              $itemsfromcart=mysqli_query($con,$selectItemsFromCart);

              // echo "New order iD: ".$Neworderid;
              //selecting products form cart and insert product ids into orderitems
              while($itemsfromcart1 = mysqli_fetch_assoc($itemsfromcart)){
                $itemsfromcartid=$itemsfromcart1['P_id'];
                // echo "pid from cart:".$itemsfromcartid;
                $insertOrderItems="insert into orderitems(OrderID, P_id) values ('$Neworderid',
                  '$itemsfromcartid')";
                  mysqli_query($con,$insertOrderItems);
              }
                $deletecartitems = "delete FROM cart where C_id='$sessionid'";
                $deletecart = mysqli_query($con,$deletecartitems);

                 echo "yes";
               
          }


          //
           if(isset($_POST['codcheckout']) && $_POST['check']=="1"){

            $zipCustomer=$_POST['szip'];
            // $zipCustomer=12345;

            $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp" )); 
            $vcountry="United States";
            // $vcountry="Pakistan";
            $cCountry=$ipdat->geoplugin_countryName;
            if(strcasecmp($cCountry, $vcountry) == 0){
               
                if ($fh = fopen('zipcodes.txt', 'r')) {
                    while (!feof($fh)) {
                        $line = fgets($fh);
                        // echo $line."1";
                    }
                    $aarray=explode(" ",$line);
                    for($i=0;$i<count($aarray);$i++){
                        if($zipCustomer==$aarray[$i]){
                          echo "zipcodeBlocked";
                          return;
                        }
                     // echo $aarray[$i];

                    }
                    fclose($fh);
                }

            }else{
                echo "countryError";
                return;
            }

            $shipType=$_POST['shipType'];
            $sessionid=$_POST['sessionid'];
            $alldetails="";
            $couponcode=$_POST['couponcode1'];
            $discount=$_POST['discount1'];
            $sadminemail=$_POST['sadminemail'];
            $totalcheckout=$_POST['totalcheckout'];
            $alldetails=$alldetails. "Customer Name: ".$_POST['sessionname']."<br>";
            $alldetails=$alldetails. "Customer Address: ".$_POST['saddress']."<br>";
            $alldetails=$alldetails. "Customer Phone: ".$_POST['sphone']."<br>";
            $alldetails=$alldetails. "Customer Email: ".$_POST['semail']."<br>";
            $alldetails=$alldetails. "Customer ZipCode: ".$_POST['szip']."<br>";
            $alldetails=$alldetails. "ship via: ".$_POST['shipType']."<br>";
            $alldetails=$alldetails. "Order Details: "."<br>".$_POST['codetail']."<br>";
            $alldetails=$alldetails. "You used Coupon: ".$couponcode." and got -".$discount." Off on this order<br><br>";
            $alldetails=$alldetails. "Total Amount(shipping Included): $".$_POST['totalcheckout']."<br>";

            // echo $alldetails;
            // $adminemail=$result112['email'];


              $p_ids=$_POST['pIDS'];
            $weightozJS=$_POST['weightozJS'];

                $length = count($p_ids);

                for ($i = 0; $i < $length; $i++) {
                  $value= $p_ids[$i];
                
                 // $productids = $productids . $value;

               $result = mysqli_query($con, "SELECT * FROM categories where c_id='$value'");   

                $row = mysqli_fetch_array($result);
                $availableweight=$row['c_availableweight'];
                $availableweight=$availableweight-$weightozJS[$i];
                $updateproduct ="update categories set c_availableweight='$availableweight' WHERE c_id = $value";

                mysqli_query($con, $updateproduct);
              }



            $to = $sadminemail;
            $subject = "Order Confirmation, Securekratom!";
            $txt = $alldetails;
            $cusemail=$_POST['semail'];
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'Bcc: '.$sadminemail."\r\n";
            $headers .= 'From: noreply@securekratom.com' . "\r\n";
            $headers .= 
              
              'X-Mailer: PHP/' . phpversion();


            if(mail($cusemail,$subject,$txt,$headers)){       
            }
           

                $insertOrder="insert into orders(C_id,ordertype,total,shipType,couponcode,discount) values('$sessionid','COD','$totalcheckout','$shipType','$couponcode','$discount')";
              $itemsfromcart=mysqli_query($con,$insertOrder);
              $Neworderid= $con->insert_id;


              $selectItemsFromCart="select * from cart where C_id='$sessionid'";
              $itemsfromcart=mysqli_query($con,$selectItemsFromCart);

              // echo "New order iD: ".$Neworderid;
              //selecting products form cart and insert product ids into orderitems
              while($itemsfromcart1 = mysqli_fetch_assoc($itemsfromcart)){
                $itemsfromcartid=$itemsfromcart1['P_id'];
                // echo "pid from cart:".$itemsfromcartid;
                $insertOrderItems="insert into orderitems(OrderID, P_id) values ('$Neworderid',
                  '$itemsfromcartid')";
                  mysqli_query($con,$insertOrderItems);
              }
                $deletecartitems = "delete FROM cart where C_id='$sessionid'";
                $deletecart = mysqli_query($con,$deletecartitems);
                // echo "yes";
                // echo $txt;

                   echo "yes";
              
          }
            ///guest COD
           if(isset($_POST['guestcod']) && $_POST['check']=="1"){

            $zipCustomer=$_POST['szip'];
            // $zipCustomer=12345;

            $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp" )); 
            $vcountry="United States";
            // $vcountry="Pakistan";
            $cCountry=$ipdat->geoplugin_countryName;
            if(strcasecmp($cCountry, $vcountry) == 0){
               
                if ($fh = fopen('zipcodes.txt', 'r')) {
                    while (!feof($fh)) {
                        $line = fgets($fh);
                        // echo $line."1";
                    }
                    $aarray=explode(" ",$line);
                    for($i=0;$i<count($aarray);$i++){
                        if($zipCustomer==$aarray[$i]){
                          echo "zipcodeBlocked";
                          return;
                        }
                     // echo $aarray[$i];

                    }
                    fclose($fh);
                }

            }else{
                echo "countryError";
                return;
            }
            
            $shipType=$_POST['shipType'];
            $sessionid=$_POST['sessionid'];
            $alldetails="";
            $sadminemail=$_POST['sadminemail'];
            $totalcheckout=$_POST['totalcheckout'];
            $c_email=$_POST['semail'];
            $zipcode=$_POST['szip'];
            $scity=$_POST['scity'];
            $sstate=$_POST['sstate'];
            $address=$_POST['saddress'];
            $name=$_POST['sessionname'];
            $phone=$_POST['sphone'];
            $couponcode=$_POST['couponcode1'];
            $discount=$_POST['discount1'];

            $alldetails=$alldetails. "Customer Name: ".$_POST['sessionname']."<br>";
            $alldetails=$alldetails. "Customer Address: ".$_POST['saddress']."<br>";
            $alldetails=$alldetails. "Customer Phone: ".$_POST['sphone']."<br>";
            $alldetails=$alldetails. "Customer Email: ".$_POST['semail']."<br>";
            $alldetails=$alldetails. "Customer ZipCode: ".$_POST['szip']."<br>";
            $alldetails=$alldetails. "Customer City: ".$_POST['scity']."<br>";
            $alldetails=$alldetails. "Customer State: ".$_POST['sstate']."<br>";
            $alldetails=$alldetails. "ship via: ".$_POST['shipType']."<br>";
            $alldetails=$alldetails. "Order Details: "."<br>".$_POST['codetail']."<br>";
            $alldetails=$alldetails. "You used Coupon: ".$couponcode." and got -".$discount." Off on this order<br><br>";
            $alldetails=$alldetails. "Total Amount(shipping Included): $".$_POST['totalcheckout']."<br>";
            // echo $alldetails;
            // $adminemail=$result112['email'];

            $p_ids=$_POST['pIDS'];
            $weightozJS=$_POST['weightozJS'];

                $length = count($p_ids);

                for ($i = 0; $i < $length; $i++) {
                  $value= $p_ids[$i];
                
                 // $productids = $productids . $value;

               $result = mysqli_query($con, "SELECT * FROM categories where c_id='$value'");   

                $row = mysqli_fetch_array($result);
                $availableweight=$row['c_availableweight'];
                $availableweight=$availableweight-$weightozJS[$i];
                $updateproduct ="update categories set c_availableweight='$availableweight' WHERE c_id = $value";

                mysqli_query($con, $updateproduct);
              }



            $to = $sadminemail;

            $cusEmail=$_POST['semail'];

            $subject = "Kratom New Order(Guest COD)";

            $txt = $alldetails;

            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'Bcc: '.$sadminemail."\r\n";
            $headers .= 'From: noreply@securekratom.com' . "\r\n";
            $headers .= 'X-Mailer: PHP/' . phpversion();



            if(mail($cusEmail,$subject,$txt,$headers)){

                

            }

            $insertguest="insert into customers(email,Fname,phone,zipcode,Address,City,State) values('$c_email','$name','$phone','$zipcode','$address','$scity','$sstate')";
            mysqli_query($con,$insertguest);
              
            $gCusId= $con->insert_id;

             $insertOrder="insert into orders(C_id,ordertype,total,shipType,couponcode,discount) values('$gCusId','Guest COD','$totalcheckout','$shipType','$couponcode','$discount')";
             $itemsfromcart=mysqli_query($con,$insertOrder);
             $Neworderid= $con->insert_id;


              $selectItemsFromCart="select * from guestcart where G_id='$sessionid'";
              $itemsfromcart=mysqli_query($con,$selectItemsFromCart);

              // echo "New order iD: ".$Neworderid;
              //selecting products form cart and insert product ids into orderitems
              while($itemsfromcart1 = mysqli_fetch_assoc($itemsfromcart)){
                $itemsfromcartid=$itemsfromcart1['P_id'];
                // echo "pid from cart:".$itemsfromcartid;
                $insertOrderItems="insert into orderitems(OrderID, P_id) values ('$Neworderid',
                  '$itemsfromcartid')";
                  if(mysqli_query($con,$insertOrderItems)){
                    // echo "yes1";
                  }
              }
              $deletecartitems = "delete FROM guestcart where G_id='$sessionid'";
              $deletecart = mysqli_query($con,$deletecartitems);
              echo "yes";
              
          }
          //guest cryptocheckout
          if(isset($_POST['cryptocheckoutguest']) && $_POST['check']=="1"){
               $zipCustomer=$_POST['szip'];
            // $zipCustomer=12345;

            $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp" )); 
            $vcountry="United States";
            // $vcountry="Pakistan";
            $cCountry=$ipdat->geoplugin_countryName;
            if(strcasecmp($cCountry, $vcountry) == 0){
               
                if ($fh = fopen('zipcodes.txt', 'r')) {
                    while (!feof($fh)) {
                        $line = fgets($fh);
                        // echo $line."1";
                    }
                    $aarray=explode(" ",$line);
                    for($i=0;$i<count($aarray);$i++){
                        if($zipCustomer==$aarray[$i]){
                          echo "zipcodeBlocked";
                          return;
                        }
                     // echo $aarray[$i];

                    }
                    fclose($fh);
                }

            }else{
                echo "countryError";
                return;
            }

            $shipType=$_POST['shipType'];
            $sessionid=$_POST['sessionid'];

            $sadminemail=$_POST['sadminemail'];
            $totalcheckout=$_POST['totalcheckout'];
            $c_email=$_POST['semail'];
            $zipcode=$_POST['szip'];
            $address=$_POST['saddress'];
            $city1 = $_POST['city1'];
            $state1 = $_POST['state1'];
            $name=$_POST['sessionname'];
            $phone=$_POST['sphone'];
            $couponcode=$_POST['couponcode1'];
            $discount=$_POST['discount1'];




             $alldetails= "Customer Name: ".$_POST['sessionname']."<br>";
            $alldetails=$alldetails. "Customer Address: ".$_POST['saddress']."<br>";
            $alldetails=$alldetails. "Customer Phone: ".$_POST['sphone']."<br>";
            $alldetails=$alldetails. "Customer Email: ".$_POST['semail']."<br>";
            $alldetails=$alldetails. "Customer ZipCode: ".$_POST['szip']."<br>";
            $alldetails=$alldetails. "Customer City: ".$_POST['city1']."<br>";
            $alldetails=$alldetails. "Customer State: ".$_POST['state1']."<br>";
            $alldetails=$alldetails. "ship via: ".$_POST['shipType']."<br>";
            $alldetails=$alldetails. "Order Details: "."<br>".$_POST['codetail']."<br>";
            $alldetails=$alldetails. "You used Coupon: ".$couponcode." and got -".$discount." Off on this order<br><br>";
            $alldetails=$alldetails. "Total Amount(shipping Included): $".$_POST['totalcheckout']."<br>";

            $cusEmail=$_POST['semail'];

            $subject = "Kratom New Order(Guest Cryptocheckout)";
            $txt = $alldetails;

            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'Bcc: '.$sadminemail."\r\n";
            $headers .= 'From: noreply@securekratom.com' . "\r\n";
            $headers .= 'X-Mailer: PHP/' . phpversion();
            if(mail($cusEmail,$subject,$txt,$headers)){

                

            }
            // echo $alldetails;


               $p_ids=$_POST['pIDS'];
            $weightozJS=$_POST['weightozJS'];

                $length = count($p_ids);

                for ($i = 0; $i < $length; $i++) {
                  $value= $p_ids[$i];
                
                 // $productids = $productids . $value;

               $result = mysqli_query($con, "SELECT * FROM categories where c_id='$value'");   

                $row = mysqli_fetch_array($result);
                $availableweight=$row['c_availableweight'];
                $availableweight=$availableweight-$weightozJS[$i];
                $updateproduct ="update categories set c_availableweight='$availableweight' WHERE c_id = $value";

                mysqli_query($con, $updateproduct);
              }


              $insertguest="insert into customers(email,Fname,phone,zipcode,Address, City, State) values('$c_email','$name','$phone','$zipcode','$address','$city1','$state1')";
            mysqli_query($con,$insertguest);
              
            $gCusId= $con->insert_id;

             $insertOrder="insert into orders(C_id,ordertype,total,shipType,couponcode,discount) values('$gCusId','Guest Cryptocheckout','$totalcheckout','$shipType','$couponcode','$discount')";
             $itemsfromcart=mysqli_query($con,$insertOrder);
              $Neworderid= $con->insert_id;


              $selectItemsFromCart="select * from guestcart where G_id='$sessionid'";
              $itemsfromcart=mysqli_query($con,$selectItemsFromCart);

              // echo "New order iD: ".$Neworderid;
              //selecting products form cart and insert product ids into orderitems
              while($itemsfromcart1 = mysqli_fetch_assoc($itemsfromcart)){
                $itemsfromcartid=$itemsfromcart1['P_id'];
                // echo "pid from cart:".$itemsfromcartid;
                $insertOrderItems="insert into orderitems(OrderID, P_id) values ('$Neworderid',
                  '$itemsfromcartid')";
                  if(mysqli_query($con,$insertOrderItems)){
                    // echo "yes1";
                  }
              }

             
                $deletecartitems = "delete FROM guestcart where G_id='$sessionid'";
                $deletecart = mysqli_query($con,$deletecartitems);
               echo "yes";
          }


          // guest echeck checkout
          if(isset($_POST['guestecheckcheckout']) && $_POST['check']=="1"){
               $zipCustomer=$_POST['szip'];

            $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp" )); 
            $vcountry="United States";
            // $vcountry="Pakistan";
            $cCountry=$ipdat->geoplugin_countryName;
            if(strcasecmp($cCountry, $vcountry) == 0){
               
                if ($fh = fopen('zipcodes.txt', 'r')) {
                    while (!feof($fh)) {
                        $line = fgets($fh);
                        // echo $line."1";
                    }
                    $aarray=explode(" ",$line);
                    for($i=0;$i<count($aarray);$i++){
                        if($zipCustomer==$aarray[$i]){
                          echo "zipcodeBlocked";
                          return;
                        }
                     // echo $aarray[$i];

                    }
                    fclose($fh);
                }

            }else{
                echo "countryError";
                return;
            }

              $shipType=$_POST['shipType'];
            $sessionid=$_POST['sessionid'];

            $sadminemail=$_POST['sadminemail'];
            $totalcheckout=$_POST['totalcheckout'];
            $c_email=$_POST['semail'];
            $zipcode=$_POST['szip'];
            $address=$_POST['saddress'];
            $echeckcity = $_POST['echeckcity'];
            $echeckstate = $_POST['echeckstate'];
            $name=$_POST['sessionname'];
            $phone=$_POST['sphone'];
            $couponcode=$_POST['couponcode1'];
            $discount=$_POST['discount1'];




            $alldetails= "Customer Name: ".$_POST['sessionname']."<br>";
            $alldetails=$alldetails. "State: ".$_POST['echeckstate']."<br>";
            $alldetails=$alldetails. "City: ".$_POST['echeckcity']."<br>";
            $alldetails=$alldetails. "Customer Address: ".$_POST['saddress']."<br>";
            $alldetails=$alldetails. "Customer Phone: ".$_POST['sphone']."<br>";
            $alldetails=$alldetails. "Customer Email: ".$_POST['semail']."<br>";
            $alldetails=$alldetails. "Customer ZipCode: ".$_POST['szip']."<br>";
            $alldetails=$alldetails. "Customer city: ".$_POST['echeckcity']."<br>";
            $alldetails=$alldetails. "Customer state: ".$_POST['echeckstate']."<br>";
            $alldetails=$alldetails. "ship via: ".$_POST['shipType']."<br>";
            $alldetails=$alldetails. "Order Details: "."<br>".$_POST['codetail']."<br>";
            $alldetails=$alldetails. "You used Coupon: ".$couponcode." and got -".$discount." Off on this order<br><br>";
            $alldetails=$alldetails. "Total Amount(shipping and E-check fees($0.75) Included): $".$_POST['totalcheckout']."<br>";

            $cusEmail=$_POST['semail'];

            $subject = "Kratom New Order(Guest E-Check Checkout)";
            $txt = $alldetails;

            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'Bcc: '.$sadminemail."\r\n";
            $headers .= 'From: noreply@securekratom.com' . "\r\n";
            $headers .= 'X-Mailer: PHP/' . phpversion();
            if(mail($cusEmail,$subject,$txt,$headers)){

                

            }
            // echo $alldetails;


            $p_ids=$_POST['pIDS'];
            $weightozJS=$_POST['weightozJS'];

                $length = count($p_ids);

                for ($i = 0; $i < $length; $i++) {
                  $value= $p_ids[$i];
                
                 // $productids = $productids . $value;

               $result = mysqli_query($con, "SELECT * FROM categories where c_id='$value'");   

                $row = mysqli_fetch_array($result);
                $availableweight=$row['c_availableweight'];
                $availableweight=$availableweight-$weightozJS[$i];
                $updateproduct ="update categories set c_availableweight='$availableweight' WHERE c_id = $value";

                mysqli_query($con, $updateproduct);
              }


              $insertguest="insert into customers(email,Fname,phone,zipcode,Address,City,State) values('$c_email','$name','$phone','$zipcode','$address','$echeckcity','$echeckstate')";
            mysqli_query($con,$insertguest);
              
            $gCusId= $con->insert_id;

             $insertOrder="insert into orders(C_id,ordertype,total,shipType,couponcode,discount) values('$gCusId','Guest E-Check','$totalcheckout','$shipType','$couponcode','$discount')";
             $itemsfromcart=mysqli_query($con,$insertOrder);
              $Neworderid= $con->insert_id;


              $selectItemsFromCart="select * from guestcart where G_id='$sessionid'";
              $itemsfromcart=mysqli_query($con,$selectItemsFromCart);

              // echo "New order iD: ".$Neworderid;
              //selecting products form cart and insert product ids into orderitems
              while($itemsfromcart1 = mysqli_fetch_assoc($itemsfromcart)){
                $itemsfromcartid=$itemsfromcart1['P_id'];
                // echo "pid from cart:".$itemsfromcartid;
                $insertOrderItems="insert into orderitems(OrderID, P_id) values ('$Neworderid',
                  '$itemsfromcartid')";
                  if(mysqli_query($con,$insertOrderItems)){
                    // echo "yes1";
                  }
              }

             
                $deletecartitems = "delete FROM guestcart where G_id='$sessionid'";
                $deletecart = mysqli_query($con,$deletecartitems);
               echo "yes";
          }



          // echeckout for registered uesr
           if(isset($_POST['echeckcheckoutUser']) && $_POST['check']=="1"){

            $zipCustomer=$_POST['szip'];
            // $zipCustomer=12345;

            $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp" )); 
            $vcountry="United States";
            // $vcountry="Pakistan";
            $cCountry=$ipdat->geoplugin_countryName;
            if(strcasecmp($cCountry, $vcountry) == 0){
               
                if ($fh = fopen('zipcodes.txt', 'r')) {
                    while (!feof($fh)) {
                        $line = fgets($fh);
                        // echo $line."1";
                    }
                    $aarray=explode(" ",$line);
                    for($i=0;$i<count($aarray);$i++){
                        if($zipCustomer==$aarray[$i]){
                          echo "zipcodeBlocked";
                          return;
                        }
                     // echo $aarray[$i];

                    }
                    fclose($fh);
                }

            }else{
                echo "countryError";
                return;
            }

            $shipType=$_POST['shipType'];
            $sessionid=$_POST['sessionid'];
            $alldetails="";
            $couponcode=$_POST['couponcode1'];
            $discount=$_POST['discount1'];
            $sadminemail=$_POST['sadminemail'];
            $totalcheckout=$_POST['totalcheckout'];
            $alldetails=$alldetails. "Customer Name: ".$_POST['sessionname']."<br>";
            $alldetails=$alldetails. "State: ".$_POST['echeckstate']."<br>";
            $alldetails=$alldetails. "City: ".$_POST['echeckcity']."<br>";
            $alldetails=$alldetails. "Customer Address: ".$_POST['saddress']."<br>";
            $alldetails=$alldetails. "Customer Phone: ".$_POST['sphone']."<br>";
            $alldetails=$alldetails. "Customer Email: ".$_POST['semail']."<br>";
            $alldetails=$alldetails. "Customer ZipCode: ".$_POST['szip']."<br>";
            $alldetails=$alldetails. "ship via: ".$_POST['shipType']."<br>";
            $alldetails=$alldetails. "Order Details: "."<br>".$_POST['codetail']."<br>";
            $alldetails=$alldetails. "You used Coupon: ".$couponcode." and got -".$discount." Off on this order<br><br>";
            $alldetails=$alldetails. "Total Amount(shipping and E-check fees($0.75) Included): $".$_POST['totalcheckout']."<br>";

            // echo $alldetails;
            // $adminemail=$result112['email'];


              $p_ids=$_POST['pIDS'];
            $weightozJS=$_POST['weightozJS'];

                $length = count($p_ids);

                for ($i = 0; $i < $length; $i++) {
                  $value= $p_ids[$i];
                
                 // $productids = $productids . $value;

               $result = mysqli_query($con, "SELECT * FROM categories where c_id='$value'");   

                $row = mysqli_fetch_array($result);
                $availableweight=$row['c_availableweight'];
                $availableweight=$availableweight-$weightozJS[$i];
                $updateproduct ="update categories set c_availableweight='$availableweight' WHERE c_id = $value";

                mysqli_query($con, $updateproduct);
              }



            $to = $sadminemail;
            $subject = "Order Confirmation, Securekratom!";
            $txt = $alldetails;
            $cusemail=$_POST['semail'];
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'Bcc: '.$sadminemail."\r\n";
            $headers .= 'From: noreply@securekratom.com' . "\r\n";
            $headers .= 
              
              'X-Mailer: PHP/' . phpversion();


            if(mail($cusemail,$subject,$txt,$headers)){       
            }
           

                $insertOrder="insert into orders(C_id,ordertype,total,shipType,couponcode,discount) values('$sessionid','E-Check','$totalcheckout','$shipType','$couponcode','$discount')";
              $itemsfromcart=mysqli_query($con,$insertOrder);
              $Neworderid= $con->insert_id;


              $selectItemsFromCart="select * from cart where C_id='$sessionid'";
              $itemsfromcart=mysqli_query($con,$selectItemsFromCart);

              // echo "New order iD: ".$Neworderid;
              //selecting products form cart and insert product ids into orderitems
              while($itemsfromcart1 = mysqli_fetch_assoc($itemsfromcart)){
                $itemsfromcartid=$itemsfromcart1['P_id'];
                // echo "pid from cart:".$itemsfromcartid;
                $insertOrderItems="insert into orderitems(OrderID, P_id) values ('$Neworderid',
                  '$itemsfromcartid')";
                  mysqli_query($con,$insertOrderItems);
              }
                $deletecartitems = "delete FROM cart where C_id='$sessionid'";
                $deletecart = mysqli_query($con,$deletecartitems);
                // echo "yes";
                // echo $txt;

                   echo "yes";
              
          }
 ?>
