<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

$sql="SELECT * from `tool` order by tool_name ASC";
$reultErrors = $conn -> query($sql);
if ($reultErrors->num_rows > 0) {
    print '
    <div style="overflow: hidden">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Szerszám azonosító</th>
            <th scope="col">Szerszám vonalkódja</th>
            <th scope="col">Szerszám név</th>
            <th scope="col">Módosítás</th>
            <th scope="col">Törlés</th>

        </tr>
        </thead>
        <tbody>
        ';
    while($row = $reultErrors->fetch_assoc()) {
        print '
            <tr>
            <form action="feldolgozok/modifyTool.php" method="POST">
            <td>'.$row["ID"].'</td>
            <td><input type="text" name="tool_barcode" value="'.$row["tool_barcode"].'"></td>
            <td><input type="text" name="toolName" value="'.$row["tool_name"].'"></td>
            <td><Button type="submit" name="toolId" value="'.$row["ID"].'" class="btn btn-primary">Módosítás</button></td>
            </form>
            <form action="feldolgozok/deleteTool.php" method="POST">
            <td><Button type="submit" name="toolId" value="'.$row["ID"].'" class="btn btn-danger">Törlés</button>
            </form>
            </tr>';
    }
    print '
        </tbody>
        </table>
        </div>';
}



?>