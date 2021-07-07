<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
$workerName  = $_POST['workerName'];
$workerPhone  = $_POST['workerPhone'];
$partOfName = explode(" ", $workerName);
$firstName=ucwords($partOfName[0]);
$lastName=ucwords($partOfName[1]);
$thirdName=ucwords($partOfName[2]);
print $workerName = $firstName .' '. $lastName .' '. $thirdName;
print $workerId=$_POST['workerId']."<br>";
print $time = $_POST['workTime']."<br>";

$sqlSumTime="SELECT workerSumTime FROM `workers` where `workerId`='$workerId'";
$result1 = $conn->query($sqlSumTime);
if ($result1->num_rows > 0) {
    while($row = $result1->fetch_assoc()) {
        print $time = $time + $row['workerSumTime'];
    }
}
    print $sql="UPDATE `workers` SET `workerName`='$workerName', `workerPhone`='$workerPhone', `workerSumTime`='$time' WHERE `workerId`='$workerId'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a módosítás";
    } else{
        Header("Location: ../worker.php");
    }
}
?>