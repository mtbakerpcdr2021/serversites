<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Business Enteries</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body><?php 
	include 'connection.php';
	
	
	if(isset($_POST['addbusiness'])){
		$con = connecttoDB();
		$name = $_POST['name'];
		$link = $_POST['link'];
		$crypto = $_POST['crypto'];
		$type = $_POST['businesstype'];
		$color= $_POST['colorno'];
		$attop= $_POST['attop'];
		
		if(!$con){
			?>
			<script type="text/javascript">
				swal("Database Error!", "Database not connected!", "error");
			</script>
			<?php 
			return;
		}

		$insertQuery = "INSERT INTO businessdata(cryptotype,businessname,category,url,color,attop)VALUES ('$crypto', '$name', '$type','$link','$color','$attop')";
		if(mysqli_query($con,$insertQuery)){
			?>
			<script type="text/javascript">
				swal({
					title: "Business Inserted!",
					icon: "success",
					button: "Done",
				});
			</script>
			<?php
		}
		mysqli_close($con);
	}


	//for adding crpto
	if(isset($_POST['addcrypto'])){
		$con = connecttoDB();
		$crypto = $_POST['crypto1'];
		
		if(!$con){
			?>
			<script type="text/javascript">
				swal("Database Error!", "Database not connected!", "error");
			</script>
			<?php 
			return;
		}

		$insertQuery = "INSERT INTO dropdown (category,cryptotype) VALUES ('1','$crypto')";
		if(mysqli_query($con,$insertQuery)){
			?>
			<script type="text/javascript">
				swal({
					title: "Crypto Inserted!",
					icon: "success",
					button: "Done",
				});
			</script>
			<?php
		}
		mysqli_close($con);
	}
	//for adding category
	if(isset($_POST['addcategory'])){
		$con = connecttoDB();
		$category = $_POST['category1'];
		
		if(!$con){
			?>
			<script type="text/javascript">
				swal("Database Error!", "Database not connected!", "error");
			</script>
			<?php 
			return;
		}

		$insertQuery = "INSERT INTO dropdown (category,cryptotype) VALUES ('$category','1')";
		if(mysqli_query($con,$insertQuery)){
			?>
			<script type="text/javascript">
				swal({
					title: "Category Inserted!",
					icon: "success",
					button: "Done",
				});
			</script>
			<?php
		}
		mysqli_close($con);
	}
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

	?>
	<div class="container jumbotron" id="maindiv">
		<h1>Add New Business</h1>
		
		<form method="POST" action="">
			<div class="form-group">

				<label><b>Business Name</b></label>
				<input type="text" class="form-control" placeholder="Title/Name" required name="name">
				<small class="form-text text-muted">Enter Name/Title</small>
			</div>
			
			<div class="form-group">
				<label ><b>URL</b></label>
				<input type="text" class="form-control" placeholder="URL" required name="link">
				<small class="form-text text-muted">Enter Url</small>
			</div>
			<div class="form-group">
				<label ><b>Crypto Type</b></label>
				<select class="browser-default custom-select" required name="crypto">
				  
				  <?php 
				  		while($result = mysqli_fetch_assoc($cryptoquery)){
				  			// if($result['cryptotype']==""){
				  			// 	continue;
				  				
				  			// }
				  			?>
				  			<option value="<?php echo $result['cryptotype']; ?>"><?php echo $result['cryptotype']; ?></option>
							<?php
						}
				   ?>
				  
				  
				  
				</select>
				<small class="form-text text-muted">Select crypto Type for business</small>
			</div>
			<div class="form-group">
				<label ><b>Business Category</b></label>
				<select class="browser-default custom-select" required name="businesstype">
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
			<div class="form-group">
				<label ><b>Business Name Color</b></label>
				<select class="browser-default custom-select" name="colorno">
					<option value="1">Black</option>
					<option value="2">Green</option>
					<option value="3">Blue</option>
					<option value="4">Red</option>
				</select>
				
			</div>
			<div  class="form-group">
				<label ><b>At Top</b></label>
				<label class="checkbox-inline"><input type="radio" value="no" name="attop" checked style="margin-left: 10px;">NO</label>
				<label class="checkbox-inline"><input type="radio" value="yes" name="attop" style="margin-left: 10px;">YES</label>
			</div>

			<button type="submit" class="btn btn-success" name="addbusiness"><b>Add Business</b></button>
		</form>

		<button class="btn btn-info" id="editbusinessbtn" onclick="window.location.href='editbusiness.php'"><b>Edit Businesses</b></button>
		
	</div>
	<div class="container jumbotron" id="maindiv1">
		<h1>Add New Crypto/Type</h1>
		<form method="POST" action="">
			<div class="form-group">

				<label><b>Crypto</b></label>
				<input type="text" class="form-control" placeholder="Crypto" required name="crypto1">
				<small class="form-text text-muted">Enter exact Crypto as you want in dropdown</small>
			</div>
			<button type="submit" class="btn btn-success" name="addcrypto"><b>Add Crypto</b></button>
		</form>
		<button class="btn btn-info" id="editbusinessbtn" onclick="window.location.href='editbusiness.php#maindiv2'"><b>Edit Crypto</b></button>
		<br><br>
		<form method="POST" action="">
			<div class="form-group">

				<label><b>Category</b></label>
				<input type="text" class="form-control" placeholder="Category" required name="category1">
				<small class="form-text text-muted">Enter exact Category as you want in dropdown</small>
			</div>
			<button type="submit" class="btn btn-success" name="addcategory"><b>Add Category</b></button>
		</form>
		<button class="btn btn-info" id="editbusinessbtn" onclick="window.location.href='editbusiness.php#maindiv1'"><b>Edit Category</b></button>
	</div>	


</body>
</html>