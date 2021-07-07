<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

$sql="SELECT * from `errors` order by errorId DESC";
$reultErrors = $conn -> query($sql);
if ($reultErrors->num_rows > 0) {
    print '
    <div style="overflow: hidden">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Hiba azonosító</th>
            <th scope="col">Hiba név</th>
            <th scope="col">Módosítás</th>
            <th scope="col">Törlés</th>


        </tr>
        </thead>
        <tbody>
        ';
    while($row = $reultErrors->fetch_assoc()) {
        print '
            <tr>
            <form action="feldolgozok/modifyError.php" method="POST">
            <td>'.$row["errorId"].'</td>
            <td><input type="text" name="errorName" value="'.$row["errorName"].'"></td>
            <td><Button type="submit" name="errorId" value="'.$row["errorId"].'" class="btn btn-primary">Módosítás</button>
            </form>
            <form action="feldolgozok/deleteError.php" method="POST">
            <td><Button type="submit" name="errorId" value="'.$row["errorId"].'" class="btn btn-danger">Törlés</button>
            </form>
            </tr>';
    }
    print '
        </tbody>
        </table>
        </div>';
}



?>

