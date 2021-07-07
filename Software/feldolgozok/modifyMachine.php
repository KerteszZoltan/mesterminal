<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    
    
    print $machineName = ucwords($_POST['machineName']);
    print $machineId=$_POST['machineId'];
    $sql="UPDATE `machines` SET `machineName`='$machineName' WHERE `machineId`='$machineId'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a módosítás";
    } else{
        header("Location: ../machines.php");
    }
}
?>