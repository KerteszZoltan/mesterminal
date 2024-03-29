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
}

if($adminId != 0){
include_once("html_frame/html_body.html");
include_once("connection.php");
print '
<form action="order_machine_tool.php" method="post">
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon3">Gyártási rendelés keresése</span>
  <input type="text" name="customer_number" class="form-control"  aria-label="Server">
  <input type="submit" value="Keresés" class="btn btn-primary">
</div>
</form>
<hr>';

print '<form action="feldolgozok/newOrderMachineTool.php" method="POST">
        <div class="input-group mb-3">
        <div class="input-group mb-3">
        <label class="input-group-text" for="orders"> Műveleti lap kiválasztása</label>
        <select name="order_ID" class="form-select" id="orders">
          <option selected>Válassz műveleti lapot</option>
';
$selectMachine="SELECT * FROM `machine` order by name asc";
$selectMachineTool="SELECT `machine_tool`.ID,`machine_tool`.name,`machine`.name as machine_name FROM `machine_tool` inner JOIN `machine` on `machine_tool`.machine_ID=`machine`.ID ORDER BY `machine`.`name` ASC";
if(isset($_POST['customer_number'])){
  $customer_number=$_POST['customer_number'];
  $selectOrder="SELECT `order_manufacturing_step`.ID as order_man_fac_ID, 
  `order_manufacturing_step`.barcode as barcode, 
  `manufacturing_step`.step_code,
  `manufacturing_step`.name
  FROM `order_manufacturing_step` 
  INNER JOIN `manufacturing_step` on `order_manufacturing_step`.manufacturing_step_ID=`manufacturing_step`.ID
  INNER JOIN `order` on `order_manufacturing_step`.order_ID=`order`.ID
  WHERE `order`.customer_number='$customer_number'";
  $reultMachines = $conn -> query($selectMachine);
  $reultOrder = $conn -> query($selectOrder);
  $resultMachineTool = $conn -> query($selectMachineTool);

  if ($reultOrder->num_rows > 0) {
    while($row = $reultOrder->fetch_assoc()) {
        print '
          <option value="'.$row['order_man_fac_ID'].'">'.$row['barcode'].' | '.$row['name'].'</option>
        ';
    }
}
print '</select>
</div>';
}else{
  $selectOrder="SELECT `order_manufacturing_step`.ID as order_man_fac_ID, 
  `order_manufacturing_step`.barcode as barcode, 
  `manufacturing_step`.step_code,
  `manufacturing_step`.name
  FROM `order_manufacturing_step` 
  INNER JOIN `manufacturing_step` on `order_manufacturing_step`.manufacturing_step_ID=`manufacturing_step`.ID";
  $reultMachines = $conn -> query($selectMachine);
  $reultOrder = $conn -> query($selectOrder);
  $resultMachineTool = $conn -> query($selectMachineTool);

  if ($reultOrder->num_rows > 0) {
    while($row = $reultOrder->fetch_assoc()) {
        print '
          <option value="'.$row['order_man_fac_ID'].'">'.$row['barcode'].' | '.$row['name'].'</option>
        ';
    }
}
print '</select>
</div>';
}
print '
<div class="input-group mb-3">
  <div class="input-group mb-3">
  <label class="input-group-text" for="machines">Gép</label>
  <select name="machine_ID" class="form-select" id="machines">
    <option selected>Válassz gépet</option>';
    if ($reultMachines->num_rows > 0) {
        while($row = $reultMachines->fetch_assoc()) {
            print '
              <option value="'.$row['ID'].'">'.$row['name'].'</option>
            ';
        }
    }
    print'
  </select>
</div>';
print '
<div class="input-group mb-3">
  <div class="input-group mb-3">
  <label class="input-group-text" for="machinetools">Szerszám</label>
  <select name="machine_tool_ID" class="form-select" id="machinetools">
    <option selected>Válassz szerszámot</option>';
    if ($resultMachineTool->num_rows > 0) {
        while($row = $resultMachineTool->fetch_assoc()) {
            print '
              <option value="'.$row['ID'].'">'.$row['machine_name'].'-'.$row['name'].'</option>
            ';
        }
    }
    print'
  </select>
</div>
<div class="input-group mb-3">
  <input type="submit" value="Rögzítés" class="btn btn-primary">
</div>
</form>
';
include_once("lists/listorder_machine_tool.php");

}
else{
    print '<img src="./DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Használat előtt jelentkezz be!<br></div>';
    print '<form action="index.php"><button type="submit" class="btn btn-primary">Bejelentkezés</button> </form>';
}

?>