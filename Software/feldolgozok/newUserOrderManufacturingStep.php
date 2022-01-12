<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

print $user_ID  = $_POST['user_ID'];
print $order_manufacturing_step_ID = $_POST['order_manufacturing_step_ID'];



print $sql ="INSERT INTO `user_order_manufacturing_step` (user_ID, order_manufacturing_step_ID) 
       VALUES ('{$user_ID}', '{$order_manufacturing_step_ID}')";
$result = $conn->query($sql);
if(!$sql){
    print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Hiba a feltöltés közben!<br></div>';
    print '<form action="../user_order_manufacturing_step.php"><button type="submit" class="btn btn-primary">Új felhasználóhoz kapcsolt lépés feltöltése a gyártási rendeléshez</button> </form>';
    }else{
        header("Location: ../user_order_manufacturing_step.php");    
    }
?>