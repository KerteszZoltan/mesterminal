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
}

$sqlUser="SELECT * from `user` order by name asc";
$sqlOperation="SELECT * from `operation`";
$resultUser=$conn->query($sqlUser);
$resultOperation=$conn->query($sqlOperation);
print'
<form action="feldolgozok/newUser_operation_time.php" method="POST">
<div class="input-group mb-3">
    <label class="input-group-text" for="users"> Dolgozó kiválasztása</label>
    <select name="user_id" class="form-select" id="user">
        <option selected>Válassz dolgozót</option>
';
if ($resultUser->num_rows>0) {
    while ($row=$resultUser->fetch_assoc()) {
        print '<option value="'.$row['ID'].'">'.$row['name'].'</option>';
    }
}
print '
    </select>
</div>
<div class="input-group mb-3">
    <label class="input-group-text" for="operations"> Munkaidő elszámolási típus kiválasztása</label>
    <select name="operation_id" class="form-select" id="operations">
        <option selected>Válassz típust</option>
';
if ($resultOperation->num_rows>0) {
    while ($row=$resultOperation->fetch_assoc()) {
        print '<option value="'.$row['ID'].'">'. $row['name'].'</option>';
    }
}
print '
    </select>
</div>
<div class="input-group mb-3">
    <label class="input-group-text" for="date">Nap kiválasztása</label>
    <input type="date" name="date" id="date">
</div>
<div class="input-group mb-3">
    <label class="input-group-text" for="time">Kezdési idő</label>
    <input type="time" name="start_time" id="time">
</div>
<div class="input-group mb-3">
<label class="input-group-text" for="time">Befejezési idő</label>
<input type="time" name="end_time" id="time">
</div>
<div class="input-group mb-3">
  <input type="submit" value="Rögzítés" class="btn btn-primary">
</div>
</form>
<form action="" method="POST">
<div class="input-group mb-3">
    <label class="input-group-text" for="operations"> Dolgozó kiválasztása</label>
    <select name="user_id" class="form-select" id="operations">
        <option selected value="0">Válassz dolgozót</option>';
        $resultUser=$conn->query($sqlUser);
        if ($resultUser->num_rows>0) {
            while ($row=$resultUser->fetch_assoc()) {
                print '<option value="'.$row['ID'].'">'. $row['name'].'</option>';
            }
        }
print'
    </select>
</div>
<div class="input-group mb-3">
    <label class="input-group-text" for="date">Nap kiválasztása</label>
    <input type="date" name="date" id="date">
</div>
<div class="input-group mb-3">
    <input type="submit" class="btn btn-primary" value="Listázás">
</div>
</form>
';
include('lists/listUser_operation_time.php');
?>
