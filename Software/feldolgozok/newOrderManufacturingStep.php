<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

print $order_ID  = $_POST['order_ID'];
print $manufacturing_step_ID = $_POST['manufacturing_step_ID'];
print $expected_performance = $_POST['expected_performance'];
print $performance = $_POST['performance'];
print $pass_count = $_POST['pass_count'];
print $fail_count = $_POST['fail_count'];
print $overhead_fee = $_POST['overhead_fee'];
$internal_changeover = $_POST['internal_changeover'];
$external_changeover = $_POST['external_changeover'];
$planned_internal_changeover = $_POST['planned_internal_changeover'];
$education = $_POST['education']; 
$planned_education = $_POST['planned_education']; 




$selectStepCode="SELECT `step_code`, `overhead_fee`, `education` FROM `manufacturing_step` WHERE `ID`='$manufacturing_step_ID'";
$resultStepCode=$conn->query($selectStepCode);
    if ($resultStepCode->num_rows > 0) {
      while($row = $resultStepCode->fetch_assoc()) {
		  print $step_code=$row['step_code'];
          print $overhead_fee=$row['overhead_fee'];
          if ($education!='0') {
            $planned_education=$row['education'];
          }
	  } 
	}
$barcode=$step_code.'-'.$order_ID;


print $sql ="INSERT INTO `order_manufacturing_step` 
(barcode,order_ID, manufacturing_step_ID, expected_performance, performance, pass_count, fail_count, overhead_fee,planned_internal_changeover ,internal_changeover,external_changeover, education, planned_education ) 
       VALUES ('{$barcode}', '{$order_ID}','{$manufacturing_step_ID}', '{$expected_performance}', '{$performance}', '{$pass_count}', '{$fail_count}', '{$overhead_fee}', '{$planned_internal_changeover}', '{$internal_changeover}', '{$external_changeover}', '{$education}', '{$planned_education}')";
$result = $conn->query($sql);
if(!$sql){
    print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Hiba a feltöltés közben!<br></div>';
    print '<form action="../order_manufacturing_step.php"><button type="submit" class="btn btn-primary">Új lépés feltöltése a gyártási rendeléshez</button> </form>';
    }else{
       header("Location: ../order_manufacturing_step.php");    
    }
?>