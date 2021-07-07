<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    print $workpageId=$_POST['workpageId'];
    $sql="DELETE FROM `workpages` WHERE `workpageId`='$workpageId'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a törlés";
        header("Location: ../workpages.php");
    } else{
        header("Location: ../workpages.php");
    }
}
?>