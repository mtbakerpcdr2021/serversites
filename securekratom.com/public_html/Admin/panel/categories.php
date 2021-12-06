

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    All Categories
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

  <script>
             // Call the dataTables jQuery plugin
             $(document).ready(function() {

               $('#mytable').dataTable({
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": true,
                "bInfo": true,
                "bAutoWidth": false,


              });

             });
           </script>

         </head>
         <?php 
         session_start();
         include '../../connection.php';
         $con = connecttoDB();
         if(!isset($_SESSION['AdminloggedIn'])){
          header("Location:../adminlogin/adminlogin.php");
        }


        if(isset($_GET['delid']) ){  

          $id=$_GET['delid'];   
          $del ="DELETE FROM categories WHERE c_id = $id";

          $delfromcarts="DELETE FROM products WHERE category_id = $id";
          mysqli_query($con, $delfromcarts);

          if($result = mysqli_query($con, $del)){  
            ?>
            <script>
              $(document).ready(function() { swal('Deleted!', 'Category has been Deleted.', 'success');  });


            </script>";
            <?php
          }    
        }
        if(isset($_GET['productid']) ){  

          $id=$_GET['productid'];   
          $disable ="update products set status='disable' WHERE id = $id";

          if($result = mysqli_query($con, $disable)){  
            ?>
            <script>
              $(document).ready(function() { swal('Disabled!', 'The Product has been Disabled.', 'success');  });
            </script>";
            <?php
          }    
        }

        if(isset($_GET['productida']) ){  

          $id=$_GET['productida'];   
          $active ="update products set status='available' WHERE id = $id";

          if($result = mysqli_query($con, $active)){  
            ?>
            <script>
              $(document).ready(function() { swal('Activated!', 'The Product has been Activated.', 'success');  });
            </script>";
            <?php
          }    
        }

    //
        if(isset($_GET['editid']) ){  


          $id=$_GET['editid'];   

          $selectproduct=mysqli_query($con, "SELECT * FROM categories where c_id='$id'");
          $editproductdetails = mysqli_fetch_assoc($selectproduct);
          ?>
          <script type="text/javascript">
            $(document).ready(function() {

             document.getElementById("mdclick").click();
           });
         </script>
         <?php 
       }


       ?>

       <body class="">
        <div class="wrapper ">
          <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">

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
        <li class="nav-item ">
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
          <li class="nav-item active">
            <a class="nav-link" href="categories.php">
              <i class="material-icons">content_paste</i>
              <p>All Categories</p>
            </a>
          </li>
        <li class="nav-item ">
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
              <h4 class="card-title ">Products</h4>
              <p class="card-category"> All products</p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="mytable">
                  <thead class=" text-primary">
                    <th>
                      Category ID
                    </th>
                    <th>
                      Category Name
                    </th>
                    <th>
                      Available Weight(OZ)
                    </th>
                    <th>
                      Disable Weight(OZ)
                    </th>
                    <th>
                      Re-stock Alert Weight(OZ)
                    </th>
                    <th>
                      Action
                    </th>


                  </thead>
                  <tbody>
                    <?php 
                    $query = mysqli_query($con, "SELECT * FROM categories");
                    while($categories = mysqli_fetch_assoc($query)){

                     ?><tr>
                      <td><?php echo $categories['c_id']; ?></td>
                      <td><?php echo $categories['c_name']; ?></td>
                      <td><?php echo $categories['c_availableweight']; ?></td>
                      <td><?php echo $categories['cat_disableweight']; ?></td>
                      <td><?php echo $categories['cat_restockweight']; ?></td>
                      

                      <td>
                        


                            <button class="btn btn-danger" id='<?php echo $categories['c_id']; ?>'
                              onClick="deletecategory(this.id)" title="deleting category will delete all products of that category as well"><i class="fa fa-trash"></i></button>

                              <button class="btn btn-success editcategory" id='<?php echo $categories['c_id']; ?>' title="Edit Product"><i class="fa fa-edit"></i></button>

                            </td>
                          </tr>
                          <?php 
                        }

                        ?>
                        <script type="text/javascript">
                          function deletecategory(id){
                            window.location.href="categories.php?delid="+id;

                          }
                          
                          $('.editcategory').click(function(){
                            var id=$(this).attr('id');
                            window.location.href="categories.php?editid="+id;
                              });//click
                            </script>

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>            
              </div>
            </div>
          </div>
          <!-- Modal -->
          <button data-toggle="modal" data-target="#exampleModal" style="display: none;" id="mdclick">a</button>


          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Product Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row register-form">
                    <div class="col-md-6">
                      <form action="categories.php" method="post">
                        <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" class="form-control"  name="c_name" required value='<?php echo $editproductdetails['c_name'] ?>'/>
                        </div>
                        <div class="form-group">
                          <label>Available weight(OZ)</label>
                          <input type="number" class="form-control"  name="c_availableweight" required value='<?php echo $editproductdetails['c_availableweight'] ?>'/>
                           <input hidden type="number" class="form-control"  name="c_id" required value='<?php echo $editproductdetails['c_id'] ?>'/>
                        </div>
                        <div class="form-group">
                          <label>Product Disable Weight(OZ)</label>
                          <input type="text" class="form-control"  name="cat_disableweight" required value='<?php echo $editproductdetails['cat_disableweight'] ?>'/>
                        </div>
                        <div class="form-group">
                          <label>Re-Stock Alert Weight(OZ)</label>
                          <input type="text" class="form-control"  name="cat_restockweight" required value='<?php echo $editproductdetails['cat_restockweight'] ?>'/>
                        </div>
                        
                      </div>
                     


                    </div>
                  </div>
                  <!-- </div> -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="updatecategory">Update</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
<?php 
  if(isset($_POST['updatecategory'])){
    $c_id=$_POST['c_id'];
    $c_name=$_POST['c_name'];
    $c_availableweight=$_POST['c_availableweight'];
    $cat_disableweight=$_POST['cat_disableweight'];
    $cat_restockweight=$_POST['cat_restockweight'];
    

    $updateproduct ="update categories set c_name='$c_name', c_availableweight='$c_availableweight',cat_disableweight='$cat_disableweight',
    cat_restockweight='$cat_restockweight' WHERE c_id = $c_id";

          if($result = mysqli_query($con, $updateproduct)){  
            ?>
            <script>
              $(document).ready(function() { 

                swal("Category updated successfully!")
                .then((value) => {
                  // swal(`The returned value is: ${value}`);
                  window.location.href="categories.php";
                });
              });
            </script>";
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
