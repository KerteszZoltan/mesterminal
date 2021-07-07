<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

$sqlLast="SELECT MAX(orderId) as id from orders";
$result = $conn->query($sqlLast);
$last;
if ($result->num_rows > 0) {
  foreach($result as $row) {
    $last=$row['id']+1;
  }
}

print $workNumber="VRR".$last."/".date("Y")."/".date("m");
print '<br>';
print $companyId=$_POST['companyId'].'<br>';
print $productId=$_POST['productId'].'<br>'; 
print $quantity=$_POST['quantity'].'<br>';
print $orderDate=date("Y-m-d");
print $shippingDate=$_POST['shippingDate'].'<br>';

print $partCheck="SELECT * FROM companyforeignpartnumbers WHERE foreignId='$productId' OR productId='$productId' AND `companyId`='$companyId'";
$resultCheck= $conn->query($partCheck);
if($resultCheck->num_rows > 0){
    $product='';
    while($row = $resultCheck->fetch_assoc()) {
       $product=$row['companyForeignPartId'];
    }
    print $sql="INSERT INTO orders (workNumber,companyId,quantity,orderDate,shippingDate,productId) 
    VALUES ('{$workNumber}','{$companyId}','{$quantity}','{$orderDate}','{$shippingDate}','{$product}')";
    $conn -> query($sql);
}
else{
    print $sql="INSERT INTO orders (workNumber,companyId,quantity,orderDate,shippingDate,productId) 
    VALUES ('{$workNumber}','{$companyId}','{$quantity}','{$orderDate}','{$shippingDate}','{$productId}')";
   
    print $sqlForeign ="INSERT INTO companyforeignpartnumbers (companyId,productId,foreignId)
    VALUES ('{$companyId}','{$productId}','{$productId}')";
    $conn -> query($sql);
    $conn -> close();
    $conn -> query($sqlForeign);
    $conn -> close();
}
header("Location: ../order.php");    

?>