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

print '
<form action="feldolgozok/newUserOrderRole.php" method="POST">
<div class="input-group mb-3">
  <label class="input-group-text" for="workapages">Gyártási rendelés</label>
  <select name="workpageId" class="form-select" id="workapages">
    <option selected value="0">Válassz gyártási rendelés számot</option>';
    $selectWorkpage="SELECT * FROM `order` where `order`.order_status_ID>'1' order by ID desc";
    $reultWorkpage = $conn -> query($selectWorkpage);
    if ($reultWorkpage->num_rows > 0) {
        while($row = $reultWorkpage->fetch_assoc()) {
            print '
              <option value="'.$row['ID'].'">'.$row['ID'].'-'.$row['customer_number'].'</option>
            ';
        }
    }
    print'
  </select>
  </div>
  <div class="input-group mb-3">
  <label class="input-group-text">Standard kulcspozíció kiosztás</label>
  </div>
  <div class="input-group mb-3">
  <label class="input-group-text">Gyártás indító</label>
  <label class="input-group-text">Szabó Helga</label>
  </div>
  <div class="input-group mb-3">
  <label class="input-group-text">Anyagbeszerző</label>
  <label class="input-group-text">Szabariné Orosz Ágnes</label>
  </div>
  <div class="input-group mb-3">
  <label class="input-group-text">Karbantartó</label>
  <label class="input-group-text">Béres Ferenc</label>
  </div>
  <div class="input-group mb-3">
  <label class="input-group-text">Logisztikai felelős</label>
  <label class="input-group-text">Szabariné Orosz Ágnes</label>
  </div>
  <div class="input-group mb-3">
  <label class="input-group-text">Termelési adminisztrátor</label>
  <label class="input-group-text">Urbán Kristóf</label>
  </div>
  <div class="input-group mb-3">
  <label class="input-group-text">Kereskedő</label>
  <label class="input-group-text">Birkás Éva</label>
  </div>
  <div class="input-group mb-3">
  <label class="input-group-text">Műszaki támogató</label>
  <label class="input-group-text">Rózsa-Mauric Péter</label>
  </div>
  <div class="input-group mb-3">
  <label class="input-group-text">Műszakvezető</label>
  <label class="input-group-text">Budainé Stupek Edit</label>
  </div>
  <div class="input-group mb-3">
<label class="input-group-text" for="workers">Gyors projekt felelős kiosztás</label>
<input type="hidden" name="standard" value="1"> 
<input type="submit" class="btn btn-primary" value="Standard">
</div>
</div>
</form>

<hr>
<div class="card-body" style="text-align:center;">
    <h5 class="card-title"> Egyéni rendelés felelősök felvétele</h5>
</div>

<form action="feldolgozok/newUserOrderRole.php" method="POST">
<div class="input-group mb-3">
  <div class="input-group mb-3">
  <label class="input-group-text" for="workapages">Gyártási rendelés</label>
  <select name="workpageId" class="form-select" id="workapages">
    <option selected>Válassz gyártási rendelés számot</option>';
    $reultWorkpage = $conn -> query($selectWorkpage);
    if ($reultWorkpage->num_rows > 0) {
        while($row = $reultWorkpage->fetch_assoc()) {
            print '
              <option value="'.$row['ID'].'">'.$row['ID'].'-'.$row['customer_number'].'</option>
            ';
        }
    }
    print'
  </select>
</div>

<div class="input-group mb-3">
  <label class="input-group-text" for="user_roles">Dolgozói kulcs pozíció</label>
  <select name="user_role" class="form-select" id="user_roles">
    <option selected>Válassz kulcs pozíciót</option>';
    $selectRole="SELECT * FROM `role` where key_pozition > '0' order by `role`.name asc";
    $resultRole = $conn -> query($selectRole);
    if ($resultRole->num_rows > 0) {
        while($row = $resultRole->fetch_assoc()) {
            print '
              <option value="'.$row['ID'].'">'.$row['name'].'</option>
            ';
        }
    }
    print'
  </select>
</div>

<div class="input-group mb-3">
  <label class="input-group-text" for="workers">Dolgozó</label>
  <select name="workerId" class="form-select" id="workers">
    <option selected>Válassz Dolgozót</option>
';
$selectWorker="SELECT `user`.ID, `user`.name, `role`.name as role_name FROM `user` 
inner join `user_role` on `user`.ID =`user_role`.user_ID
inner join `role` on `role`.ID=`user_role`.role_ID 
where `role`.key_pozition > '0' order by `role`.name asc;";
$reultWorker = $conn -> query($selectWorker);
if ($reultWorker->num_rows > 0) {
    while($row = $reultWorker->fetch_assoc()) {
        print '
          <option value="'.$row['ID'].'">'.$row['name'].' - '.$row['role_name'].'</option>
        ';
    }
}
print '</select>
</div>

  <input type="submit" name="custom_responsible"value="Rögzítés" class="btn btn-primary">
</div>
</form>
';
include_once("lists/listUserOrderRole.php");

}
else{
    print '<img src="./DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Használat előtt jelentkezz be!<br></div>';
    print '<form action="index.php"><button type="submit" class="btn btn-primary">Bejelentkezés</button> </form>';
}
?>