<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

$sql="SELECT * from `machine` order by ID DESC";
$reultErrors = $conn -> query($sql);
if ($reultErrors->num_rows > 0) {
    print '
    <div style="overflow: hidden">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Gép azonosító</th>
            <th scope="col">Gép vonalkód</th>
            <th scope="col">Gép név</th>
            <th scope="col">Gép rezsi óradíj</th>
            <th scope="col">Gép belső átállás</th>
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
            <td>'.$row["ID"].'</td>
            <td><input type="text" name="machine_barcode" value="'.$row["barcode"].'"></td>
            <td><input type="text" name="machine_name" value="'.$row["name"].'" style="width:500px"></td>
            <td><input type="text" name="overhead_fee" value="'.$row["overhead_fee"].'" style="width:50px">Ft/óra</td>
            <td><input type="text" name="internal_changeover" value="'.$row["internal_changeover"].'" style="width:50px">perc</td>

            <td><Button type="submit" name="machineId" value="'.$row["ID"].'" class="btn btn-primary">Módosítás</button>
            </form>
            <form action="feldolgozok/deleteMachine.php" method="POST">
            <td><Button type="submit" name="machineId" value="'.$row["ID"].'" class="btn btn-danger">Törlés</button>
            </form>
            </tr>';
    }
    print '
        </tbody>
        </table>
        </div>';
}



?>

