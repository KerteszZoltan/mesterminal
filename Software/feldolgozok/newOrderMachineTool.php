<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

print $machine_ID = $_POST['machine_ID'];
print $machine_tool_ID = $_POST['machine_tool_ID'];
print $order_ID = $_POST['order_ID'];
$sqlCheck="SELECT * from `order_manufacturing_step_machine_tool` WHERE machine_ID='$machine_ID' AND order_ID='$order_ID'";
$resultCheck=$conn->query($sqlCheck);
if ($resultCheck->num_rows == 0) {
    $sqloverhead="SELECT `order_manufacturing_step`.overhead_fee as man_step_fee from `order_manufacturing_step` 
    where `order_manufacturing_step`.ID='$order_ID'";
    $overhead_man_step = $conn -> query($sqloverhead);
    if ($overhead_man_step->num_rows > 0) {
    while($row = $overhead_man_step->fetch_assoc()) {
            $man_step_overhead=$row['man_step_fee'];
        }
    }
    $count_member="SELECT count(ID) as members from `user_order_manufacturing_step` where 
    `user_order_manufacturing_step`.order_manufacturing_step_ID='$order_ID'";
    $member = $conn -> query($count_member);
    if ($member->num_rows > 0) {
    while($row = $member->fetch_assoc()) {
            $members=$row['members'];
        }
    }
    $sqlmachineoverhead="SELECT machine.overhead_fee,internal_changeover from machine where ID='$machine_ID'";
    $machinefee=$conn->query($sqlmachineoverhead);
    if ($machinefee->num_rows > 0) {
        while($row = $machinefee->fetch_assoc()) {
                $machine_fee=$row['overhead_fee'];
                $machine_changeover=$row['internal_changeover'];
            }
    }
    $sqlmachineoverhead="SELECT machine_tool.overhead_fee, internal_changeover from machine_tool where ID='$machine_tool_ID'";
    $machinefee=$conn->query($sqlmachineoverhead);
    if ($machinefee->num_rows > 0) {
        while($row = $machinefee->fetch_assoc()) {
                $machine_tool_fee=$row['overhead_fee'];
                $machinetool_internal_change=$row['internal_changeover'];
            }
    }
    $changeover=$machine_changeover+$machinetool_internal_change;
    print $overhead_fee=($members*$man_step_overhead)+$machine_fee+$machine_tool_fee;

    print $sql ="INSERT INTO `order_manufacturing_step_machine_tool` (order_manufacturing_step_ID, machine_ID, machine_tool_ID) 
	VALUES ('{$order_ID}','{$machine_ID}','{$machine_tool_ID}')";
    $result = $conn->query($sql);

    if(!$sql){
        print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
        print '<div class="input-group-text">Hiba a feltöltés közben!<br></div>';
        print '<form action="../order_machine_tool.php"><button type="submit" class="btn btn-primary">Új gyártási rendeléshez tartozó gép/szerszám feltöltése</button> </form>';
    }else{
    $changeover_update="UPDATE `order_manufacturing_step` SET
    `planned_internal_changeover`='$changeover'
    WHERE ID='$order_ID'";
    $update= $conn->query($changeover_update);
    $sqlupdate_man_step="UPDATE `order_manufacturing_step` SET
    `overhead_fee`='$overhead_fee'
    WHERE ID='$order_ID'";
    $update= $conn->query($sqlupdate_man_step);
        header("Location: ../order_machine_tool.php");
    }
}else{
   header("Location: ../order_machine_tool.php");
}

    
?>