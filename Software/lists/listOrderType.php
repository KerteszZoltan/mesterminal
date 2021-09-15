<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

$sql="SELECT * from `order_type`";
$reultErrors = $conn -> query($sql);
if ($reultErrors->num_rows > 0) {
    print '
    <div style="overflow: hidden">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Azonosító</th>
            <th scope="col">Típus név</th>
            <th scope="col">Módosítás</th>
            <th scope="col">Törlés</th>
        </tr>
        </thead>
        <tbody>
        ';
    while($row = $reultErrors->fetch_assoc()) {
        print '
            <tr>
            <form action="feldolgozok/modifyOrderType.php" method="POST">
            <td>'.$row["ID"].'</td>
            <td><input type="text" style="width:500px" name="name" value="'.$row["name"].'"></td>
            <td><Button type="submit" name="typeID" value="'.$row["ID"].'" class="btn btn-primary">Módosítás</button>
            </form>
            <form action="feldolgozok/deleteOrderType.php" method="POST">
            <td><Button type="submit" name="typeID" value="'.$row["ID"].'" class="btn btn-danger">Törlés</button>
            </form>
            </tr>';
    }
    print '
        </tbody>
        </table>
        </div>';
}



?>

