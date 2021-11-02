<?php
include "../connection.php";
if(!isset($_SESSION)){
    session_start();
}
include_once("../html_frame/html_head.html");

print '
<form action="../mainPage.php" method="POST">
<input type="submit" value="Vissza a főoldalra" class="btn btn-primary">
</form>
<form action="#" method="POST">
<label class="input-group-text" for="workpages">Gyártási rendelés szerinti listázás</label>
<select name="workpageId" class="form-select" id="workpageId">
  <option value="0" selected>Válassz gyártási rendelést</option>';
    $sqlWorkpageName="SELECT * from `order` order by ID desc";
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
  <option value="0" selected>Válassz Dolgozót</option>';
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

if(isset($_POST['workpageId'])){
    print '
    <table class="table">
    <th colspan="5" style="text-align:center; vertical-align:middle"> Kiválasztott gyártási rendelésen dolgozók </th>
    <tr>
    ';
    $workpageId=$_POST['workpageId'];
    $sqlWorkerOnWorkpage="SELECT `user`.name as user_name, `order`.`customer_number` as VRR_number, `user_order_manufacturing_step`.`time` as time from user 
    INNER JOIN user_order_manufacturing_step on user_order_manufacturing_step.user_ID=user.ID 
    INNER JOIN order_manufacturing_step ON user_order_manufacturing_step.order_manufacturing_step_ID=order_manufacturing_step.ID 
    inner join `order` on`order`.`ID`=order_manufacturing_step.order_ID 
    where `order`.`ID`='".$workpageId."' GROUP BY user.name order by `user`.`name` ASC;
    ";
    $resultWorkerOnWorkpage = $conn -> query($sqlWorkerOnWorkpage);
    if ($resultWorkerOnWorkpage->num_rows > 0) {
    while($row = $resultWorkerOnWorkpage->fetch_assoc()) {
        print '<tr>'.
              '<td style="text-align:center; vertical-align:middle">'.$row['VRR_number'].'</td>
              <td style="text-align:center; vertical-align:middle">'.$row['user_name'].'</td>
              <td style="text-align:center; vertical-align:middle">'.$row['time'].' perc</td>
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

if(isset($_POST['workerId'])){
    print '
    <table class="table">
    <th colspan="5" style="text-align:center; vertical-align:middle"> Kiválasztott dolgozó gyártási rendelései </th>
    <tr>
    ';
    $workerId=$_POST['workerId'];
    $sqlWorkerOnWorkpages="select `user`.name as user_name, `order`.`customer_number` as VRR_number, `user_order_manufacturing_step`.`time` as time from user 
    INNER JOIN user_order_manufacturing_step on user_order_manufacturing_step.user_ID=user.ID 
    INNER JOIN order_manufacturing_step ON user_order_manufacturing_step.order_manufacturing_step_ID=order_manufacturing_step.ID 
    inner join `order` on`order`.`ID`=order_manufacturing_step.order_ID 
    where user.ID=".$workerId." group by `order`.customer_number order by `order`.`customer_number`
     ";
    $resultWorkerOnWorkpages = $conn -> query($sqlWorkerOnWorkpages);
    if ($resultWorkerOnWorkpages->num_rows > 0) {
    while($row = $resultWorkerOnWorkpages->fetch_assoc()) {
        print '<tr>
              <td style="text-align:center; vertical-align:middle">'.$row['VRR_number'].'</td>
              <td style="text-align:center; vertical-align:middle">'.$row['user_name'].'</td>
              <td style="text-align:center; vertical-align:middle">'.$row['time'].' perc</td>
              </tr>
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