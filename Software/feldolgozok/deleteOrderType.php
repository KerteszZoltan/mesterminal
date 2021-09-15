<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    print $typeID=$_POST['typeID'];
    print $sql="DELETE FROM `order_type` WHERE `ID`='$typeID'";
    $result = $conn->query($sql);
    if(!$result){
        header("Location: ../order_type.php");
        print "nem sikerült a törlés";
    } else{
        header("Location: ../order_type.php");
    }
}
?>