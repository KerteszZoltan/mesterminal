<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    print $ordmanstus_id=$_POST['ordmanstus_id'];
	print $step_barcode=$_POST['step_barcode'];
	print $barcode=$step_barcode.'-'.$ordmanstus_id;
    print $sql="DELETE FROM `order_manufacturing_step` WHERE `barcode`='$barcode'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a törlés";
        header("Location: ../order_manufacturing_step.php");

    } else{
        header("Location: ../order_manufacturing_step.php");
    }
}
?>