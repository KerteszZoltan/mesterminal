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

print $sql="UPDATE `workers` SET `workerName`='$workerName', `workerPhone`='$workerPhone' where `workerId`='$workerId'";
$result = $conn->query($sql);
if(!$result){
    print "nem sikerült a módosítás";
} else{
    Header("Location: ../worker.php");
    }
}
?>