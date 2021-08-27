<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
print $order_ID=$_POST['order_ID'];
print $barcode=$_POST['barcode'];
print $order_type_ID=$_POST['order_type_ID'];
print $customer_number=$_POST['customer_number'];
print $site_ID=$_POST['site_ID'];
print $total_count=$_POST['total_count'];
print $expected_count=$_POST['expected_count'];
print $pass_count=$_POST['pass_count'];
print $fail_count=$_POST['fail_count'];
print $order_status_ID=$_POST['order_status_ID'];


print $sql="UPDATE `order` SET `barcode`='$barcode', 
                            `order_type_ID`='$order_type_ID',
                            `customer_number`='$customer_number',
                            `site_ID`='$site_ID',
                            `total_count`='$total_count',
                            `expected_count`='$expected_count',
                            `pass_count`='$pass_count',
                            `fail_count`='$fail_count',
                            `order_status_ID`='$order_status_ID'
                             WHERE `ID`='$order_ID'";
$result = $conn->query($sql);
if(!$result){
    print "nem sikerült a módosítás";
    } else{  
    Header("Location: ../order.php");
    }
}
?>