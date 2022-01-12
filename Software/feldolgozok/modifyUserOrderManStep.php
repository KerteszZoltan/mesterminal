<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    
    print $usormanstep_ID=$_POST['usormanstep_ID'];
    $user_id=$_POST['user_id'];
$time=$_POST['time'];

    $sql="UPDATE `user_order_manufacturing_step` SET 
    `user_ID`='$user_id',
    `time`=$time;
	WHERE ID='$usormanstep_ID'";
    $result = $conn->query($sql); 
    if(!$result){
        print "nem sikerült a módosítás";
    } else{
        header("Location: ../user_order_manufacturing_step.php");
    }
}
?>