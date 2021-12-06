<?php

function connecttoDB(){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname="maplocations";

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