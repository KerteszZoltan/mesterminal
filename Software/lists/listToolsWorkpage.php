<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

print '
    <table class="table">
    <th style="text-align:center; vertical-align:middle"> Kiválasztott munkalap azonosító </th>
    <th style="text-align:center; vertical-align:middle"> Kiválasztott munkalap neve </th>
    <th style="text-align:center; vertical-align:middle"> Munkalapon használt szerszám </th>
    <tr>
    ';

$sql="SELECT workpages.workpageId, workpages.workpageName, tools.toolName from tools INNER JOIN toolpage on tools.toolId=toolpage.toolId INNER JOIN workpages on workpages.workpageId=toolpage.workpageId GROUP by tools.toolId;";
$reultWorkersPosts = $conn -> query($sql);
if ($reultWorkersPosts->num_rows > 0) {
    
    while($row = $reultWorkersPosts->fetch_assoc()) {
        print '
        <tr><td style="text-align:center; vertical-align:middle">'.$row['workpageId'].'</td>
        <td style="text-align:center; vertical-align:middle">'.$row['workpageName'].'</td> 
        <td style="text-align:center; vertical-align:middle">'.$row['toolName'].'</td></tr>
        ';
    }
}

?>