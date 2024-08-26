<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: plum;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: lightgoldenrodyellow;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        button[type="submit"], a {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none; /* Remove default underline from anchor tag */
            margin: 0 10px;
        }

        button[type="submit"]:hover, a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        
        <p>Choose your payment method:</p>
        <form method="post" action="payment.html">
            <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
            <button type="submit" name="paynow">Pay Now</button>
        </form>
        <a href="payment.html?orderid=<?php echo $orderid; ?>" target="_blank">Pay Now (Link)</a>
        <form method="post" action="cod.php">
            <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
            <button type="submit" name="cod">Cash on Delivery</button>
        </form>
    </div>
</body>
</html>