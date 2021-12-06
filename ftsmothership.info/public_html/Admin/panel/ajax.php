<?php 
  include '../../connection.php';
  $con=connecttoDB();
  if(isset($_POST['delForm'])){
  $delid=$_POST['delForm'];
    // echo $delid;
  $query = mysqli_query($con, "SELECT * FROM coinproofs where id ='$delid' ");
  $details = mysqli_fetch_assoc($query);
  $filepath="../../assets/uploadedvids/".$details['uploadedfile'];
  unlink($filepath);
  
  $del1 ="DELETE FROM coinproofs WHERE id = '$delid'";
    mysqli_query($con,$del1);


}
