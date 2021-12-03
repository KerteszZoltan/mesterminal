<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

$user_id  = $_POST['user_id'];
$operation_id  = $_POST['operation_id'];
$date  = $_POST['date'];
$time  = $_POST['time']*15;
$selectCheck="SELECT user_id,operation_id,date from `user_operation_time` 
where user_id='".$user_id."' AND operation_id='".$operation_id."' AND date='".$date."'";
$resultCheck=$conn->query($selectCheck);
if ($resultCheck->num_rows > 0) {
    print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Hiba a feltöltés közben! Már létezik ilyen név, művelet és dátum kombináció<br></div>';
    print '<form action="../user_operation_time.php"><button type="submit" class="btn btn-primary">Új napi művelet feltöltés</button> </form>';
}else{
    $sqlAdd="INSERT INTO `user_operation_time` (user_id,operation_id,date,time) 
                        VALUES ('{$user_id}','{$operation_id}','{$date}','{$time}')";
    $result = $conn->query($sqlAdd);
    // $actualMonth=date("Y/m");
    $actualMonth='2021/11';
    $sqlSumCheck="SELECT user_ID, operation_ID, month from user_operation where user_ID='$user_id' and operation_ID='$operation_id' and month='$actualMonth'";
    $resultCheckMonthly=$conn->query($sqlSumCheck);
    if($resultCheckMonthly->num_rows>0){
        $sqlTime="SELECT ID, time as stored_time from user_operation where user_ID='$user_id' and operation_ID='$operation_id' and month='$actualMonth'";
        $resultTime=$conn->query($sqlTime);
        if ($resultTime->num_rows>0) {
            while ($row=$resultTime->fetch_assoc()) {
                $user_op_mon_ID=$row['ID'];
                $storagetime=$row['stored_time'];
                $newTime=$time+$storagetime;
            }
        }
        print $sqlmodify="UPDATE `user_operation` SET `time`='$newTime' WHERE ID='$user_op_mon_ID' and month='$actualMonth'";
        $resultmodify=$conn->query($sqlmodify);
    }
    else{
        $sqlNewUserOp ="INSERT INTO user_operation (user_ID, operation_ID, time, month) 
    VALUES ('{$user_id}','{$operation_id}','{$time}', '{$actualMonth}' )";
    $resultNewUserOp = $conn->query($sqlNewUserOp);
    }
    if(!$sqlAdd){
        print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
        print '<div class="input-group-text">Hiba a feltöltés közben! Már létezik ilyen név, művelet és dátum kombináció<br></div>';
        print '<form action="../user_operation_time.php"><button type="submit" class="btn btn-primary">Új napi művelet feltöltés</button> </form>';
    }else{
        header("Location: ../user_operation_time.php");    
    }
}
?>