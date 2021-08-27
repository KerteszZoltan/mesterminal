<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    
    
    print $operation_name = ucwords($_POST['operation_name']);
    print $operationId=$_POST['operationId'];
    $sql="UPDATE `operation` SET `name`='$operation_name' WHERE `ID`='$operationId'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a módosítás";
    } else{
        header("Location: ../operation.php");
    }
}
?>