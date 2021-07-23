<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    
    
    print $siteName = ucwords($_POST['siteName']);
    print $siteId=$_POST['siteId'];
    $sql="UPDATE `sites` SET `siteName`='$siteName' WHERE `siteId`='$siteId'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a módosítás";
    } else{
        header("Location: ../sites.php");
    }
}
?>