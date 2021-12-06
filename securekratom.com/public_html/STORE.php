<head>
<meta property="og:title" content="Buy Kratom with Check">
<meta property="og:site_name" content="Secure Kratom">
<meta property="og:url" content="https://securekratom.com">
<meta property="og:description" content="">
<meta property="og:type" content="website">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <meta name="title" content="Buy Kratom with Check">
<meta name="description" content="buy top quality kratom or kratom extract with electronic check, COD and bitcoin. All products packaged with born on date and batch #.">
<meta name="keywords" content="kratom powder, kratom capsules, kratom COD, Kratom Electronic Check, Kratom Echeck, Kratom Bitcoin, retail kratom, kratom products, kratom extract, quality kratom, buy kratom, easy pay kratom">
  <title>buy kratom at securekratom.com</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&subset=latin">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/soundcloud-plugin/style.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/animate.css/animate.min.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise3-blocks-plugin/css/style.css">
  <link rel="stylesheet" href="assets/mobirise-gallery/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">

  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- <link rel="stylesheet" href="assets/CustomCss/Style.css" type="text/css"> -->

  <script src="https://code.jquery.com/jquery-1.9.1.js"></script>

</head>
<?php

include 'headerNavBar.php';
// session_start();
include 'connection.php';
 $con = connecttoDB();

// $test = mysqli_query($con, "SELECT * FROM customers");

//     while ($data = mysqli_fetch_array ($test)) {
//       $id=$data['C_id'];
//       $zip=$data['zipcode'];
//       $hashedPassword = hash('sha256', $zip);
//       $update = "UPDATE customers SET password='$hashedPassword' where C_id='$id'";
//       mysqli_query($con,$update);

//     }

 $result = mysqli_query($con, "SELECT * FROM products order by category_id");
 // echo $_SESSION['loggedIn'];
 // echo $_GET['P_id'];
 if(isset($_GET['P_id']) && isset($_SESSION['loggedIn'])){
      $C_id=$_SESSION['C_id'];
      // echo "string";
      $P_id=$_GET['P_id'];
      // $del ="DELETE FROM products WHERE P_id = $P_id";
      $insert="INSERT INTO cart(C_id,P_id) values('$C_id','$P_id')";

      if($result1 = mysqli_query($con, $insert)){
        ?>
        <script>
          $(document).ready(function() { swal('Added!', 'The Product Added Into the cart.', 'success');  });


        </script>
        <?php

      }
    }
  if(isset($_SESSION['loggedIn'])){
      // echo "yes";

    }else if(!isset($_SESSION['guestid'])){

      $Guestinsert="INSERT INTO guestuser(Name) values('Guest')";

      mysqli_query($con, $Guestinsert);
      $newGuestid= $con->insert_id;
      $_SESSION['guestid']=$newGuestid;
      // echo "no";
      ?>
      <script type="text/javascript">
        $(document).ready(function(){
          $("#mycartlink").attr("href","Dashboard/panel/guestcart.php");
          $(".cartbtn").attr("onclick","addtoguestcart(this.id)");

          // alert(newguestid);
        });
      </script>
      <?php
    }else if(isset($_SESSION['guestid'])){
      ?>
      <script type="text/javascript">
        $(document).ready(function(){
          $("#mycartlink").attr("href","Dashboard/panel/guestcart.php");
          $(".cartbtn").attr("onclick","addtoguestcart(this.id)");

          // alert(newguestid);
        });
      </script>
      <?php
    }

?>
<script type="text/javascript">
  function addtoguestcart(id){
    var newguestid="<?php echo $_SESSION['guestid']; ?>";
    // alert(newguestid);
    // alert(id);
      $.ajax({
        url:"Dashboard/addtocart.php",
        method:"post",
        data:{guestid:newguestid,P_id:id },
        success:function(data){
          // alert(data);
        }

      });//ajax

  }
</script>


<style type="text/css">
  .stopclick{
    pointer-events: none;
  }
  .red{
    color: red;
  }
  .btn-success:hover{
    color: #eee349 !important;
  }
}
</style>
  <script type="text/javascript">

    function myFunction123() {

    var checkBox = document.getElementById("myCheck");
    var checkoutlink = document.getElementById("checkoutlink");
    if (checkBox.checked == true){
       checkoutlink.classList.remove('stopclick');
       document.getElementById("btxt").classList.remove('red');
    } else {
       checkoutlink.classList.add('stopclick');
       document.getElementById("btxt").classList.add('red');
    }
  }
// $(document).ready(function(){
  function addtocart(id){
    // alert(id);

    // alert(id);
                              // $('.cartbtn').click(function(){

                                  // var id=$(this).attr('id');
                                  $.ajax({
                                  url:"Dashboard/addtocart.php",
                                  method:"post",
                                  data:{P_id:id},
                                  success:function(data){
                                    // $("#orderdetail").html(data);
                                    // $("#myModal").modal();
                                  }
                                });//ajax

                              // });//click

        }
// });//ducoment
  function opengateway(){
    window.open("https://www.coinpayments.net/index.php?cmd=_cart","_blank");
  }

</script>

<!--  -->

  <section class="mbr-gallery mbr-section  extShop1 mbr-after-navbar" id="extShop1-u" data-rv-view="371" style="background-color: rgb(204, 204, 204); padding-top: 7.5rem; padding-bottom: 7.5rem;">
    <!-- Gallery -->

    <div class="col-md-9 clearfix">


       <div style=" margin-left: 40px;">
      <!-- cart link below -->
           <a href="./Dashboard/panel/cart.php" style="font-size: 25px; background-color: #5cb85c;" class="btn btn-success" id="mycartlink"><b>My Cart</b></a>
       </div>
       <div class="row" >
              <div class="col-md-12" style=" margin-left: 40px;">
                <form action="https://www.coinpayments.net/index.php" method="post" >
                  <input type="hidden" name="cmd" value="_cart_add">
                  <input type="hidden" name="merchant" value="47b17ec9011bd0e308cf06edd5e8ad12">
                  <input type="hidden" name="cart_name" value="Test Cart">
                  <input type="hidden" name="want_shipping" value="0">
                  <input type="hidden" name="currency" value="USD">
                  <input type="hidden" name="reset" value="1">
                  <input type="hidden" name="amountf" id="shippingfield" value="0.001">
                  <input type="hidden" name="allow_quantity" value="0">
                  <input type="hidden" name="item_number" value="reset cart">
                  <input type="hidden" name="item_name" value="you can del it now">
                  <input type="hidden" name="success_url" value="https://securekratom.com/STORE.php">
                  <input type="hidden" name="cancel_url" value="https://securekratom.com/STORE.php">
                  <input type="hidden" name="return_url" value="https://securekratom.com/STORE.php">
                  <!-- <input type="image" src="assets/images/cart.png" alt="Add to Cart...">  -->
                  <button style="background-color: #5cb85c;" type="submit" class="btn btn-info" ><b>Start new crypto checkout</b></button><h1><span style="font-size: 60%;">Securekratom.com your #1 webstore to buy kratom with COD Electronic Check and Bitcoin</span></h1>
                </form>
              </div>
            </div>
      <div class="sort-buttons" style="display: block;">
        <div class="filter-by-d"><a class="btn btn-primary">Default sorting</a></div>
        <div class="filter-by-pu"><a class="btn btn-primary disableSortButton">Price: low to high</a></div>
        <div class="filter-by-pd"><a class="btn btn-primary disableSortButton">Price: high to low</a></div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="col-md-9">
        <div class="mbr-gallery-row">
          <div>
            <div class="shop-items" id="showitems">
              <?php
                $cat_ids = array();
                while ($row = mysqli_fetch_array($result)) {
                  if($row['status']=='disable'){
                    continue;
                  }

                  $c_id=$row['category_id'];
                  $selectcategoryquery = mysqli_query($con, "SELECT * FROM categories where c_id=$c_id");
                  $selectcategory = mysqli_fetch_assoc($selectcategoryquery);



                  if(($selectcategory['c_availableweight']<=$selectcategory['cat_restockweight'])){
                    $k=0;
                    $emailto = mysqli_query($con, "SELECT * from admin");
                    $emaila = mysqli_fetch_assoc($emailto);



                    $c_id=$selectcategory['c_id'];
                    array_push($cat_ids,$c_id);

                      for ($x = 0; $x < count($cat_ids)-1; $x++) {
                          if($c_id==$cat_ids[$x]){
                            $k=1;
                          }
                      }

                    // echo count($cat_ids);
                    $c_name=$selectcategory['c_name'];
                    $weightleft=$selectcategory['c_availableweight'];


                    $alldetails="Category Id: ".$c_id."<br>";
                    $alldetails=$alldetails. "Category Name: ".$c_name."<br>";
                    $alldetails=$alldetails. "Weight Left: ".$weightleft." OZ <br>";


                    $to = $emaila['email'];
                    $subject = "Category Re-Stock Alert";
                    $txt = $alldetails;

                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    $headers .= 'From: noreply@securekratom.com' . "\r\n";
                    $headers .= 'X-Mailer: PHP/' . phpversion();

                    if($k!=1){

                      if(mail($to,$subject,$txt,$headers)){}

                    }



                  }

                  if(($selectcategory['c_availableweight']<=0) || ($selectcategory['cat_disableweight']>=$selectcategory['c_availableweight']) ){
                    continue;
                  }

              ?>
              <div class="mbr-gallery-item mbr-gallery-item__mobirise3" data-tags="<?php echo $selectcategory['c_name']; ?>" data-seller="false" price="<?php echo $row['price'] ?>">
                <div class="galleryItem" href="#lb-extShop1-u" data-slide-to="53" data-toggle="modal">
                  <div class="item_overlay"></div>
                  <div class="img_wraper">
                    <img src="<?php echo "Admin/productimages/".$row['image']; ?>" alt="Secure Kratom" height="250" title="product images">
                  </div>
                  <!-- <span class="onsale" style="display: none;">-50%</span> -->
                  <div class="sidebar_wraper">
                    <h4 class="item-title"><?php echo $row['name'] ?></h4>
                    <h5 class="item-subtitle"><?php echo $row['quantity'];echo $row['quantityunit']; ?></h5>
                    <div class="price-block">
                      <span class="shop-item-price">$<?php echo $row['price'] ?></span>
                    </div>
                    <div class="item-subtitle" style="text-align: center;">

                      <?php echo $row['p_desc']; ?>
                    </div>
                    <div class="card-description"></div>
                    <div class="mbr-section-btn item-button" style="text-align: center;">
                  <form  action="https://www.coinpayments.net/index.php" method="post">
                    <!-- action="https://www.coinpayments.net/index.php" method="post"   -->
                     <input type="hidden" name="cmd" value="_cart_add">
                     <input type="hidden" name="merchant" value="47b17ec9011bd0e308cf06edd5e8ad12">
                     <input type="hidden" name="cart_name" value="Test Cart">
                     <!-- <input type="hidden" name="cart_shippingf" value="<?php echo $totalshipping ?>"> -->

                     <input type="hidden" name="want_shipping" value="0">
                     <input type="hidden" name="currency" value="USD">
                     <input type="hidden" name="amountf" value="<?php echo $row['price'] ?>">
                     <input type="hidden" name="allow_currencies" value="BTC,LTC,XMR,LTC,BCH,DASH,DOGE,ZEC">
                     <input type="hidden" name="allow_quantity" value="1">
                     <!-- <input type="hidden" name="shippingf" value="10">     -->
                     <!-- <input type="hidden" name="shipping2f" value="0">    -->

                     <input type="hidden" name="item_number" value="<?php echo $row['name'] ?>">
                     <input type="hidden" name="item_name" value="<?php echo $row['name'] ?>">
                     <input type="hidden" name="success_url" value="https://securekratom.com/STORE.php">
                     <input type="hidden" name="cancel_url" value="https://securekratom.com/STORE.php">
                     <input type="hidden" name="return_url" value="https://securekratom.com/STORE.php">
                     <!-- <input type="image" src="assets/images/cart.png" alt="Add to Cart...">  -->

                     <button style="background-color: #5cb85c;" type="submit" class="btn btn-success cartbtn" id='<?php echo $row['id']; ?>'
                                onClick="addtocart(this.id)"><b>Add to Cart</b></button>
                   </form>
                     </div>
                 </div>
               </div>
              </div>
              <?php } ?>

          </div>
        </div>
<div class="clearfix"></div>
</div>
</div>


<!-- best sellers products -->
<div class="col-md-3 sidebar" style="display: block;">
  <div class="sidebar-background"></div>
<!--   <div class="sidebar-block container bestseller-block">
    <h4 class="sidebar-title">Best Sellers</h4>
    <div class="bestsellers col-md-12" onselectstart="return false">


</div>
</div> -->
<div class="sidebar-block container range-slider" onselectstart="return false">
  <h4 class="sidebar-title">Search By Name</h4>
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Product" class="form-control">
    <br>
  <h4 class="sidebar-title">Filter by price</h4>
  <div class="filter-cost" onselectstart="return false">
    <div class="price-controls">
      <label class="min-price">
        <input class="min-input form" type="text" value="auto" name="min">
      </label>
      <label class="max-price">
        <input class="max-input" type="text" value="auto" name="max">
      </label>
    </div>

    <div class="range-controls">
      <div class="scale">
        <div class="bar"></div>
      </div>

      <div class="toggle min-toggle"></div>
      <div class="toggle max-toggle"></div>
    </div>
  </div>
  <div class="price-range"><a class="btn btn-primary filterPriceRange">Filter</a></div>
  <div class="price-range-reset"><a class="btn btn-secondary">Show all</a></div>
</div>
<div class="sidebar-block container sidebar-categories">
  <h4 class="sidebar-title">PRODUCT CATEGORIES</br> **PLEASE SELECT OPTION FOR EASY PRODUCT SEARCH**</h4>
  <div class="categories col-md-12">
    <div class="categories-titles">
      <!-- Filter -->

 <!--      <div class="mbr-gallery-filter container gallery-filter-active">
        <ul>
          <li>Indonesian-Bali White Vein</li>
          <li class="mbr-gallery-filter-all active">All</li>


        </ul>
      </div> -->
      <div >
        <ul id="testUL">
          <li><strong>All</strong></li>
 <li><strong>Multi Strain Options</strong></li>
            <ol>
              <li>Leaf Sample Packs</li>
	      <li>Extract Sample Pack</li>
            </ol>
          <li><strong>Extracts</strong></li>
            <ol>
              <li>Extracts-In House</li>
	      <li>Extracts-10%</li>
	      <li>Extracts-Isol8</li>
	      <li>Extracts-Gold Star Elite</li>
	      <li>Extract Sample Pack</li>
<li>Tincture</li>
            </ol>
          </li>
          <li><strong>Indonesian</strong></li>
            <ol>
              <li>Indonesian-Borneo Red Vein</li>
              <li>Indonesian-Borneo White Vein</li>
              <li>Indonesian-White Horn Indo</li>
              <li>Indonesian-Borneo Green Vein</li>
            </ol>
          </li>
          <li><strong>Malaysian</strong></li>
            <ol>
              <li>Malaysian-Super Green Malay</li>
              <li>Malaysian-Malaysian Maeng Da</li>
            </ol></li>
          <li><strong>Thai</strong></li>
            <ol>
              <li>Thai-Red Vein Thai</li>
            </ol></li>
          <li><strong>Vietnamese</strong></li>
            <ol>
              <li>Vietnamese-Yellow Vein Vietnamese</li>
            </ol></li>
        </ul>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<div class="col-md-3 sidebar"></div>

<!-- Lightbox -->
<div class="shopItemsModal_wraper">
  <div class="shopItemsModalBg"></div>
  <div class="shopItemsModal">
    <div class="col-md-6 image-modal"></div>
    <div class="col-md-6 text-modal"></div>
    <div class="closeModal">
      <div class="close-modal-wrapper">

      </div>
    </div>
  </div>
</div>
</section>


<script src="assets/web/assets/jquery/jquery.min.js"></script>
<script src="assets/tether/tether.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/smooth-scroll/smooth-scroll.js"></script>
<script src="assets/viewport-checker/jquery.viewportchecker.js"></script>
<script src="assets/dropdown/js/script.min.js"></script>
<script src="assets/touch-swipe/jquery.touch-swipe.min.js"></script>
<script src="assets/theme/js/script.js"></script>
<script src="assets/mobirise3-blocks-plugin/js/script.js"></script>
<script src="assets/mobirise-gallery/player.min.js"></script>
<script src="assets/mobirise-gallery/script.js"></script>


<input name="animation" type="hidden">
<script>

  function myFunction() {

    var headings = document.getElementById("showitems");
    var x = document.getElementById("showitems").getElementsByTagName("h4").length;
    var input = document.getElementById('myInput');
    var filter = input.value.toUpperCase();

    for (i = 0; i < x; i++) {

      var a = document.getElementById("showitems").getElementsByTagName("h4")[i];
      var txtValue = a.textContent || a.innerText;

      if (txtValue.toUpperCase().indexOf(filter) > -1) {

          headings.getElementsByClassName("mbr-gallery-item")[i].style.display = "";
        }else{

          headings.getElementsByClassName("mbr-gallery-item")[i].style.display = "none";
        }
    }
  }

///filter
  function getEventTarget(e) {
    e = e || window.event;
    return e.target || e.srcElement;
  }
  var ula = document.getElementById('testUL');
  ula.onclick = function(event) {
      var target = getEventTarget(event);
      // alert(target.innerHTML);
      var filters=target.innerHTML.toUpperCase();
      var headings = document.getElementById("showitems");
      // alert(target.innerHTML);
      // var d= headings.getElementsByClassName("mbr-gallery-item")[50].getAttribute('data-tags');
      // alert(d);
      var x = document.getElementById("showitems").getElementsByTagName("h4").length;

      ///
      for (i = 0; i < x; i++) {
        // alert('a');
      var txtValue = headings.getElementsByClassName("mbr-gallery-item")[i].getAttribute('data-tags');
      txtValue=txtValue.toUpperCase();

      var span = document.createElement('span');
      span.innerHTML = txtValue;
      txtValue=span.textContent || span.innerText;
      if (txtValue.indexOf(filters) > -1) {

          headings.getElementsByClassName("mbr-gallery-item")[i].style.display = "";
        }else{

          headings.getElementsByClassName("mbr-gallery-item")[i].style.display = "none";
          if(target.innerHTML=="All"){
              headings.getElementsByClassName("mbr-gallery-item")[i].style.display = "";
            }

        }
    }


    window.scrollTo(0, 110);
  };

</script>
<style type="text/css">
  li:hover{
    cursor: pointer;
    color: #2b0680;
  }

  li:hover >ol li{
    cursor: pointer;
    color: black;
  }
  li:hover >ol li:hover{
    cursor: pointer;
    color: #2b0680;
  }
  li>ol>li{
    display: none;
  }
   ul li:hover > ol li{
    cursor: pointer;
    display: block;

  }

</style>
</body>
</html>
<script>
  function validateAddForm(){
    let username = document.getElementById("ausername").value;
    let check = true;
    $.post("ajax.php", "ausername="+username+"&action=get_user", function(data, status){
      if(data == "Error"){
        $("#username").val("");
        document.getElementById("errorMessageAdd").innerHTML = "A technician with the same username already exists.";
        return false;
      }else{
        return true;
      }
    });
  }
</script>
