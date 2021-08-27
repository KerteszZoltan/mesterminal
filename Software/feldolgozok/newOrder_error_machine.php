<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

print $or_man_step  = $_POST['or_man_step'];
print $error_ID  = $_POST['error_ID'];
print $machine_ID  = $_POST['machine_ID'];
print $machine_tool_ID  = $_POST['machine_tool_ID'];
print $date_start  = $_POST['date_start'];
print $date_end  = $_POST['date_end'];
print $user_ID  = $_POST['user_ID'];
print $description  = $_POST['description'];


print $sql ="INSERT INTO `order_manufacturing_step_machine_error` (order_manufacturing_step_ID, error_ID,machine_ID,machine_tool_ID,date_start, date_end,user_ID,description ) 
       VALUES ('{$or_man_step}','{$error_ID}','{$machine_ID}','{$machine_tool_ID}','{$date_start}','{$date_end}','{$user_ID}','{$description}')";
$result = $conn->query($sql);

if(!$result){
    print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Hiba a feltöltés közben!<br></div>';
    print '<form action="../error_order_machine.php"><button type="submit" class="btn btn-primary">Új hiba feltöltése</button> </form>';
    }else{
        header("Location: ../error_order_machine.php");    
    }
?>