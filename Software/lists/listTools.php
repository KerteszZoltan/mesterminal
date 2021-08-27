<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

$sql="SELECT machine_tool.ID as tool_id, machine_tool.barcode as tool_barcode, machine_tool.name as tool_name,
machine.name as machine_name
 from `machine_tool` inner join machine on machine_tool.machine_ID=machine.ID";
$resultSQL = $conn -> query($sql);
if ($resultSQL->num_rows > 0) {
    print '
    <div style="overflow: hidden">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Szerszám azonosító</th>
            <th scope="col">Szerszám vonalkódja</th>
            <th scope="col">Szerszám név</th>
            <th scope="col">Szerszámhoz tartozó gép</th>
            <th scope="col">Módosítás</th>
            <th scope="col">Törlés</th>

        </tr>
        </thead>
        <tbody>
        ';
    while($row = $resultSQL->fetch_assoc()) {
        print '
            <tr>
            <form action="feldolgozok/modifyTool.php" method="POST">
            <td>'.$row["tool_id"].'</td>
            <td><input type="text" name="tool_barcode" value="'.$row["tool_barcode"].'"></td>
            <td><input type="text" name="toolName" value="'.$row["tool_name"].'"></td>
            <td>'.$row["machine_name"].'</td>
            <td><Button type="submit" name="toolId" value="'.$row["tool_id"].'" class="btn btn-primary">Módosítás</button></td>
            </form>
            <form action="feldolgozok/deleteTool.php" method="POST">
            <td><Button type="submit" name="toolId" value="'.$row["tool_id"].'" class="btn btn-danger">Törlés</button>
            </form>
            </tr>';
    }
    print '
        </tbody>
        </table>
        </div>';
}



?>