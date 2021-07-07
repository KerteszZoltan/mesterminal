<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

$sql="SELECT * from `workers` order by workerId DESC";
$reultErrors = $conn -> query($sql);
if ($reultErrors->num_rows > 0) {
    print '
    <div style="overflow: hidden">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Dolgozó azonosító</th>
            <th scope="col">Dolgozó név</th>
            <th scope="col">Dolgozó telefonszám</th>
            <th scope="col">Dolgozó össz munkaideje</th>
            <th scope="col">Mai munkaóra</th>
            <th scope="col">Módosítás</th>
            <th scope="col">Nullázás</th>
        </tr>
        </thead>
        <tbody>
        ';
    while($row = $reultErrors->fetch_assoc()) {
        print '
            <tr>
            <form action="feldolgozok/modifyWorker.php" method="POST">
            <td>'.$row["workerId"].'</td>
            <td><input type="text" name="workerName" value="'.$row["workerName"].'"></td>
            <td><input type="text" name="workerPhone" value="'.$row["workerPhone"].'"></td>
            <td><label>'.$row["workerSumTime"].' óra</label></td>
            <td><input type="number" name="workTime" step="0.01"></td>
            <td><Button type="submit" name="workerId" value="'.$row["workerId"].'" class="btn btn-primary">Módosítás</button>
            </form>
            <form action="feldolgozok/nullingWorkhour.php" method="POST">
            <td><Button type="submit" name="workerId" value="'.$row["workerId"].'" class="btn btn-danger">Nullázás</button>
            </tr>';
    }
    print '
        </tbody>
        </table>
        </div>';
}else{
    print 'még nincs dolgozó a rendszerben';
}



?>

