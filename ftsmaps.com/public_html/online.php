<!DOCTYPE html>
<html  >
<head>
  <!-- Site made with Mobirise Website Builder v4.10.1, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.10.1, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logoloadingpage-128x170.png" type="image/x-icon">
  <meta name="description" content="">
  
  <title>Online Businesses</title>
  <link rel="stylesheet" href="assets/bootstrap-material-design-font/css/material.css">
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/soundcloud-plugin/style.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
</head>
<body>

<style>.topnav {
  background-color:  #d0fffd ;
  overflow: hidden;}.topnav a {
  display: inline-block;
  text-align: center;
  list-style: none;
  color: #333;
  padding: 8px;
  text-decoration: none;
  font-size: 25px;
}.topnav a:hover {
  background-color: #ddd;
  color: black;
}.topnav a.active {
  background-color: #4CAF50;
  color: white;
}</style>
 <div class="topnav"><center>
  <a href="submit.php">Submit Business</a>
  <a href="online.php">Online Businesses</a>
  <a href="contact.php">Contact</a>
  <a href="maps.php">StoreFront Businesses</a>
</div>
                    
                </div>
            </div>
        </div>
    </div>
	<title>Search business</title>
		<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>
<body>
	<script type="text/javascript">
		 $(document).ready(function() {
		 // $('#mytable').DataTable();
		 $('#mytable').DataTable( {
		        "order": [["desc" ]]
		    } );

            });
	</script>
	<?php 
	include 'connection.php';
	$query="1";
	/////selecting categories
	$con = connecttoDB();		
	if(!$con){
		?>
		<script type="text/javascript">
			swal("Database Error!", "Database not connected!", "error");
		</script>
		<?php 
		return;
	}else{

		$categoryquery = mysqli_query($con, "SELECT category FROM dropdown where category != '1'"); 

		$cryptoquery = mysqli_query($con, "SELECT cryptotype FROM dropdown where cryptotype != '1'"); 
	}
	///
	if(isset($_POST['SearchBusiness'])){
		
		$name = $_POST['name'];
		$crypto = $_POST['crypto'];
		$type = $_POST['businesstype'];
		
		if(!$con){
			?>
			<script type="text/javascript">
				swal("Database Error!", "Database not connected!", "error");
			</script>
			<?php 
			return;
		}

		//conditions to run appropriate query
		if($name==""){
			if($crypto=="1"){
				if($type=="1"){
					// echo "all empty";
					?>
					<script type="text/javascript">
						swal("Error!", "Enter Atleast One Field!", "error");
					</script>
					<?php 
				}else{
					// echo "type selected";
					$query = mysqli_query($con, "SELECT * FROM businessdata where category='$type' ORDER BY attop DESC");

				}
			}else{
				if($type=="1"){

					// echo "only crypto selected";
					if($crypto=="all"){
						$query = mysqli_query($con, "SELECT * FROM businessdata ORDER BY attop DESC");
					}else{
						$query = mysqli_query($con, "SELECT * FROM businessdata where cryptotype='$crypto'  ORDER BY attop DESC");
					}
				}else{
					// echo "crypto and type selected";
					if($crypto=="all"){
						$query = mysqli_query($con, "SELECT * FROM businessdata where category='$type' ORDER BY attop DESC");
					}else{
						$query = mysqli_query($con, "SELECT * FROM businessdata where category='$type' and cryptotype='$crypto' ORDER BY attop DESC");
					}
				}
			}
			// echo "name is empty";
		}else if($crypto=="1"){
			//name is always selected here
			if($type=="1"){
				// echo "name  only";
				$query = mysqli_query($con, "SELECT * FROM businessdata where businessname='$name' ORDER BY attop DESC");
			}else{
				// echo "name and type";
				$query = mysqli_query($con, "SELECT * FROM businessdata where category='$type' and businessname='$name' ORDER BY attop DESC");
			}


		}else if($type=="1"){
			// name and cryptp selected
			// echo "name and crypto selected";
			$query = mysqli_query($con, "SELECT * FROM businessdata where businessname='$name' and cryptotype='$crypto' ORDER BY attop DESC");
		}else{
			// echo "all are selected";
			if($crypto=="all"){
				$query = mysqli_query($con, "SELECT * FROM businessdata where businessname='$name' and category='$type' ORDER BY attop DESC");
			}else{
				$query = mysqli_query($con, "SELECT * FROM businessdata where businessname='$name' and cryptotype='$cryptotype' and category='$type' ORDER BY attop DESC");
			}
		}
		
	}

	?>
	

	<div class="container jumbotron" id="upperdiv">
		<h1>Search business</h1>
		<form method="POST" action="">
			<div class="form-group">

				<label><b>Business Name</b></label>
				<input type="text" class="form-control" placeholder="Title/Name" name="name">
				<small class="form-text text-muted">Enter Name/Title</small>
			</div>
			<div class="form-group">
				<label ><b>Crypto Type</b></label>
				<select class="browser-default custom-select" name="crypto">

					<option selected value="1">---Select Crypto---</option>
					<option  value="all">All</option>
					<?php 
					while($result = mysqli_fetch_array($cryptoquery)){
						// if($result['cryptotype']==""){
						// 	continue;

						// }
						?>
						<option value="<?php echo $result['cryptotype']; ?>"><?php echo $result['cryptotype']; ?></option>
						<?php
					}
					?>



				</select>
			</div>
			<small class="form-text text-muted">Select crypto Type for business</small>
			<div class="form-group">
				<label ><b>Business Category</b></label>
				<select class="browser-default custom-select" name="businesstype">
					<option selected value="1">---select type---</option>
					<?php 
					while($result = mysqli_fetch_assoc($categoryquery)){
						// if($result['category']==""){
						// 	continue;

						// }
						?>
						<option value="<?php echo $result['category']; ?>"><?php echo $result['category']; ?></option>
						<?php
					}
					?>



				</select>
				<small class="form-text text-muted">Select Type for business</small>
			</div>
			<button type="submit" class="btn btn-success" name="SearchBusiness"><b>Search Business</b></button>
		</form>

	</div>

<?php 
		if($query!="1"){
			if(mysqli_num_rows($query) > 0){

			
	 ?>
	 <script type="text/javascript">

	 	document.getElementById('upperdiv').classList.add('d-none');
	 </script>
	<div class="container jumbotron" id="maindiv1">
		<h1>Search Results</h1>
		<br>
		<table class="table table-bordered table-striped" id="mytable">
			<thead>
				<tr>
					<th scope="col">Name</th>
					<th scope="col">Url</th>
					<th scope="col">Category</th>
					<th scope="col">Crypto</th>
					
				</tr>

			</thead>
			<tbody>
				<?php 
					$namecheck="";
					while($businesses = mysqli_fetch_assoc($query)){

						if($namecheck==$businesses['businessname']){
							continue;
						}
						$namecheck=$businesses['businessname'];
						
				 ?>
				<tr>
					<?php 
					if($businesses['color']=="1"){
						?>
						<td style="color:black;"><b><?php echo $businesses['businessname']; ?></b></td>
						<?php
					}else if($businesses['color']=="2"){
						?>
						<td style="color:green;"><b><?php echo $businesses['businessname']; ?></b></td>
						<?php
					}else if($businesses['color']=="3"){
						?>
						<td style="color:blue;"><b><?php echo $businesses['businessname']; ?></b></td>
						<?php
					}else if($businesses['color']=="4"){
						?>
						<td style="color:red;"><b><?php echo $businesses['businessname']; ?></b></td>
						<?php
					}else{
						?>
						<td style="color:black;"><b><?php echo $businesses['businessname']; ?></b></td>
						<?php
					}
						 ?>
					
					<td><a href="<?php echo $businesses['url']; ?>"><?php echo $businesses['url']; ?></a></td>
					<td><?php echo $businesses['category']; ?></td>


					<?php 
					$query3 = mysqli_query($con, "SELECT cryptotype FROM businessdata where businessname='$namecheck'");
					$cryptotypes1="";
					while($cryptotypes = mysqli_fetch_assoc($query3)){
						$cryptotypes1=$cryptotypes1.$cryptotypes['cryptotype'].", ";

					}
					$cryptotypes1=rtrim($cryptotypes1,', ');

					?>
					<td><?php echo $cryptotypes1; ?></td>

				</tr>
				<?php 
					}
					
					
				 ?>

			</tbody>
		</table>
		<button class="btn btn-info" style="margin-left: 0px;" onClick="newsearch()">New Search</button>
	</div>
	<?php 
		}//table div condition
		else{
			?>
			<script type="text/javascript">
				swal("Error!", "No results found", "error");
			</script>
			<?php 
		}
	}
	 ?>
	
<script type="text/javascript">
	function newsearch(){
		$("#upperdiv").removeClass("d-none");
		// document.getElementById('upperdiv').classList.removeClass('d-none');
	}
</script><style type="text/css"> body{ background-color: #e9ecef !important; } </style>
</div>
  </script>
<body><html>
<head>
	<title>Ads</title>
</head>
<body>
	<div class="row" style="width: 100%;">
			<div style="width: 300px; margin:auto; ">
				<center><p style="color: black;"> Paid Advertising</p></center>
				<!-- don't change anything is that below line -->
				<a href="#" target="_blank" id="adlink"><img src="images/1.png" class="img-fluid" id="adImg"></a>
			</div>
		</div>

		<!-- the script below shows the ads randomly -->
		<script type="text/javascript">
			//ads/images should be named as 1,2,3,4,5 and must be png files
			//enter this number which you've maximum number of ads
			var maxImgNumber=4;


			var img=getRandomArbitrary(1,maxImgNumber);

			//if you put images in some other named folder replace "images" in below line with that folder name
			var src="images/"+img+".png"; 


			//links, put each link respectively, like for 1.png, link at first place, for second ad put link at second place
			var links = ['https://projectfts.org/',  // for 1.png
						'https://www.wwwforcrypto.com/',  // for 2.png 
						'https://cypherwarrior.com/', //for 3.png
						'https://www.notebc.com/'];		//for 4.png
						//'https://www.projectfts.org/'];	//for 5.png and so on



			document.getElementById("adImg").src=src; //setting image
			document.getElementById("adlink").href=links[img-1]; //setting image link, respectively


			//returning a random number within range
			function getRandomArbitrary(min, max) {
				max=max+1;
			  return Math.floor(Math.random() * (max - min) + min);
			}
		</script>

          
                <center><h5 class="pb-3 column-title display-5"><a href="upgrade.html" class="text-info">
                    ADVERTISE WITH US</a></h5>
                <div class="contact-list display-7">
                    
                    
             
                        
                        <p>Copyright 2019 Mt. Baker PC Dr. 
<br> Project Fair Trade System- All Rights Reserved</p></center>
                   
                        
                       
                    </div></div>
            </div>
            
            
        </div>

        
    </div>
</section>


  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/theme/js/script.js"></script>

  
  

</body>
</html>
