<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

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



$sql ="INSERT INTO user (user_barcode,user_name,user_phone,user_email,user_password) 
       VALUES ('{$user_barcode}','{$user_name}','{$user_phone}','{$user_email}','{$user_password}')";
$result = $conn->query($sql);
if(!$sql){
    print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Hiba a feltöltés közben!<br></div>';
    print '<form action="../user.php"><button type="submit" class="btn btn-primary">Új dolgozó feltöltés</button> </form>';
    }else{
        header("Location: ../user.php");    
    }
?>