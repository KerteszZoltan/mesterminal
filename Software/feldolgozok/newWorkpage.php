<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

print $workpageName  = ucwords($_POST['workpageName']);
print $expectedDB = $_POST['expectedDB'];
print $successedDB = $_POST['successedDB'];
print $discardDB = $_POST['discardDB'];
print $workpageId = $_POST['workpageId'];


print $sql ="INSERT INTO workpages (workpageName, expectedDB, successedDB, discardDB) 
       VALUES ('{$workpageName}', '{$expectedDB}', '{$successedDB}', '{$discardDB}')";
$result = $conn->query($sql);
if(!$sql){
    print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Hiba a feltöltés közben!<br></div>';
    print '<form action="../errors.php"><button type="submit" class="btn btn-primary">Új dolgozó feltöltés</button> </form>';
    }else{
        header("Location: ../workpages.php");    
    }
?>