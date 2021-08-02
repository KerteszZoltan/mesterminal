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
<form action="feldolgozok/newUser.php" method="POST">

<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Dolgozó vonalkódja:</span>
  <input type="text" name="user_barcode" class="form-control" placeholder="pl. 123456789" aria-label="nev" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Dolgozó neve:</span>
  <input type="text" name="user_name" class="form-control" placeholder="Vezetéknév Keresztnév" aria-label="nev" aria-describedby="basic-addon1" required>
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Dolgozó telefonszáma:</span>
  <input type="text" name="user_phone" class="form-control" placeholder="pl.:+36701234567" aria-label="nev" aria-describedby="basic-addon1">
</div>
<hr style="text-align:center; vertical-align:middle"><h2> Az adatok megadása admin felhasználókhoz 
<hr>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Dolgozó e-mail címe:</span>
  <input type="text" name="user_email" class="form-control" placeholder="pl.:tesztmail@mail.hu" aria-label="nev" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Dolgozó jelszava:</span>
  <input type="text" name="user_password" class="form-control" placeholder="" aria-label="nev" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3">
        <label class="input-group-text" for="user_type">Dolgozó</label>
        <select name="user_type" class="form-select" id="user_type" required>
          <option>Válassz dolgozó típust</option>
';
$sqlUserType="SELECT * from user_type;";
$resutlUserType=$conn->query($sqlUserType);
if ($resutlUserType->num_rows > 0) {
  while($row = $resutlUserType->fetch_assoc()) {
    print $row['ID'];
    print '<option value="'.$row['ID'].'">'.$row['type_name'].'</option>';
  }
}
print '
</select>
</div>
<input type="submit" value="Rögzítés" class="btn btn-primary">
</form>
';
include_once("lists/listUsers.php");
}
else{
    print '<img src="./DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Használat előtt jelentkezz be!<br></div>';
    print '<form action="index.php"><button type="submit" class="btn btn-primary">Bejelentkezés</button> </form>';
}

?>