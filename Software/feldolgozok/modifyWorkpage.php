<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
print $workpageId=$_POST['workpageId'];
print $workpageName=ucwords($_POST['workpageName']);
print $expectedDB=$_POST['expectedDB'];
print $successedDB=$_POST['successedDB'];
print $discardDB=$_POST['discardDB'];

$sql="UPDATE `workpages` SET `workpageName`='$workpageName', 
                            `expectedDB`='$expectedDB',
                            `successedDB`='$successedDB',
                            `discardDB`='$discardDB'
                             WHERE `workpageId`='$workpageId'";
$result = $conn->query($sql);
if(!$result){
    print "nem sikerült a módosítás";
    } else{  
    Header("Location: ../workpages.php");
    }
}
?>