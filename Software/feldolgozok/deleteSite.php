<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    print $siteId=$_POST['siteId'];
    print $sql="DELETE FROM `sites` WHERE `siteId`='$siteId'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a törlés";
        header("Location: ../sites.php");
    } else{
        header("Location: ../sites.php");
    }
}
?>