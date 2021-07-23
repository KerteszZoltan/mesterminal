<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

print '
    <table class="table">
    <th style="text-align:center; vertical-align:middle"> Kiválasztott munkalap azonosító </th>
    <th style="text-align:center; vertical-align:middle"> Kiválasztott munkalap neve </th>
    <th style="text-align:center; vertical-align:middle"> Munkalapon használt gép </th>
    <tr>
    ';

$sql="SELECT workpages.workpageId, workpages.workpageName, machines.machineName from machines INNER JOIN machinepage on machines.machineId=machinepage.machineId INNER JOIN workpages on workpages.workpageId=machinepage.workpageId";
$reultWorkersPosts = $conn -> query($sql);
if ($reultWorkersPosts->num_rows > 0) {
    
    while($row = $reultWorkersPosts->fetch_assoc()) {
        print '
        <tr><td style="text-align:center; vertical-align:middle">'.$row['workpageId'].'</td>
        <td style="text-align:center; vertical-align:middle">'.$row['workpageName'].'</td> 
        <td style="text-align:center; vertical-align:middle">'.$row['machineName'].'</td></tr>
        ';
    }
}
print '</table>';


?>