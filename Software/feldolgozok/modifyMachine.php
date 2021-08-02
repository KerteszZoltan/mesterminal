<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    
    
    print $machine_name = ucwords($_POST['machine_name']);
    print $machine_barcode=$_POST['machine_barcode'];
    print $machineId=$_POST['machineId'];
    $sql="UPDATE `machine` SET `machine_name`='$machine_name', `machine_barcode`='$machine_barcode' WHERE `ID`='$machineId'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a módosítás";
    } else{
        header("Location: ../machine.php");
    }
}
?>