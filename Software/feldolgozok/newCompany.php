<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

print $companyName = ucwords($_POST['companyName']);

$hibaCheck = $conn->query( "SELECT * FROM `companys` WHERE companyName = '$companyName' ");
if($hibaCheck->num_rows > 0){
    print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Sikertelen feltöltés! Ilyen név már létezik! '.$companyName.'<br></div>';
    print '<form action="../companys.php"><button type="submit" class="btn btn-primary">Új cég feltöltés</button> </form>';
    ?>
    <?php
    }else{
        $sql ="INSERT INTO companys (companyName) 
	    VALUES ('{$companyName}')";
        $result = $conn->query($sql);
        if(!$sql){
            print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
            print '<div class="input-group-text">Hiba a feltöltés közben!<br></div>';
            print '<form action="../companys.php"><button type="submit" class="btn btn-primary">Új Cég feltöltés</button> </form>';
        }else{
            header("Location: ../companys.php");
            
        }
    }
?>