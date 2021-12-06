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
  if(isset($_POST['admincoupon'])) {
    $couponcode=$_POST['couponcode'];
    $oid=$_POST['adminoid'];

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

                $getorder = mysqli_query($con, "SELECT * FROM orders where orderid='$oid'");
                $order = mysqli_fetch_assoc($getorder);
                $totalproductscost=$order['total'];

                $discount=$row['discountpercent'];
                $discountpercent=$totalproductscost*($discount/100);
                $discountedamout=$totalproductscost-$discountpercent;
                $totalproductscost=$discountedamout;
                // echo $totalproductscost;
                $newtotalamount=$totalproductscost;
                // echo $newtotalamount;
                  $totalupdate ="update orders set total = '$newtotalamount', couponcode='$couponcode', discount='$discountpercent' where orderid='$oid'";   
                  mysqli_query($con,$totalupdate);
                  echo "yes";
                // echo $discount.' p';
              }else if($row['type']=='s'){
                $straightdisc=$row['straightdisc'];
                // echo $straightdisc.' s';
                $getorder = mysqli_query($con, "SELECT * FROM orders where orderid='$oid'");
                $order = mysqli_fetch_assoc($getorder);
                $totalproductscost=$order['total'];
                
                $discountedamout=$totalproductscost-$straightdisc;
                $totalproductscost=$discountedamout;
                // echo $totalproductscost;
                $newtotalamount=$totalproductscost;
                // echo $newtotalamount;
                  $totalupdate ="update orders set total = '$newtotalamount', couponcode='$couponcode', discount='$straightdisc' where orderid='$oid'";   
                  mysqli_query($con,$totalupdate);
                  echo "yes";

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
if(isset($_POST['delorder'])){
  $delid=$_POST['delorder'];
    // echo $delid;
  
  $del1 ="DELETE FROM orderitems WHERE OrderID = '$delid'";
    // $deleteproducts="delete from orderitems where OrderID='$delid'";
    mysqli_query($con,$del1);

    $del ="DELETE FROM orders WHERE orderid = '$delid'";
    // $deleteorder="delete from orders where where orderid='$delid'";
    mysqli_query($con,$del);


}
if(isset($_POST['payid'])){
  $oid=$_POST['payid'];

    $pay ="update orders set status = 'Paid' where orderid='$oid'";   
    mysqli_query($con,$pay);

}

if(isset($_POST['cusemailorderid'])){
  $oid=$_POST['cusemailorderid'];

    $getcus = mysqli_query($con, "SELECT * FROM orders where orderid='$oid'");
  $order = mysqli_fetch_assoc($getcus);
  $c_id=$order['C_id'];
  $getcustomer=mysqli_query($con, "SELECT * FROM customers where C_id='$c_id'");
  $cusdata = mysqli_fetch_assoc($getcustomer);

  $cusdetails="<b>Order Id:</b> ".$oid."<br><b>Name:</b> ".$cusdata['Fname']."<br><b>Address:</b> ".$cusdata['Address']."<br><b>Phone:</b> ".$cusdata['phone']."<br><b>Shipping:</b> ".$order['shippingnumber']."<br><b>OrderType:</b> ".$order['ordertype']."<br><b>ShipVia:</b> ".
     $order['shipType']."<br><b>Total:</b> $".
     $order['total']."<br><br><br>";

  $productdetails="";

  $query = mysqli_query($con, "SELECT * FROM orderitems where OrderID='$oid'");
    while($itemid = mysqli_fetch_assoc($query)){
      $pid=$itemid['P_id'];

      $selectproduct=mysqli_query($con, "SELECT * FROM products where id='$pid'");
      $product = mysqli_fetch_assoc($selectproduct);
      $productdetails=$productdetails. "<b>Product Name:</b> ".$product['name']."  <b>Price:</b> $".$product['price']." <b>Quantity:</b> ".$product['quantity'].$product['quantityunit']."<br>";

    }
    $emailmsg=$_POST['emailmsg'];
    $customeremail=$cusdata['email'];
    // echo $customeremail;
    // echo $cusdetails;
    // echo $productdetails;
    $alldetails=$cusdetails."<br>Products Detail:<br>".$productdetails;
    $alldetails=$alldetails. "<br>You used Coupon: ".$order['couponcode']." and got -".$order['discount']." Off on this order<br><br>";
    $alldetails=$alldetails."<br>".$emailmsg;
    $alldetails=$alldetails."<br>Thank you for your order!";

     $to = $customeremail;
     $subject = "Shipping confirmation, Securekratom!";
     $txt = $alldetails;
     $headers  = 'MIME-Version: 1.0' . "\r\n";
     $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
     // $headers .= 'Bcc: '.$sadminemail."\r\n";
     $headers .= 'From: noreply@securekratom.com' . "\r\n";

     $headers .= 'X-Mailer: PHP/' . phpversion();


     if(mail($to,$subject,$txt,$headers)){    
        echo "yes";   
     }else{
        echo "no";
     }
     // echo $alldetails;
}


if(isset($_POST['shippingnumber'])){
  $oid=$_POST['oid'];
  $shippingnumber=$_POST['shippingnumber'];

    $shippingupdate ="update orders set shippingnumber = '$shippingnumber' where orderid='$oid'";   
    mysqli_query($con,$shippingupdate);

}

if(isset($_POST['newtotalamount'])){
  $oid=$_POST['oid4'];
  $newtotalamount=$_POST['newtotalamount'];
  // echo $newtotalamount;
    $totalupdate ="update orders set total = '$newtotalamount' where orderid='$oid'";   
    if(mysqli_query($con,$totalupdate)){
      echo "yes";
    }else{
      echo "no";
    }

}


if(isset($_POST['printid'])){
  $oid=$_POST['printid'];
  // echo $oid;
  $getcus = mysqli_query($con, "SELECT * FROM orders where orderid='$oid'");
  $order = mysqli_fetch_assoc($getcus);
  $c_id=$order['C_id'];
  $getcustomer=mysqli_query($con, "SELECT * FROM customers where C_id='$c_id'");
  $cusdata = mysqli_fetch_assoc($getcustomer);
  $cusdetails="<b>Order#</b> ".$oid. "<span style='float:right;'>".date("Y/m/d")."</span><br><br><br><b>Customer#</b> ".$cusdata['C_id']."  <br><b>Name:</b> ".$cusdata['Fname']." <br><b>Address:</b> ".$cusdata['Address']."<br>".$cusdata['City'].", ".$cusdata['State'].", ".$cusdata['zipcode']."<br><b>Phone:</b> ".$cusdata['phone']." <br><b>Shipping:</b> ".$order['shippingnumber']." <br><br><b>Order type:</b> ".$order['ordertype']."<br><br>";

     

  $productdetails="";

  $query = mysqli_query($con, "SELECT * FROM orderitems where OrderID='$oid'");
    while($itemid = mysqli_fetch_assoc($query)){
      $pid=$itemid['P_id'];

      $selectproduct=mysqli_query($con, "SELECT * FROM products where id='$pid'");
      $product = mysqli_fetch_assoc($selectproduct);
      $productdetails=$productdetails. "<b>Product Name:</b> ".$product['name'].", <b>Quantity:</b> ".$product['quantity'].$product['quantityunit'].",  <b>Price:</b> $".$product['price']."<br>";

    }

    echo $cusdetails;
    echo $productdetails;
    echo "<br>....................................................................<br><br>";
    echo "<b>Ship type:</b> ".$order['shipType']. " <br><b>Order date/time:</b> ".
     $order['date']."<br><b>Discount:</b> $".$order['discount']."<br><br><br>"."<br><b>Total:</b> $".
     $order['total'];

}

 ?>