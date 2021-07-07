<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    
    $adminId=$_SESSION['aid'];
    $codedPassworld=md5($_POST['passworld']);
    
    $sql="UPDATE `admins` SET `Passworld`='$codedPassworld' WHERE `adminId`='$adminId'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a módosítás";
    } else{
        header("Location: ../machines.php");
        include_once("logout.php");
    }
}
?>