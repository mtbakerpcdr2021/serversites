

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Cart
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <!-- <link href="../assets/demo/demo.css" rel="stylesheet" /> -->
</head>

<script type="text/javascript">

 $(document).ready(function()   { 
   var cartalerted = localStorage.getItem('cartalerted') || '';

   if (cartalerted != 'yes') {
        localStorage.setItem('cartalerted','yes');
        swal("Alert!", "Before completing your order make sure all information is 100% accurate in the address field within your profile or this could cause delays and/or cancelations of your order."); 
    }

  });
  
</script>
<body class="">

  <?php 
  session_start();
  include '../../connection.php';
  $con = connecttoDB();
  if(!isset($_SESSION['loggedIn'])){
      header("Location:../../login.php");
  }

    $sql12 = "SELECT * FROM admin;";
    $result12 = mysqli_query($con,$sql12);
    $result112=mysqli_fetch_assoc($result12);

    $sessionid=$_SESSION['C_id'];

    if(isset($_GET['delid']) ){  
      
      $id=$_GET['delid'];   
      $del ="DELETE FROM cart WHERE id = $id";

      if($result123 = mysqli_query($con, $del)){  
        ?>
        <script>
          $(document).ready(function() { swal('Deleted!', 'The Product Deleted From cart.', 'success');  });
          
          
        </script>";
        <?php
      }    
    }
    
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
        
          <li class="nav-item ">
            <a class="nav-link" href="./user.php">
              <i class="material-icons">person</i>
              <p>User Profile</p>
            </a>
          </li>
          <li class="nav-item active ">
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
                  <a class="dropdown-item" href="#">My Cart</a>
                  <a class="dropdown-item" href="../../logout.php">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content"><div class="card-header card-header-primary">
                  <h4 class="card-title"><b>Your Cart</b></h4>
                  <!-- <p class="card-category">Complete your profile</p> -->
                </div>
        
<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
               
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Product Name</th>                            
                            <th scope="col" class="text-center">Quantity</th>
                             <th scope="col" class="text-center">Category</th>
                            <th scope="col" class="text-center">Price</th>
                            <th> </th>
                        </tr>
                    </thead>
                   
                    <tbody>
                        
                       <?php 
                       $totaloz=0;
                       $totalshipping=0;
                        $totalgram=0;
                        $totalkg=0;
                        $gramtoOz=0;
                        $kgtoOz=0;
                       $coddetail="";
                       $totalprice=0;

                       $productIds=array();
                       $productweightincart=array();
                       $incartOz=0;
                      

                       $query = mysqli_query($con, "SELECT * FROM cart WHERE C_id = '$sessionid'");
                       $check=0;
                          while($cart = mysqli_fetch_assoc($query)){ 
                              $pid=$cart['P_id'];
                              $result = mysqli_query($con, "SELECT * FROM products where id='$pid'");   
                              $row = mysqli_fetch_array($result);
                              if($row['status']=='disable'){
                                continue;
                              }

                              $c_id=$row['category_id'];
                              $selectcategoryquery = mysqli_query($con, "SELECT * FROM categories where c_id=$c_id");
                              $selectcategory = mysqli_fetch_assoc($selectcategoryquery);

                              if(($selectcategory['c_availableweight']<=0) || ($selectcategory['cat_disableweight']>=$selectcategory['c_availableweight']) ){
                              continue;
                            }

                              $check=1;

                            ?>
                        <tr>
                            <td><img width="50" height="50" src="<?php echo "../../Admin/productimages/".$row['image']; ?>" alt="" title=""> </td>
                            <td><?php echo $row['name']; ?></td>
                            
                            <td><?php echo $row['quantity'];echo $row['quantityunit']; ?></td>
                            <td class="text-center"><?php echo $selectcategory['c_name']; ?></td>
                            <td class="text-center">$<?php echo $row['price']; ?></td>

                            <td class="text-center"><button class="btn btn-sm btn-danger" id='<?php echo $cart['id']; ?>'
                                onClick="deleteproduct(this.id);" ><i class="fa fa-trash"></i> </button> </td>
                        </tr>
                      <?php 
                        $coddetail=$coddetail."Product Name: ".$row['name'].", Price: ".$row['price'].", Category: ".$selectcategory['c_name'].", Quantity: ".$row['quantity'].$row['quantityunit']."<br>";
                        $totalprice=$totalprice+$row['price'];
                        $totalprice = bcdiv($totalprice,1,2);

                        

                        //calculating shipping according to weight
                        if(strtoupper($row['quantityunit'])=="OZ"){
                          $totaloz=$totaloz+$row['quantity'];
                          $incartOz=$row['quantity'];
                        }else if(strtoupper($row['quantityunit'])=="GRAM"){
                          $totalgram=$totalgram+$row['quantity'];
                          $incartOz=$row['quantity']*0.035274;
                        }else if(strtoupper($row['quantityunit'])=="KG"){
                          $totalkg=$totalkg+$row['quantity'];
                          $incartOz=$row['quantity']*35.274;
                        }
                        // echo $totaloz;

                        $gramtoOz=$totalgram*0.035274;
                        // echo $gramtoOz;
                        $kgtoOz=$totalkg*35.274;
                        // echo $kgtoOz;
                        
                         array_push($productIds,$row['category_id']);
                        array_push($productweightincart,$incartOz);
                      

                    } 
                    $totaloz=$totaloz+$gramtoOz+$kgtoOz;

                    // echo $totaloz;
                    $totallb=$totaloz/16;
                    // echo $totallb;
                    ?>
                     <script type="text/javascript">
                              function deleteproduct(id){
                                  window.location.href="cart.php?delid="+id;

                                }
                           </script>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Sub-Total</td>
                            <td class="text-right" id="subtotaltd">$<?php echo $totalprice ?></td>
                        </tr>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>
                              Use Coupon Get Discount%
                          </td>
                          <td>                            
                                <input type="text" id="couponcode" >
                                <button name="addcoupon" class="btn-success" onclick="addcouponfunction();">Add</button>
                                <span style="margin-right: 5px;">Discount</span><span id="discountamount"></span>
                              
                          </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Shipping 
                              <br>

                              <input class="shipoption" type="radio" name="shiptype" id="usp" value="usp" checked> USPS</input>
                              <input class="shipoption autoclickbycoupon" type="radio" name="shiptype" value="fedex"  style="margin-left: 10px;" > Fedex</input>
                              

                            </td>

                            <td class="text-right" id="totalshippingtd">$<?php 
                            $totalcheckout=0;

                            if(($check==1)){
                              $baseshipping=$result112['shipping'];
                              $totalshipping=$baseshipping+($totaloz*0.55);
                              $totalshipping=bcdiv($totalshipping, 1, 2);
                              echo $totalshipping;
                              ?>
                              <!-- setting total shipping into the js variable -->
                              <script type="text/javascript">
                                var totalshipping="<?php echo $totalshipping ?>";
                              </script>
                              <?php
                              $totalcheckout=$totalprice+$totalshipping;
                              $totalcheckout=bcdiv($totalcheckout, 1, 2);
                     


                              }
                              // else if(($check==1)&&$totalprice>=70){
                              //   $totalshipping=$result112['shipping2'];
                              //   $totalcheckout=$totalprice+$totalshipping;
                              //     echo $result112['shipping2'];
                              // }else{
                              //   echo "0";
                              // } 
                              ?>
                              
                            </td>
                        </tr>
                        <tr>
                          <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          <td>COD fees(USPS)
                            <input class="codoption" type="checkbox" name="codoption" value="codoption" style="margin-left: 10px;" id="codoption" disabled="" title="only works with USPS" ;></input>
                            <p ><a href="#" style="color: green;">click here to acknowledge the COD FEE</a></p>

                          </td>
                          <td class="text-right" id="codfeesoption">$0</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right" id="totalcheckouttd"><strong>$<?php echo $totalcheckout ?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
          <p><b>COD only Works with USPS up to $1000 Order</b>(click the checkmarks USPS and COD fees to activate the cod button)</p>
          <input type="checkbox" id="myCheck" onclick="myFunction();" ><b class="red" id="btxt"> I agree Im not a minor, this is not for consumption & to abide by the <a href="https://securekratom.com/termsofservice.php" target="_blank" style="color: green;">(terms of service)</a> </b>
          <div class="row">

                <div class="col-sm-12  col-md-3 customwidth">
                    <a href="../../STORE.php" class="btn btn-lg btn-block btn-light">Continue Shopping</a>
                </div>
                <!-- <form action="cart.php" method="post" class="col-sm-12 col-md-4 "> -->
                <div class="col-sm-12 col-md-3 customwidth" title="Accept terms & conditons and click on cod checkmark for USPS, COD is only for USPS">
                    <button type="submit" class="btn btn-lg btn-block btn-info text-uppercase" name="cod" disabled id="bn" onClick="codcheckout();">Cash On Delivery</button>
                </div>
              <!-- </form> -->
              <!-- <form action="cart.php" method="post" class="col-sm-12 col-md-4 "> -->
                <div class="col-sm-12 col-md-3 customwidth" title="Accept terms & conditions, make sure cod checkmark is not checked">
                    <button class="btn btn-lg btn-block btn-success text-uppercase stopclick" target="_blank" id="checkoutlink" name="cryptocheckout" onClick="gatewaycheckout();" type="submit">CRYPTO Checkout</button>
                </div>
                 <div class="col-sm-12 col-md-3 customwidth" title="Accept terms & conditions">
                    <button class="btn btn-lg btn-block btn-success text-uppercase stopclick" target="_blank" id="echeckBtn" name="echeckBtn"  data-toggle="modal" data-target="#echeckBtnModal">E-Check</button>
                </div>
              <!-- </form> -->
            </div>
            
        </div>
     
    </div>
</div>
   <style>
          @media (min-width: 768px){
            .customwidth{
              max-width: 33% !important;
            }
          }
        </style>
<!-- modal for echeckBtnModal -->
<div class="modal fade" id="echeckBtnModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Enter Details & READ RED TEXT <p style="color:red; font-size: 13px;"> Input all info as it appears on your bank checks.
        If you have updated your account information please log out and login again before placing order!  </p></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row">
              <div class="col-md-6">
              <!-- <form action="login.php" method="post"> -->
    
              
                
              <p>Details for E-check</p>
                <div class="form-group">
                          <input type="email" class="form-control" placeholder="Account Number *" name="echeckaccountnumber" required  />
                        </div>
                        <div class="form-group">
                          <input type="email" class="form-control" placeholder="Routing Number *" name="echeckroutingnumber" required  />
                        </div>
                <div class="form-group">
                          <input type="text" class="form-control" placeholder="Phone * e.g: 323-232-3232" name="echeckphone" required/>
                        </div>
                <br>
                 <div style="font-size: 13px; overflow: auto;">
                    <p style="color:red; font-size: 13px;">FIRST TIME ECHECKS ARE HELD 5 DAYS BEFORE PROCESSING, AFTER THAT ECHECKS PROCESS SAME DAY. Please read the terms of service for more details. Please do not press payment button more than once or you will be double charged!</p>
                 </div>
              
          </div>
      </div>
      <!-- modal body ends here -->

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="proceedecheckbtn" class="btn btn-primary" onclick="echeckcheckout();">Proceed Payment</button>
      </div>
    </div>
  </div>
</div>

</div>
<!-- hidden form to add shipping fees -->
  <form action="https://www.coinpayments.net/index.php" method="post" target="_blank">
     
      <input type="hidden" name="cmd" value="_cart_add">
      <input type="hidden" name="merchant" value="47b17ec9011bd0e308cf06edd5e8ad12">
      <input type="hidden" name="cart_name" value="Test Cart">      
      <input type="hidden" name="want_shipping" value="0">
      <input type="hidden" name="currency" value="USD">
      <input type="hidden" name="amountf" id="shippingfield" value="<?php echo $totalshipping ?>">
      <input type="hidden" name="allow_quantity" value="0">    
      <input type="hidden" name="item_number" value="shipping">
      <input type="hidden" name="item_name" value="shipping fees">
      <input type="hidden" name="success_url" value="https://securekratom.com/STORE.php">
                  <input type="hidden" name="cancel_url" value="https://securekratom.com/STORE.php">
                  <input type="hidden" name="return_url" value="https://securekratom.com/STORE.php">
      <!-- <input type="image" src="assets/images/cart.png" alt="Add to Cart...">  -->
       
      <button style="background-color: #5cb85c; display: none;" type="submit" class="btn btn-success cartbtn" id="hiddenAddshippingbutton"><b>send shipping</b></button> 
    </form>

<script type="text/javascript">

  var totalcheckout="<?php echo $totalcheckout ?>";
  var totalproductscost="<?php echo $totalprice ?>";



var productidsinJS = [<?php echo '"'.implode('","', $productIds).'"' ?>];
var weightozinJs = [<?php echo '"'.implode('","', $productweightincart).'"' ?>];


  var shipType="Fedex";
  $(document).ready(function(){
    // var totalcheckout="<?php echo $totalcheckout ?>";
    var check = "<?php echo $check ?>";

    function shippingvalueforusps(uspcost){
      totalcheckout=parseFloat(uspcost)+parseFloat(totalproductscost);
      totalcheckout = totalcheckout.toFixed(2);
      $('#totalshippingtd').html('$'+uspcost);
      $('#totalcheckouttd').html('$'+totalcheckout);
      shipType="USPS";
      $("#shippingfield").val(uspcost);
      $("#codoption").attr('disabled',false);
      myFunction();
    }

    if(check=="1"){
    
    // alert(totalproductscost);
    var fedexcost="<?php echo $totalshipping ?>";
    var weight="<?php echo $totallb ?>";
    if(weight<=11){
      var uspcost=0;
        if(weight>=0 && weight<=2.3){
          uspcost=7.35;
          
        }else if(weight>2.31 && weight<=4.5){
          uspcost=14.35;
        }else if(weight>4.5 && weight<=11){
          uspcost=17.60;
        }
        shippingvalueforusps(uspcost);
        // if(totalproductscost >=70){

        //     uspcost=0;
        //     }        
        
        }//if condition
        else{
          // alert('yes');
          $('#usp').attr('disabled',true);
          $('#usp').attr('title',"USPS only work with weight less than 11 lbs");
        }


    $(".shipoption").click(function(){
        // alert(totalshipping);
        var option=$(this).attr("value");
        // alert(option);
        if(option=="usp"){
           totalcheckout=parseFloat(uspcost)+parseFloat(totalproductscost);           
           totalcheckout = totalcheckout.toFixed(2);
          $('#totalshippingtd').html('$'+uspcost);
          $('#totalcheckouttd').html('$'+totalcheckout);
         shipType="USPS";
         $("#shippingfield").val(uspcost);
         $("#codoption").attr('disabled',false);
         myFunction();
        }else if(option=="fedex"){
           totalcheckout=parseFloat(fedexcost)+parseFloat(totalproductscost);           
           totalcheckout = totalcheckout.toFixed(2);
          $('#totalshippingtd').html('$'+fedexcost);
          $('#totalcheckouttd').html('$'+totalcheckout);
           shipType="Fedex";
          $("#shippingfield").val(fedexcost);
          $("#codoption").attr('disabled',true);
          $("#codoption"). prop("checked", false);
          $('#codfeesoption').html('$0');
          myFunction();

        }
        
     });//usp fedex click
}//check condition
   
  var codfees=0;
  $("#codoption").click(function(){
    // alert(totalcheckout);
    // if(totalcheckout <=50){
    //   totalcheckout=
    // }
    
    var codoption = document.getElementById("codoption");
    if (codoption.checked == true && shipType=='USPS'){
      if(totalcheckout<=50){
        codfees=7.75;
        if((totalcheckout+codfees)>50){
          codfees=9.60;
        }

      }else if(totalcheckout>50 && totalcheckout<100){
        codfees=9.60;

     }else if(totalcheckout>100 && totalcheckout<200){
        codfees=11.50;

     }else if(totalcheckout>200 && totalcheckout<300){
        codfees=13.00;

     }else if(totalcheckout>300 && totalcheckout<400){
        codfees=15.00;

     }else if(totalcheckout>400 && totalcheckout<500){
        codfees=16.50;

     }else if(totalcheckout>500 && totalcheckout<600){
        codfees=18.50;

     }else if(totalcheckout>600 && totalcheckout<700){
        codfees=20.00;

     }else if(totalcheckout>700 && totalcheckout<800){
        codfees=22.00;

     }else if(totalcheckout>800 && totalcheckout<900){
        codfees=23.50;

     }else if(totalcheckout>900 && totalcheckout<1000){
        codfees=25.50;
      }

      
      totalcheckout=parseFloat(totalcheckout)+parseFloat(codfees);
      totalcheckout = totalcheckout.toFixed(2);
      $('#totalcheckouttd').html('$'+totalcheckout);
      $('#codfeesoption').html('$'+codfees);

    }else if (codoption.checked == false ){
      
      totalcheckout=parseFloat(totalcheckout)-parseFloat(codfees);
      totalcheckout = totalcheckout.toFixed(2);
      $('#totalcheckouttd').html('$'+totalcheckout);
      $('#codfeesoption').html('$'+codfees);

    }

    myFunction();
  });//click

  });//document ready
  var couponcheck=0;
  var couponcode=0;
  var discount=0;
   function addcouponfunction(){
                                if(couponcheck==1){
                                  return;
                                 }

                                 
                                   couponcode = document.getElementById("couponcode").value;
                                   // alert(couponcode);
                                  $.ajax({
                                        url:"getorder.php",
                                        method:"post",
                                        cache: false,
                                        data:{couponcode:couponcode,totalproductscost:totalproductscost},
                                        success:function(data){
                                          // alert(data);
                                           if(isNaN(data)){
                                             alert(data);
                                             }else{
                                              couponcheck=1;
                                                // alert(data);
                                                var discountedamount=data;
                                                 discount=totalproductscost-discountedamount;
                                                // alert(discount);
                                                // var discountpercent=totalproductscost*(data/100);
                                                // var discountedamout=totalproductscost-discountpercent;
                                                totalproductscost=discountedamount;
                                                
                                                setTimeout(function (){

                                                    $('#subtotaltd').html('$'+totalproductscost);
                                                    $('#discountamount').html('-$'+discount);
                                                    $(".autoclickbycoupon").click();
                                                
                                                    alert("Coupon Discount Applied!");

                                                  }, 500);

                                             }
                                        }
                                        
                                      });//ajax
                                   
                                }
    function myFunction() {
      // alert('a');
      var checkBox = document.getElementById("myCheck");
      var checkoutlink = document.getElementById("checkoutlink");
      var echeckBtn=document.getElementById("echeckBtn");
      if(shipType=='Fedex'){
        
        if (checkBox.checked == true){
            document.getElementById("bn").disabled = true;

           checkoutlink.classList.remove('stopclick');
           echeckBtn.classList.remove('stopclick');
           document.getElementById("btxt").classList.remove('red');
        }else{
           document.getElementById("bn").disabled = true;
           checkoutlink.classList.add('stopclick');
           echeckBtn.classList.add('stopclick');
          document.getElementById("btxt").classList.add('red');
        }

      }else if(shipType=='USPS'){
        
        if (checkBox.checked == true){

            var codoption = document.getElementById("codoption");
            if (codoption.checked == true){
               // document.getElementById("checkoutlink").classList.add('stopclick');
              document.getElementById("bn").disabled = false;
              checkoutlink.classList.add('stopclick');
              echeckBtn.classList.add('stopclick');
              
               
            }else{
              

               checkoutlink.classList.remove('stopclick');
               echeckBtn.classList.remove('stopclick');
              document.getElementById("bn").disabled = true;
            }

            
           // checkoutlink.classList.remove('stopclick');
           document.getElementById("btxt").classList.remove('red');
        }else{
          // alert('asd');
           document.getElementById("bn").disabled = true;
           checkoutlink.classList.add('stopclick');
           echeckBtn.classList.add('stopclick');
          document.getElementById("btxt").classList.add('red');
        }
      }else{
          document.getElementById("bn").disabled = true;
       checkoutlink.classList.add('stopclick');
       echeckBtn.classList.add('stopclick');
       document.getElementById("btxt").classList.add('red');
      }


  }

  function gatewaycheckout(){
    // alert(totalcheckout);
    var sessionid="<?php echo $sessionid; ?>";
    var check="<?php echo $check; ?>"
     if(check==0){
      alert('no items in cart!');
      return;
    }

    var sessionname="<?php echo $_SESSION['name']; ?>";  
    var saddress="<?php echo $_SESSION['caddress']; ?>";  
    var sphone="<?php echo $_SESSION['cphone']; ?>";  
    var semail="<?php echo $_SESSION['email']; ?>";  
    var szip="<?php echo $_SESSION['czip']; ?>"; 
    var codetail="<?php echo $coddetail ?>";   
    var sadminemail="<?php echo $result112['email']; ?>";



    // var data={cryptocheckout:"cryptocheckout",check:check,totalcheckout:totalcheckout,sessionid:sessionid,shipType:shipType,pIDS:productidsinJS,weightozJS:weightozinJs};

      var data={cryptocheckout:"cryptocheckout",check:check,totalcheckout:totalcheckout,sessionid:sessionid,sessionname:sessionname,saddress:saddress,sphone:sphone,semail:semail,szip:szip,codetail:codetail,sadminemail:sadminemail,shipType:shipType,pIDS:productidsinJS,weightozJS:weightozinJs,couponcode1:couponcode,discount1:discount};

    var a=$("#shippingfield").val();
    if(a!="0"){
      $("#hiddenAddshippingbutton").click();
    }
  
      $.ajax({
            url:"getorder.php",
            method:"post",
            cache:false,
            data:data,
            success:function(data){
                // alert(data);
                if(data=="yes"){

                location.href="https://www.coinpayments.net/index.php?cmd=_cart";
                }else if(data=="countryError" ){
                  // alert(data);
                  swal("Error!", "You're not allowed to Order on site, please contact admin!", "error");
                }else if(data=="zipcodeBlocked"){
                  // alert(data);
                  swal("Error!", "Sorry, Not allowed in your Area, please contact admin!", "error");
                }else{
                  swal("Error!", "Error with mail server, Try later or contact site admin!", "error");
                }
              }
           });
      // window.open("https://www.coinpayments.net/index.php?cmd=_cart","_blank");
    }
// echeck checkout for registered user

     function echeckcheckout(){
      $('#proceedecheckbtn').attr('disabled',true);
    var check="<?php echo $check; ?>"
     if(check==0){
      alert('no items in cart!');
      return;
    }
    var sessionid="<?php echo $sessionid ?>";
    var sessionname="<?php echo $_SESSION['name']; ?>";  
    var saddress="<?php echo $_SESSION['caddress']; ?>";  
    // var sphone="<?php echo $_SESSION['cphone']; ?>";  
    var sphone=$("input[name=echeckphone]").val();  
    var semail="<?php echo $_SESSION['email']; ?>";  
    var szip="<?php echo $_SESSION['czip']; ?>"; 
    var echeckcity="<?php echo $_SESSION['sessionCity']; ?>"; 
    var echeckstate="<?php echo $_SESSION['sessionState']; ?>"; 


    var codetail="<?php echo $coddetail ?>";   
    var sadminemail="<?php echo $result112['email']; ?>";


    var echeckaccountnumber=$("input[name=echeckaccountnumber]").val(); 
    var echeckroutingnumber=$("input[name=echeckroutingnumber]").val(); 



    


    if(echeckaccountnumber=="" || echeckroutingnumber==""){
      $('#proceedecheckbtn').attr('disabled',false);
      alert('Please Enter valid Check Details');
      return;
    }

     var priceIncludeEcheckFees = parseFloat(totalcheckout) + parseFloat(0.75);

    var data={echeckpayment:"echeckpayment",echeckcheckoutUser:"echeckcheckoutUser",check:check,totalcheckout:priceIncludeEcheckFees,sessionid:sessionid,sessionname:sessionname,saddress:saddress,sphone:sphone,semail:semail,szip:szip,codetail:codetail,sadminemail:sadminemail,shipType:shipType,pIDS:productidsinJS,weightozJS:weightozinJs,couponcode1:couponcode,discount1:discount,echeckaccountnumber:echeckaccountnumber,echeckroutingnumber:echeckroutingnumber,echeckcity:echeckcity,echeckstate:echeckstate};

    var data1={echeckpayment:"echeckpayment",echeckcheckoutUser:"echeckcheckoutUser",check:check,totalcheckout:priceIncludeEcheckFees,sessionid:sessionid,sessionname:sessionname,saddress:saddress,sphone:sphone,semail:semail,szip:szip,codetail:codetail,sadminemail:sadminemail,shipType:shipType,pIDS:productidsinJS,weightozJS:weightozinJs,couponcode1:couponcode,discount1:discount,echeckaccountnumber:echeckaccountnumber,echeckroutingnumber:echeckroutingnumber,echeckcity:echeckcity,echeckstate:echeckstate};
    // alert(data.totalcheckout);

        //ajax for E check payment
    $.ajax({
      url:"greenapi/examples/createCheck.php",
      method:"post",
      cache:false,
      data:data,
      success:function(data){
              // alert(data);
              if(data=='done'){
                // alert('done');
                    //ajax call for setting up order site/email/database
                $.ajax({
                        url:"getorder.php",
                        method:"post",
                        cache:false,
                        data:data1,
                        success:function(data){
                        if(data=="yes"){
                            swal("Done!", "We have received your Order and Info, We will contact you soon!", "success")
                            .then((value) => {
                            window.open("tables.php","_self");
                              });

                            }
                            else if(data=="countryError" ){
                              // alert(data);
                              swal("Error!", "You're not allowed to Order on site, please contact admin!", "error");
                            }else if(data=="zipcodeBlocked"){
                              // alert(data);
                              swal("Error!", "Sorry, Not allowed in your Area, please contact admin!", "error");
                            }else{
                              // alert(data);
                              swal("Error!", "Error with mail server, Try later or contact site admin!", "error");
                            }
                          }
                       });

              }else{
                alert(data);
              }
              
          }//success
      });//ajax call

    }
     function codcheckout(){
    // alert(totalcheckout);
    var check="<?php echo $check; ?>"
     if(check==0){
      alert('no items in cart!');
      return;
    }
    var sessionid="<?php echo $sessionid ?>";
    var sessionname="<?php echo $_SESSION['name']; ?>";  
    var saddress="<?php echo $_SESSION['caddress']; ?>";  
    var sphone="<?php echo $_SESSION['cphone']; ?>";  
    var semail="<?php echo $_SESSION['email']; ?>";  
    var szip="<?php echo $_SESSION['czip']; ?>"; 
    var codetail="<?php echo $coddetail ?>";   
    var sadminemail="<?php echo $result112['email']; ?>";
    // alert(couponcode);
    // alert(discount);

    var data={codcheckout:"COD",check:check,totalcheckout:totalcheckout,sessionid:sessionid,sessionname:sessionname,saddress:saddress,sphone:sphone,semail:semail,szip:szip,codetail:codetail,sadminemail:sadminemail,shipType:shipType,pIDS:productidsinJS,weightozJS:weightozinJs,couponcode1:couponcode,discount1:discount};
    // alert(data.totalcheckout);
    $.ajax({
            url:"getorder.php",
            method:"post",
            cache:false,
            data:data,
            success:function(data){
            if(data=="yes"){
                swal("Done!", "We have received your Order and Info, We will contact you soon!", "success")
                .then((value) => {
                window.open("tables.php","_self");
                  });

                }
                else if(data=="countryError" ){
                  // alert(data);
                  swal("Error!", "You're not allowed to Order on site, please contact admin!", "error");
                }else if(data=="zipcodeBlocked"){
                  // alert(data);
                  swal("Error!", "Sorry, Not allowed in your Area, please contact admin!", "error");
                }else{
                  // alert(data);
                  swal("Error!", "Error with mail server, Try later or contact site admin!", "error");
                }
              }
           });
    

    }
  </script>

  <?php 
      // if(isset($_POST['totalcheckoutphp'])){
      //   $totalcheckout=$_POST['totolchechout'];
      //   echo "yes";
      // }


   ?>
<style type="text/css">
  .stopclick{
    pointer-events: none;


  }
  .red{
    color: red;
  }
</style>
          </div>
        <?php 
        
        //sending shippnig fees
        if(isset($_POST['shippingfees'])){

        }

          //crypto checkout on cart page
          if(isset($_POST['cryptocheckout']) && $check==1){

              
              $insertOrder="insert into orders(C_id,ordertype,total) values('$sessionid','Gateway Checkout','$totalcheckout')";
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
                ?>
              <script type="text/javascript">
                $(document).ready(function() {
                  location.href="tables.php"
                });
              </script>
              <?php 
          }
////////////////////////////////////
          if(isset($_POST['gatewaycheckout']) && isset($_SESSION['loggedIn']) && $check==1){

              
              $insertOrder="insert into orders(C_id,ordertype,total) values('$sessionid','Gateway Checkout','$totalcheckout')";
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
                ?>
              <script type="text/javascript">
                $(document).ready(function() {
                  location.href="tables.php"
                });
              </script>
              <?php 
          }
////////////////////////////////  

        // echo "string";
          if(isset($_POST['cod']) && $check==1){
            
            $alldetails="";

            $alldetails=$alldetails. "Customer Name: ".$_SESSION['name']."<br>";
            $alldetails=$alldetails. "Customer Address: ".$_SESSION['caddress']."<br>";
            $alldetails=$alldetails. "Customer Phone: ".$_SESSION['cphone']."<br>";
            $alldetails=$alldetails. "Customer Email: ".$_SESSION['email']."<br>";
            $alldetails=$alldetails. "Customer ZipCode: ".$_SESSION['czip']."<br><br>";
            $alldetails=$alldetails. "Order Details: "."<br>".$coddetail."<br>";
            $alldetails=$alldetails. "Total Amount(shipping Included): $".$totalcheckout."<br>";
            // echo $alldetails;
            $adminemail=$result112['email'];


            $to = $adminemail;
            $subject = "New Order";
            $txt = $alldetails;

            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 
              
              'X-Mailer: PHP/' . phpversion();
              $message='<!DOCTYPE html>
                <html>
                <body>
                  <div style="height: 80px; width: 100%; margin: auto; border-bottom: 2px solid #855382; text-align: center;">

                  
                    <span style="color:#855382; font-size:60px;">SECURE</br>KRATOM.COM</span>
                  </div>
                  <div style="width:100%; margin:auto; background: #fffff0;">
                    <div style=" text-align: center; color:black;">
                      <p><b>New Order</b></p>
                      <p><b>Customer Name: </b>'.$_SESSION['name'].'</p>
                      <p><b>Address: </b>'.$_SESSION['caddress'].'</p>
                      <p><b>Phone: </b>'.$_SESSION['cphone'].'</p>
                      <p><b>Email: </b>'.$_SESSION['email'].'</p>
                      <p><b>ZipCode:</b>'.$_SESSION['czip'].'</p>
                      <p><b>Order Details: </b>'.$coddetail.'</p>
                       <p><b>Total Amount(shipping Included): $</b>'.$totalcheckout.'</p>
                      <p style="opacity: 0.8;">Thankyou</p> <br>

                      </div>
                    
                  </div>
                </body>
                </html>';



            if(mail($to,$subject,$txt,$headers)){
              // echo $txt;
              $insertOrder="insert into orders(C_id,ordertype,total) values('$sessionid','COD','$totalcheckout')";
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

              ?>
              <script type="text/javascript">
              // swal("Done!", "We have received your Order and Info, We will contact you soon!", "success");

              swal("Done!", "We have received your Order and Info, We will contact you soon!", "success")
              .then((value) => {
                window.open("tables.php","_self");
              });
              </script>
              <?php 
            }else{
              ?>
              <script type="text/javascript">
               swal("Error!", "Problem with Mail server, Try Later!", "danger");
              
               </script>
              <?php 
            }
       
          }

         ?>
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
            </script>, Gold Star Botanicals. All Rights Reserved.</a> 
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
  <!--  Google Maps Plugin    -->
  
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
