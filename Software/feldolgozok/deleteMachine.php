<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    print $machineId=$_POST['machineId'];
    print $sql="DELETE FROM `machines` WHERE `machineId`='$machineId'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a törlés";
        header("Location: ../machines.php");

    } else{
        header("Location: ../machines.php");
    }
}
?>