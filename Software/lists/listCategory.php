<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

$sql="SELECT * from `category` order by name ASC";
$reultErrors = $conn -> query($sql);
if ($reultErrors->num_rows > 0) {
    print '
    <div style="overflow: hidden">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Kategória azonosító</th>
            <th scope="col">Kategória neve</th>
            <th scope="col">Módosítás</th>
            <th scope="col">Törlés</th>


        </tr>
        </thead>
        <tbody>
        ';
    while($row = $reultErrors->fetch_assoc()) {
        print '
            <tr>
            <form action="feldolgozok/modifyCategory.php" method="POST">
            <td>'.$row["ID"].'</td>
            <td><input type="text" name="category_name" style="width:800px" value="'.$row["name"].'"></td>
            <td><Button type="submit" name="category_id" value="'.$row["ID"].'" class="btn btn-primary">Módosítás</button>
            </form>
            <form action="feldolgozok/deleteCategory.php" method="POST">
            <td><Button type="submit" name="category_id" value="'.$row["ID"].'" class="btn btn-danger">Törlés</button>
            </form>
            </tr>';
    }
    print '
        </tbody>
        </table>
        </div>';
}



?>

