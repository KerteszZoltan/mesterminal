<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

$sql="SELECT * from `workers` order by workerId DESC";
$resultWorkers = $conn -> query($sql);
if ($resultWorkers->num_rows > 0) {
    print '
    <div style="overflow: hidden">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Dolgozó azonosító</th>
            <th scope="col">Dolgozó név</th>
            <th scope="col">Dolgozó telefonszám</th>
            <th scope="col">Dolgozó beosztása</th>
            <th scope="col">Módosítás</th>
        </tr>
        </thead>
        <tbody>
        ';
    while($row = $resultWorkers->fetch_assoc()) {
        print '
            <tr>
            <form action="feldolgozok/modifyWorker.php" method="POST">
            <td>'.$row["workerId"].'</td>
            <td><input type="text" name="workerName" value="'.$row["workerName"].'"></td>
            <td><input type="text" name="workerPhone" value="'.$row["workerPhone"].'"></td>
            <td>Beosztás</td>
            <td><Button type="submit" name="workerId" value="'.$row["workerId"].'" class="btn btn-primary">Módosítás</button>
            </form>
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

