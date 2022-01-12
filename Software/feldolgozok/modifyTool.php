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
    print $overhead_fee=$_POST['overhead_fee'];
    print $internal_changeover=$_POST['internal_changeover'];

    $sql="UPDATE `machine_tool` SET 
    `name`='$toolName', 
    `overhead_fee`='$overhead_fee', 
    `internal_changeover`='$internal_changeover', 
    barcode='$tool_barcode' WHERE `ID`='$toolId'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a módosítás";
    } else{
        header("Location: ../tool.php");
    }
}
?>