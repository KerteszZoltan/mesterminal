<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
$user_barcode  = $_POST['user_barcode'];
$user_name  = $_POST['user_name'];
$user_phone  = $_POST['user_phone'];
$user_email  = $_POST['user_email'];
$user_password  = $_POST['user_password'];

$partOfName = explode(" ", $user_name);
$firstName=ucwords($partOfName[0]);
$lastName=ucwords($partOfName[1]);
if (!isset($partOfName[2])) {
    print $user_name = $firstName .' '. $lastName;
}else{
    $thirdName=ucwords($partOfName[2]);
    print $user_name = $firstName .' '. $lastName .' '. $thirdName;
}
print $user_ID=$_POST['user_ID']."<br>";

print $sql="UPDATE `user` SET `barcode`='$user_barcode', `name`='$user_name', `phone`='$user_phone', `email`='$user_email', `password`='$user_password' where `ID`='$user_ID'";
$result = $conn->query($sql);
if(!$result){
    print "nem sikerült a módosítás";
} else{
    Header("Location: ../user.php");
    }
}
?>