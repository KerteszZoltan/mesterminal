<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

print $machine_name = ucwords($_POST['machine_name']);
print $machine_barcode = $_POST['machine_barcode'];
print $overhead_fee = $_POST['overhead_fee'];
print $internal_changeover = $_POST['internal_changeover'];


print $sql ="INSERT INTO machine (barcode,name,overhead_fee,internal_changeover) 
	   VALUES ('{$machine_barcode}', '{$machine_name}', '{$overhead_fee}', '{$internal_changeover}')";
$result = $conn->query($sql);
    if(!$sql){
        print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
        print '<div class="input-group-text">Hiba a feltöltés közben!<br></div>';
        print '<form action="../machine.php"><button type="submit" class="btn btn-primary">Új gép feltöltés</button> </form>';
    }else{
        header("Location: ../machine.php");
    }
?>