<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

$sql="SELECT * from `products` order by productName";
$reultErrors = $conn -> query($sql);
if ($reultErrors->num_rows > 0) {
    print '
    <div style="overflow: hidden">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Termék Azonosító</th>
            <th scope="col">Termék Név</th>
            <th scope="col">Módosítás</th>

        </tr>
        </thead>
        <tbody>
        ';
    while($row = $reultErrors->fetch_assoc()) {
        print '
            <tr>
            <form action="feldolgozok/modifyProducts.php" method="POST">
            <td>'.$row["productId"].'</td>
            <td><input type="text" name="productName" value="'.$row["productName"].'"></td>
            <td><Button type="submit" name="productId" value="'.$row["productId"].'" class="btn btn-primary">Módosítás</button></td>
            </form>
            </tr>';
    }
    print '
        </tbody>
        </table>
        </div>';
}



?>