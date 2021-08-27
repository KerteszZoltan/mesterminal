<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

$workerId  = $_POST['workerId'];
$operationId  = $_POST['operationId'];
$operationTime = $_POST['operationTime']*15;
$actualMonth=date("Y/m");

$check="SELECT user_ID, operation_ID, month from user_operation where user_ID='$workerId' and operation_ID='$operationId' and month='$actualMonth'";
$resultCheck=$conn->query($check);
if ($resultCheck->num_rows > 0) {
    header("Location: ../workerOperation.php");
}else {
    print $sqlAdd ="INSERT INTO user_operation (user_ID, operation_ID, time, month) 
    VALUES ('{$workerId}','{$operationId}','{$operationTime}', '{$actualMonth}' )";
    $result = $conn->query($sqlAdd);
    if(!$sqlAdd){
        print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
        print '<div class="input-group-text">Hiba a feltöltés közben!<br></div>';
        print '<form action="../workerOperation.php"><button type="submit" class="btn btn-primary">Új adat feltöltése</button> </form>';
        }else{
            //header("Location: ../workerOperation.php");    
        }
}


?>