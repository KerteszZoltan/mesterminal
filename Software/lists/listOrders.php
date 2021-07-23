<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

$sqlAllOrders="SELECT * from `orders`";
$reultErrors = $conn -> query($sqlAllOrders);
if ($reultErrors->num_rows > 0) {
    while($row = $reultErrors->fetch_assoc()) {
        print '
        '.$row['workNumber'].'<|>
        '.$row['companyId'].'<|>
        '.$row['quantity'].'<|>
        '.$row['orderDate'].'<|>
        '.$row['shippingDate'].'<|>
        '.$row['productId'].'<br>
            ';
    }
}



?>

