<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

print '
    <table class="table">
    <th style="text-align:center; vertical-align:middle"> Műveleti lap vonalkódja </th>
    <th style="text-align:center; vertical-align:middle"> Műveleti lapon használt gép </th>
    <th style="text-align:center; vertical-align:middle"> Műveleti lapon használt szerszám </th>
    <tr>
    ';
	
$sql="
SELECT 
`order_manufacturing_step`.barcode as ormanst_barcode,
`machine`.name as machine_name,
`machine_tool`.name as machine_tool_name
FROM `order_manufacturing_step_machine_tool` 
INNER JOIN `order_manufacturing_step` ON `order_manufacturing_step_machine_tool`.order_manufacturing_step_ID=`order_manufacturing_step`.ID
INNER JOIN `machine` ON `order_manufacturing_step_machine_tool`.machine_ID=`machine`.ID
INNER JOIN `machine_tool` ON `order_manufacturing_step_machine_tool`.machine_tool_ID=`machine_tool`.ID
";
$reultWorkersPosts = $conn -> query($sql);
if ($reultWorkersPosts->num_rows > 0) {
    
    while($row = $reultWorkersPosts->fetch_assoc()) {
        print '
        <tr><td style="text-align:center; vertical-align:middle">'.$row['ormanst_barcode'].'</td>
        <td style="text-align:center; vertical-align:middle">'.$row['machine_name'].'</td> 
        <td style="text-align:center; vertical-align:middle">'.$row['machine_tool_name'].'</td> 
        </tr>
        ';
    }
}
print '</table>';


?>