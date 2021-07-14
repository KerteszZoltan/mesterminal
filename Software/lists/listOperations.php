<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

$sql="SELECT * from `operations`";
$reultErrors = $conn -> query($sql);
if ($reultErrors->num_rows > 0) {
    print '
    <div style="overflow: hidden">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Művelet azonosító</th>
            <th scope="col">Művelet név</th>
            <th scope="col">Módosítás</th>
        </tr>
        </thead>
        <tbody>
        ';
    while($row = $reultErrors->fetch_assoc()) {
        print '
            <tr>
            <form action="feldolgozok/modifyOperation.php" method="POST">
            <td>'.$row["operationId"].'</td>
            <td><input type="text" name="operationName" value="'.$row["operationName"].'"></td>
            <td><Button type="submit" name="operationId" value="'.$row["operationId"].'" class="btn btn-primary">Módosítás</button>
            </form>
            </tr>';
    }
    print '
        </tbody>
        </table>
        </div>';
}



?>

