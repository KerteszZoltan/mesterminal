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
workers.workerId, workers.workerName,
operations.operationName,
workeroperations.operationTime, workeroperations.operationMonth, workeroperations.workerAndOperationId
from `workers` INNER JOIN workeroperations on workers.workerId=workeroperations.workerId
INNER JOIN operations on workeroperations.operationId=operations.operationId where workeroperations.operationMonth='$actualDate'";
$reultWorkersPosts = $conn -> query($sql);
if ($reultWorkersPosts->num_rows > 0) {
    while($row = $reultWorkersPosts->fetch_assoc()) {
        print '
        <tr><td style="text-align:center; vertical-align:middle">'.$row['workerId'].'</td> 
        <td style="text-align:center; vertical-align:middle">'.$row['workerName'].'</td> 
        <td style="text-align:center; vertical-align:middle">'.$row['operationName'].'</td> 
        <form action="feldolgozok/modifyWorkersOperations.php" method="POST">
        <input type="hidden" name="workerAndOperationId" value="'.$row['workerAndOperationId'].'">
        <input type="hidden" name="actualTime" value="'.$row['operationTime'].'">
        <td style="text-align:center; vertical-align:middle"><input type="text" name="operationTime" value="'.$row['operationTime'].'"></td>
        </form>
        <td style="text-align:center; vertical-align:middle">'.$row['operationMonth'].'</td> 
        </tr>
        ';
    }
}

print '</tables>';

?>
