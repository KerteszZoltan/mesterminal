

user_id
expected_count
pass_count
fail_count
time
normal_time
preparation_time
unit_of_time
order_manufacturing_step_user_id

<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    
    print $expected_count=$_POST['expected_count'];
	print $pass_count=$_POST['pass_count'];
    print $fail_count=$_POST['fail_count'];
    print $normal_time=$_POST['normal_time'];
    print $preparation_time=$_POST['preparation_time'];
    print $unit_of_time=$_POST['unit_of_time'];
    print $overhead_fee=$_POST['overhead_fee'];

    print $ordmanstus_id=$_POST['ordmanstus_id'];

    print $sql="UPDATE `order_manufacturing_step` SET 
	`expected_count`='$expected_count',
	`pass_count`='$pass_count',
	`fail_count`='$fail_count',
	`normal_time`='$normal_time',
	`preparation_time`='$preparation_time',
	`unit_of_time`='$unit_of_time',
    `overhead_fee` = '$overhead_fee'
	WHERE `ID`='$ordmanstus_id'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a módosítás";
    } else{
        header("Location: ../order_manufacturing_step.php");
    }
}
?>