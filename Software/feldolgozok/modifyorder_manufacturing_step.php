<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    
    print $expected_performance=$_POST['expected_performance'];
	print $pass_count=$_POST['pass_count'];
    print $fail_count=$_POST['fail_count'];
    $internal_changeover = $_POST['internal_changeover'];
    $external_changeover = $_POST['external_changeover'];
    $planned_internal_changeover = $_POST['planned_internal_changeover'];
    $education = $_POST['education']; 
    $planned_education = $_POST['planned_education']; 
    print $ordmanstus_id=$_POST['ordmanstus_id'];
    $overhead_fee=$_POST['overhead_fee'];
    print $sql="UPDATE `order_manufacturing_step` SET 
	`expected_performance`='$expected_performance',
	`performance`='$performance',
	`pass_count`='$pass_count',
	`fail_count`='$fail_count',
    `overhead_fee` = '$overhead_fee',
    `planned_internal_changeover` = '$planned_internal_changeover',
    `internal_changeover` = '$internal_changeover',
    `external_changeover` = '$external_changeover',
    `education` = '$education',
    `planned_education` = '$planned_education'
	WHERE `ID`='$ordmanstus_id'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a módosítás";
    } else{
        header("Location: ../order_manufacturing_step.php");
    }
}
?>