<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

print $city = ucwords($_POST['city']);
print $street = ucwords($_POST['street']);
print $house_number = ucwords($_POST['house_number']);



    $sql ="INSERT INTO site (city,street,house_number) 
	VALUES ('{$city}','{$street}','{$house_number}')";
    $result = $conn->query($sql);
    if(!$sql){
        print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
        print '<div class="input-group-text">Hiba a feltöltés közben!<br></div>';
        print '<form action="../errors.php"><button type="submit" class="btn btn-primary">Új hiba feltöltés</button> </form>';
    }else{
        header("Location: ../site.php");    
    }
?>