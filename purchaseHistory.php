<?php
// Website: Pastimes
// This page displays the user's purchase history.
session_start();
include("DBConn.php");
include("navbar.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Purchase History - Pastimes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="history-container">
        <h1>Purchase History</h1>
        <p>This is where the user's purchase history would be displayed.</p>

        <!-- table or list of past purchases would go here -->
         <table bor der="1" cellpadding="10" cellspacing="0" width="80%" align="center">
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Total Price</th>
                <th>Order Date</th>
            </tr>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM tblOrder ORDER BY order_id DESC");
            $grandTotal = 0;

            if ($result) {
                while($row = mysqli_fetch_assoc($result)){
                    $grandTotal += (float)$row["total_price"];
                    echo "
                <tr>
                    <td>".htmlspecialchars($row['order_id'])."</td>
                    <td>".htmlspecialchars($row['customer'])."</td>
                    <td>$".number_format($row['total_price'], 2)."</td>
                    <td>".htmlspecialchars($row['order_date'])."</td>
                </tr>
                ";
                }
            } else {
                echo '<tr><td colspan="4">No orders found or a database error occurred.</td></tr>';
            }

            if ($grandTotal > 0) {
                echo '<tr><td colspan="2"><strong>Grand Total</strong></td><td colspan="2"><strong>$'.number_format($grandTotal, 2).'</strong></td></tr>';
            }
            ?>
         </table>
    </div>
</body>
</html>