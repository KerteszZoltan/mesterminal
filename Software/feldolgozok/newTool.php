<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

print $tool_name = ucwords($_POST['tool_name']);
print $tool_barcode = $_POST['tool_barcode'];
print $machineId = $_POST['machineId'];

if (!isset($machineId)) {
    $sql ="INSERT INTO machine_tool (barcode, name) 
	VALUES ('{$tool_barcode}','{$tool_name}')";
    $result = $conn->query($sql);
    header("Location: ../tool.php");    

}else{
    $sql ="INSERT INTO machine_tool (barcode, machine_ID, name) 
	VALUES ('{$tool_barcode}','{$machineId}','{$tool_name}')";
    $result = $conn->query($sql);
    header("Location: ../tool.php");    

}


    
    
?>