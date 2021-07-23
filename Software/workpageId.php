<?php
print '
<div style="height: 842px;width: 595px;margin-left: auto; margin-right: auto;">';

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

$workpageId=$_POST['workpageId'];
$selectWorkpage="SELECT * FROM workpages inner join orders on workpages.workNumber=orders.workNumber where workpages.workpageId='$workpageId'";
$resultWorkpage=$conn->query($selectWorkpage);
if ($resultWorkpage->num_rows > 0) {
    while($row = $resultWorkpage->fetch_assoc()) {
        $workNumber=$row['workNumber'];
        $workpageName=$row['workpageName'];
        $expectedDB=$row['expectedDB'];
        $successedDB=$row['successedDB'];
        $discardDb=$row['discardDB'];
        $quantity=$row['quantity'];
        $shippingDate=$row['shippingDate'];
        $productId=$row['productId'];
        if (!empty($productId)) {
            $selectProduct="SELECT * from products 
            inner join companyforeignpartnumbers on products.productId=companyforeignpartnumbers.productId where 
            companyforeignpartnumbers.foreignId='$productId'";
            $resultProduct=$conn->query($selectProduct);
            if ($resultProduct->num_rows > 0) {
                while($row = $resultProduct->fetch_assoc()) {
                    $productName=$row['productName'];
                    $ownProductId=$row['productId'];
                    $selectMachines="SELECT machines.machineName FROM `machinepage` 
                    inner join machines on machinepage.machineId=machines.machineId 
                    where machinepage.workpageId='$workpageId'";
                    $resultMachineName=$conn->query($selectMachines);
                    if ($resultMachineName->num_rows > 0) {
                        while($row = $resultMachineName->fetch_assoc()) {
                            $machineNames[]=$row['machineName'];
                        }
                    }
                }
            }
        }

        
    }
}
print '
<form action="workpages.php" method="POST"><button type="submit" class="btn btn-primary" style="margin: 0 auto;display: block; margin: 0 auto;">Vissza a munkalapok oldalra</button></form>
<hr>
<table class="table">
<tr>
<td colspan="3" style="text-align:center; vertical-align:middle"> <h2>'.$workpageName.'</td>
</tr><tr>
<td colspan="3" style="text-align:center; vertical-align:middle"> <h2>'.$workpageId.'</td>
</tr><tr>
<td> Munkaszám: </td>
<td colspan="2" >'.$workNumber.'</td>
</tr><tr>
<td> Gyártott cikk: </td>
<td colspan="2" >'.$ownProductId .' '.$productName.'</td>
</tr><tr>
<td> Napi elvárt mennyiség: </td>
<td colspan="2" >'.$expectedDB.' db </td>
</tr><tr>
<td> Összes gyártani kívánt mennyiség: </td>
<td colspan="2" >'.$quantity.' db </td>
</tr><tr>
<td> Gép: </td>
';
if (!empty($machineNames)) {
    foreach ($machineNames as $machine) {
        print '<tr><td></td><td colspan="2">'.$machine.'</td></tr>';
    }
}

$sqlAppendix="SELECT * from appendixs 
inner join productappendixs on appendixs.appendixId=productappendixs.appendixId 
inner join products on productappendixs.productId=products.productId 
where products.productId='$ownProductId'";
$resultAppendix=$conn->query($sqlAppendix);
if ($resultAppendix->num_rows > 0) {
    while($row = $resultAppendix->fetch_assoc()) {
        $fileName[]=$row['appendixName'];
    }
}
print '
<tr><td> Csatolmányok: </td>';
if (!empty($fileName)) {
    foreach ($fileName as $file) {
        print '<tr><td></td><td colspan="2">'.$file.'</td></tr>';
    }
}


print '
</table>
</div>
';
if (!empty($fileName)) {
    foreach ($fileName as $file) {
        print '<div style="height: 842px;width: 595px;margin-left: auto; margin-right: auto;">
        <img style="width:100%; height:100%"src="appendixs/'.$file.'">
        </div>';
    }
}




} else{
    print '<img src="./DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Használat előtt jelentkezz be!<br></div>';
    print '<form action="index.php"><button type="submit" class="btn btn-primary">Bejelentkezés</button> </form>';
}
?>