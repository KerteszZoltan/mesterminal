<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    
    print $usormanstep_ID=$_POST['usormanstep_ID'];
    $user_id=$_POST['user_id'];
    print $time=$_POST['time'];
    print $pass_count=$_POST['pass_count'];
	print $fail_count=$_POST['fail_count'];

    $sql="UPDATE `user_order_manufacturing_step` SET 
    `user_ID`='$user_id',
	`time`='$time',
	`pass_count`='$pass_count',
	`fail_count`='$fail_count'
	WHERE ID='$usormanstep_ID'";
    $result = $conn->query($sql); 
    if(!$result){
        print "nem sikerült a módosítás";
    } else{
        header("Location: ../user_order_manufacturing_step.php");
    }
}
?>