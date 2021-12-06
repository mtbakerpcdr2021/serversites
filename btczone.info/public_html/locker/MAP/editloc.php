<!DOCTYPE html>
<html>
<head>
	<title>Edit Location</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/map.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<?php 
		if(isset($_GET['id']) ){  
			
			$id=$_GET['id'];   
			include 'map_connection.php';
			$con = connecttoDB();
			$query = mysqli_query($con, "SELECT * FROM locations where id=$id");  
			
		  	$result=mysqli_fetch_assoc($query);
		  	

		}else{
			header("Location:Locations.php");
		}


		if(isset($_POST['update'])){

			$con = connecttoDB();
			$name = $_POST['name'];
			$link = $_POST['link'];
    		$lat = $_POST['lat'];
    		$longi = $_POST['longi'];
    		$color = $_POST['color'];
    		
			$updateLocationQuery = "UPDATE locations SET Pname='$name',Plink='$link',lat='$lat',longi='$longi',color='$color' WHERE id='$id'";
			
			if(mysqli_query($con,$updateLocationQuery)){
				?>
				<script type="text/javascript">
						swal("Location Updated!", "Done", "success")
						.then((value) => {
						  window.location.href='Locations.php'
						});

				</script>
				<?php
			}
			mysqli_close($con);
		}
	 ?>
	<div class="container jumbotron" id="maindiv">
		<h1>Edit Location</h1>
		<form method="POST" action="">
			  <div class="form-group">

			    <label><b>Location Title</b></label>
			    <input type="text" class="form-control" placeholder="location Title/Name" required name="name" 
			    value=<?php echo $result['Pname']; ?>>
			    
			  </div>
			  <div class="form-group">
			    <label ><b>Latitude</b></label>
			    <input type="text" class="form-control" placeholder="Latitude" required name="lat"
			    value=<?php echo $result['lat']; ?>>
			    
			  </div>
			  <div class="form-group">
			    <label ><b>Logitude</b></label>
			    <input type="text" class="form-control" placeholder="Logitude" required name="longi"
			    value=<?php echo $result['longi']; ?>>
			    
			  </div>
			  <div class="form-group">
			    <label ><b>Link</b></label>
			    <input type="text" class="form-control" placeholder="Link" required name="link" 
			    value=<?php echo $result['Plink']; ?>
			    	>
			    
			  </div>
			  	<div class="form-group">
				<label ><b>Color</b></label>
				<select class="browser-default custom-select" required name="color">
				  
				  <option value="1" <?php if($result['color']==1) echo 'selected="selected"'; ?>>Black</option>
				  <option value="2" <?php if($result['color']==2) echo 'selected="selected"'; ?>>Yellow</option>
				  <option value="3" <?php if($result['color']==3) echo 'selected="selected"'; ?>>Green</option>
				  <option value="4" <?php if($result['color']==4) echo 'selected="selected"'; ?>>Pink</option>
				  <option value="5" <?php if($result['color']==5) echo 'selected="selected"'; ?>>Blue</option>
				</select>
			</div>

			  <button type="submit" class="btn btn-success" name="update"><b>Update Location</b></button>
		</form>
		<button class="btn btn-info" id="editlocationbtn" onclick="window.location.href='Locations.php'"><b>Back</b></button>
	</div>
</body>
</html>