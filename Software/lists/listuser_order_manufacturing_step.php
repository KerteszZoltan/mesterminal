<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

$sql="SELECT 
`user_order_manufacturing_step`.ID as sorszam,
`user_order_manufacturing_step`.time,
`user`.ID as user_id,
`user`.name,
`order_manufacturing_step`.barcode,
`order`.customer_number,
`manufacturing_step`.name as manfac_name
FROM `user_order_manufacturing_step`
INNER JOIN `user` ON `user_order_manufacturing_step`.user_ID=`user`.ID
INNER JOIN `order_manufacturing_step` ON `user_order_manufacturing_step`.order_manufacturing_step_ID=`order_manufacturing_step`.ID
INNER JOIN `order` ON `order_manufacturing_step`.order_ID=`order`.ID
INNER JOIN `manufacturing_step` ON `order_manufacturing_step`.manufacturing_step_ID=`manufacturing_step`.ID 
WHERE `order`.order_status_ID!='1'
order by `user_order_manufacturing_step`.ID DESC
";
$resultWorkers = $conn -> query($sql);
if ($resultWorkers->num_rows > 0) {
    print '
    <div style="overflow: scroll">
    <table class="table table-striped" style="overflow: scroll">
        <thead>
        <tr>
            <th scope="col">Sorszám</th>
            <th scope="col">Dolgozó neve</th>
            <th scope="col">Vonalkód </th>			
            <th scope="col">Művelet neve</th>
            <th scope="col">Vevői rendelés száma</th>
            <th scope="col">Művelettel töltött idő</th>
        </tr>
        </thead>
        <tbody>
        ';
    while($row = $resultWorkers->fetch_assoc()) {
        print '
            <tr>
			<form action="feldolgozok/modifyUserOrderManStep.php" method="POST">
            <td>'.$row["sorszam"].'</td>

			<td><select name="user_id" class="form-select" id="user_id">
				<option selected value="'.$row['user_id'].'">'.$row['name'].'</option>';
			$selectUserName="SELECT ID, name FROM `user`";
			$resultUserName=$conn->query($selectUserName);
			if ($resultUserName->num_rows > 0) {
				while($crow = $resultUserName->fetch_assoc()) {
					print'<option value="'.$crow['ID'].'"> '.$crow['name'].'</option>';
				}
			}
            print '
			</select>
			</td>

			<td>'.$row["barcode"].'</td>
            <td>'.$row["manfac_name"].'</td>
            <td>'.$row["customer_number"].'</td>
            <td><input type="text" name="time" style="width:50px" value="'.$row["time"].'">perc</td>
			<td><input type="hidden" name="usormanstep_ID" value="'.$row["sorszam"].'"><input type="submit" value="Módosítás" class="btn btn-primary"></td>
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

