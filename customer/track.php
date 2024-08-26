<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Order</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: lightblue; /* Light gray background color */
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: bisque; /* White background color for content */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            margin-right: 10px;
        }

        input[type="text"] {
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button[type="submit"] {
            padding: 8px 16px;
            font-size: 16px;
            background-color:lime;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .order-details {
            background-color: #f9f9f9; /* Light gray background color for order details */
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 20px;
        }

        .order-details p {
            margin: 10px 0;
        }

        .order-details strong {
            margin-right: 10px;
        }

        .error-message {
            color: red;
            font-style: italic;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Track Your Order</h1>

    <form method="GET" action="">
        <label for="orderid">Enter Order ID:</label>
        <input type="text" id="orderid" name="orderid" required>
        <button type="submit">Track</button>
    </form>

    <?php
    // Check if order ID is submitted
    if(isset($_GET['orderid']) && !empty($_GET['orderid'])) {
        // Establish connection to the database
        include "../shared/connection.php"; // Adjust the path as per your project structure

        // Sanitize input
        $orderid = mysqli_real_escape_string($conn, $_GET['orderid']);

        // Query to fetch order details
        $sql = "SELECT * FROM orders WHERE order_id = '$orderid'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0) {
            $order = mysqli_fetch_assoc($result);
            ?>
            <div class="order-details">
                <h2>Order Details</h2>
                <p><strong>Order ID:</strong> <?php echo $order['orderid']; ?></p>
                <p><strong>UserName:</strong> <?php echo $order['username']; ?></p>
                <p><strong>created_date:</strong> <?php echo $order['created_date']; ?></p>
                <p><strong>Order Status:</strong> <?php echo $order['order_status']; ?></p>
                <!-- Add more order details as needed -->
            </div>
            <?php
        } else {
            echo "<p class='error-message'>No order found with the given ID.</p>";
        }
    }
    ?>

</div>

</body>
</html>