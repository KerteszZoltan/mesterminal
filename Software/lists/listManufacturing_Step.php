<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

$selectStep="SELECT 
`manufacturing_step`.ID as manufactstepID,
`manufacturing_step`.barcode,
`manufacturing_step`.step_code,
`manufacturing_step`.name as step_name,
`manufacturing_step`.category_ID as stepCatID,
`manufacturing_step`.overhead_fee,
`category`.name as catname
 from `manufacturing_step` 
 inner join `category` on `manufacturing_step`.category_ID=`category`.ID";
$resultManufacturingStep = $conn -> query($selectStep);
if ($resultManufacturingStep->num_rows > 0) {
    print '
    <div style="overflow: auto">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Gyártási lépés azonosító</th>
            <th scope="col">Gyártási lépés vonalkód</th>
            <th scope="col">Gyártási lépés kód</th>
            <th scope="col">Gyártási lépés név</th>
            <th scope="col">Gyártási lépés kategória</th>
            <th scope="col">Rezsi óradíj</th>
            <th scope="col">Módosítás</th>
        </tr>
        </thead>
        <tbody>
        ';
    while($row = $resultManufacturingStep->fetch_assoc()) {
        print '
            <tr>
            <form action="feldolgozok/modifyManufacturingStep.php" method="POST">
            <td>'.$row["manufactstepID"].'</td>
            <td><input type="text" name="barcode" value="'.$row["barcode"].'" style="max-width:20px;"></td>
            <td><input type="text" name="step_code" value="'.$row["step_code"].'"></td>
            <td><input type="text" style="width:300px" name="name" value="'.$row["step_name"].'"></td>
			<td><select name="category_ID" class="form-select" id="category_ID">
				<option selected value="'.$row['stepCatID'].'">'.$row['catname'].'</option>';
			$sqlSelectCategoryName="SELECT name, ID FROM `category`";
			$resultCategory=$conn->query($sqlSelectCategoryName);
			if ($resultCategory->num_rows > 0) {
				while($crow = $resultCategory->fetch_assoc()) {
					print'<option value="'.$crow['ID'].'"> '.$crow['ID'].'-'.$crow['name'].'</option>';
				}
			}
			
			
            print '
			</select>
			</td>
            <td><input type="text" name="overhead_fee" value="'.$row["overhead_fee"].'"></td>
            <td><Button type="submit" name="id" value="'.$row["manufactstepID"].'" class="btn btn-primary">Módosítás</button>
            </form>
            </tr>';
    }
    print '
        </tbody>
        </table>
        </div>';
}else{
    print 'Nincsen még gyártási lépés a rendszerben';
}



?>

