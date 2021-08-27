<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

print '
<form action="#" method="POST">
<label class="input-group-text" for="workpages">Gyártási rendelés szerinti listázás</label>
<select name="workpageId" class="form-select" id="workpageId">
  <option selected>Válassz gyártási rendelést</option>';
    $sqlWorkpageName="SELECT * from `order`";
    $workpageNameResult = $conn -> query($sqlWorkpageName);
    if ($workpageNameResult->num_rows > 0) {
    while($row = $workpageNameResult->fetch_assoc()) {
        print '<option value='.$row["ID"].'>'.$row['ID'].'-'.$row['customer_number'].'</option>';
    }
}
print '
</select>
<input type="submit" value="Kilistázás" class="btn btn-primary">
</form>';
print '
<form action="#" method="POST">
<label class="input-group-text" for="workpages">Dolgozó szerinti listázás</label>
<select name="workerId" class="form-select" id="workpageId">
  <option selected>Válassz Dolgozót</option>';
    $sqlWorkerkName="SELECT * from `user`";
    $resultWorkerName = $conn -> query($sqlWorkerkName);
    if ($resultWorkerName->num_rows > 0) {
    while($row = $resultWorkerName->fetch_assoc()) {
        print '<option value='.$row["ID"].'>'.$row['name'].'</option>';
    }
}
print '
</select>
<input type="submit" value="Kilistázás" class="btn btn-primary">
</form>';

if(!empty($_POST['workpageId'])){
    print '
    <table class="table">
    <th colspan="5" style="text-align:center; vertical-align:middle"> Kiválasztott gyártási rendelésen dolgozók </th>
    <tr>
    ';
    $workpageId=$_POST['workpageId'];
    $sqlWorkerOnWorkpage="SELECT 
    `order`.ID as order_id,
    `order`.customer_number as customer_number,
    `user`.name as user_name,
    `user_order`.time as work_time,
    `user_order`.ID as user_order_ID
    from `order` 
    INNER JOIN `user_order` on `order`.ID=user_order.order_ID 
    inner JOIN `user` on `user`.ID=user_order.user_ID WHERE `order`.ID='$workpageId';
     ";
    $resultWorkerOnWorkpage = $conn -> query($sqlWorkerOnWorkpage);
    if ($resultWorkerOnWorkpage->num_rows > 0) {
    while($row = $resultWorkerOnWorkpage->fetch_assoc()) {
        print '<tr><td style="text-align:center; vertical-align:middle">'.$row['order_id'].'</td>'.
              '<td style="text-align:center; vertical-align:middle">'.$row['customer_number'].'</td>
              <td style="text-align:center; vertical-align:middle">'.$row['user_name'].'</td>
              <form action="feldolgozok/modifyUser_order.php" method="POST">
              <td style="text-align:center; vertical-align:middle"><input type="number" name="work_time" value="'.$row['work_time'].'">perc</td>
              <td><input type="hidden" name="user_order_id" value="'.$row['user_order_ID'].'"><input type="submit" value="Módosítás" class="btn btn-primary"></td>
              </form>
              </tr>';
    }
    print '
    </tr>
    </table>
    ';
    }
    else{

    }
}

if(!empty($_POST['workerId'])){
    print '
    <table class="table">
    <th colspan="5" style="text-align:center; vertical-align:middle"> Kiválasztott dolgozó gyártási rendelései </th>
    <tr>
    ';
    $workerId=$_POST['workerId'];
    $sqlWorkerOnWorkpages="SELECT 
    `order`.ID as order_id,
    `order`.customer_number as customer_number,
    `user`.name as user_name,
    `user_order`.time as work_time,
    `user_order`.ID as user_order_ID
    from `order` 
    INNER JOIN `user_order` on `order`.ID=user_order.order_ID 
    inner JOIN `user` on `user`.ID=user_order.user_ID WHERE `user`.ID= '$workerId';
     ";
    $resultWorkerOnWorkpages = $conn -> query($sqlWorkerOnWorkpages);
    if ($resultWorkerOnWorkpages->num_rows > 0) {
    while($row = $resultWorkerOnWorkpages->fetch_assoc()) {
        print '<tr><td style="text-align:center; vertical-align:middle">'.$row['order_id'].'</td>
              <td style="text-align:center; vertical-align:middle">'.$row['customer_number'].'</td>
              <td style="text-align:center; vertical-align:middle">'.$row['user_name'].'</td>
              <form action="feldolgozok/modifyUser_order.php" method="POST">
              <td style="text-align:center; vertical-align:middle"><input type="number" name="work_time" value="'.$row['work_time'].'">perc</td>
              <td><label type="hidden" name="user_order_id" value="'.$row['user_order_ID'].'"><input type="submit" value="Módosítás" class="btn btn-primary"></td></tr>
              </form>
              ';
    }
    print '
    </tr>
    </table>
    ';
    }
    
    else{

    }
}
?>