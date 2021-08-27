<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

print $user_id = $_POST['workerId'];
print '|';
print $order_id = $_POST['workpageId'];


    $sql ="INSERT INTO user_order (user_ID, order_ID) 
	VALUES ('{$user_id}','{$order_id}')";
    $result = $conn->query($sql);
    if(!$sql){
        print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
        print '<div class="input-group-text">Hiba a feltöltés közben!<br></div>';
        print '<form action="../user_order.php"><button type="submit" class="btn btn-primary">Új dolgozó-gyátási rendelés feltöltés</button> </form>';
    }else{
        header("Location: ../user_order.php");
    }
?>