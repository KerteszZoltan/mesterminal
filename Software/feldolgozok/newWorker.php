<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

$workerName  = $_POST['workerName'];
$workerPhone  = $_POST['workerPhone'];
$partOfName = explode(" ", $workerName);
$firstName=ucwords($partOfName[0]);
$lastName=ucwords($partOfName[1]);
$thirdName=ucwords($partOfName[2]);
print $workerName = $firstName .' '. $lastName .' '. $thirdName;


$sql ="INSERT INTO workers (workerName,workerPhone) 
       VALUES ('{$workerName}','{$workerPhone}')";
$result = $conn->query($sql);
if(!$sql){
    print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Hiba a feltöltés közben!<br></div>';
    print '<form action="../errors.php"><button type="submit" class="btn btn-primary">Új dolgozó feltöltés</button> </form>';
    }else{
        header("Location: ../worker.php");    
    }
?>