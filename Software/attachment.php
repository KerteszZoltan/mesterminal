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
}else {


}
$selectProduct="SELECT * FROM `product` ORDER BY name ASC";
$reultProduct = $conn -> query($selectProduct);
print '
<div class="input-group mb-3">
<form action="feldolgozok/newAttachment.php" method="post" enctype="multipart/form-data">
  <label class="input-group-text" for="product">Termék neve:</label>
  <select name="productId" class="form-select" id="productNames">
    <option selected>Termék név</option>';
    if ($reultProduct->num_rows > 0) {
        while($row = $reultProduct->fetch_assoc()) {
            print '
              <option value="'.$row['ID'].'">'.$row['name'].'</option>
            ';
        }
    }
    print'
  </select>
<div>
  Kérlek Válaszd ki a képet
  <input type="file" name="srcfile">
  <input type="submit" value="Dokumentumok feltöltése" name="submit">
  </div>
</form>';





print '<div class="input-group mb-3">';
include_once("lists/listAttachment.php");
print '</div>';
?>
