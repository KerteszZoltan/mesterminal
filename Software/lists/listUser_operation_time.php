<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

$user_id=$_POST['user_id'];
$operation_id=$_POST['operation_id'];
$date=$_POST['date'];

$select="SELECT 
        user.name as user_name,
        operation.name as operation_name,
        `user_operation_time`.date,
        `user_operation_time`.time 
        FROM `user_operation_time` 
        INNER JOIN `user` on `user_operation_time`.user_ID=`user`.ID
        INNER JOIN `operation` on `user_operation_time`.operation_ID=`operation`.ID
        where `user_operation_time`.user_id='".$user_id."' 
        AND `user_operation_time`.date='".$date."';";
print '
<div class="row">
    <div class="col text-center">Dolgozó neve</div><div class="col text-center">Művelet neve</div><div class="col text-center">Művelet ideje percben</div><div class="col text-center">Művelet ideje órában</div>
</div>';
$result=$conn->query($select);
if ($result->num_rows>0) {
    while ($row=$result->fetch_assoc()) {
        $hoursTime=$row['time']/60;
        print '
        <div class="row">
            <div class="col text-center">'.$row['user_name'].'</div><div class="col text-center">'.$row['operation_name'].'</div><div class="col text-center">'.$row['time'].' perc</div><div class="col text-center">'.$hoursTime.' óra</div>
        </div>
        ';
    }
}

?>
