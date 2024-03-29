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

print '<form action="order.php" method="POST">
<button type="submit" class="btn btn-primary" style="margin: 0 auto;display: block; margin: 0 auto;">Vissza a munkalapok oldalra</button>
</form>';

print '
<div style="width: 21cm;
    height: 29.3cm;
    padding: 2cm;
    margin: 1cm auto;
    border: 1px #D3D3D3 solid;
    border-radius: 5px;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    ">';
$workpageId=$_POST['workpageId'];
$selectOrder="SELECT * FROM `order` WHERE `ID`='$workpageId'";
$resultOrder=$conn->query($selectOrder);
if ($resultOrder->num_rows > 0) {
    while($row = $resultOrder->fetch_assoc()) {
        $order_ID=$row['ID'];
        $order_barcode=$row['barcode'];
        $order_type_ID=$row['order_type_ID'];
        $customer_number=$row['customer_number'];
        $site_ID=$row['site_ID'];
        $product_ID=$row['product_ID'];
        $customer_count=$row['customer_count'];
        $manufactured_count=$row['manufactured_count'];
        $pass_count=$row['pass_count'];
        $fail_count=$row['fail_count'];
        $order_status_ID=$row['order_status_ID'];

        if (isset($product_ID)) {
            $selectProduct="SELECT ID,name from product where `ID`='$product_ID'";
            $resultProduct=$conn->query($selectProduct);
            if ($resultProduct->num_rows > 0) {
                while($row = $resultProduct->fetch_assoc()) {
                    $product_ID=$row['ID'];
                    $productName=$row['name'];
                    $selectMachines="
					SELECT
					`machine`.name as machine_name,
					`machine_tool`.name as machine_tool_name
					FROM `order_manufacturing_step_machine_tool` 
					INNER JOIN `machine` ON `order_manufacturing_step_machine_tool`.machine_ID=`machine`.ID
					INNER JOIN `machine_tool` ON `order_manufacturing_step_machine_tool`.machine_tool_ID=`machine_tool`.ID
					INNER JOIN `order_manufacturing_step` ON `order_manufacturing_step_machine_tool`.order_manufacturing_step_ID=`order_manufacturing_step`.ID
					where `order_manufacturing_step`.order_ID='$order_ID'
					";
                    $resultMachineName=$conn->query($selectMachines);
                    if ($resultMachineName->num_rows > 0) {
                        while($row = $resultMachineName->fetch_assoc()) {
                            $machineNames[]=$row['machine_name'];
							$toolNames[]=$row['machine_tool_name'];
                        }
                    }
                    
                }
            }
        }

        
    }
}

print '
<table class="table">
<tr>
<td colspan="3" style="text-align:center; vertical-align:middle"> <h4>Gyártási rendelés vonalkód -'.$order_barcode.'</td>
</tr><tr>
<td colspan="3" style="text-align:center; vertical-align:middle"> <h4>Gyártási rendelés azonosító -'.$order_ID.'</td>
</tr><tr>
<td> Vevői rendelés: </td>
<td colspan="2" >'.$customer_number.'</td>
</tr><tr>
<td> Gyártott cikk: </td>
<td colspan="2" >'.$product_ID .'-'.$productName.'</td>
</tr><tr>
<td> Vevői rendelés darabszám: </td>
<td colspan="2" >'.$customer_count.' db </td>
</tr><tr>
<td> Most gyártani kívánt mennyiség: </td>
<td colspan="2" >'.$manufactured_count.' db </td>
</tr><tr>
<td> Gép: </td>
';
if (!empty($machineNames)) {
    foreach ($machineNames as $machine) {
        print '<tr><td></td><td colspan="2">'.$machine.'</td></tr>';
    }
}
print'
<tr>
<td> Szerszám: </td>
';
if (!empty($toolNames)) {
    foreach ($toolNames as $toolName) {
        print '<tr><td></td><td colspan="2">'.$toolName.'</td></tr>';
    }
}


$sqlAppendix="SELECT `attachment`.name as attachment_name from `attachment` 
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
}
else{print '<tr><td></td><td>Nem tartozik ide csatolmány<td></tr>';}
$sqlorderuserrole="SELECT 
`order`.`customer_number` as customer_number, 
`user`.`name` as user_name, 
`role`.`name` as role_name 
from `user_order_role`
INNER join user on user_order_role.user_ID=user.ID 
INNER JOIN `order` on user_order_role.order_ID=`order`.`ID`
INNER JOIN `role` on user_order_role.role_ID=`role`.`ID` where `order`.`ID`='$workpageId';";
$resultorderuserrole=$conn->query($sqlorderuserrole);
if ($resultorderuserrole->num_rows > 0) {
    while($row = $resultorderuserrole->fetch_assoc()) {
        $username=$row['user_name'];
        $rolename=$row['role_name'];
        $name_role=$rolename.'-'.$username;
        $userrole[]=$name_role;
    }
}
print' <tr>
<td> Felelős neve: </td>
</tr>';
if (!empty($userrole)) {
    foreach ($userrole as $userrol) {
        print '<tr><td colspan="2">'.$userrol.'</td></tr>';
    }
}


print '</table>';
print '
</div>
<div style="width: 21cm;
height: 29.3cm;
padding: 2cm;
margin: 1cm auto;
border: 1px #D3D3D3 solid;
border-radius: 5px;
background: white;
box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
">
<table>
	<thead>
		<tr>
            <th scope="col">Azonosító</th>
            <th scope="col">Művelet kód</th>
            <th scope="col">Művelet név</th>
            <th scope="col">Elvárt teljesítmény</th>
			<th scope="col">Tervezett belső átállás</th>
			<th scope="col">Tervezett oktatás/fejlesztés</th>
			<th scope="col">Tervezett dolgozó</th>
			
		</tr>
    </thead>
<tbody>

';
$selelctManStep="
SELECT 
`order_manufacturing_step`.ID as ormanID,
`order_manufacturing_step`.manufacturing_step_ID,
`order_manufacturing_step`.expected_performance,
`order_manufacturing_step`.planned_internal_changeover,
`order_manufacturing_step`.planned_education,
`manufacturing_step`.step_code,
`manufacturing_step`.name as step_name,
`order`.ID as orderID
FROM order_manufacturing_step
INNER JOIN `manufacturing_step` on `order_manufacturing_step`.manufacturing_step_ID=`manufacturing_step`.ID
INNER JOIN `order` on `order_manufacturing_step`.order_ID=`order`.ID 
where `order_manufacturing_step`.order_ID='$workpageId'
";
$resultManStep=$conn->query($selelctManStep);
if ($resultManStep->num_rows > 0) {
    while($row = $resultManStep->fetch_assoc()) {
		print '<tr>';
		$manufacturingStepID=$row["manufacturing_step_ID"];
		$ormanID=$row['ormanID'];
        print '<td>'.$row["manufacturing_step_ID"];
        print '<td>'.$row["step_code"];
        print '<td>'.$row["step_name"];
        print '<td>'.$row["expected_performance"].' perc/db';
        print '<td>'.$row["planned_internal_changeover"];
        print '<td>'.$row["planned_education"];		
		
		$selectUser="
		SELECT 
		`user`.name as user_name
		from `user`
		INNER JOIN `user_order_manufacturing_step` on `user_order_manufacturing_step`.user_ID=`user`.ID
		WHERE order_manufacturing_step_ID='$ormanID'
		";
		$resultUser=$conn->query($selectUser);
		if ($resultUser->num_rows > 0) {
			while($row = $resultUser->fetch_assoc()) {
				print '<td>'.$row["user_name"];
			}
		}
		
		print '</tr>';
    }
}
print '
</tbody>
</table>
</div>
';

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