<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

$barcode = $_POST['barcode'];
$step_code = $_POST['step_code'];
$name = $_POST['name'];
$category_id  = $_POST['category_id'];
$overhead_fee = $_POST['overhead_fee'];
$education = $_POST['education'];


$selectStepCode="SELECT ID FROM `manufacturing_step` where step_code='$step_code'";
$resultStepCode=$conn->query($selectStepCode);
if ($resultStepCode->num_rows > 0) {
    print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Hiba a feltöltés közben! Ilyen kódú gyártási lépés már létezik<br></div>';
    print '<form action="../manufacturing_step.php"><button type="submit" class="btn btn-primary">Új gyártási lépés feltöltés</button> </form>';
}else{
    print $sql ="INSERT INTO manufacturing_step (barcode, step_code,name,category_id, overhead_fee, education) 
    VALUES ('{$barcode}','{$step_code}','{$name}','{$category_id}','{$overhead_fee}', '{$education}')";
$result = $conn->query($sql);
if(!$sql){
 print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
 print '<div class="input-group-text">Hiba a feltöltés közben!<br></div>';
 print '<form action="../manufacturing_step.php"><button type="submit" class="btn btn-primary">Új gyártási lépés feltöltés</button> </form>';
 }else{
     header("Location: ../manufacturing_step.php");    
 }
}

?>