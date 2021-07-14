<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

print '
<form action="#" method="POST">
<label class="input-group-text" for="workpages">Munkalapok szerinti keresés</label>
<select name="workpageId" class="form-select" id="workpageId">
  <option selected>Válassz Munkalapot</option>';
    $sqlWorkpageName="SELECT * from `workpages`";
    $workpageNameResult = $conn -> query($sqlWorkpageName);
    if ($workpageNameResult->num_rows > 0) {
    while($row = $workpageNameResult->fetch_assoc()) {
        print '<option value='.$row["workpageId"].'>'.$row['workpageName'].'</option>';
    }
}
print '
</select>
<input type="submit" value="kilistázás" class="btn btn-primary">
</form>';
print '
<form action="#" method="POST">
<label class="input-group-text" for="workpages">Dolgozó szerinti keresés</label>
<select name="workerId" class="form-select" id="workpageId">
  <option selected>Válassz Dolgozót</option>';
    $sqlWorkerkName="SELECT * from `workers`";
    $resultWorkerName = $conn -> query($sqlWorkerkName);
    if ($resultWorkerName->num_rows > 0) {
    while($row = $resultWorkerName->fetch_assoc()) {
        print '<option value='.$row["workerId"].'>'.$row['workerName'].'</option>';
    }
}
print '
</select>
<input type="submit" value="kilistázás" class="btn btn-primary">
</form>';

if(!empty($_POST['workpageId'])){
    print '
    <table class="table">
    <th colspan="2" style="text-align:center; vertical-align:middle"> Kiválasztott munkalapon dolgozók </th>
    <tr>
    ';
    $workpageId=$_POST['workpageId'];
    $sqlWorkerOnWorkpage="SELECT workpages.workpageName,workers.workerName from `workpages` 
    INNER JOIN workerpage on workpages.workpageId=workerpage.workpageId 
    inner JOIN workers on workers.workerId=workerpage.workerId WHERE workpages.workpageId='$workpageId';
     ";
    $resultWorkerOnWorkpage = $conn -> query($sqlWorkerOnWorkpage);
    if ($resultWorkerOnWorkpage->num_rows > 0) {
    while($row = $resultWorkerOnWorkpage->fetch_assoc()) {
        print '<tr><td style="text-align:center; vertical-align:middle">'.$row['workpageName'].'</td>'.
              '<td style="text-align:center; vertical-align:middle">'.$row['workerName'].'</td><tr>';
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
    <th colspan="2" style="text-align:center; vertical-align:middle"> Kiválasztott dolgozó munkalapjai </th>
    <tr>
    ';
    $workerId=$_POST['workerId'];
    $sqlWorkerOnWorkpages="SELECT workpages.workpageName,workers.workerName from `workpages` 
    INNER JOIN workerpage on workpages.workpageId=workerpage.workpageId 
    inner JOIN workers on workers.workerId=workerpage.workerId 
    WHERE workers.workerId='$workerId'
     ";
    $resultWorkerOnWorkpages = $conn -> query($sqlWorkerOnWorkpages);
    if ($resultWorkerOnWorkpages->num_rows > 0) {
    while($row = $resultWorkerOnWorkpages->fetch_assoc()) {
        print '<tr><td style="text-align:center; vertical-align:middle">'.$row['workpageName'].'</td>
              <td style="text-align:center; vertical-align:middle">'.$row['workerName'].'</td></tr>';
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