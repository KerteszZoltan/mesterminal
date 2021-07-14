<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}
print '
    <table class="table">
    <th colspan="2" style="text-align:center; vertical-align:middle"> Kiválasztott munkalapon dolgozók </th>
    <th style="text-align:center; vertical-align:middle"> Művelettel eltöltött idő percben </th>
    <tr>
    ';

$sql="SELECT workers.workerName,operations.operationName,workeroperations.operationTime from `workers` INNER JOIN workeroperations on workers.workerId=workeroperations.workerId
INNER JOIN operations on workeroperations.operationId=operations.operationId";
$reultWorkersPosts = $conn -> query($sql);
if ($reultWorkersPosts->num_rows > 0) {
    while($row = $reultWorkersPosts->fetch_assoc()) {
        print '
        <tr><td style="text-align:center; vertical-align:middle">'.$row['workerName'].'</td> 
        <td style="text-align:center; vertical-align:middle">'.$row['operationName'].'</td> 
        <td style="text-align:center; vertical-align:middle">'.$row['operationTime'].'</td></tr>
        ';
    }
}

print '</tables>';

?>
