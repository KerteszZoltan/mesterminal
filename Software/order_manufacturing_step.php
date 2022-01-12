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
<form action="order_manufacturing_step.php" method="POST">

<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon3">Gyártási rendelés keresése</span>
  <input type="text" name="customer_number" class="form-control" value="" aria-label="Server">
  <input type="submit" value="Keresés" class="btn btn-primary">
</div>
<hr>
</form>
<div class="text-center" style="width:100%"> A gyártást programozó tölti </div>
<form action="feldolgozok/newOrderManufacturingStep.php" method="POST">


<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon3">Gyártási rendelés</span>
  <select name="order_ID" class="form-select" id="order_id">
    <option value=" " selected>Válassz gyártási rendelést</option>
  ';
  if(isset($_POST['customer_number'])){
    $customer_number=$_POST['customer_number'];
    $selectOrder="SELECT * from `order` where customer_number='".$customer_number."'";
    $resultOrder=$conn->query($selectOrder);
    if ($resultOrder->num_rows > 0) {
        while($row = $resultOrder->fetch_assoc()) {
        print '
          <option value="'.$row['ID'].'">'.$row['ID'].'-'.$row['customer_number'].'</option>
        ';
        }
    }
    
} else{
    $selectOrder="SELECT * from `order` order by `order`.ID desc";
    $resultOrder=$conn->query($selectOrder);
    if ($resultOrder->num_rows > 0) {
        while($row = $resultOrder->fetch_assoc()) {
        print '
          <option value="'.$row['ID'].'">'.$row['ID'].'-'.$row['customer_number'].'</option>
        ';
        }
    }
}
  
  print '
  </select>
</div>
<div class="input-group mb-3">
  <span class="input-group-text">Gyártási művelet</span>
  <select name="manufacturing_step_ID" class="form-select" id="site_id">
    <option value=" " selected>Válassz műveletet</option>';
    $selectSite="SELECT * from `manufacturing_step`";
    $resultSite=$conn->query($selectSite);
    if ($resultSite->num_rows > 0) {
      while($row = $resultSite->fetch_assoc()) {
          print '
            <option value="'.$row['ID'].'">'.$row['step_code'].'-'.$row['name'].'</option>
          ';
      }
  }
  
  print '
  </select>
</div>

<div class="input-group mb-3">
  <span class="input-group-text">Elvárt teljesítmény</span>
  <input type="text" name="expected_performance" class="form-control"  aria-label="Server">
  <span class="input-group-text"> perc/db</span>
</div>


<div class="input-group mb-3">
  <span class="input-group-text"> Tervezett belső átállás </span>
  <input type="text" name="planned_internal_changeover" class="form-control"  aria-label="Server">
  <span class="input-group-text"> perc </span>
</div>


<div class="input-group mb-3">
  <span class="input-group-text"> Tervezett Oktatás / Fejlesztés </span>
  <input type="text" name="planned_education" class="form-control"  aria-label="Server">
  <span class="input-group-text"> perc </span>
</div>

<div class="input-group mb-3">
  <span class="input-group-text">Önköltségi óradíj (felülírható, Szerszám+gép+művelet rezsi)</span>
  <input type="text" name="overhead_fee" class="form-control"  aria-label="Server">
  <span class="input-group-text"> Ft/óra </span>
</div>

<div class="text-center" style="width:100%"> Adminisztrátor tölti </div>

<div class="input-group mb-3">
  <span class="input-group-text">Tényleges teljesítmény</span>
  <input type="text" name="performance" class="form-control"  aria-label="Server">
  <span class="input-group-text"> perc/db </span>
</div>

<div class="input-group mb-3">
  <span class="input-group-text">Tényleges belső átállás </span>
  <input type="text" name="internal_changeover" class="form-control"  aria-label="Server">
  <span class="input-group-text"> perc</span>

</div>

<div class="input-group mb-3">
  <span class="input-group-text">Tényleges külső átállás </span>
  <input type="text" name="external_changeover" class="form-control"  aria-label="Server">
  <span class="input-group-text"> perc</span>
</div>

<div class="input-group mb-3">
  <span class="input-group-text">Sikeresen gyártott darabszám</span>
  <input type="text" name="pass_count" class="form-control"  aria-label="Server">
  <span class="input-group-text"> db</span>

</div>

<div class="input-group mb-3">
  <span class="input-group-text">Selejt darabszám</span>
  <input type="text" name="fail_count" class="form-control"  aria-label="Server">
  <span class="input-group-text"> db</span>

</div>

<div class="input-group mb-3">
  <span class="input-group-text">Tényleges Oktatás/Fejlesztés </span>
  <input type="text" name="education" class="form-control"  aria-label="Server">
  <span class="input-group-text"> perc</span>
</div>

<input type="submit" value="Rögzítés" class="btn btn-primary">
</form>
';
include_once("lists/listorder_manufacturing_step.php");
}
else{
    print '<img src="./DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Használat előtt jelentkezz be!<br></div>';
    print '<form action="index.php"><button type="submit" class="btn btn-primary">Bejelentkezés</button> </form>';
}

?>