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
    //$actualMonth="2021/10";

    $newTime=(int)($actualTime+$operationTime);

    $sql="UPDATE `user_operation` SET `time`='$newTime' WHERE ID='$workerAndOperationId' and month='$actualMonth'";
    $result = $conn->query($sql); 
    if(!$result){
        print "nem sikerült a módosítás";
    } else{
        header("Location: ../workerOperation.php");
    }
}
?>