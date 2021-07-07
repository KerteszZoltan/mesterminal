<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

print $errorId = $_POST['errorId'];
print '|';
print $workpageId = $_POST['workpageId'];


    $sql ="INSERT INTO errorpage (errorId, workpageId) 
	VALUES ('{$errorId}','{$workpageId}')";
    $result = $conn->query($sql);
    if(!$sql){
        print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
        print '<div class="input-group-text">Hiba a feltöltés közben!<br></div>';
        print '<form action="../errors.php"><button type="submit" class="btn btn-primary">Új hiba feltöltés</button> </form>';
    }else{
        header("Location: ../machinesWorkpage.php");
    }
?>