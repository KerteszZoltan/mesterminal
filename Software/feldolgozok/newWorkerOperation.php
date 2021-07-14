<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

$workerId  = $_POST['workerId'];
$operationId  = $_POST['operationId'];
$operationTime = $_POST['operationTime']*15;

$sqlAdd ="INSERT INTO workeroperations (workerId,operationId,operationTime) 
       VALUES ('{$workerId}','{$operationId}','{$operationTime}')";
$result = $conn->query($sqlAdd);
if(!$sqlAdd){
    print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Hiba a feltöltés közben!<br></div>';
    print '<form action="../errors.php"><button type="submit" class="btn btn-primary">Új dolgozó feltöltés</button> </form>';
    }else{
        header("Location: ../workerOperation.php");    
    }
?>