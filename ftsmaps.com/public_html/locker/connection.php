<?php

function connecttoDB(){
  $servername = "localhost";
  $username = "admin_root";
  $password = "RootCanal";
  $dbname="admin_search";

  $con=mysqli_connect($servername,$username,$password,$dbname);

  // Check connection
  if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    else{
      return $con;
    }
}
?>
