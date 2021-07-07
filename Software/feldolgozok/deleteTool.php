<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    print $toolId=$_POST['toolId'];
    print $sql="DELETE FROM `tools` WHERE `toolId`='$toolId'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a törlés";
        header("Location: ../tools.php");
    } else{
        header("Location: ../tools.php");
    }
}
?>