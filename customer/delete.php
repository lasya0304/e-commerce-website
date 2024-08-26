<?php
   $cartid = $_GET['cartid'];
   
   include "../shared/connection.php";
  
    $result = mysqli_query($conn, "DELETE FROM cart WHERE cartid = $cartid");
    if($result){
      header("location:viewcart.php");
    }
    else{
      echo "Failed to Delete: " . mysqli_error($conn);
    }
?>

   
   



