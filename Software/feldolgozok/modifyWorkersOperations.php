<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    
    print $workerAndOperationId=$_POST['workerAndOperationId'];
    print $actualTime=$_POST['actualTime'];
    print $operationTime=$_POST['operationTime']*15;
    $actualMonth=date("Y/m");
    $newTime=$actualTime+$operationTime;

    $sql="UPDATE `workeroperations` SET `operationTime`='$newTime' WHERE workerAndOperationId='$workerAndOperationId' and operationMonth='$actualMonth'";
    $result = $conn->query($sql); 
    if(!$result){
        print "nem sikerült a módosítás";
    } else{
        header("Location: ../workerOperation.php");
    }
}
?>