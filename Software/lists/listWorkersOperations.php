<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}
print '
    <table class="table">
    <th style="text-align:center; vertical-align:middle"> Dolgozói azonosító </th>
    <th style="text-align:center; vertical-align:middle"> Dolgozó neve </th>
    <th style="text-align:center; vertical-align:middle"> Művelet neve </th>
    <th style="text-align:center; vertical-align:middle"> Művelettel eltöltött idő percben </th>
    <th style="text-align:center; vertical-align:middle"> Műveleti hónap </th>
    <tr>
    ';
    

$actualDate=date("Y/m");
$sql="SELECT 
user.ID, user.name,
operation.name as operation_name,
user_operation.time, user_operation.month, user_operation.ID as user_operation_id
from `user` INNER JOIN user_operation on user.ID=user_operation.user_ID
INNER JOIN operation on user_operation.operation_ID=operation.ID where user_operation.month='$actualDate'";
$reultWorkersPosts = $conn -> query($sql);
if ($reultWorkersPosts->num_rows > 0) {
    while($row = $reultWorkersPosts->fetch_assoc()) {
        print '
        <tr><td style="text-align:center; vertical-align:middle">'.$row['ID'].'</td> 
        <td style="text-align:center; vertical-align:middle">'.$row['name'].'</td> 
        <td style="text-align:center; vertical-align:middle">'.$row['operation_name'].'</td> 
        <form action="feldolgozok/modifyWorkersOperations.php" method="POST">
        <input type="hidden" name="workerAndOperationId" value="'.$row['user_operation_id'].'">
        <input type="hidden" name="actualTime" value="'.$row['time'].'">
        <td style="text-align:center; vertical-align:middle"><input type="text" name="operationTime" value="'.$row['time'].'"></td>
        </form>
        <td style="text-align:center; vertical-align:middle">'.$row['month'].'</td> 
        </tr>
        ';
    }
}

print '</tables>';

?>
