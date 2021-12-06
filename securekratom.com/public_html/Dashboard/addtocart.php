<?php 
  session_start();
  include '../connection.php';
  $con = connecttoDB();
  if(isset($_POST['P_id']) && isset($_SESSION['loggedIn'])){  
      $C_id=$_SESSION['C_id'];
      // echo "string";
      $P_id=$_POST['P_id'];   
      // $del ="DELETE FROM products WHERE P_id = $P_id";
      $insert="INSERT INTO cart(C_id,P_id) values('$C_id','$P_id')";

      if($result1 = mysqli_query($con, $insert)){  
        
         
      }    
    }

    //inserting into guestcart
    if(isset($_POST['P_id']) && isset($_POST['guestid'])){  
      $G_id=$_POST['guestid'];
      $P_id=$_POST['P_id'];   
      $insert="INSERT INTO guestcart(G_id,P_id) values('$G_id','$P_id')";

      if(mysqli_query($con, $insert)){
          // echo "yes";
      }else{
        // echo "no";
      }
    }

 ?>