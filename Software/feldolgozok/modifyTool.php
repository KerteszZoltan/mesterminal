<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    
    
    print $toolName = ucwords($_POST['toolName']);
    print $toolId=$_POST['toolId'];
    $sql="UPDATE `tools` SET `toolName`='$toolName' WHERE `toolId`='$toolId'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a módosítás";
    } else{
        header("Location: ../tools.php");
    }
}
?>