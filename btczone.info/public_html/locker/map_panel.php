<!DOCTYPE html>
<html>
<head>
	<title>Locations Panel</title>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/map.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

	<?php 
	include 'map_connection.php';
	
	
	if(isset($_POST['add'])){
		$con = connecttoDB();
		$name = $_POST['name'];
		$link = $_POST['link'];
		$lat = $_POST['lat'];
		$longi = $_POST['longi'];
		$color = $_POST['color'];
		if(!$con){
			?>
			<script type="text/javascript">
				swal("Database Error!", "Database not connected!", "error");
			</script>
			<?php 
			return;
		}

		$insertLocationQuery = "INSERT INTO locations(Pname,Plink , lat,longi,color)VALUES ('$name', '$link', '$lat','$longi','$color')";
		if(mysqli_query($con,$insertLocationQuery)){
			?>
			<script type="text/javascript">
				swal({
					title: "Location Inserted!",
					icon: "success",
					button: "Done",
				});
			</script>
			<?php
		}
		mysqli_close($con);
	}

	?>
	<div class="container jumbotron" id="maindiv">
		<h1>Add New Location</h1>
		
		<form method="POST" action="">
			<div class="form-group">

				<label><b>Location Title</b></label>
				<input type="text" class="form-control" placeholder="location Title/Name" required name="name">
				<small class="form-text text-muted">Enter Name, Title or details of location</small>
			</div>
			<div class="form-group">
				<label ><b>Latitude</b></label>
				<input type="text" class="form-control" placeholder="Latitude" required name="lat">
				<small class="form-text text-muted">Enter Latitude of location</small>
			</div>
			<div class="form-group">
				<label ><b>Logitude</b></label>
				<input type="text" class="form-control" placeholder="Logitude" required name="longi">
				<small class="form-text text-muted">Enter Logitude of location</small>
			</div>
			<div class="form-group">
				<label ><b>Link</b></label>
				<input type="text" class="form-control" placeholder="Link" required name="link">
				<small class="form-text text-muted">Enter Link for location</small>
			</div>
			<div class="form-group">
				<label ><b>Color</b></label>
				<select class="browser-default custom-select" required name="color">
				  
				  <option value="1">Black</option>
				  <option value="2">Yellow</option>
				  <option value="3">Green</option>
				  <option value="4">Pink</option>
				  <option value="5">Blue</option>
				</select>
				<small class="form-text text-muted">Select Color for marker</small>
			</div>

			<button type="submit" class="btn btn-success" name="add"><b>Add Location</b></button>
		</form>

		<button class="btn btn-info" id="editlocationbtn" onclick="window.location.href='Locations.php'"><b>Edit Locations</b></button>
	</div>
</body>
</html>