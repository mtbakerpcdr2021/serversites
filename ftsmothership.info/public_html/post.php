<!DOCTYPE html>
<html>
<head>
  <title>MotherShip Updates</title>
</head>
<body  class="index-page sidebar-collapse">
  <!-- navbar -->
  <?php
   include "navbar.php"; 
     include 'connection.php';
  $con = connecttoDB();
        if(isset($_GET['p_id']) ){  

          $p_id=$_GET['p_id'];   
          $post = mysqli_query($con, "SELECT * FROM posts where p_id='$p_id'"); 
          $row = mysqli_fetch_array($post);


            
        }else{
          return;
        }

  ?>
  <br><br><br><br>
  <div class="wrapper">


<!--     <div class="page-header page-header-small">
        <div class="page-header-image" data-parallax="true" style="background-image:url('./assets/img/8.jpg');">
        </div>
        <div class="container">
          <div class="content-center2">
            
            <h1 class="h1-seo">MotherShip Updates</h1>
            <h3>Little Description here</h3>
          </div>
          
        </div>
      </div> -->
      <div class="container" style="margin-top: 30px;">
          <div class="row">
            
            <!-- <div class="col-md-12 ml-auto mr-auto text-center"  style="height: 500px;"> -->
             
                <!-- here -->
                <main class="post blog-post col-lg-8"> 
                  <div class="container">
                    <div class="post-single">
                      <div class="post-thumbnail"><img src="<?php echo "assets/postimages/".$row['p_img']; ?>" alt="..." class="img-fluid"></div>
                      <div class="post-details">
                       
                        <h1 style="color: #444;"><?php echo $row['p_heading']; ?></h1>
                        <div class="post-footer d-flex align-items-center flex-column flex-sm-row">
                          <!-- <a href="#" class="author d-flex align-items-center flex-wrap"> -->
                            
                           
                          <div class="date meta-last" style="color: #999;"><i class="fas fa-clock"></i> <?php echo $row['date']; ?></div>

                        </div>
                        <br>
                        <div class="post-body">
                          
                            <?php echo $row['p_shortdesc']; ?>
                          
                            <?php echo $row['p_desc']; ?>
                          
                        </div>
                        
                       
                        
                      
                      </div>
                    </div>
                  </div>
                </main>
            <aside class="col-lg-4">

          <!-- Widget [Latest Posts Widget]        -->
          <div class="widget latest-posts" style="margin-bottom: 40px;
    padding: 30px;
    border: 1px solid #eee;">
            <header>
              <h3 class="h6">Latest Posts</h3>
            </header>

            <?php 
              $post = mysqli_query($con, "SELECT * FROM posts ORDER BY p_id DESC LIMIT 3"); 
              while ($row = mysqli_fetch_array($post)) {
            ?>
            <div class="blog-posts" >
              <a href="post.php?p_id=<?php echo $row['p_id']; ?>">
                <div class="item d-flex align-items-center">
                  <div class="image" style="min-width: 60px; max-width: 60px;">

            <img src="<?php echo "assets/postimages/".$row['p_img']; ?>" class="img-fluid" >

          </div>

                  <div class="" style="margin-left: 10px; color: #555; margin-top: 5px;"><strong>
                    <?php echo $row['p_heading']; ?></strong>
                      <div class="post-meta d-flex justify-content-between">
                      <div class="date meta-last"><i class="fas fa-clock"> </i><?php echo " ".$row['date']; ?></div>
                      
                    </div>
                  </div>
                </div>
              </a>
            </div>
          <?php } ?>

          </div>

        </aside>

                <!-- here -->

            <!-- </div> -->

              
          </div>
          

      </div>


    <?php include "footer.php"; ?>
  </div>
<!-- wraper div main -->


<style type="text/css">
  a:hover, a:focus {
    color: #555;
}

a:hover {
    color: #555;
    text-decoration: underline;
}
.navbar.navbar-transparent {
    background-color: #c49e55f0  !important;
    }
</style>

</body>
</html>