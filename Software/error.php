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
<form action="feldolgozok/newError.php" method="POST">
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Hiba vonalkód</span>
  <input type="text" name="error_barcode" class="form-control" placeholder="pl. 123456" >
  </div>
<div class="input-group mb-3">

  <span class="input-group-text" id="basic-addon1">Hiba megnevezése</span>
  <input type="text" name="error_name" class="form-control" placeholder="pl. Szerszámhiba" required>
<div class="input-group mb-3">
  <input type="submit" value="Rögzítés" class="btn btn-primary">
  </div>
</div>
</form>
';
include_once("lists/listErrors.php");
}
else{
    print '<img src="./DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Használat előtt jelentkezz be!<br></div>';
    print '<form action="index.php"><button type="submit" class="btn btn-primary">Bejelentkezés</button> </form>';
}

?>