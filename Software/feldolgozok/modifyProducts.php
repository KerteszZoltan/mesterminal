<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    
    
    print $productName = ucwords($_POST['productName']);
    print $productId=$_POST['productId'];
    $sql="UPDATE `products` SET `productName`='$productName' WHERE `productId`='$productId'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a módosítás";
    } else{
        header("Location: ../products.php");
    }
}
?>