<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    print $errorId=$_POST['errorId'];
    print $sql="DELETE FROM `error` WHERE `ID`='$errorId'";
    $result = $conn->query($sql);
    if(!$result){
        header("Location: ../error.php");
        print "nem sikerült a törlés";
    } else{
        header("Location: ../error.php");
    }
}
?>