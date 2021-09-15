<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    
    
    print $name = ucwords($_POST['name']);
    print $typeID=$_POST['typeID'];
    $sql="UPDATE `order_type` SET `name`='$name' WHERE `ID`='$typeID'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a módosítás";
    } else{
        header("Location: ../order_type.php");
    }
}
?>