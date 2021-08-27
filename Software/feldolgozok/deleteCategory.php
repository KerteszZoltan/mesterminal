<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    print $id=$_POST['category_id'];
    print $sql="DELETE FROM `category` WHERE `ID`='$id'";
    $result = $conn->query($sql);
    if(!$result){
        header("Location: ../category.php");
        print "nem sikerült a törlés";
    } else{
        header("Location: ../category.php");
    }
}
?>