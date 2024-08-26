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

//$conn = new mysqli("localhost", "root", "", "acme436_dec", 3306);
include "../shared/connection.php";

$sql_result=mysqli_query($conn,"select * from product where owner=$_SESSION[userid]");
while($dbrow=mysqli_fetch_assoc($sql_result)){
    $pid = $dbrow['pid']; // Fetching product ID from the database
  
    echo "<div class='own-card'>
              <div>$dbrow[name]</div>
              <div>$dbrow[price]</div>
              <div>$dbrow[detail]</div>
              <div class='pdtimg'>
                <img src='$dbrow[impath]'>
              </div>
              <div>
                <a href='#'>
                <button onclick='editpdt($pid)'>Edit</button> 
                </a>
                <button onclick='deletepdt($pid)'>Delete</button> 
               
              </div>
            </div>";
            
            
}
    ?>
    <html>
        <body>
            <script>
                function deletepdt(pid){
                    res = confirm(`Are you sure you want to delete product ${pid}?`);
                    if(res){
                        window.location.href = `delete.php?pid=${pid}`;
                    }
                }
                function editpdt(pid){
                    res = confirm(`Are you sure you want to edit product ${pid}?`);
                    if(res){
                        window.location.href = `edit.php?pid=${pid}`;
                    }
                }
                
            </script>
        </body> 
    </html>