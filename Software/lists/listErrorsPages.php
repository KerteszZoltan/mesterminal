<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}
print'
<table style="width:100%">
    <thead>
        <tr>
        <form action="#" method="POST">
            <th colspan="5" style="text-align: center;"> <input type="hidden" value="2" name="with_machine"> <input type="submit" value="Gépen keletkezett hibák"></td>
            </form>
        <form action="#" method="POST">
            <th colspan="5" style="text-align: center;"> <input type="hidden" value="1" name="without_machine"> <input type="submit" value="Géphez nem tartozó hibák"> </td>
            </form>
        </tr>
    </thead>
</table>    
';
if(isset($_POST['with_machine'])){
    print '
    <table class="table">
    <th style="text-align:center; vertical-align:middle"> Hiba sorszáma </th>
	<th style="text-align:center; vertical-align:middle"> Műveleti lap vonalkód </th>
    <th style="text-align:center; vertical-align:middle"> Hiba neve </th>
    <th style="text-align:center; vertical-align:middle"> Gép neve </th>
	<th style="text-align:center; vertical-align:middle"> Szerszám neve </th>
	<th style="text-align:center; vertical-align:middle"> Leírás </th>
    <tr>
    ';

    $sql="
    SELECT `order_manufacturing_step_machine_error`.ID as ormanst_machine_error_ID,
    `order_manufacturing_step_machine_error`.description,
    `order_manufacturing_step`.barcode as ormanst_barcode,
    `error`.name as error_name,
    `machine`.name as machine_name,
    `machine_tool`.name as machine_tool_name FROM
    `order_manufacturing_step_machine_error` 
    INNER JOIN `order_manufacturing_step` ON `order_manufacturing_step_machine_error`.order_manufacturing_step_ID=`order_manufacturing_step`.ID
    INNER JOIN `error` ON `order_manufacturing_step_machine_error`.error_ID=`error`.ID
    INNER JOIN `machine` ON `order_manufacturing_step_machine_error`.machine_ID=`machine`.ID
    INNER JOIN `machine_tool` ON `order_manufacturing_step_machine_error`.machine_tool_ID=`machine_tool`.ID
    ";

    $resulterrormachine = $conn -> query($sql);
    if ($resulterrormachine->num_rows > 0) {
        while($row = $resulterrormachine->fetch_assoc()) {
            print '
            <tr><td style="text-align:center; vertical-align:middle">'.$row['ormanst_machine_error_ID'].'</td>
            <td style="text-align:center; vertical-align:middle">'.$row['ormanst_barcode'].'</td> 
		    <td style="text-align:center; vertical-align:middle">'.$row['error_name'].'</td> 
		    <td style="text-align:center; vertical-align:middle">'.$row['machine_name'].'</td> 
            <td style="text-align:center; vertical-align:middle">'.$row['machine_tool_name'].'</td>
		    <td style="text-align:center; vertical-align:middle"><label>'.$row['description'].'</label></td></tr>
            ';
        }
    }
}
if (isset($_POST['without_machine'])) {
    print '
    <table class="table">
    <th style="text-align:center; vertical-align:middle"> Hiba sorszáma </th>
	<th style="text-align:center; vertical-align:middle"> Műveleti lap vonalkód </th>
    <th style="text-align:center; vertical-align:middle"> Hiba neve </th>
    <th style="text-align:center; vertical-align:middle"> Hibát elhárította </th>
	<th style="text-align:center; vertical-align:middle"> Leírás </th>
    <tr>
    ';
    $errorwithoutmachine="SELECT `order_manufacturing_step_machine_error`.ID as ormanst_machine_error_ID, 
                            `order_manufacturing_step_machine_error`.description, 
                            `order_manufacturing_step`.barcode as ormanst_barcode, 
                            `user`.`name` as username, 
                            `error`.name as error_name 
                            FROM `order_manufacturing_step_machine_error` 
                            INNER JOIN `order_manufacturing_step` ON `order_manufacturing_step_machine_error`.order_manufacturing_step_ID=`order_manufacturing_step`.ID 
                            INNER JOIN `error` ON `order_manufacturing_step_machine_error`.error_ID=`error`.ID 
                            INNER JOIN `user` ON `order_manufacturing_step_machine_error`.`user_ID`=`user`.ID";
    $resultwithoutmachine = $conn -> query($errorwithoutmachine);
    if ($resultwithoutmachine->num_rows > 0) {
        while($row = $resultwithoutmachine->fetch_assoc()) {
            print '
            <tr><td style="text-align:center; vertical-align:middle">'.$row['ormanst_machine_error_ID'].'</td>
            <td style="text-align:center; vertical-align:middle">'.$row['ormanst_barcode'].'</td> 
		    <td style="text-align:center; vertical-align:middle">'.$row['error_name'].'</td> 
		    <td style="text-align:center; vertical-align:middle">'.$row['username'].'</td> 
		    <td style="text-align:center; vertical-align:middle"><label>'.$row['description'].'</label></td></tr>
            ';
        }
    }
}


?>