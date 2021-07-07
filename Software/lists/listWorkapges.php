<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

$sql="SELECT * from `workpages` order by workpageId DESC";
$reultErrors = $conn -> query($sql);
if ($reultErrors->num_rows > 0) {
    print '
    <div style="overflow: hidden">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Munkalap azonosító</th>
            <th scope="col">Munkalap név</th>
            <th scope="col">Elvárt DB</th>
            <th scope="col">Teljesített DB</th>
            <th scope="col">Selejt DB</th>
            <th scope="col">Módosítás DB</th>
            <th scope="col">Törlés</th>

        </tr>
        </thead>
        <tbody>
        ';
    while($row = $reultErrors->fetch_assoc()) {
        print '
            <tr>
            <form action="feldolgozok/modifyWorkpage.php" method="POST">
            <td>'.$row["workpageId"].'</td>
            <td><input type="text" name="workpageName" value="'.$row["workpageName"].'"></td>


            <td><input type="text" name="expectedDB" value="'.$row["expectedDB"].'"></td>
            <td><input type="text" name="successedDB" value="'.$row["successedDB"].'"></td>
            <td><input type="text" name="discardDB" value="'.$row["discardDB"].'"></td>


            <td><Button type="submit" name="workpageId" value="'.$row["workpageId"].'" class="btn btn-primary">Módosítás</button></td>
            </form>
            <form action="feldolgozok/deleteWorkpage.php" method="POST">
            <td><Button type="submit" name="workpageId" value="'.$row["workpageId"].'" class="btn btn-danger">Törlés</button>
            </form>
            </tr>';
    }
    print '
        </tbody>
        </table>
        </div>';
}



?>