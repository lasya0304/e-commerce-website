<?php
   $pid=$_GET['pid'];
   echo "Received Id=$pid";

   include "../shared/connection.php";
  
    mysqli_query($conn,"delete from product where pid=$pid");
    if($sql_result){
      header("location:view.php");
    }
    else{
      echo"Failed to Delete";
      mysqli_error(($conn));
    }
?>
