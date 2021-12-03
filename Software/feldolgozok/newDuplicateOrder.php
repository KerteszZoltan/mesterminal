<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}
print $customer_number=$_POST['customer_number'];

print $sqlOrderDuplicate="INSERT INTO `order`( `order_type_ID`, `customer_number`,`product_ID`, `order_status_ID`) 
                    select `order_type_ID`, `customer_number`, `product_ID` ,'2'  from `order` 
                    where customer_number='$customer_number';";
$resultOrderDuplicate = $conn->query($sqlOrderDuplicate);
print ' order duplicate <br>';
print $sqlLastOrderId="SELECT `ID` as last_ID, `customer_number` FROM `order` where `customer_number`='$customer_number' order by ID ASC LIMIT 1;";
$resultofficialID=$conn->query($sqlLastOrderId);
  if ($resultofficialID->num_rows > 0) {
    while($row = $resultofficialID->fetch_assoc()) {
        print $official=$row['last_ID'];
    }
}
print $last="SELECT `ID` as last_ID FROM `order` order by ID DESC LIMIT 1;";
$resultlast=$conn->query($last);
  if ($resultlast->num_rows > 0) {
    while($row = $resultlast->fetch_assoc()) {
        print $last=$row['last_ID'];
    }
}

print $official=$official;
$last;
print 'official'.$official;
print "<br>";
$sqlSelectOrder="SELECT CONCAT(`manufacturing_step`.`step_code`, '-' ,'$last') as barcode,
 `order_manufacturing_step`.`order_ID`,
 `order_manufacturing_step`.`manufacturing_step_ID`,
 `order_manufacturing_step`.`normal_time`
from `order_manufacturing_step` 
INNER JOIN `manufacturing_step` on `order_manufacturing_step`.`manufacturing_step_ID`=`manufacturing_step`.`ID`
where order_manufacturing_step.order_ID='".$official."';";
$resultSelectOrder=$conn->query($sqlSelectOrder);
  if ($resultSelectOrder->num_rows > 0) {
    while($row = $resultSelectOrder->fetch_assoc()) {
        $barcode=$row['barcode'];
        $order_ID=$last;
        $manufacturing_step_ID=$row['manufacturing_step_ID'];
        $normal_time=$row['normal_time'];

        print $sqlInsertStep="INSERT INTO `order_manufacturing_step`(`barcode`, `order_ID`, `manufacturing_step_ID`,`normal_time`) VALUES 
        ('{$barcode}', '{$last}', '{$manufacturing_step_ID}', '{$normal_time}')";
        print '<br>';
        $resutlinsert=$conn->query($sqlInsertStep);
    }
}

if(!$resutlinsert){
    print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Hiba a gyártási rendelés létrehozás közben!<br></div>';
    print '<form action="../order.php"><button type="submit" class="btn btn-primary">Gyártási rendelések</button> </form>';
}else{
    header("Location: ../order.php");
}
?>