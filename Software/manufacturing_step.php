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
<form action="feldolgozok/newManufacturing_step.php" method="POST">

<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Gyártási művelet vonalkódja:</span>
  <input type="text" name="barcode" class="form-control" placeholder="pl. 1234567" aria-label="nev" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Gyártási művelet kódja:</span>
  <input type="text" name="step_code" class="form-control" placeholder="MUV0000" aria-label="nev" aria-describedby="basic-addon1" required>
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Gyártási művelet neve:</span>
  <input type="text" name="name" class="form-control" aria-label="nev" aria-describedby="basic-addon1" required>
</div>


<div class="input-group mb-3">
        <label class="input-group-text" for="user_type">Gyártási művelet kategória</label>
        <select name="category_id" class="form-select" id="user_type" required>';
        $selectCategory="SELECT * FROM `category`";
        $resultCategory=$conn->query($selectCategory);
        if ($resultCategory->num_rows > 0) {
            while($row = $resultCategory->fetch_assoc()) {
                print '
                  <option value="'.$row['ID'].'">'.$row['ID'].'-'.$row['name'].'</option>
                ';
            }
        }

print '
</select>
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Gyártási művelet rezsi óradíja:</span>
  <input type="text" name="overhead_fee" class="form-control" aria-describedby="basic-addon1" required>
  <span class="input-group-text" id="basic-addon1"> Ft/óra</span>
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Gyártási művelet oktatás/fejlesztési ideje:</span>
  <input type="text" name="education" class="form-control">
  <span class="input-group-text" id="basic-addon1"> perc</span>
</div>
<input type="submit" value="Rögzítés" class="btn btn-primary">
</form>
';
include_once("lists/listManufacturing_Step.php");
}
else{
    print '<img src="./DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Használat előtt jelentkezz be!<br></div>';
    print '<form action="index.php"><button type="submit" class="btn btn-primary">Bejelentkezés</button> </form>';
}

?>