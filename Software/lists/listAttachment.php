<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}
print '<hr style="width:100%">
<form action="#" method="POST">
<label class="input-group-text" for="workpages">Csatolmánnyal rendelkező termékek</label>
<select name="productId" class="form-select" id="productId">
  <option selected>Válassz terméket</option>';
    $sqlWorkpageName="SELECT product.ID as productId, product.name as productName FROM product 
    INNER JOIN product_attachment ON product.ID=product_attachment.product_ID
    GROUP BY product.ID";
    $workpageNameResult = $conn -> query($sqlWorkpageName);
    if ($workpageNameResult->num_rows > 0) {
    while($row = $workpageNameResult->fetch_assoc()) {
        print '<option value='.$row["productId"].'>'.$row['productName'].'</option>';
    }
}
print '
</select>
<input type="submit" value="Kilistázás" class="btn btn-primary">
</form>';

if(!empty($_POST["productId"])){
    $productId=$_POST["productId"];
print '
        <table class="table">
        <th colspan="2" style="text-align:center; vertical-align:middle"> Kiválasztott termékhez tartozó csatolmányok </th>
        <tr>
            ';
$sqlSelectAppendixs="SELECT attachment.name as attachment_name, `attachment`.ID , product.name as product_name from attachment 
        INNER JOIN product_attachment on attachment.ID=product_attachment.attachment_ID 
        INNER JOIN product on product_attachment.product_ID=product.ID
        where product_attachment.product_ID='$productId'";
$resultProducts = $conn -> query($sqlSelectAppendixs);
if ($resultProducts->num_rows > 0) {
    
    while($row = $resultProducts->fetch_assoc()) {
        $result = explode('.', $row['attachment_name']);
        $exploded= substr("$result[1]", -3, 3);
        print '
        <tr><td style="text-align:center; vertical-align:middle"><img src="attachments/'.$row['attachment_name'].'" width="100" height="100"></td>
        <td style="text-align:center; vertical-align:middle">'.$row['product_name'].'.'.$exploded.'</td>
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