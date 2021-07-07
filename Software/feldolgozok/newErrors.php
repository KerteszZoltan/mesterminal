<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

print $errorName = ucwords($_POST['errorName']);

$hibaCheck = $conn->query( "SELECT * FROM `errors` WHERE errorName = '$errorName' ");
if($hibaCheck->num_rows > 0){
    print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Sikertelen feltöltés! Ilyen név már létezik!<br></div>';
    print '<form action="../errors.php"><button type="submit" class="btn btn-primary">Új hiba feltöltés</button> </form>';
    }else{
        $sql ="INSERT INTO errors (errorName) 
	    VALUES ('{$errorName}')";
        $result = $conn->query($sql);
        if(!$sql){
            print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
            print '<div class="input-group-text">Hiba a feltöltés közben!<br></div>';
            print '<form action="../errors.php"><button type="submit" class="btn btn-primary">Új hiba feltöltés</button> </form>';
        }else{
            header("Location: ../errors.php");
            
        }
    }
?>