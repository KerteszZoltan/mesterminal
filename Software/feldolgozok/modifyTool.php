<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    
    
    print $toolName = ucwords($_POST['toolName']);
    print $toolId=$_POST['toolId'];
    print $tool_barcode=$_POST['tool_barcode'];
    $sql="UPDATE `machine_tool` SET `name`='$toolName', barcode='$tool_barcode' WHERE `ID`='$toolId'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a módosítás";
    } else{
        header("Location: ../tool.php");
    }
}
?>