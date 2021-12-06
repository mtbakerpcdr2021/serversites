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


	?>
	<div class="wrapper">


		<div class="page-header page-header-small">
	      <div class="page-header-image" data-parallax="true" style="background-image:url('./assets/img/8.jpg');">
	      </div>
	      <div class="container">
	        <div class="content-center2">
	          <!-- <img class="n-logo" src="./assets/img/now-logo.png" alt="LOGO"> -->
	          <h1 class="h1-seo">MotherShip Updates</h1>
	          <h3>Come here for the latest FTS public news releases!</h3>
	        </div>
	        
	      </div>
	    </div>
	    <div class="container" style="margin-top: 30px;">
	        <div class="row">
            
	          <!-- <div class="col-md-12 ml-auto mr-auto text-center"  style="height: 500px;"> -->
             
	          		<!-- here -->
	          			        <main class="posts-listing col-lg-8"> 
						          <div class="container">
						            <div class="row">
						              <?php 

						                $post = mysqli_query($con, "SELECT * FROM posts ORDER BY p_id DESC"); 
						              while ($row = mysqli_fetch_array($post)) {
						               ?>
						              <!-- post -->
						              <div class="post col-xl-6">
						                <div class="post-thumbnail"><a href="post.php?p_id=<?php echo $row['p_id']; ?>">
						                  <img src="<?php echo "assets/postimages/".$row['p_img'].""; ?>" class="img-fluid"></a></div>
						                <div class="post-details">
						                  <div class="post-meta d-flex justify-content-between" style="color: #555; margin-top: 5px;">
						                    <div class="date meta-last"><i class="fas fa-clock"></i><?php echo $row['date']; ?></div>
						                    
						                  </div>
						                  <a style="color: black;" href="post.php?p_id=<?php echo $row['p_id']; ?>">
						                    	<h3 class="h4" style="margin-top: 5px; color: black; text-align: center;">
						                    		<?php echo $row['p_heading']; ?></h3>
						                 	 	<p class="" style="color: black;"><?php echo $row['p_shortdesc']; ?></p>
						              		</a>

						                  
						                </div>
						              </div>
						              <?php
						                 }
						               ?>
						             
						              
						            </div>
						            <!-- Pagination -->
						           <!--  <nav aria-label="Page navigation example">
						              <ul class="pagination pagination-template d-flex justify-content-center">
						                <li class="page-item"><a href="#" class="page-link"> <i class="fa fa-angle-left"></i></a></li>
						                <li class="page-item"><a href="#" class="page-link active">1</a></li>
						                <li class="page-item"><a href="#" class="page-link">2</a></li>
						                <li class="page-item"><a href="#" class="page-link">3</a></li>
						                <li class="page-item"><a href="#" class="page-link"> <i class="fa fa-angle-right"></i></a></li>
						              </ul>
						            </nav> -->
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
</style>

</body>
</html>
