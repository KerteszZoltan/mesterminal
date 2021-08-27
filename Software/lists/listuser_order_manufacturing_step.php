<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

$sql="SELECT 
`user_order_manufacturing_step`.ID as sorszam,
`user`.name,
`order_manufacturing_step`.barcode,
`manufacturing_step`.name as manfac_name,
`user_order_manufacturing_step`.time,
`user_order_manufacturing_step`.pass_count,
`user_order_manufacturing_step`.fail_count
FROM `user_order_manufacturing_step`
INNER JOIN `user` ON `user_order_manufacturing_step`.user_ID=`user`.ID
INNER JOIN `order_manufacturing_step` ON `user_order_manufacturing_step`.order_manufacturing_step_ID=`order_manufacturing_step`.ID
INNER JOIN `manufacturing_step` ON `order_manufacturing_step`.manufacturing_step_ID=`manufacturing_step`.ID
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
            <th scope="col">Gyártási idő</th>
            <th scope="col">Sikeres darabszám</th>
            <th scope="col">Selejt darabszám</th>
			
        </tr>
        </thead>
        <tbody>
        ';
    while($row = $resultWorkers->fetch_assoc()) {
        print '
            <tr>
			<form action="feldolgozok/modifyUserOrderManStep.php" method="POST">
            <td>'.$row["sorszam"].'</td>   
			<td>'.$row["name"].'</td>
			<td>'.$row["barcode"].'</td>
            <td>'.$row["manfac_name"].'</td>
            <td><input type="text" name="time" value="'.$row["time"].'" style="width:70px"></td>            
			<td><input type="text" name="pass_count" value="'.$row["pass_count"].'" style="width:70px"></td>
            <td><input type="text" name="fail_count" value="'.$row["fail_count"].'" style="width:70px"></td>
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

