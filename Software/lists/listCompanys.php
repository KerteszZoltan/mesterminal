<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

$sql="SELECT * from `companys`";
$resultcompanys = $conn -> query($sql);
if ($resultcompanys->num_rows > 0) {
    print '
    <div style="overflow: hidden">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Cég azonosító</th>
            <th scope="col">Cég név</th>
            <th scope="col">Módosítás</th>

        </tr>
        </thead>
        <tbody>
        ';
    while($row = $resultcompanys->fetch_assoc()) {
        print '
            <tr>
            <form action="feldolgozok/modifyCompanys.php" method="POST">
            <td>'.$row["companyId"].'</td>
            <td><input type="text" name="companyName" value="'.$row["companyName"].'"></td>
            <td><Button type="submit" name="companyId" value="'.$row["companyId"].'" class="btn btn-primary">Módosítás</button>
            </form>
            </tr>';
    }
    print '
        </tbody>
        </table>
        </div>';
}



?>

