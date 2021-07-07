<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    print $companyName = ucwords($_POST['companyName']);
    print $companyId=$_POST['companyId'];
    $sql="UPDATE `companys` SET `companyName`='$companyName' WHERE `companyId`='$companyId'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a módosítás";
    } else{
        header("Location: ../companys.php");
    }
}
?>