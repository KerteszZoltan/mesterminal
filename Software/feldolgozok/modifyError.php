<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    print $error_name = ucwords($_POST['error_name']);
    print $error_barcode=$_POST['error_barcode'];
    print $errorId=$_POST['errorId'];
    $sql="UPDATE `error` SET `error_barcode`='$error_barcode', `error_name`='$error_name' WHERE `ID`='$errorId'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a módosítás";
    } else{
        header("Location: ../error.php");
    }
}
?>