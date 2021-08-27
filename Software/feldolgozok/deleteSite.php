<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    print $siteId=$_POST['siteId'];
    print $sql="DELETE FROM `site` WHERE `ID`='$siteId'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a törlés";
        header("Location: ../site.php");
    } else{
        header("Location: ../site.php");
    }
}
?>