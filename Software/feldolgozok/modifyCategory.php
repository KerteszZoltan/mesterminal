<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    print $name = ucwords($_POST['category_name']);
    print $id=$_POST['category_id'];
    $sql="UPDATE `category` SET `name`='$name' WHERE `ID`='$id'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a módosítás";
    } else{
        header("Location: ../category.php");
    }
}
?>