<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Display</title>
    <style>
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; /* Align items horizontally */
        }

        .own-card {
            width: 300px;
            height: 550px;
            background-color: bisque;
            margin: 10px;
            display: inline-block; /* Change display to flex */
            /* Arrange children horizontally */
            align-items: center; /* Center items horizontally */
            padding: 20px;
            vertical-align: top;
        }

        .own-card img {
            max-width: 75%; /* Make image responsive */
            height: auto; /* Maintain aspect ratio */
            margin-bottom: 10px; /* Add some space below image */
            justify-content: center;
        }
    </style>
</head>
<body>
    
</html>

<?php
include "authguard.php";
include "menu.html";
include "../shared/connection.php";


$sql_result = mysqli_query($conn, "SELECT * FROM product JOIN user ON product.owner = user.userid");
while($dbrow=mysqli_fetch_assoc($sql_result)){
    // Fetching product ID from the database
  
    echo "<div class='own-card'>
              <div>$dbrow[name]</div>
              <div>$dbrow[price]</div>
              <div>$dbrow[detail]</div>
              <div class='pdtimg'>
                <img src='$dbrow[impath]'>
              </div>
              <div>
                 $dbrow[username]
              </div>
              <div>
              <a href='addcart.php?pid=$dbrow[pid]'>
                <button>Add to cart</button> 
              </a>
              </div>
            </div>";
}
?>
    