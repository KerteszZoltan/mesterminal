<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

print $siteName = ucwords($_POST['siteName']);

    $sql ="INSERT INTO sites (siteName) 
	VALUES ('{$siteName}')";
    $result = $conn->query($sql);
    if(!$sql){
        print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
        print '<div class="input-group-text">Hiba a feltöltés közben!<br></div>';
        print '<form action="../errors.php"><button type="submit" class="btn btn-primary">Új hiba feltöltés</button> </form>';
    }else{
        header("Location: ../sites.php");    
    }
?>