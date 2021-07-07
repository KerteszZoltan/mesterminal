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
}else {


}
$selectWorkpage="SELECT * FROM `products`";
$reultWorkpage = $conn -> query($selectWorkpage);
print '
<div class="input-group mb-3">
<form action="appendix.php" method="post" enctype="multipart/form-data">
  <label class="input-group-text" for="workapages">Termék neve:</label>
  <select name="productId" class="form-select" id="productNames">
    <option selected>Termék név</option>';
    if ($reultWorkpage->num_rows > 0) {
        while($row = $reultWorkpage->fetch_assoc()) {
            print '
              <option value="'.$row['productId'].'">'.$row['productName'].'</option>
            ';
        }
    }
    print'
  </select>
<div>
  Kérlek Válaszd ki a képet
  <input type="file" name="file">
  <input type="submit" value="Dokumentumok feltöltése" name="submit">
  </div>
</form>';


if(!empty($_FILES['file'])){
  $minsize=1;
  if(($_FILES['file']['size'] <= $minsize) || ($_FILES["file"]["size"] == 0)) {
    echo '<div>';
    echo 'Kicsi a méret<br>';
    echo '</div>';
}else if(!empty($_FILES['file'])){
$filename   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
$extension  = pathinfo( $_FILES["file"]["name"], PATHINFO_EXTENSION ); // jpg
$basename   = $filename . "." . $extension; // 5dab1961e93a7.jpg
$source       = $_FILES["file"]["tmp_name"];
$destination  = "appendixs/{$basename}";
$productId=$_POST['productId'];
move_uploaded_file( $source, $destination );
$insert ="INSERT INTO appendixs (appendixName) 
	   VALUES ('{$basename}')";
$conn->query($insert);
$sqlLast="SELECT MAX(appendixId) as id from appendixs";
$result = $conn->query($sqlLast);
$last;
if ($result->num_rows > 0) {
  foreach($result as $row) {
    $last=$row['id'];
  }
}

  print $insertProductAppendix="INSERT INTO productappendixs (appendixId, productId)
                                              VALUE ('{$last}', '{$productId}')";
  $conn->query($insertProductAppendix);            
}
//header("Location: appendix.php");
}
?>
