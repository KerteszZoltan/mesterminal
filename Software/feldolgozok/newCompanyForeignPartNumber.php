<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

print $companyId = $_POST['companyId'];
print $productId = $_POST['productId'];
print $foreignId = $_POST['foreignId'];

if(!empty($foreignId)){
    $sql ="INSERT INTO companyforeignpartnumbers (companyId, productId, foreignId) 
    VALUES ('{$companyId}','{$productId}','{$foreignId}' )";
    $result = $conn->query($sql);
} else {
    $sql ="INSERT INTO companyforeignpartnumbers (companyId, productId, foreignId) 
    VALUES ('{$companyId}','{$productId}','{$productId}' )";
    $result = $conn->query($sql);
}


if(!$sql){
    print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Hiba a feltöltés közben!<br></div>';
    print '<form action="../errors.php"><button type="submit" class="btn btn-primary">Új hiba feltöltés</button> </form>';
    }
else{
    header("Location: ../companyForeignPartNumber.php");     
    }

?>