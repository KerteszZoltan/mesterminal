<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

$sql="SELECT * from `product`";
$reultErrors = $conn -> query($sql);
if ($reultErrors->num_rows > 0) {
    print '
    <div style="overflow: hidden">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Termék Azonosító</th>
			<th scope="col">Termék cikkszám</th>
			<th scope="col">Termék idegen azonosító</th>
            <th scope="col">Termék Vonalkód</th>
			<th scope="col">Termék Név</th>
            <th scope="col">Módosítás</th>

        </tr>
        </thead>
        <tbody>
        ';
    while($row = $reultErrors->fetch_assoc()) {
        print '
            <tr>
            <form action="feldolgozok/modifyProduct.php" method="POST">
            <td>'.$row["ID"].'</td>
			<td><input type="text" name="article_number" style="width:100px" value="'.$row["article_number"].'"></td>
			<td><input type="text" name="foreign_id" style="width:100px" value="'.$row["foreign_id"].'"></td>
			<td>'.$row["barcode"].'</td>
            <td><input type="text" name="product_name" style="width:700px" value="'.$row["name"].'"></td>
            <td><Button type="submit" name="productId" value="'.$row["ID"].'" class="btn btn-primary">Módosítás</button></td>
            </form>
            </tr>';
    }
    print '
        </tbody>
        </table>
        </div>';
}



?>