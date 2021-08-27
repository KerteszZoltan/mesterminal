<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

$sql="SELECT * from `site`";
$resultSites = $conn -> query($sql);
if ($resultSites->num_rows > 0) {
    print '
    <div style="overflow: hidden">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Telephely azonosító</th>
            <th scope="col">Város</th>
            <th scope="col">Utca</th>
            <th scope="col">Házszám</th>
            <th scope="col">Módosítás</th>
            <th scope="col">Törlés</th>
        </tr>
        </thead>
        <tbody>
        ';
    while($row = $resultSites->fetch_assoc()) {
        print '
            <tr>
            <form action="feldolgozok/modifySite.php" method="POST">
            <td>'.$row["ID"].'</td>
            <td><input type="text" name="city" value="'.$row["city"].'"></td>
            <td><input type="text" name="street" value="'.$row["street"].'"></td>
            <td><input type="text" name="house_number" value="'.$row["house_number"].'"></td>
            <td><Button type="submit" name="siteId" value="'.$row["ID"].'" class="btn btn-primary">Módosítás</button>
            </form>
            <form action="feldolgozok/deleteSite.php" method="POST">
            <td><Button type="submit" name="siteId" value="'.$row["ID"].'" class="btn btn-danger">Törlés</button>
            </form>
            </tr>';
    }
    print '
        </tbody>
        </table>
        </div>';
}
?>

