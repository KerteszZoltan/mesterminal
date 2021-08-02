<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    print $machineId=$_POST['machineId'];
    print $sql="DELETE FROM `machine` WHERE `ID`='$machineId'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a törlés";
        header("Location: ../machine.php");

    } else{
        header("Location: ../machine.php");
    }
}
?>