<?php 
include_once("html_frame/html_head.html");
include_once("connection.php");
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
print'
<form action="feldolgozok/newWorkpage.php" method="POST">

<!-- <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon2">Gyártási rendelés vonalkódja:</span>
    <input type="text" class="form-control" name="barcode" placeholder="" aria-describedby="basic-addon2">
</div> -->


<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon3">Gyártási rendelés típusa</span>
  <select name="order_type" class="form-select" id="order_type_id">
    <option value=" " selected>Válassz típust</option>
  ';

  $selectOrderType="SELECT * from order_type";
  $resultOrderType=$conn->query($selectOrderType);
  if ($resultOrderType->num_rows > 0) {
    while($row = $resultOrderType->fetch_assoc()) {
        print '
          <option value="'.$row['ID'].'">'.$row['ID'].'-'.$row['name'].'</option>
        ';
    }
}
  print '
  </select>
</div>

<div class="input-group mb-3">
  <span class="input-group-text">Vevői rendelés szám</span>
  <input type="text" name="customer_number" class="form-control">
</div>

<div class="input-group mb-3">
  <span class="input-group-text">Telephely</span>
  <select name="site" class="form-select" id="site_id">
    <option value=" " selected>Válassz telephelyet</option>';
    $selectSite="SELECT * from site";
    $resultSite=$conn->query($selectSite);
    if ($resultSite->num_rows > 0) {
      while($row = $resultSite->fetch_assoc()) {
          print '
            <option value="'.$row['ID'].'">'.$row['ID'].'-'.$row['street'].', '.$row['house_number'].'</option>
          ';
      }
  }
  
  print '
  </select>
</div>

<div class="input-group mb-3">
  <span class="input-group-text">Termék</span>
  <select name="product" class="form-select" id="slct">
    <option value=" " selected>Válassz terméket</option>';
    $selectProduct="SELECT * from product ORDER BY name ASC";
    $resultProduct=$conn->query($selectProduct);
    if ($resultProduct->num_rows > 0) {
      while($row = $resultProduct->fetch_assoc()) {
          print '
            <option value="'.$row['ID'].'">'.$row['ID'].'-'.$row['name'].'</option>
          ';
        }
    }
print '</select>
</div>

<div class="input-group mb-3">
  <span class="input-group-text">Összes gyártani kívánt darabszám</span>
  <input type="text" name="total_count" class="form-control"  aria-label="Server">
</div>

<div class="input-group mb-3">
  <span class="input-group-text">Elvárt darabszám</span>
  <input type="text" name="expected_count" class="form-control"  aria-label="Server">
</div>

<div class="input-group mb-3">
  <span class="input-group-text">Sikeresen gyártott darabszám</span>
  <input type="text" name="pass_count" class="form-control"  aria-label="Server">
</div>

<div class="input-group mb-3">
  <span class="input-group-text">Selejt darabszám</span>
  <input type="text" name="fail_count" class="form-control"  aria-label="Server">
</div>

<div class="input-group mb-3">
  <span class="input-group-text">Gyártási rendelés státusz</span>
  <select name="status" class="form-select" id="status_id">
  <option value=" " selected>Válassz státuszt</option>';
  $selectOrderStatus="SELECT * from order_status";
  $resultOrderStatus=$conn->query($selectOrderStatus);
  if ($resultOrderStatus->num_rows > 0) {
    while($row = $resultOrderStatus->fetch_assoc()) {
        print '
          <option value="'.$row['ID'].'">'.$row['ID'].'-'.$row['name'].'</option>
        ';
    }
}

print '</select>
</div>

<input type="submit" value="Rögzítés" class="btn btn-primary">
</form>
';
include_once("lists/listWorkpages.php");
}
else{
    print '<img src="./DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Használat előtt jelentkezz be!<br></div>';
    print '<form action="index.php"><button type="submit" class="btn btn-primary">Bejelentkezés</button> </form>';
}

?>
