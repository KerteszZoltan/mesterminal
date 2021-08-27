<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    print $toolId=$_POST['toolId'];
    print $sql="DELETE FROM `machine_tool` WHERE `ID`='$toolId'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a törlés";
        header("Location: ../tool.php");
    } else{
        header("Location: ../tool.php");
    }
}
?>