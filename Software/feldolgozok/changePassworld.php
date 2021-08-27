<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    
    $adminId=$_SESSION['aid'];
    $codedPassword=md5($_POST['password']);
    
    $sql="UPDATE `user` SET `password`='$codedPassword' WHERE `ID`='$adminId'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a módosítás";
    } else{
        header("Location: ../mainPage.php");
        include_once("logout.php");
    }
}
?>