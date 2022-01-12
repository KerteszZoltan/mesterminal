<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    
    print $product_barcode=$_POST['product_barcode'];
    print $product_name = ucwords($_POST['product_name']);
    print $productId=$_POST['productId'];
    print $article_number=$_POST['article_number'];
    print $foreign_id=$_POST['foreign_id'];

    $sql="UPDATE `product` SET 
    `name`='$product_name', 
    `article_number`='$article_number', 
    `foreign_id`='$foreign_id', 
    `barcode`='$product_barcode' WHERE `ID`='$productId'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a módosítás";
    } else{
        header("Location: ../product.php");
    }
}
?>