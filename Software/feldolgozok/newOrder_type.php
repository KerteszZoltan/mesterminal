<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

print $name = $_POST['name'];

    print $sql ="INSERT INTO `order_type` (name) 
	VALUES ('{$name}')";
    $result = $conn->query($sql);
    if(!$sql){
        print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
        print '<div class="input-group-text">Hiba a feltöltés közben!<br></div>';
        print '<form action="../order_type.php"><button type="submit" class="btn btn-primary">Új rendelési típus feltöltés</button> </form>';
    }else{
        header("Location: ../order_type.php");
    }
?>