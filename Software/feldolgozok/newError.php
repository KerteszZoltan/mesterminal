<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

print $error_name = ucwords($_POST['error_name']);
print $error_barcode = $_POST['error_barcode'];


$hibaCheck = $conn->query( "SELECT * FROM `error` WHERE error_name = '$error_name' OR error_barcode='$error_barcode' ");
if($hibaCheck->num_rows > 0){
    print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Sikertelen feltöltés! Ilyen név/vonalkód már létezik!<br></div>';
    print '<form action="../error.php"><button type="submit" class="btn btn-primary">Új hiba feltöltés</button> </form>';
    }else{
        $sql ="INSERT INTO error (error_name,error_barcode) 
	    VALUES ('{$error_name}','{$error_barcode}')";
        $result = $conn->query($sql);
        if(!$sql){
            print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
            print '<div class="input-group-text">Hiba a feltöltés közben!<br></div>';
            print '<form action="../error.php"><button type="submit" class="btn btn-primary">Új hiba feltöltés</button> </form>';
        }else{
            header("Location: ../error.php");
            
        }
    }
?>