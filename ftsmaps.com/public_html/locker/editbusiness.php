<!DOCTYPE html>
<html>
<head>
	<title>Edit businesses</title>
		<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

           <script>
             // Call the dataTables jQuery plugin
            $(document).ready(function() {

              // $('#mytable').DataTable();
              $('#mytable').DataTable( {
		        "order": [["desc" ]]
		    } );
              $('#mytable1').DataTable();
              $('#mytable2').DataTable();

            });
         </script>

</head>
<body>
	<?php 



		//
		include 'connection.php';

		//
		$con = connecttoDB();
		//delet
		if(isset($_GET['delid']) ){  
			
			$id=$_GET['delid'];   
			$del ="DELETE FROM businessdata WHERE id = $id";

			if($result = mysqli_query($con, $del)){  
				?>
				<script>
					// swal('Deleted!', 'The user has been Deleted.', 'success'); 
					window.location.href="editbusiness.php#maindiv";
				</script>";
				<?php
			}    
		}
		if(isset($_GET['del1']) ){  
			
			$id=$_GET['del1'];   

			$del1 ="DELETE FROM dropdown WHERE category = '$id'";

			if($result = mysqli_query($con, $del1)){  
				?>
				<script>
					// swal('Deleted!', 'The user has been Deleted.', 'success'); 
					window.location.href="editbusiness.php#maindiv1";
				</script>";
				<?php
			}    
		}
		if(isset($_GET['del2']) ){  
			
			$id=$_GET['del2'];   

			$del1 ="DELETE FROM dropdown WHERE cryptotype = '$id'";

			if($result = mysqli_query($con, $del1)){  
				?>
				<script>
					// swal('Deleted!', 'The user has been Deleted.', 'success'); 
					window.location.href="editbusiness.php#maindiv2";
				</script>";
				<?php
			}    
		}
		///
		if(!$con){
          ?>
          <script type="text/javascript">
            swal("Database Error!", "Database not connected!", "error");
          </script>
          <?php 
          return;
        }

		$query = mysqli_query($con, "SELECT * FROM businessdata order by attop desc");
		$query1 = mysqli_query($con, "SELECT category FROM dropdown where category != '1'");
		$query2 = mysqli_query($con, "SELECT cryptotype FROM dropdown where cryptotype != '1'");

	 ?>
	 <div class="container jumbotron" id="maindiv">
		<h1>All Businesses</h1>
		<br>
		<table class="table table-bordered table-striped" id="mytable">
			<thead>
				<tr>
					<th scope="col">Name</th>
					<th scope="col">Url</th>
					<th scope="col">Category</th>
					<th scope="col">Crypto</th>
					<th scope="col">At Top</th>
					<th scope="col">Action</th>
				</tr>

			</thead>
			<tbody>
				<?php 
					
					while($businesses = mysqli_fetch_assoc($query)){

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
					<td><?php echo $businesses['url']; ?></td>
					<td><?php echo $businesses['category']; ?></td>
					<td><?php echo $businesses['cryptotype']; ?></td>
					<td><?php echo $businesses['attop']; ?></td>
					<td>
						<!-- <button class="btn btn-info" id='<?php echo $businesses['id']; ?>' onClick="editlocation(this.id)">Edit</button> -->

						<button class="btn btn-danger" style="margin-left: 0px;" id='<?php echo $businesses['id']; ?>'
							onClick="deletebusiness(this.id)">Delete</button>
					</td>
				</tr>
				<?php 
					}
					
				 ?>

			</tbody>
		</table>
		<button class="btn btn-info" id="editlocationbtn" onclick="window.location.href='BusinessPanel.php#maindiv'"><b>Add Business</b></button>
	</div>
	<div class="container jumbotron" id="maindiv1">
		<br>
		<h1>All Categories</h1>
		<br>
		<table class="table table-bordered table-striped" id="mytable1">
			<thead>
				<tr>
					<th scope="col">Category</th>
					
					<th scope="col">Action</th>
				</tr>

			</thead>
			<tbody>
				<?php 
					
					while($businesses = mysqli_fetch_assoc($query1)){
						// if($businesses['category']==""){
				  // 				continue;
				  				
				  // 			}

				 ?>
				<tr>
					<td><?php echo $businesses['category']; ?></td>
					
					<td>
					

						<button class="btn btn-danger" style="margin-left: 0px;" id='<?php echo $businesses['category']; ?>'
							onClick="Deletecategory(this.id)">Delete</button>
					</td>
				</tr>
				<?php 
					}
					
				 ?>

			</tbody>
		</table>
		<button class="btn btn-info" id="editlocationbtn" onclick="window.location.href='BusinessPanel.php#maindiv1'"><b>Add Category</b></button>
	</div>
		<div class="container jumbotron" id="maindiv2">
		<br>
		<h1>All Crypto</h1>
		<br>
		<table class="table table-bordered table-striped" id="mytable2">
			<thead>
				<tr>
					<th scope="col">Crytp</th>
					
					<th scope="col">Action</th>
				</tr>

			</thead>
			<tbody>
				<?php 
					
					while($businesses = mysqli_fetch_assoc($query2)){
						// if($businesses['cryptotype']==""){
				  // 				continue;
				  				
				  // 			}

				 ?>
				<tr>
					<td><?php echo $businesses['cryptotype']; ?></td>
					
					<td>
					

						<button class="btn btn-danger" style="margin-left: 0px;" id='<?php echo $businesses['cryptotype']; ?>'
							onClick="Deletecrypto(this.id)">Delete</button>
					</td>
				</tr>
				<?php 
					}
					
				 ?>

			</tbody>
		</table>
		<button class="btn btn-info" id="editlocationbtn" onclick="window.location.href='BusinessPanel.php#maindiv1'"><b>Add Crypto</b></button>
	</div>
<script type="text/javascript">
		
		function deletebusiness(id){
			// alert(id);

			swal({
			  title: "Are you sure?",
			  text: "Once deleted, you will not be able to recover this location!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {

			    window.location.href="editbusiness.php?delid="+id;
			  } else {
			    // swal("Your Location is safe!");
			  }
			});

		}
		function Deletecategory(id){
			// alert(id);

			swal({
			  title: "Are you sure?",
			  text: "Once deleted, you will not be able to recover this location!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {

			    window.location.href="editbusiness.php?del1="+id;
			  } else {
			    // swal("Your Location is safe!");
			  }
			});

		}
		function Deletecrypto(id){
			// alert(id);

			swal({
			  title: "Are you sure?",
			  text: "Once deleted, you will not be able to recover this location!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {

			    window.location.href="editbusiness.php?del2="+id;
			  } else {
			    // swal("Your Location is safe!");
			  }
			});

		}

	</script>
</body>
</html>