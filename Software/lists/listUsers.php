<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

$sql="SELECT *, user.ID as userID from `user` INNER JOIN user_type on user.user_type=user_type.ID order by user.ID DESC";
$resultWorkers = $conn -> query($sql);
if ($resultWorkers->num_rows > 0) {
    print '
    <div style="overflow: hidden">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Dolgozó azonosító</th>
            <th scope="col">Dolgozó vonalkód</th>
            <th scope="col">Dolgozó név</th>
            <th scope="col">Dolgozó telefonszám</th>
            <th scope="col">Dolgozó e-mail címe</th>
            <th scope="col">Dolgozó jelszava</th>
            <th scope="col">Dolgozó beosztása</th>
            <th scope="col">Módosítás</th>
        </tr>
        </thead>
        <tbody>
        ';
    while($row = $resultWorkers->fetch_assoc()) {
        print '
            <tr>
            <form action="feldolgozok/modifyUser.php" method="POST">
            <td>'.$row["userID"].'</td>
            <td><input type="text" name="user_barcode" value="'.$row["user_barcode"].'"></td>
            <td><input type="text" name="user_name" value="'.$row["user_name"].'"></td>
            <td><input type="text" name="user_phone" value="'.$row["user_phone"].'"></td>
            <td><input type="text" name="user_email" value="'.$row["user_email"].'"></td>
            <td><input type="text" name="user_password" value="'.$row["user_password"].'"></td>
            <td>'.$row["type_name"].'</td>
            <td><Button type="submit" name="user_ID" value="'.$row["ID"].'" class="btn btn-primary">Módosítás</button>
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

