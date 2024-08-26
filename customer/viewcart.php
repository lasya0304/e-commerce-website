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
    
<?php
include "authguard.php";
include "menu.html";

include "../shared/connection.php";

$sql_result = mysqli_query($conn,"SELECT * FROM cart JOIN product ON cart.pid = product.pid WHERE userid = $_SESSION[userid]");
$total = 0;
while($dbrow = mysqli_fetch_assoc($sql_result)){
    $total += $dbrow["price"];

    $cartid = $dbrow['cartid']; // Fetching cart ID from the database

    echo "<div class='own-card'>
              <div>$dbrow[name]</div>
              <div>$dbrow[price]</div>
              <div>$dbrow[detail]</div>
              <div class='pdtimg'>
                <img src='$dbrow[impath]'>
              </div>
              <div>
                <button onclick='deleteCart($cartid)'>Remove from Cart</button> 
              </div>
            </div>";
}
echo "<div class='m-3'>


<form method='post' action='placeorder.php'class='w-50'>
<h3>Place Order</h3>
<textarea class='form-control' name='address' placeholder='Enter Delivery Address'></textarea>
<input value='$total' hidden name='total'>
<button class='p-3 btn btn-primary'>Place Order $total Rs </button>
</form>
</div>";

?>

<script>
    function deleteCart(cartid){
        var res = confirm(`Are you sure you want to delete product from cart?`);
        if(res){
            window.location.href = `delete.php?cartid=${cartid}`;
        }
    }
</script>

</body> 
</html>