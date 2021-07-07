<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    print $errorName = ucwords($_POST['errorName']);
    print $errorId=$_POST['errorId'];
    $sql="UPDATE `errors` SET `errorName`='$errorName' WHERE `errorId`='$errorId'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a módosítás";
    } else{
        header("Location: ../errors.php");
    }
}
?>