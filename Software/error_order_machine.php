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
<div class="text-center" style="width:100%"> A gyártási adminisztrátor tölti ki </div>
<form action="error_order_machine.php" method="POST">
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon3">Gyártási rendelés keresése</span>
  <input type="text" name="customer_number" class="form-control" value="" aria-label="Server">
  <input type="submit" value="Keresés" class="btn btn-primary">
</div>
<hr>
</form>

<form action="feldolgozok/newOrder_error_machine.php" method="POST">
        <div class="input-group mb-3">
        <div class="input-group mb-3">
        <label class="input-group-text" for="errorId">Hiba oka</label>
        <select name="error_ID" class="form-select" id="errorId">
          <option selected>Válassz hiba okot</option>
';
$selectError="SELECT * FROM `error`";
$reultError = $conn -> query($selectError);

if ($reultError->num_rows > 0) {
    while($row = $reultError->fetch_assoc()) {
        print '
          <option value="'.$row['ID'].'">'.$row['name'].'</option>
        ';
    }
}
print '
</select></div>
<div class="input-group mb-3">
  <div class="input-group mb-3">
  <label class="input-group-text" for="orders">Művelet</label>';
  if(isset($_POST['customer_number'])){
    $customer_number=$_POST['customer_number'];
    $selectOrder="SELECT `order_manufacturing_step`.barcode as omanstep_barcode,
    `order_manufacturing_step`.ID as ormanstep_id,
    `manufacturing_step`.step_code,
    `manufacturing_step`.name as step_name
     FROM `order_manufacturing_step` 
    INNER JOIN `manufacturing_step`on `order_manufacturing_step`.manufacturing_step_ID=`manufacturing_step`.ID
    INNER JOIN `order` on `order_manufacturing_step`.order_ID=`order`.ID 
    WHERE `order`.customer_number='".$customer_number."'";
    $resultOrder = $conn -> query($selectOrder);
    print'
  <select name="or_man_step" class="form-select" id="orders">
    <option selected>Válassz műveleti lapot</option>
    ';
    
    if ($resultOrder->num_rows > 0) {
        while($row = $resultOrder->fetch_assoc()) {
            print '
              <option value="'.$row['ormanstep_id'].'">'.$row['omanstep_barcode'].' -- '.$row['step_name'].'</option>
            ';
        }
    }
  }else{
  $selectOrder="SELECT `order_manufacturing_step`.barcode as omanstep_barcode,
  `order_manufacturing_step`.ID as ormanstep_id,
  `manufacturing_step`.step_code,
  `manufacturing_step`.name as step_name
   FROM `order_manufacturing_step` 
  INNER JOIN `manufacturing_step` on `order_manufacturing_step`.manufacturing_step_ID=`manufacturing_step`.ID";
  $resultOrder = $conn -> query($selectOrder);
  print'
  <select name="or_man_step" class="form-select" id="orders">
    <option selected>Válassz műveleti lapot</option>';
    if ($resultOrder->num_rows > 0) {
        while($row = $resultOrder->fetch_assoc()) {
            print '
              <option value="'.$row['ormanstep_id'].'">'.$row['omanstep_barcode'].' -- '.$row['step_name'].'</option>
            ';
        }
    }
  }
    print'
  </select>';

  print '</div>
<div class="input-group mb-3">
  <div class="input-group mb-3">
  <label class="input-group-text" for="machines">Gép amin a hiba jelentkezett</label>
  <select name="machine_ID" class="form-select" id="machines">
    <option selected>Válassz gépet</option>';
    $selectMachine="SELECT * from `machine`";
    $resultMachine=$conn->query($selectMachine);
    if ($resultMachine->num_rows > 0) {
        while($row = $resultMachine->fetch_assoc()) {
            print '
              <option value="'.$row['ID'].'">'.$row['ID'].'-'.$row['name'].'</option>
            ';
        }
    }
print '
</select>
</div>';
print'
<div class="input-group mb-3">
  <div class="input-group mb-3">
  <label class="input-group-text" for="tools">Szerszám amin a hiba jelentkezett</label>
  <select name="machine_tool_ID" class="form-select" id="tools">
    <option value=" "selected>Válassz szerszámot</option>';
    $selectMachine="SELECT * from `machine_tool`";
    $resultMachine=$conn->query($selectMachine);
    if ($resultMachine->num_rows > 0) {
        while($row = $resultMachine->fetch_assoc()) {
            print '
              <option value="'.$row['ID'].'">'.$row['machine_ID'].'-'.$row['name'].'</option>
            ';
        }
    }
print '
</select>
</div>';
print'
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1"> Hiba kezdete:</span>
  <input type="text" name="date_start" class="form-control" placeholder="" aria-label="nev" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1"> Hiba vége:</span>
  <input type="text" name="date_end" class="form-control" placeholder="" aria-label="nev" aria-describedby="basic-addon1">
</div>';

print'
<div class="input-group mb-3">
  <div class="input-group mb-3">
  <label class="input-group-text" for="tools">A dolgozó aki elhárította a hibát:</label>
  <select name="user_ID" class="form-select" id="tools">
    <option value=" "selected>Válassz dolgozót</option>';
    $selectMachine="SELECT * from `user`";
    $resultMachine=$conn->query($selectMachine);
    if ($resultMachine->num_rows > 0) {
        while($row = $resultMachine->fetch_assoc()) {
            print '
              <option value="'.$row['ID'].'">'.$row['ID'].'-'.$row['name'].'</option>
            ';
        }
    }
print '
</select>
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1"> Hiba Leírása:</span>
  <input type="text" name="description" class="form-control" placeholder="" aria-label="nev" aria-describedby="basic-addon1">
</div>';
print '
<div class="input-group mb-3">
  <input type="submit" value="Rögzítés" class="btn btn-primary">
</div>
</form>
';
include_once("lists/listErrorsPages.php");

}
else{
    print '<img src="./DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Használat előtt jelentkezz be!<br></div>';
    print '<form action="index.php"><button type="submit" class="btn btn-primary">Bejelentkezés</button> </form>';
}

?>