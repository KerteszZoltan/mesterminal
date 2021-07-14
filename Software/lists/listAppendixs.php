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
    $sqlWorkpageName="SELECT * FROM products INNER JOIN productappendixs ON products.productId=productappendixs.productId 
                    GROUP BY products.productId";
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
$sqlSelectAppendixs="SELECT * from appendixs 
        INNER JOIN productappendixs on appendixs.appendixId=productappendixs.appendixId 
        INNER JOIN products on productappendixs.productId=products.productId 
        where productappendixs.productId='$productId'";
$resultProducts = $conn -> query($sqlSelectAppendixs);
if ($resultProducts->num_rows > 0) {
    
    while($row = $resultProducts->fetch_assoc()) {
        $result = explode('.', $row['appendixName']);
        $exploded= substr("$result[1]", -3, 3);
        print '
        <tr><td style="text-align:center; vertical-align:middle"><img src="appendixs/'.$row['appendixName'].'" width="100" height="100"></td>
        <td style="text-align:center; vertical-align:middle">'.$row['productName'].'.'.$exploded.'</td>
        <td style="text-align:center; vertical-align:middle">
            <form action="./feldolgozok/downloader.php" method="POST">
            <input type="hidden" name="appendixName" value="'.$row['appendixName'].'">
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