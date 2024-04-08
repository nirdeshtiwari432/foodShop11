<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: auto;
            text-align: center;
            padding-top: 50px;
        }

        .message {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            border-radius: 5px;
        }
        .qr{
         width: 100px;
         height: 100px;
     }
     #code{
        margin-left: 300px;
     }
    </style>
</head>
<body>
    <div class="container">
        <div class="message">
            <h2>Your order has been successfully placed!</h2>
            <p>Thank you for choosing our food delivery service.</p>
            <p>Your order will be delivered to you shortly.</p>
            <p><a href="index.html">Back to Home</a></p>
        </div>
    </div>
    <div id = "code">
    <img class = "qr" src="https://www.pngall.com/wp-content/uploads/2/QR-Code-PNG-HD-Image.png" alt="">
    <p>Scan QR for online payment </p>
   
    </div>
   
</body>
<?php
   include "connect.php"; 

// Retrieve data from the POST request (assuming the data is sent via a form)
$product_name = $_POST['product_name'];
$order_id = $_POST['order_id'];
$amount = $_POST['amount'];
$payment_type = $_POST['payment_type'];
$payment_status = $_POST['payment_status'];
$product_id = $_POST['product_id'];
$customer_name = $_POST['customer_name'];
$location = $_POST['location'];

// Prepare and bind the SQL statement
$sql = "INSERT INTO `order` (product_name, order_id, amount, payment_type, payment_status, product_id, customer_name, location) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssss", $product_name, $order_id, $amount, $payment_type, $payment_status, $product_id, $customer_name, $location);

// Execute the statement
if ($stmt->execute()) {
    echo "order placed successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>
</html>
