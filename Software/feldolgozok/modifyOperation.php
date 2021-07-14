<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    
    
    print $operationName = ucwords($_POST['operationName']);
    print $operationId=$_POST['operationId'];
    $sql="UPDATE `operations` SET `operationName`='$operationName' WHERE `operationId`='$operationId'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a módosítás";
    } else{
        header("Location: ../operations.php");
    }
}
?>