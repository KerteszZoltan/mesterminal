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
`order_manufacturing_step`.expected_performance,
`order_manufacturing_step`.planned_internal_changeover,
`order_manufacturing_step`.planned_education,
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
        $expected_performance=$row['expected_performance'];
        $planned_internal_changeover=$row['planned_internal_changeover'];
        $planned_education=$row['planned_education'];
        
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
<td> Elvárt teljesítmény: </td>
<td colspan="2" >'.$expected_performance.' darab/perc </td>
</tr><tr>
</tr><tr>
</tr><tr>
<td> Tervezett belső átállás(gép+szerszám): </td>
<td colspan="2" >'.$planned_internal_changeover.' perc </td>
</tr><tr>
</tr><tr>
<td> Tervezett oktatás: </td>
<td colspan="2" >'.$planned_education.' perc </td>
</tr><tr>
</tr><tr>
<td> Gép: </td>
</tr><tr>

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
print '</table>
</div>';

if (!empty($fileName)) {
    foreach ($fileName as $file) {
    print '
	<div style="width: 21cm;
    height: 29.3cm;
    padding: 2cm;
    margin: 1cm auto;
    border: 1px #D3D3D3 solid;
    border-radius: 5px;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);">
        <img style="width:100%; height:100%"src="attachments/'.$file.'">
		
        
	</div>';
    }
}

$sqlManStepAttachment="SELECT `attachment`.name FROM `attachment` 
inner join `manufacturing_step_attachment` on `attachment`.ID=`manufacturing_step_attachment`.attachment_ID
inner join `manufacturing_step` on `manufacturing_step_attachment`.manufacturing_step_ID=`manufacturing_step`.ID
WHERE `manufacturing_step`.step_code='$step_code'";
$result_attachment=$conn->query($sqlManStepAttachment);
if ($result_attachment->num_rows > 0) {
    while($row = $result_attachment->fetch_assoc()) {
        $fileName[]=$row['name'];
    }
}
if (!empty($fileName)) {
    foreach ($fileName as $file) {
    print '
	<div style="width: 21cm;
    height: 29.3cm;
    padding: 2cm;
    margin: 1cm auto;
    border: 1px #D3D3D3 solid;
    border-radius: 5px;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);">
        <img style="width:100%; height:100%"src="attachments/'.$file.'">
		
        
	</div>';
    }
}

} else{
    print '<img src="./DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Használat előtt jelentkezz be!<br></div>';
    print '<form action="index.php"><button type="submit" class="btn btn-primary">Bejelentkezés</button> </form>';
}
?>