<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

print $machine_ID = $_POST['machine_ID'];
print $machine_tool_ID = $_POST['machine_tool_ID'];
print $order_ID = $_POST['order_ID'];
$sqlCheck="SELECT * from `order_manufacturing_step_machine_tool` WHERE machine_ID='$machine_ID' AND order_ID='$order_ID' AND machine_tool_ID='$machine_tool_ID'";
$resultCheck=$conn->query($sqlCheck);
if ($resultCheck->num_rows == 0) {
    print $sql ="INSERT INTO `order_manufacturing_step_machine_tool` (order_manufacturing_step_ID, machine_ID, machine_tool_ID) 
	VALUES ('{$order_ID}','{$machine_ID}','{$machine_tool_ID}')";
    $result = $conn->query($sql);
    if(!$sql){
        print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
        print '<div class="input-group-text">Hiba a feltöltés közben!<br></div>';
        print '<form action="../order_machine_tool.php"><button type="submit" class="btn btn-primary">Új gyártási rendeléshez tartozó gép/szerszám feltöltése</button> </form>';
    }else{
        header("Location: ../order_machine_tool.php");
    }
}else{
    header("Location: ../order_machine_tool.php");
}

    
?>