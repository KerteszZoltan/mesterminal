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
$selectWorkpage="SELECT * FROM `products`";
$reultWorkpage = $conn -> query($selectWorkpage);
print '
<div class="input-group mb-3">
<form action="feldolgozok/newAppendix.php" method="post" enctype="multipart/form-data">
  <label class="input-group-text" for="workapages">Termék neve:</label>
  <select name="productId" class="form-select" id="productNames">
    <option selected>Termék név</option>';
    if ($reultWorkpage->num_rows > 0) {
        while($row = $reultWorkpage->fetch_assoc()) {
            print '
              <option value="'.$row['productId'].'">'.$row['productName'].'</option>
            ';
        }
    }
    print'
  </select>
<div>
  Kérlek Válaszd ki a képet
  <input type="file" name="file">
  <input type="submit" value="Dokumentumok feltöltése" name="submit">
  </div>
</form>';





print '<div class="input-group mb-3">';
include_once("lists/listAppendixs.php");
print '</div>';
?>
