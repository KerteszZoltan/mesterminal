<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

$sql="SELECT * from `order` where order_status_ID>'1' order by ID DESC";
$reultErrors = $conn -> query($sql);
if ($reultErrors->num_rows > 0) {
    print '
    <div style="overflow: scroll">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Gyártási rendelés azonosító</th>
            <th scope="col">Gyártási rendelés vonalkód</th>
            <th scope="col">Gyártási rendelés típusa</th>
            <th scope="col">Vevői rendelés szám</th>
            <th scope="col">Telephely azonosító</th>
            <th scope="col">Telejesítendő mennyiség</th>
            <th scope="col">Elvárt mennyiség</th>
            <th scope="col">Teljesített mennyiség</th>
            <th scope="col">Selejt mennyiség</th>
            <th scope="col">Gyártási rendelés státusza</th>
        </tr>
        </thead>
        <tbody>
        ';
    while($row = $reultErrors->fetch_assoc()) {
        print '
            <tr>
            <form action="workpageId.php" method="POST">
            <td><input type="submit" name="workpageId" value="'.$row["ID"].'"></td>
            </form>
            <form action="feldolgozok/modifyWorkpage.php" method="POST">
            <td><input style="width:100px" type="text" name="barcode" value="'.$row["barcode"].'"></td>
            <td><input style="width:20px" type="text" name="order_type_ID" value="'.$row["order_type_ID"].'"></td>
            <td><input type="text" name="customer_number" value="'.$row["customer_number"].'"></td>
            <td><input style="width:20px" type="text" name="site_ID" value="'.$row["site_ID"].'"></td>
            <td><input style="width:100px" type="text" name="total_count" value="'.$row["total_count"].'"></td>
            <td><input style="width:100px" type="text" name="expected_count" value="'.$row["expected_count"].'"></td>
            <td><input style="width:100px" type="text" name="pass_count" value="'.$row["pass_count"].'"></td>
            <td><input style="width:100px" type="text" name="fail_count" value="'.$row["fail_count"].'"></td>
			
            <td><input style="width:20px" type="text" name="order_status_ID" value="'.$row["order_status_ID"].'"></td>
			
            <td><Button type="submit" name="order_ID" value="'.$row["ID"].'" class="btn btn-primary">Módosítás</button></td>
            </form>';
            /*<form action="feldolgozok/deleteWorkpage.php" method="POST">
            <td><Button type="submit" name="workpageId" value="'.$row["ID"].'" class="btn btn-danger">Törlés</button>
            </form>*/
            print '</tr>';
    }
    print '
        </tbody>
        </table>
        </div>';
}



?>