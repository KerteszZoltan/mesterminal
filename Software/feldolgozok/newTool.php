<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

print $tool_name = ucwords($_POST['tool_name']);
print $tool_barcode = $_POST['tool_barcode'];

    $sql ="INSERT INTO tool (tool_barcode, tool_name) 
	VALUES ('{$tool_barcode}','{$tool_name}')";
    $result = $conn->query($sql);
    if(!$sql){
        print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
        print '<div class="input-group-text">Hiba a feltöltés közben!<br></div>';
        print '<form action="../tool.php"><button type="submit" class="btn btn-primary">Új szerszám feltöltés</button> </form>';
    }else{
        header("Location: ../tool.php");    
    }
?>