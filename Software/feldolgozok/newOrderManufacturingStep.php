<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

print $order_ID  = $_POST['order_ID'];
print $manufacturing_step_ID = $_POST['manufacturing_step_ID'];
print $expected_count = $_POST['expected_count'];
print $pass_count = $_POST['pass_count'];
print $fail_count = $_POST['fail_count'];
print $time = $_POST['time'];
print $normal_time = $_POST['normal_time'];
print $preparation_time = $_POST['preparation_time'];
print $unit_of_time = $_POST['unit_of_time'];

$selectStepCode="SELECT `step_code` FROM `manufacturing_step` WHERE `ID`='$manufacturing_step_ID'";
$resultStepCode=$conn->query($selectStepCode);
    if ($resultStepCode->num_rows > 0) {
      while($row = $resultStepCode->fetch_assoc()) {
		  print $step_code=$row['step_code'];
	  }
	}
$barcode=$step_code.'-'.$order_ID;

print $sql ="INSERT INTO `order_manufacturing_step` (barcode,order_ID, manufacturing_step_ID, expected_count, pass_count, fail_count, normal_time, preparation_time, unit_of_time ) 
       VALUES ('{$barcode}', '{$order_ID}','{$manufacturing_step_ID}', '{$expected_count}', '{$pass_count}', '{$fail_count}', '{$normal_time}','{$preparation_time}','{$unit_of_time}')";
$result = $conn->query($sql);
if(!$sql){
    print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Hiba a feltöltés közben!<br></div>';
    print '<form action="../order_manufacturing_step.php"><button type="submit" class="btn btn-primary">Új lépés feltöltése a gyártási rendeléshez</button> </form>';
    }else{
        header("Location: ../order_manufacturing_step.php");    
    }
?>