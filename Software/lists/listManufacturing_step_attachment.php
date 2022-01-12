<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}
print '<hr style="width:100%">
<form action="#" method="POST">
<label class="input-group-text" for="workpages">Csatolmánnyal rendelkező műveletek</label>
<select name="manufacturing_step_id" class="form-select">
  <option selected>Válassz műveletet</option>';
    $sqlWorkpageName="SELECT manufacturing_step.ID as manstep_id, manufacturing_step.name as manstep_name, manufacturing_step.step_code FROM manufacturing_step 
    INNER JOIN manufacturing_step_attachment ON manufacturing_step.ID=manufacturing_step_attachment.manufacturing_step_ID
    GROUP BY manufacturing_step.ID";
    $workpageNameResult = $conn -> query($sqlWorkpageName);
    if ($workpageNameResult->num_rows > 0) {
    while($row = $workpageNameResult->fetch_assoc()) {
        print '<option value='.$row["manstep_id"].'>'.$row['step_code'].'-'.$row['manstep_name'].'</option>';
    }
}
print '
</select>
<input type="submit" value="Kilistázás" class="btn btn-primary">
</form>';

if(!empty($_POST["manufacturing_step_id"])){
    $manufacturing_step_id=$_POST["manufacturing_step_id"];
print '
        <table class="table">
        <th colspan="2" style="text-align:center; vertical-align:middle"> Kiválasztott termékhez tartozó csatolmányok </th>
        <tr>
            ';
$sqlSelectAppendixs="SELECT attachment.name as attachment_name, `attachment`.ID , manufacturing_step.name as manufacturing_step_name from attachment 
        INNER JOIN manufacturing_step_attachment on attachment.ID=manufacturing_step_attachment.attachment_ID 
        INNER JOIN manufacturing_step on manufacturing_step_attachment.manufacturing_step_ID=manufacturing_step.ID
        where manufacturing_step_attachment.manufacturing_step_ID='$manufacturing_step_id'";
$resultProducts = $conn -> query($sqlSelectAppendixs);
if ($resultProducts->num_rows > 0) {
    
    while($row = $resultProducts->fetch_assoc()) {
        $result = explode('.', $row['attachment_name']);
        $exploded= substr("$result[1]", -3, 3);
        print '
        <tr><td style="text-align:center; vertical-align:middle"><img src="attachments/'.$row['attachment_name'].'" width="100" height="100"></td>
        <td style="text-align:center; vertical-align:middle">'.$row['attachment_name'].'.'.$exploded.'</td>
        <td style="text-align:center; vertical-align:middle">
            <form action="./feldolgozok/downloader.php" method="POST">
            <input type="hidden" name="attachmentID" value="'.$row['ID'].'">
            <input type="submit" value="Letöltés">
            </form>
        </td></tr>
        ';
    }
}
print '
        </tr>
        </table>
                ';
}else{

}

?>