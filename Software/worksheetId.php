<?php


include_once("html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['aid'])){
    $adminId='';
}
else{
    $adminId=$_SESSION['aid'];
    include("connection.php");
}
if($adminId != 0){

$sheetId=$_POST['sheetId'];
$selectWorkSheet="
SELECT 
`order_manufacturing_step`.ID as ormast_ID,
`order_manufacturing_step`.barcode,
`order_manufacturing_step`.expected_count,
`order_manufacturing_step`.normal_time,
`order_manufacturing_step`.preparation_time,
`order_manufacturing_step`.unit_of_time,
`manufacturing_step`.name as step_name,
`manufacturing_step`.step_code,
`product`.name as product_name
FROM `order_manufacturing_step` 
INNER JOIN `manufacturing_step` on `order_manufacturing_step`.manufacturing_step_ID=`manufacturing_step`.ID
INNER JOIN `order` ON `order_manufacturing_step`.order_ID=`order`.ID
INNER JOIN `product` ON `order`.product_ID=`product`.ID
WHERE `order_manufacturing_step`.`ID`='$sheetId'
";
$resultWorksheet=$conn->query($selectWorkSheet);
if ($resultWorksheet->num_rows > 0) {
    while($row = $resultWorksheet->fetch_assoc()) {
        $ormast_ID=$row['ormast_ID'];
        $barcode=$row['barcode'];
        $expected_count=$row['expected_count'];
        $normal_time=$row['normal_time'];
        $preparation_time=$row['preparation_time'];
        $unit_of_time=$row['unit_of_time'];
        $step_name=$row['step_name'];
		$step_code=$row['step_code'];
		$product_name=$row['product_name'];

        if (!empty($ormast_ID)) {
            $selectMachine="
			SELECT
			`machine`.name as machine_name,
			`machine_tool`.name as machine_tool_name
			FROM `order_manufacturing_step_machine_tool` 
			INNER JOIN `machine` ON `order_manufacturing_step_machine_tool`.machine_ID=`machine`.ID
			INNER JOIN `machine_tool` ON `order_manufacturing_step_machine_tool`.machine_tool_ID=`machine_tool`.ID 
			where `order_manufacturing_step_ID`='$ormast_ID'";
            $resultMachine=$conn->query($selectMachine);
            if ($resultMachine->num_rows > 0) {
                while($row = $resultMachine->fetch_assoc()) {
                            $machineNames[]=$row['machine_name'];
							$toolNames[]=$row['machine_tool_name'];
                }
			}
        }
        
    }
}

print '
<div style="width: 21cm;
    min-height: 29.3cm;
    padding: 2cm;
    margin: 1cm auto;
    border: 1px #D3D3D3 solid;
    border-radius: 5px;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);">
	
<form action="order_manufacturing_step.php" method="POST"><button type="submit" class="btn btn-primary" style="margin: 0 auto;display: block; margin: 0 auto;">Vissza a műveletek oldalra</button></form>
<hr>
<table class="table">
<tr>
<td colspan="3" style="text-align:center; vertical-align:middle"> <h2>Műveleti lap vonalkód | '.$barcode.'</td>
</tr><tr>
<td colspan="3" style="text-align:center; vertical-align:middle"> <h2>Művelet szám | '.$step_code.'</td>
</tr><tr>
<td> Művelet kód: </td>
<td colspan="2" >'.$step_code.'</td>
</tr><tr>
<td> Művelet név: </td>
<td colspan="2" >'.$step_name.'</td>
</tr><tr>

</tr><tr>
<td> Termék: </td>
<td colspan="2" >'.$product_name.'</td>
</tr><tr>
<td> Elvárt darabszám: </td>
<td colspan="2" >'.$expected_count.' darab/óra </td>
</tr><tr>
<td> Sikeres darabszám: </td>
<td colspan="2" > ........... db </td>
</tr><tr>
</tr><tr>
<td> Selejt darabszám: </td>
<td colspan="2" > ........... db </td>
</tr><tr>
</tr><tr>
<td> Norma idő: </td>
<td colspan="2" > '.$normal_time.' perc/db </td>
</tr><tr>
</tr><tr>
<td> Előkészítési idő: </td>
<td colspan="2" > '.$preparation_time.' perc/db </td>
</tr><tr>
</tr><tr>
<td> Egységnyi idő: </td>
<td colspan="2" > '.$unit_of_time.' perc/db </td>
</tr><tr>
<td> Gép: </td>
';
if (!empty($machineNames)) {
    foreach ($machineNames as $machine) {
        print '<tr><td></td><td colspan="2">'.$machine.'</td></tr>';
    }
}
print '<tr>
<td> Szerszám: </td>
';
if (!empty($toolNames)) {
    foreach ($toolNames as $tool) {
        print '<tr><td></td><td colspan="2">'.$tool.'</td></tr>';
    }
}

/*$sqlAppendix="SELECT `attachment`.name as attachment_name from `attachment` 
inner join product_attachment on `attachment`.ID=`product_attachment`.attachment_ID 
inner join product on `product_attachment`.product_ID=product.ID 
where product.ID='$product_ID'";
$resultAppendix=$conn->query($sqlAppendix);
if ($resultAppendix->num_rows > 0) {
    while($row = $resultAppendix->fetch_assoc()) {
        $fileName[]=$row['attachment_name'];
    }
}
print '
<tr><td> Csatolmányok: </td>';
if (!empty($fileName)) {
    foreach ($fileName as $file) {
        print '<tr><td></td><td colspan="2">'.$file.'</td></tr>';
    }
}*/
print '</table>';


} else{
    print '<img src="./DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Használat előtt jelentkezz be!<br></div>';
    print '<form action="index.php"><button type="submit" class="btn btn-primary">Bejelentkezés</button> </form>';
}
?>