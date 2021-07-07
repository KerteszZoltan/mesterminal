<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

print '
<form action="#" method="POST">
<label class="input-group-text" for="workers">Dolgozó</label>
<select name="workpageId" class="form-select" id="workpageId">
  <option selected>Válassz Munkalapot</option>';
    $sqlWorkpageName="SELECT workpages.workpageName from `workpages` INNER JOIN workerpage on workpages.workpageId=workerpage.workpageId GROUP BY workerpage.workpageId";
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

?>