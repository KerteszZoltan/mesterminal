<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

$sql="
SELECT `order_manufacturing_step`.ID as order_manufacturing_step_id,
`manufacturing_step`.step_code as step_code,
`manufacturing_step`.ID as manufacturing_step_ID,
`manufacturing_step`.name as step_name,
`order`.ID as order_id,
`order`.customer_number as customer_number,
`order_manufacturing_step`.barcode,
`order_manufacturing_step`.expected_count,
`order_manufacturing_step`.pass_count,
`order_manufacturing_step`.fail_count,
`order_manufacturing_step`.normal_time,
`order_manufacturing_step`.preparation_time,
`order_manufacturing_step`.unit_of_time,
`order_manufacturing_step`.overhead_fee
from `order_manufacturing_step` 
INNER JOIN `manufacturing_step` on `order_manufacturing_step`.manufacturing_step_ID=`manufacturing_step`.ID
INNER JOIN `order` on `order_manufacturing_step`.`order_ID`=`order`.ID
WHERE `order`.`order_status_ID`>'1' order by `order_manufacturing_step`.ID DESC 
";
$resultWorkers = $conn -> query($sql);
if ($resultWorkers->num_rows > 0) {
    print '
    <div style="overflow: scroll">
    <table class="table table-striped" style="overflow: scroll">
        <thead>
        <tr>
            <th scope="col">Azonosító</th>
            <th scope="col">Gyártási rendelés</th>
            <th scope="col">Vonalkód </th>			
            <th scope="col">Gyártási lépés</th>
            <th scope="col">Elvárt darabszám</th>
            <th scope="col">Sikeres darabszám</th>
            <th scope="col">Selejt darabszám</th>
			<th scope="col">Norma idő</th>
			<th scope="col">Előkészítési idő</th>
			<th scope="col">Egységnyi idő</th>
			<th scope="col">Rezsióradíj</th>
			<th scope="col">Módosítás</th>
			<th scope="col">Törlés</th>
        </tr>
        </thead>
        <tbody>
        ';
    while($row = $resultWorkers->fetch_assoc()) {
        print '
            <tr>
			<form action="worksheetId.php" method="POST">
			<input type="hidden" name="sheetId" value="'.$row["order_manufacturing_step_id"].'" class="btn">
			<td><input type="submit" value="'.$row["order_manufacturing_step_id"].'"></td>   
			</form>
			<form action="feldolgozok/modifyorder_manufacturing_step.php" method="POST">   
			<td>'.$row["order_id"].'-'.$row["customer_number"].'</td>
			<td>'.$row["barcode"].'</td>
            <td>'.$row["step_code"].'-'.$row["step_name"].'</td>
            <td><input type="text" name="expected_count" value="'.$row["expected_count"].'" style="max-width:50px">db</td>            
			<td><input type="text" name="pass_count" value="'.$row["pass_count"].'" style="max-width:50px">db/óra</td>
            <td><input type="text" name="fail_count" value="'.$row["fail_count"].'" style="max-width:50px">db</td>
			<td><input type="text" name="normal_time" value="'.$row["normal_time"].'" style="max-width:30px">perc</td>
			<td><input type="text" name="preparation_time" value="'.$row["preparation_time"].'" style="max-width:40px">perc</td>
			<td><input type="text" name="unit_of_time" value="'.$row["unit_of_time"].'" style="max-width:30px">perc</td>
			<td><input type="text" name="overhead_fee" value="'.$row["overhead_fee"].'" style="max-width:50px">Ft/óra</td>
			<td><input type="hidden" name="ordmanstus_id" value="'.$row["order_manufacturing_step_id"].'"><input type="submit" value="Módosítás" class="btn btn-primary"></td>
            </form>
			<form action="feldolgozok/deleteOrderManufacturingStep.php" method="POST">
			<td><input type="hidden" name="ordmanstus_id" value="'.$row["order_id"].'">
			<input type="hidden" name="step_barcode" value="'.$row["step_code"].'">
			<input type="submit" value="Törlés" class="btn btn-danger"></td>
			</form>
			</tr>';
    }
    print '
        </tbody>
        </table>
        </div>';
}else{
}



?>

