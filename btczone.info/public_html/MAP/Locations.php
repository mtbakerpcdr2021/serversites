<!DOCTYPE html>
<html>
<head>
	<title>Edit Locations</title>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/map.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

           <script>
             // Call the dataTables jQuery plugin
            $(document).ready(function() {

              $('#mytable').DataTable();

            });


         </script>
</head>
<body>
	<?php 
		include 'map_connection.php';
		$con = connecttoDB();
		if(!$con){
          ?>
          <script type="text/javascript">
            swal("Database Error!", "Database not connected!", "error");
          </script>
          <?php 
          return;
        }
		$query = mysqli_query($con, "SELECT * FROM locations");

		if(isset($_GET['delid']) ){  
			
			$id=$_GET['delid'];   
			$del ="DELETE FROM locations WHERE id = $id";

			if($result = mysqli_query($con, $del)){  
				?>
				<script>
					// swal('Deleted!', 'The user has been Deleted.', 'success'); 
					window.location.href="Locations.php";
				</script>";
				<?php
			}    
		} 
		
	?>
	<div class="container jumbotron" id="maindiv">
		<h1>All Locations</h1>
		<br>
		<table class="table table-bordered table-striped" id="mytable">
			<thead>
				<tr>
					<th scope="col">Name</th>
					<th scope="col">Link</th>
					<th scope="col">Latitude</th>
					<th scope="col">Longitude</th>
					<th scope="col">Color</th>
					<th scope="col">Action</th>
				</tr>

			</thead>
			<tbody>
				<?php 
					
					while($locations = mysqli_fetch_assoc($query)){

				 ?>
				<tr>
					<td><?php echo $locations['Pname']; ?></td>
					<td><?php echo $locations['Plink']; ?></td>
					<td><?php echo $locations['lat']; ?></td>
					<td><?php echo $locations['longi']; ?></td>
					<td><?php 
						if($locations['color']==1){
							echo "Black";
						}else if($locations['color']==2){
							echo "Yellow";
						}else if($locations['color']==3){
							echo "Green";
						}else if($locations['color']==4){
							echo "Pink";
						}else if($locations['color']==5){
							echo "Blue";
						}



					 ?></td>
					<td>
						<button class="btn btn-info" id='<?php echo $locations['id']; ?>' onClick="editlocation(this.id)">Edit</button>

						<button class="btn btn-danger" style="margin-left: 1px;" id='<?php echo $locations['id']; ?>'
							onClick="deleteLocation(this.id)">Delete</button>
					</td>
				</tr>
				<?php 
					}
					mysqli_close($con);
				 ?>

			</tbody>
		</table>
		<button class="btn btn-info" id="editlocationbtn" onclick="window.location.href='map_panel.php'"><b>Add Location</b></button>
	</div>

	<script type="text/javascript">
		
		function deleteLocation(id){
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
			    // swal("Poof! Location deleted!", {
			    //   icon: "success",
			    // });
			    window.location.href="Locations.php?delid="+id;
			  } else {
			    // swal("Your Location is safe!");
			  }
			});

		}
		function editlocation(id){
			// alert(id);
			window.location.href="editloc.php?id="+id;
			

		}
	</script>
</body>
</html>