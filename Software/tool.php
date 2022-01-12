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
print '
<form action="feldolgozok/newTool.php" method="POST">
<div class="input-group mb-3">
<span class="input-group-text" id="basic-addon1">Szerszám vonalkódja</span>
  <input type="text" name="tool_barcode" class="form-control" placeholder="pl. 123456 ">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Szerszám megnevezése</span>
  <input type="text" name="tool_name" class="form-control" placeholder="pl. Fúró " required>
</div>
<div class="input-group mb-3">
<label class="input-group-text" for="machines">Gép</label>
<select name="machineId" class="form-select" id="machines">
  <option value=" " selected>Válassz Gépet</option>
';
$selectMachines="SELECT * FROM `machine`";
$reultMachines = $conn -> query($selectMachines);
if ($reultMachines->num_rows > 0) {
  while($row = $reultMachines->fetch_assoc()) {
      print '
        <option value="'.$row['ID'].'">'.$row['name'].'</option>
      ';
  }
}
print '
</select>
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Szerszám óradíja</span>
  <input type="text" name="overhead_fee" class="form-control">
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Szerszám belső átállás</span>
  <input type="text" name="internal_changeover" class="form-control">
  <span class="input-group-text" id="basic-addon1">perc</span>
</div>

<div class="input-group mb-3">
  <input type="submit" value="Rögzítés" class="btn btn-primary">
</div>

</div>
</form>
';
include_once("lists/listTools.php");
}
else{
    print '<img src="./DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Használat előtt jelentkezz be!<br></div>';
    print '<form action="index.php"><button type="submit" class="btn btn-primary">Bejelentkezés</button> </form>';
}

?>