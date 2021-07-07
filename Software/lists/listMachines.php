<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

$sql="SELECT * from `machines` order by machineName ASC";
$reultErrors = $conn -> query($sql);
if ($reultErrors->num_rows > 0) {
    print '
    <div style="overflow: hidden">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Gép azonosító</th>
            <th scope="col">Gép név</th>
            <th scope="col">Módosítás</th>
            <th scope="col">Törlés</th>


        </tr>
        </thead>
        <tbody>
        ';
    while($row = $reultErrors->fetch_assoc()) {
        print '
            <tr>
            <form action="feldolgozok/modifyMachine.php" method="POST">
            <td>'.$row["machineId"].'</td>
            <td><input type="text" name="machineName" value="'.$row["machineName"].'"></td>
            <td><Button type="submit" name="machineId" value="'.$row["machineId"].'" class="btn btn-primary">Módosítás</button>
            </form>
            <form action="feldolgozok/deleteMachine.php" method="POST">
            <td><Button type="submit" name="machineId" value="'.$row["machineId"].'" class="btn btn-danger">Törlés</button>
            </form>
            </tr>';
    }
    print '
        </tbody>
        </table>
        </div>';
}



?>

