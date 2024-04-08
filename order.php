<?php
    include "connect.php"; // Assuming connect.php contains the database connection

    // Query to retrieve data from the database
    $query = "SELECT order_id,product_name,amount,payment_type,paymenr_status,product_id,customar_name,location FROM `order`";
    $result = $conn->query($query);

    // Check if there are any rows in the result
    if($result->num_rows>0) {
        echo "<table border='1'>
                <tr>
                    <th>Order ID</th>
                    <th>Product Name</th>
                    <th>Amount</th>
                    <th>Payment Type</th>
                    <th>Payment Status</th>
                    <th>Product ID</th>
                    <th>Customar Name</th>
                    <th>Location</th>
                </tr>";

        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["order_id"] . "</td>
                    <td>" . $row["product_name"] . "</td>
                    <td>" . $row["amount"] . "</td>
                    <td>" . $row["payment_type"] . "</td>
                    <td>" . $row["paymenr_status"] . "</td>
                    <td>" . $row["product_id"] . "</td>
                    <td>" . $row["location"] . "</td>
                    <td>" . $row["customar_name"] . "</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "0 results";
    }

    // Close the database connection
    $conn = null; // Closing PDO connection
?>
