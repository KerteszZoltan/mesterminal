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
<div class="text-center" style="width:100%"> A termelést programozó előirányozza a műszakvezető felülbírálhatja és kiosztja </div>

<form action="user_order_manufacturing_step.php" method="post">
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon3">Gyártási rendelés keresése</span>
  <input type="text" name="customer_number" class="form-control"  aria-label="Server">
  <input type="submit" value="Keresés" class="btn btn-primary">
</div>
<hr>
</form>


<form action="feldolgozok/newUserOrderManufacturingStep.php" method="POST">


<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon3">Dolgozó:</span>
  <select name="user_ID" class="form-select" id="user_ID">
    <option value=" " selected>Válassz dolgozót</option>
  ';

  $selectOrder="SELECT * from `user` ORDER by name ASC";
  $resultOrder=$conn->query($selectOrder);
  if ($resultOrder->num_rows > 0) {
    while($row = $resultOrder->fetch_assoc()) {
        print '
          <option value="'.$row['ID'].'">'.$row['name'].'</option>
        ';
    }
}
  print '
  </select>
</div>
<div class="input-group mb-3">
  <span class="input-group-text">Műveleti lap:</span>
  <select name="order_manufacturing_step_ID" class="form-select" id="order_manufacturing_step_ID">
  <option value=" " selected>Válassz műveletet</option>';
  if(isset($_POST['customer_number'])){
    $customer_number=$_POST['customer_number'];
    $selectSite="
	  SELECT `order_manufacturing_step`.ID as orman_ID,
	  `order_manufacturing_step`.barcode as orman_barcode,
	  `manufacturing_step`.step_code as step_code,
	  `manufacturing_step`.name as manstep_name,
	  `order`.customer_number
	  from `order_manufacturing_step` 
	  INNER JOIN `manufacturing_step` ON `manufacturing_step`.ID=`order_manufacturing_step`.manufacturing_step_ID 
    INNER JOIN `order` ON `order_manufacturing_step`.order_ID=`order`.ID 
    where  `order`.customer_number='".$customer_number."'
	  ";
    $resultSite=$conn->query($selectSite);
    if ($resultSite->num_rows > 0) {
      while($row = $resultSite->fetch_assoc()) {
          print '
            <option value="'.$row['orman_ID'].'">'.$row['customer_number'].' | '.$row['orman_barcode'].' | '.$row['manstep_name'].'</option>
          ';
      }
  }
  }
  else{

    $selectSite="
	SELECT `order_manufacturing_step`.ID as orman_ID,
	`order_manufacturing_step`.barcode as orman_barcode,
	`manufacturing_step`.step_code as step_code,
	`manufacturing_step`.name as manstep_name,
	`order`.customer_number
	from `order_manufacturing_step` 
	INNER JOIN `manufacturing_step` ON `manufacturing_step`.ID=`order_manufacturing_step`.manufacturing_step_ID 
  INNER JOIN `order` ON `order_manufacturing_step`.order_ID=`order`.ID
	";
    $resultSite=$conn->query($selectSite);
    if ($resultSite->num_rows > 0) {
      while($row = $resultSite->fetch_assoc()) {
          print '
            <option value="'.$row['orman_ID'].'">'.$row['customer_number'].' | '.$row['orman_barcode'].' | '.$row['manstep_name'].'</option>
          ';
      }
  }
}
  
  print '
  </select>
</div>




<input type="submit" value="Rögzítés" class="btn btn-primary">
</form>
';

include_once("lists/listuser_order_manufacturing_step.php");
}
else{
    print '<img src="./DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Használat előtt jelentkezz be!<br></div>';
    print '<form action="index.php"><button type="submit" class="btn btn-primary">Bejelentkezés</button> </form>';
}

?>