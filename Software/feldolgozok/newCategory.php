<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

print $name = ucwords($_POST['name']);


$hibaCheck = $conn->query( "SELECT * FROM `category` WHERE name = '$name'");
if($hibaCheck->num_rows > 0){
    print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Sikertelen feltöltés! Ilyen névű kategória már létezik!<br></div>';
    print '<form action="../category.php"><button type="submit" class="btn btn-primary">Új kategória feltöltés</button> </form>';
    }else{
        $sql ="INSERT INTO `category` (name) 
	    VALUES ('{$name}')";
        $result = $conn->query($sql);
        if(!$sql){
            print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
            print '<div class="input-group-text">Hiba a feltöltés közben!<br></div>';
            print '<form action="../category.php"><button type="submit" class="btn btn-primary">Új kategória feltöltés</button> </form>';
        }else{
            header("Location: ../category.php");
            
        }
    }
?>