<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

print '
    <table class="table">
    <th style="text-align:center; vertical-align:middle"> Kiválasztott munkalap azonosító </th>
    <th style="text-align:center; vertical-align:middle"> Kiválasztott munkalap neve </th>
    <th style="text-align:center; vertical-align:middle"> Munkalapon keletkezett hiba </th>
    <tr>
    ';

$sql="SELECT workpages.workpageId, workpages.workpageName, errors.errorName from errors 
INNER JOIN errorpage on errors.errorId=errorpage.errorId 
INNER JOIN workpages on workpages.workpageId=errorpage.workpageId;";
$reultWorkersPosts = $conn -> query($sql);
if ($reultWorkersPosts->num_rows > 0) {
    
    while($row = $reultWorkersPosts->fetch_assoc()) {
        print '
        <tr><td style="text-align:center; vertical-align:middle">'.$row['workpageId'].'</td>
        <td style="text-align:center; vertical-align:middle">'.$row['workpageName'].'</td> 
        <td style="text-align:center; vertical-align:middle">'.$row['errorName'].'</td></tr>
        ';
    }
}

?>