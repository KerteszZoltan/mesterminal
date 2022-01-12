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
`order_manufacturing_step`.ID as ormanst_id,
`order_manufacturing_step`.barcode as ormanst_barcode,
`machine`.name as machine_name,
`machine`.ID as machine_ID,
`machine_tool`.name as machine_tool_name,
`machine_tool`.ID as machine_tool_id
FROM `order_manufacturing_step_machine_tool` 
INNER JOIN `order_manufacturing_step` ON `order_manufacturing_step_machine_tool`.order_manufacturing_step_ID=`order_manufacturing_step`.ID
INNER JOIN `machine` ON `order_manufacturing_step_machine_tool`.machine_ID=`machine`.ID
INNER JOIN `machine_tool` ON `order_manufacturing_step_machine_tool`.machine_tool_ID=`machine_tool`.ID
";
$reultWorkersPosts = $conn -> query($sql);
if ($reultWorkersPosts->num_rows > 0) {
    
    while($row = $reultWorkersPosts->fetch_assoc()) {
        print '
        <form action="feldolgozok/modifyOrderMachineTool.php" method="POST">
        <tr><td style="text-align:center; vertical-align:middle">'.$row['ormanst_barcode'].'</td>
        <td><select name="machine_id" class="form-select">
				<option selected value="'.$row['machine_ID'].'">'.$row['machine_name'].'</option>';
			$machine="SELECT ID, name FROM `machine`";
			$resultmachine=$conn->query($machine);
			if ($resultmachine->num_rows > 0) {
				while($crow = $resultmachine->fetch_assoc()) {
					print'<option value="'.$crow['ID'].'"> '.$crow['name'].'</option>';
				}
			}
            print '
			</select>
			</td>
            <td><select name="tool_id" class="form-select">
				<option selected value="'.$row['machine_tool_id'].'">'.$row['machine_tool_name'].'</option>';
			$machine_tool="SELECT ID, name FROM `machine_tool`";
			$result_machine_tool=$conn->query($machine_tool);
			if ($result_machine_tool->num_rows >= 0) {
				while($crow = $result_machine_tool->fetch_assoc()) {
					print'<option value="'.$crow['ID'].'"> '.$crow['name'].'</option>';
				}
			}
            print '
			</select>
			</td> 
            <td>
            <Button type="submit" name="ormanst_id" value="'.$row["ormanst_id"].'" class="btn btn-primary">Módosítás</button>
            </td>
        </tr>
        </form>
        ';
    }
}
print '</table>';


?>