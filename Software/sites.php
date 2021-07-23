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
<form action="feldolgozok/newSite.php" method="POST">
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Telephely neve:</span>
  <input type="text" name="siteName" class="form-control" placeholder="Telephely neve" aria-label="nev" aria-describedby="basic-addon1" required>
</div>
<input type="submit" value="Rögzítés" class="btn btn-primary">
</form>
';
include_once("lists/listSites.php");
}
else{
    print '<img src="./DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Használat előtt jelentkezz be!<br></div>';
    print '<form action="index.php"><button type="submit" class="btn btn-primary">Bejelentkezés</button> </form>';
}

?>