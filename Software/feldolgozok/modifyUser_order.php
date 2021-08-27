<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if (isset($_POST['user_order_id'])) {
    print $user_order_id=$_POST['user_order_id'].' ';
    print $work_time=$_POST['work_time'];
    $checkTime="SELECT user_order.time from `user_order` where `user_order`.ID='$user_order_id'";
    $resultCheckTime=$conn->query($checkTime);
    $actualTime='';
    if ($resultCheckTime->num_rows > 0) {
        while($row = $resultCheckTime->fetch_assoc()) {
            print '-'.$actualTime=$row['time'].'-';
        }
    }

    print $work_time=$work_time+$actualTime;

    $sql="UPDATE `user_order` SET `time`='$work_time' WHERE ID='$user_order_id'";
    $result = $conn->query($sql); 
    if(!$result){
        print "nem sikerült a módosítás";
    } else{
        header("Location: ../user_order.php");
    }
}
    

?>