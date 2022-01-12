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
    print $overhead_fee = $_POST['overhead_fee'];
    print $internal_changeover = $_POST['internal_changeover'];

    print $sql="UPDATE `machine` SET 
    `name`='$machine_name', 
    `barcode`='$machine_barcode',
    `overhead_fee`='$overhead_fee', 
    `internal_changeover`='$internal_changeover'
    WHERE `ID`='$machineId'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a módosítás";
    } else{
        header("Location: ../machine.php");
    }
}
?>