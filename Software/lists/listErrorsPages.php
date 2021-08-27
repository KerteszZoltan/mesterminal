<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

print '
    <table class="table">
    <th style="text-align:center; vertical-align:middle"> Hiba sorszáma </th>
	<th style="text-align:center; vertical-align:middle"> Műveleti lap vonalkód </th>
    <th style="text-align:center; vertical-align:middle"> Hiba neve </th>
    <th style="text-align:center; vertical-align:middle"> Gép neve </th>
	<th style="text-align:center; vertical-align:middle"> Szerszám neve </th>
	<th style="text-align:center; vertical-align:middle"> Leírás </th>
    <tr>
    ';

$sql="
SELECT `order_manufacturing_step_machine_error`.ID as ormanst_machine_error_ID,
`order_manufacturing_step_machine_error`.description,
`order_manufacturing_step`.barcode as ormanst_barcode,
`error`.name as error_name,
`machine`.name as machine_name,
`machine_tool`.name as machine_tool_name FROM
`order_manufacturing_step_machine_error` 
INNER JOIN `order_manufacturing_step` ON `order_manufacturing_step_machine_error`.order_manufacturing_step_ID=`order_manufacturing_step`.ID
INNER JOIN `error` ON `order_manufacturing_step_machine_error`.error_ID=`error`.ID
INNER JOIN `machine` ON `order_manufacturing_step_machine_error`.machine_ID=`machine`.ID
INNER JOIN `machine_tool` ON `order_manufacturing_step_machine_error`.machine_tool_ID=`machine_tool`.ID
";

$reultWorkersPosts = $conn -> query($sql);
if ($reultWorkersPosts->num_rows > 0) {
    
    while($row = $reultWorkersPosts->fetch_assoc()) {
        print '
        <tr><td style="text-align:center; vertical-align:middle">'.$row['ormanst_machine_error_ID'].'</td>
        <td style="text-align:center; vertical-align:middle">'.$row['ormanst_barcode'].'</td> 
		<td style="text-align:center; vertical-align:middle">'.$row['error_name'].'</td> 
		<td style="text-align:center; vertical-align:middle">'.$row['machine_name'].'</td> 
        <td style="text-align:center; vertical-align:middle">'.$row['machine_tool_name'].'</td>
		<td style="text-align:center; vertical-align:middle"><textarea>'.$row['description'].'</textarea></td></tr>
		
        ';
    }
}

?>