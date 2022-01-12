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
`order_manufacturing_step`.expected_performance,
`order_manufacturing_step`.performance,
`order_manufacturing_step`.pass_count,
`order_manufacturing_step`.fail_count,
`order_manufacturing_step`.overhead_fee,
`order_manufacturing_step`.planned_internal_changeover,
`order_manufacturing_step`.internal_changeover,
`order_manufacturing_step`.external_changeover,
`order_manufacturing_step`.planned_education,
`order_manufacturing_step`.education,
`order`.manufactured_count as need_order
from `order_manufacturing_step` 
INNER JOIN `manufacturing_step` on `order_manufacturing_step`.manufacturing_step_ID=`manufacturing_step`.ID
INNER JOIN `order` on `order_manufacturing_step`.`order_ID`=`order`.ID
WHERE `order`.`order_status_ID`>'1' order by `order_manufacturing_step`.ID DESC 
LIMIT 100
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
            <th scope="col">Művelet</th>
            <th scope="col">Gyártandó mennyiség</th>
            <th scope="col">Elvárt teljesítmény</th>
            <th scope="col">Tényleges teljesítmény</th>
            <th scope="col">Sikeres darabszám</th>
            <th scope="col">Selejt darabszám</th>
			<th scope="col">Önköltségi óradíj</th>
			<th scope="col">Tervezett belső átállás</th>
			<th scope="col">Tényleges belső átállás</th>
			<th scope="col">Tényleges külső átállás</th>
			<th scope="col">Tervezett Oktatás / Fejlesztés</th>
			<th scope="col">Tényleges Oktatás / Fejlesztés</th>
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
            <td>'.$row["need_order"].'db</td>            
            <td><input type="text" name="expected_performance" value="'.$row["expected_performance"].'" style="max-width:50px">perc/db</td>
            <td><input type="text" name="performance" value="'.$row["performance"].'" style="max-width:50px">perc/db</td>            
			<td><input type="text" name="pass_count" value="'.$row["pass_count"].'" style="max-width:50px">db</td>
            <td><input type="text" name="fail_count" value="'.$row["fail_count"].'" style="max-width:50px">db</td>
			<td><input type="text" name="overhead_fee" value="'.$row["overhead_fee"].'" style="max-width:50px">Ft/óra</td>
            <td><input type="text" name="planned_internal_changeover" value="'.$row["planned_internal_changeover"].'" style="max-width:40px">perc</td>
            <td><input type="text" name="internal_changeover" value="'.$row["internal_changeover"].'" style="max-width:40px">perc</td>
            <td><input type="text" name="external_changeover" value="'.$row["external_changeover"].'" style="max-width:40px">perc</td>
            <td><input type="text" name="planned_education" value="'.$row["planned_education"].'" style="max-width:40px">perc</td>
            <td><input type="text" name="education" value="'.$row["education"].'" style="max-width:40px">perc</td>
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

