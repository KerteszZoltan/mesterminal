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
print '<form action="feldolgozok/newCompanyForeignPartNumber.php" method="POST">
        <div class="input-group mb-3">
        <div class="input-group mb-3">
        <label class="input-group-text" for="companys">Cég:</label>
        <select name="companyId" class="form-select" id="companyId">
          <option selected>Válassz céget</option>
';
$selectMachines="SELECT * FROM `companys`";
$selectWorkpage="SELECT * FROM `products`";
$reultWorker = $conn -> query($selectMachines);
$reultWorkpage = $conn -> query($selectWorkpage);
if ($reultWorker->num_rows > 0) {
    while($row = $reultWorker->fetch_assoc()) {
        print '
          <option value="'.$row['companyId'].'">'.$row['companyName'].'</option>
        ';
    }
}
print '</select>
<div class="input-group mb-3">
  <div class="input-group mb-3">
  <label class="input-group-text" for="products">Termék:</label>
  <select name="productId" class="form-select" id="productId">
    <option selected>Válassz terméket</option>';
    if ($reultWorkpage->num_rows > 0) {
        while($row = $reultWorkpage->fetch_assoc()) {
            print '
              <option value="'.$row['productId'].'">'.$row['productName'].'</option>
            ';
        }
    }
    print'
  </select>
  <div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Termékhez tartozó idegencikkszám:</span>
  <input type="text" name="foreignId" class="form-control" placeholder="Idegen cikkszám" aria-label="nev" aria-describedby="basic-addon1" >
  </div>
  <input type="submit" value="Rögzítés" class="btn btn-primary">
</div>
</form>
';
//include_once("lists/.php");

}
else{
    print '<img src="./DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Használat előtt jelentkezz be!<br></div>';
    print '<form action="index.php"><button type="submit" class="btn btn-primary">Bejelentkezés</button> </form>';
}

?>