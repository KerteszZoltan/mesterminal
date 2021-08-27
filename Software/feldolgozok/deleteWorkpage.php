<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    print $workpageId=$_POST['workpageId'];
    $sql="DELETE FROM `order` WHERE `ID`='$workpageId'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a törlés";
        header("Location: ../order.php");
    } else{
        header("Location: ../order.php");
    }
}
?>