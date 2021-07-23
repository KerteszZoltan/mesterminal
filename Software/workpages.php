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
if (empty($workNumber)) {
$workNumber='';
}

if($adminId != 0){
include_once("html_frame/html_body.html");
print '
<form action="#" method="POST">
<div class="input-group mb-3">
<span class="input-group-text" id="basic-addon1">Munkalap sorszáma:</span>';
if (isset($_POST['workNumber'])) {
  $workNumber=$_POST['workNumber'];
  $sqlSelectWorkNumber="SELECT * FROM `orders` where workNumber='$workNumber'";
  $resultSelectWorkNumber=$conn->query($sqlSelectWorkNumber);
  if ($resultSelectWorkNumber->num_rows > 0) {
    while($row = $resultSelectWorkNumber->fetch_assoc()) {
      print'
  <input type="text" name="workNumber" class="form-control" aria-describedby="basic-addon1" value="'.$row['workNumber'].'"> 
      ';
    }
  }else{ header("Location: workpages.php"); }
} else {
  print '
  <input type="text" name="workNumber" class="form-control" placeholder="munkalap sorszám" aria-describedby="basic-addon1"> 
  ';
}
print '
<div class="input-group mb-3">
<span class="input-group-text" id="basic-addon1">Munkalap sorszáma:</span>
<select name="workNumber" class="form-select" id="workapages">
    <option selected>Válassz Munkalapot</option>';
    $selectWorkNumber="SELECT * from orders";
    $resultWorkNumber=$conn->query($selectWorkNumber);
    if ($resultWorkNumber->num_rows > 0) {
        while($row = $resultWorkNumber->fetch_assoc()) {
            print '
              <option value="'.$row['workNumber'].'">'.$row['workNumber'].'</option>
            ';
        }
    }
    print'
  </select>
</div>
</div>
<input type="submit" value="Munkaszám ellenőrzés" class="btn btn-primary">
</form>

<form action="feldolgozok/newWorkpage.php" method="POST">
<input type="hidden" name="workNumber" value="'.$workNumber.'">

<div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon2">Munkalap neve:</span>
    <input type="text" class="form-control" name="workpageName" placeholder="munkalap név" aria-describedby="basic-addon2">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon3">Elvárt db</span>
  <input type="text" name="expectedDB" class="form-control" id="basic-url" aria-describedby="basic-addon3">
</div>

<div class="input-group mb-3">
  <span class="input-group-text">Teljesített db</span>
  <input type="text" name="successedDB" class="form-control">
</div>

<div class="input-group mb-3">
  <span class="input-group-text">Selejt db</span>
  <input type="text" name="discardDB" class="form-control"  aria-label="Server">
</div>




<input type="submit" value="Rögzítés" class="btn btn-primary">
</form>
';
include_once("lists/listWorkpages.php");
}
else{
    print '<img src="./DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Használat előtt jelentkezz be!<br></div>';
    print '<form action="index.php"><button type="submit" class="btn btn-primary">Bejelentkezés</button> </form>';
}

?>