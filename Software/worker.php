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
<form action="feldolgozok/newWorker.php" method="POST">
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Dolgozó neve:</span>
  <input type="text" name="workerName" class="form-control" placeholder="Vezetéknév Keresztnév" aria-label="nev" aria-describedby="basic-addon1" required>
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Dolgozó telefonszáma:</span>
  <input type="text" name="workerPhone" class="form-control" placeholder="pl.:+36701234567" aria-label="nev" aria-describedby="basic-addon1">
</div>

<input type="submit" value="Rögzítés" class="btn btn-primary">
</form>
';
include_once("lists/listWorkers.php");
}
else{
    print '<img src="./DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Használat előtt jelentkezz be!<br></div>';
    print '<form action="index.php"><button type="submit" class="btn btn-primary">Bejelentkezés</button> </form>';
}

?>