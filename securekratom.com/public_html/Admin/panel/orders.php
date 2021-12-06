

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Admin
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
           <script>
            
             // Call the dataTables jQuery plugin
            $(document).ready(function() {

             $('#mytable').dataTable({
                  "bPaginate": true,
                  "bLengthChange": false,
                  "bFilter": true,
                  "bInfo": true,
                  "bAutoWidth": false,
                  "order": [[ 0, 'desc' ]]
                  

                });
             

            });

    //         $(document).ready(function() {
    // // Setup - add a text input to each footer cell
    //           $('#mytable tfoot th').each( function () {
    //               var title = $(this).text();
    //               $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    //           } );
           
    //           // DataTable
    //           var table = $('#mytable').DataTable();
           
    //           // Apply the search
    //           table.columns().every( function () {
    //               var that = this;
           
    //               $( 'input', this.footer() ).on( 'keyup change clear', function () {
    //                   if ( that.search() !== this.value ) {
    //                       that
    //                           .search( this.value )
    //                           .draw();
    //                   }
    //               } );
    //           } );
    //       } );
         </script>

</head>
<?php 
  session_start();
  include '../../connection.php';
  $con = connecttoDB();
  if(!isset($_SESSION['AdminloggedIn'])){
      header("Location:../adminlogin/adminlogin.php");
  }

  // $sessionid=$_SESSION['C_id'];

  

 ?>
<body class="">

  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="#" class="simple-text logo-normal">
          Admin
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          
           <li class="nav-item">
            <a class="nav-link" href="addproduct.php">
              <i class="material-icons">content_paste</i>
              <p>Add Product</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="products.php">
              <i class="material-icons">content_paste</i>
              <p>All Products</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="addcategory.php">
              <i class="material-icons">content_paste</i>
              <p>Add Category</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="categories.php">
              <i class="material-icons">content_paste</i>
              <p>All Categories</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="./orders.php">
              <i class="material-icons">content_paste</i>
              <p>Orders</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="coupons.php">
              <i class="material-icons">content_paste</i>
              <p>Coupons</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="allcoupons.php">
              <i class="material-icons">content_paste</i>
              <p>All Coupons</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./customers.php">
              <i class="material-icons">person</i>
              <p>All Customers</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./adminsetting.php">
              <i class="material-icons">settings</i>
              <p>Admin Setting</p>
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
             <a class="navbar-brand" href="#">Welcome Admin</a>

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

                  <a class="dropdown-item" href="../logout.php">Log out</a>
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
                  <h4 class="card-title ">All Order</h4>
                  <!-- <p class="card-category">All orders</p> -->
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table" id="mytable" >
                      <thead class=" text-primary">
                        <th>Order#</th>
                        <th>Shipping#</th>
                        <th>C_id</th>
                        <th>C_Name</th>
                        <th>C_Address</th>
                        <th>C_phone</th>
                        <th>OrderType</th>
                        <th>ShipVia</th>
                        <th>couponUsed</th>
                        <th>discount</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
 
                      </thead>
                      <tbody>
                       <?php 
                          // $orderid="";
                          // $sessionid=$_SESSION['C_id'];
                          $query = mysqli_query($con, "SELECT * FROM orders");
                          while($order = mysqli_fetch_assoc($query)){
                            $c_id=$order['C_id'];
                            $getcustomer=mysqli_query($con, "SELECT * FROM customers where C_id='$c_id'");
                            $cusdata = mysqli_fetch_assoc($getcustomer);

                         ?><tr>
                            <td><?php echo $order['orderid']; ?></td>
                            <td>
                              <p style="display: none;"><?php echo $order['shippingnumber']; ?></p>
                              <input type="text" id="<?php echo $order['orderid']; ?>" value="<?php echo $order['shippingnumber']; ?>" placeholder="Shipping Number">

                              <button class="btn btn-info shippingsavebtn" title="Save Shipping number" id='<?php echo $order['orderid']; ?>'
                                  ><i class="fa fa-save"></i></button>
                              <button class="btn printbtn" title="Print order" id='<?php echo $order['orderid']; ?>'
                                  ><i class="fa fa-print"></i></button>

                              <input type="text" placeholder="add coupon" id="<?php echo $order['orderid']."coupon"; ?>">

                              <button class="btn btn-success admincoupon" title="Save Shipping number" id='<?php echo $order['orderid']; ?>'
                                  >Add Coupon
                                </button>

                            </td>
                            <td><?php echo $cusdata['C_id']; ?></td>
                            <td><?php echo $cusdata['Fname']; ?></td>
                            <td><?php echo $cusdata['Address']; ?></td>
                            <td><?php echo $cusdata['phone']; ?></td>
                            <td><?php echo $order['ordertype']; ?></td>
                            <td><?php echo $order['shipType']; ?></td>
                            <td><b><?php echo $order['couponcode']; ?></b></td>
                            <td>$<?php echo $order['discount']; ?></td>
                            <td>$
                              <input type="number" id='<?php echo $order['orderid']."total"; ?>'  style="width: 100px;"  value="<?php echo $order['total']; ?>">
                              <button class="btn btn-info updatetotalbtn" title="Save Total amount" id='<?php echo $order['orderid']; ?>' ><i class="fa fa-save"></i></button>

                            </td>
                            <td><?php echo $order['date']; ?></td>
                            <td><b><?php echo $order['status']; ?></b></td>

                            
                            
                            <td>
                              <button class="btn btn-info viewbtn" title="View order Details"id='<?php echo $order['orderid']; ?>'
                                  ><i class="fa fa-eye"></i></button>

                                  <button class="btn btn-success paybtn" title="Change Status to Paid" id='<?php echo $order['orderid']; ?>'
                                  ><i class="fa fa-check-circle"></i></button> 

                                  <button class="btn btn-success emailbtn" title="send email to customer with order details" id='<?php echo $order['orderid']; ?>'
                                  data-toggle="modal" data-target="#emailmodal">
                                  <i class="fa fa-envelope"></i>
                                </button>                               

                                  <button class="btn btn-danger delbtn" title="delete order" id='<?php echo $order['orderid']; ?>'
                                  ><i class="fa fa-trash"></i></button>
                                  
                            </td>
                            
                            <!-- data-toggle="modal" data-target=#myModal -->

                          </tr>
                          <?php 
                            }
                            
                           ?>

                           <script type="text/javascript">
                            $(document).ready(function(){
                              $('.viewbtn').click(function(){
                                  var id=$(this).attr('id');
                                  $.ajax({
                                  url:"getorder.php",
                                  method:"post",
                                  data:{oid:id},
                                  success:function(data){
                                    $("#orderdetail").html(data);
                                    $("#myModal").modal();
                                  }
                                });//ajax   
                              });//click


                              $('.paybtn').click(function(){
                                  var id=$(this).attr('id');
                                  $.ajax({
                                  url:"getorder.php",
                                  method:"post",
                                  data:{payid:id},
                                  success:function(data){
                                    swal("Order Paid!")
                                    .then((value) => {
                                      location.reload();
                                      
                                    });
                                  }
                                });//ajax   
                              });//click
                              var emailBtnid;
                              $('.emailbtn').click(function(){
                                  emailBtnid=$(this).attr('id');
                                  // alert(emailBtnid);
                                  
                              });//click

                              $('.emailbtninmodal').click(function(){
                                var id=emailBtnid;

                                  // var id=$(this).attr('id');
                                  var msg=$('.emailmsg').val();

                                  $.ajax({
                                  url:"getorder.php",
                                  method:"post",
                                  cache:false,
                                  data:{cusemailorderid:id, emailmsg:msg},
                                  success:function(data){
                                    // alert(data);
                                    if(data=="yes"){
                                      swal("Email sent to Customer!")
                                      .then((value) => {
                                        // location.reload();
                                        
                                      });
                                    }else{
                                      alert('Error in mail Server!')
                                    }

                                  }
                                });//ajax   
                              });//click





                              $('.shippingsavebtn').click(function(){
                                  // var shippingnumber=$("input[name='shippingnumber']").val();
                                  var id=$(this).attr('id');
                                  var shippingnumber=document.getElementById(id).value;
                                  // alert(shippingnumber);
                                  $.ajax({
                                  url:"getorder.php",
                                  method:"post",
                                  cache:false,
                                  data:{shippingnumber:shippingnumber,oid:id},
                                  success:function(data){
                                    swal("Shipping Number Updated!")
                                    .then((value) => {
                                      location.reload();
                                      
                                    });
                                  }
                                });//ajax   
                              });//click

                              $('.updatetotalbtn').click(function(){
                                  // var shippingnumber=$("input[name='shippingnumber']").val();
                                  var id=$(this).attr('id');
                                  var id1=id+"total";
                                  var newtotalamount=document.getElementById(id1).value;
                                  // alert(newtotalamount);
                                  $.ajax({
                                  url:"getorder.php",
                                  method:"post",
                                  data:{newtotalamount:newtotalamount,oid4:id},
                                  success:function(data){
                                    // alert(data);
                                    if(data=="yes"){
                                      swal("new total amount Updated!")
                                      .then((value) => {
                                        location.reload();
                                        
                                      });
                                    }else{
                                      alert('Error while updating total amount!');
                                    }
                                  }
                                });//ajax   
                              });//click


                              $('.printbtn').click(function(){
                                  // var shippingnumber=$("input[name='shippingnumber']").val();
                                  var id=$(this).attr('id');
                                  
                                  // alert(shippingnumber);
                                  $.ajax({
                                  url:"getorder.php",
                                  method:"post",
                                  data:{printid:id},
                                  success:function(data){
                                    // swal(data)
                                    // .then((value) => {
                                    //   // location.reload();
                                      
                                    // });
                                    var mywindow = window.open('', 'PRINT');
                                    mywindow.document.write('<html><head><title>Order Details</title>');
                                    mywindow.document.write('</head><body >');
                                    // mywindow.document.write('<h1 class="text-center">SecureKratom</h1>');
                                    mywindow.document.write('<div style="font-size:25px;">'+data+'</div>');
                                    mywindow.document.write('</body></html>');

                                    mywindow.document.close(); // necessary for IE >= 10
                                    mywindow.focus(); // necessary for IE >= 10*/

                                    mywindow.print();
                                    mywindow.close();

                                  }
                                });//ajax   
                              });//click



                               $('.delbtn').click(function(){
                                  var id=$(this).attr('id');
                                  $.ajax({
                                  url:"getorder.php",
                                  method:"post",
                                  data:{delorder:id},
                                  success:function(data){
                                    swal("Order deleted!")
                                    .then((value) => {
                                      location.reload();
                                      
                                    });
                                  }
                                });//ajax
                                  
                              });//click

                               $('.admincoupon').click(function(){
                                  var id=$(this).attr('id');
                                  var id1=id+"coupon";
                                  var couponcode=document.getElementById(id1).value;
                                  
                                  $.ajax({
                                  url:"getorder.php",
                                  method:"post",
                                  cache: false,
                                  data:{admincoupon:'yes', adminoid:id,couponcode:couponcode},
                                  success:function(data){
                                    // alert(data);
                                    if(data=='yes'){
                                      // alert(data);
                                      swal("Coupon added!")
                                      .then((value) => {
                                        location.reload();
                                        
                                      });
                                    }
                                  }
                                });//ajax
                                  
                              });//click

                            });//ducoment
                             
                           </script>
                      
                      </tbody>
                      <!-- <tfoot>
                      <tr>
                          <th style="display: none;">orderID</th>
                          <th>Shipping#</th>
                          <th style="display: none;">C_ID</th>
                          <th style="display: none;">C_Name</th>
                          <th style="display: none;">C_Address</th>
                          <th style="display: none;">C_phone</th>
                          <th style="display: none;">OrderType</th>
                          <th style="display: none;">ShipVia</th>
                          <th style="display: none;">Total</th>
                          <th style="display: none;">Date</th>
                          <th>Status</th>
                          <th style="display: none;">Action</th>
                      </tr>
                  </tfoot> -->
                    </table>
                  </div>
                </div>
              </div>
            </div>            
          </div>
        </div>
      </div>
<!-- order data in modal -->
<!-- Modal -->
<style type="text/css">

  table {
  border-collapse: collapse;
}
table td {
  border: 1px solid black; 
}

</style>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="orderdetail">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<!-- email modal -->
<div class="modal fade" id="emailmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <label>Message</label><br>
          <textarea  class="emailmsg" rows="7"></textarea>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary emailbtninmodal">Send</button>
      </div>
    </div>
  </div>
</div>
<!--email modal ends here -->
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
  <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
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
 
  </script>
  <style type="text/css">
    .sidebar li.active > a{
      background-color:  #fb2056 !important;
    }
     .card-header-primary{
      background: linear-gradient(60deg, #fb2056, #bf002f) !important;
    }
    .btn.btn-primary{
      background-color: #fb2056;
    }
    .btn.btn-primary:hover{
      background-color: #fb2056;

    }
    .dropdown-menu .dropdown-item:hover{
      background-color: #bf002f;
    }
    .form-control, .is-focused .form-control {
    background-image: linear-gradient(to top, #bf002f 2px, rgba(156, 39, 176, 0) 2px), linear-gradient(to top, #bf002f 1px, rgba(210, 210, 210, 0) 1px);
    }
  </style>

</body>

</html>
