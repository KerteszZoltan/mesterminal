<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

$sql="SELECT * from `post` order by post_name ASC";
$reultErrors = $conn -> query($sql);
if ($reultErrors->num_rows > 0) {
    print '
    <div style="overflow: hidden">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Poszt azonosító</th>
            <th scope="col">Poszt név</th>
            <th scope="col">Módosítás</th>
            <th scope="col">Törlés</th>
        </tr>
        </thead>
        <tbody>
        ';
    while($row = $reultErrors->fetch_assoc()) {
        print '
            <tr>
            <form action="feldolgozok/modifyPost.php" method="POST">
            <td>'.$row["ID"].'</td>
            <td><input type="text" name="postName" value="'.$row["post_name"].'"></td>
            <td><Button type="submit" name="postId" value="'.$row["ID"].'" class="btn btn-primary">Módosítás</button>
            </form>
            <form action="feldolgozok/deletePost.php" method="POST">
            <td><Button type="submit" name="postId" value="'.$row["ID"].'" class="btn btn-danger">Törlés</button>
            </form>
            </tr>';
    }
    print '
        </tbody>
        </table>
        </div>';
}



?>

