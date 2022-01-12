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
$selelct_manufacturing_step="SELECT ID,step_code,name FROM `manufacturing_step` ORDER BY step_code ASC";
$result_manufacturing_step = $conn -> query($selelct_manufacturing_step);
print '
<div class="input-group mb-3">
<form action="feldolgozok/new_manufacturing_step_attachment.php" method="post" enctype="multipart/form-data">
  <label class="input-group-text" >Művelet neve:</label>
  <select name="manufacturing_step_ID" class="form-select">
    <option selected>Művelet</option>';
    if ($result_manufacturing_step->num_rows > 0) {
        while($row = $result_manufacturing_step->fetch_assoc()) {
            print '
              <option value="'.$row['ID'].'">'.$row['step_code'].'-'.$row['name'].'</option>
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
include_once("lists/listManufacturing_step_attachment.php");
print '</div>';
?>
