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
`manufacturing_step`.education,
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
            <th scope="col">Gyártási művelet azonosító</th>
            <th scope="col">Gyártási művelet vonalkód</th>
            <th scope="col">Gyártási művelet kód</th>
            <th scope="col">Gyártási művelet név</th>
            <th scope="col">Gyártási művelet kategória</th>
            <th scope="col">Gyártási művelet rezsi óradíja</th>
            <th scope="col">Gyártási művelet oktatás/fejelsztési ideje</th>
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
			<td><select name="category_ID" style="width:300px" class="form-select" id="category_ID">
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
            <td><input type="text" style="width:50px" name="overhead_fee" value="'.$row["overhead_fee"].'">Ft/óra</td>
            <td><input type="text" style="width:50px" name="education" value="'.$row["education"].'"> perc</td>
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

