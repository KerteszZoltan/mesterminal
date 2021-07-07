<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    print $workerId=$_POST['workerId'];
    print $sql="UPDATE `workers` SET `workerSumTime`='0' WHERE `workerId`='$workerId'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a törlés";
    } else{
        header("Location: ../worker.php");
    }
}
?>