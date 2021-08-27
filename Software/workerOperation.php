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
print '<form action="feldolgozok/newWorkerOperation.php" method="POST">
        <div class="input-group mb-3">
        <div class="input-group mb-3">
        <label class="input-group-text" for="workers">Dolgozó</label>
        <select name="workerId" class="form-select" id="workers">
          <option selected>Válassz Dolgozót</option>
';
$selectWorker="SELECT * FROM `user`";
$selectOperation="SELECT * FROM `operation`";
$reultWorker = $conn -> query($selectWorker);
$reultOperation = $conn -> query($selectOperation);
if ($reultWorker->num_rows > 0) {
    while($row = $reultWorker->fetch_assoc()) {
        print '
          <option value="'.$row['ID'].'">'.$row['name'].'</option>
        ';
    }
}
print '</select>
<div class="input-group mb-3">
  <div class="input-group mb-3">
  <label class="input-group-text" for="postId">Művelet</label>
  <select name="operationId" class="form-select" id="operationId">
    <option selected>Válassz műveletet</option>';
    if ($reultOperation->num_rows > 0) {
        while($row = $reultOperation->fetch_assoc()) {
            print '
              <option value="'.$row['ID'].'">'.$row['name'].'</option>
            ';
        }
    }
    print'
  </select>
  <div class="input-group mb-3">
  <label class="input-group-text" >Művelettel eltöltött negyed óra</label>
  <input type="number" name="operationTime">
  </div>
  </div>
</div>
  <input type="submit" value="Rögzítés" class="btn btn-primary">
</div>
</form>
';
include_once("lists/listWorkersOperations.php");

}
else{
    print '<img src="./DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Használat előtt jelentkezz be!<br></div>';
    print '<form action="index.php"><button type="submit" class="btn btn-primary">Bejelentkezés</button> </form>';
}

?>