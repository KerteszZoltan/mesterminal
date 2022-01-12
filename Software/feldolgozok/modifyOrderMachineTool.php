<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    print $machine_id=$_POST['machine_id'];
    print $tool_id=$_POST['tool_id'];
    print $ormanst_id=$_POST['ormanst_id'];
    $sql="UPDATE `order_manufacturing_step_machine_tool` SET
    `machine_ID`='$machine_id',
    `machine_tool_ID`='$tool_id'
    WHERE
    `order_manufacturing_step_ID`='$ormanst_id'";
    $result = $conn->query($sql);

    $sqloverhead_machine="SELECT overhead_fee from `machine` where ID=`$machine_id`";
    $result_machine_fee=$conn->query($sqloverhead_machine);
	if ($result_machine_fee->num_rows > 0) {
		while($row = $result_machine_fee->fetch_assoc()) {
			$machine_fee=$row['overhead_fee'];
		}
	}
    $sqloverhead_tool="SELECT overhead_fee from `machine_tool` where ID=`$tool_id`";
    $result_tool_fee=$conn->query($sqloverhead_tool);
	if ($result_tool_fee->num_rows > 0) {
		while($row = $result_tool_fee->fetch_assoc()) {
			$machinetool_fee=$row['overhead_fee'];
		}
	}

    $overhead_fee=$machine_fee+$machinetool_fee;

    if(!$result){
        print "nem sikerült a módosítás";
    } else{
        $sqlupdate_ormanstep="UPDATE `order_manufacturing_step` SET
        `overhead_fee`='$overhead_fee';
        WHERE
        `ID`='$ormanst_id'";

        header("Location: ../order_machine_tool.php");
    }
}