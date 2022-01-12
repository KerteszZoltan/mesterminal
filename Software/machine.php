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
print '
<form action="feldolgozok/newMachine.php" method="POST">
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Gép vonalkódja</span>
  <input type="text" name="machine_barcode" class="form-control" placeholder="pl. 123456 ">
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Gép megnevezése</span>
  <input type="text" name="machine_name" class="form-control" placeholder="pl. Habosító " required>
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Gép rezsi óradíja</span>
  <input type="text" name="overhead_fee" class="form-control">
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Gép belső átállási ideje</span>
  <input type="text" name="internal_changeover" class="form-control">
  <span class="input-group-text" id="basic-addon1">perc</span>
</div>

<div class="input-group mb-3">
  <input type="submit" value="Rögzítés" class="btn btn-primary">
</div>
</form>
';
include_once("lists/listMachines.php");
}
else{
    print '<img src="./DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Használat előtt jelentkezz be!<br></div>';
    print '<form action="index.php"><button type="submit" class="btn btn-primary">Bejelentkezés</button> </form>';
}
?>

