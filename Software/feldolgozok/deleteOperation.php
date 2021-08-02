<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    print $operationId=$_POST['operationId'];
    print $sql="DELETE FROM `operation` WHERE `ID`='$operationId'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a törlés";
        header("Location: ../operation.php");

    } else{
        header("Location: ../operation.php");
    }
}
?>