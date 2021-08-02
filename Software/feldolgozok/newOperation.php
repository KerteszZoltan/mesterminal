<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

print $operation_name = ucwords($_POST['operation_name']);

    print $sql ="INSERT INTO operation (operation_name) 
	VALUES ('{$operation_name}')";
    $result = $conn->query($sql);
    if(!$sql){
        print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
        print '<div class="input-group-text">Hiba a feltöltés közben!<br></div>';
        print '<form action="../operation.php"><button type="submit" class="btn btn-primary">Új művelet feltöltés</button> </form>';
    }else{
        header("Location: ../operation.php");    
    }
?>