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
print '<form action="feldolgozok/newMachinesWorkpage.php" method="POST">
        <div class="input-group mb-3">
        <div class="input-group mb-3">
        <label class="input-group-text" for="workers">Dolgozó</label>
        <select name="machineId" class="form-select" id="workers">
          <option selected>Válassz Gépet</option>
';
$selectMachines="SELECT * FROM `machines`";
$selectWorkpage="SELECT * FROM `workpages`";
$reultWorker = $conn -> query($selectMachines);
$reultWorkpage = $conn -> query($selectWorkpage);
if ($reultWorker->num_rows > 0) {
    while($row = $reultWorker->fetch_assoc()) {
        print '
          <option value="'.$row['machineId'].'">'.$row['machineName'].'</option>
        ';
    }
}
print '</select>
<div class="input-group mb-3">
  <div class="input-group mb-3">
  <label class="input-group-text" for="workapages">Munkalap</label>
  <select name="workpageId" class="form-select" id="workapages">
    <option selected>Válassz Munkalapot</option>';
    if ($reultWorkpage->num_rows > 0) {
        while($row = $reultWorkpage->fetch_assoc()) {
            print '
              <option value="'.$row['workpageId'].'">'.$row['workpageName'].'</option>
            ';
        }
    }
    print'
  </select>
</div>
  <input type="submit" value="Rögzítés" class="btn btn-primary">
</div>
</form>
';
include_once("lists/listMachinesWorkpage.php");

}
else{
    print '<img src="./DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Használat előtt jelentkezz be!<br></div>';
    print '<form action="index.php"><button type="submit" class="btn btn-primary">Bejelentkezés</button> </form>';
}

?>