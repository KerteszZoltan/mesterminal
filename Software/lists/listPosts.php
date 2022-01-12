<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

$sql="SELECT * from `role` order by name ASC";
$reultErrors = $conn -> query($sql);
if ($reultErrors->num_rows > 0) {
    print '
    <div style="overflow: hidden">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Poszt azonosító</th>
            <th scope="col">Poszt név</th>
            <th scope="col">Kulcs pozíció</th>
            <th scope="col"> Típus </th>
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
            <td><input type="text" style="width:500px" name="postName" value="'.$row["name"].'"></td>
            <td>
            <select name="key_pozition" class="form-select" id="operations">';
                if($row['key_pozition']==='1'){
                    print '
                    <option value="1" default>
                    Kulcs pozíció
                    </option>';
                }else{
                    print '
                    <option value="0" default>
                    Nem kulcs pozíció
                    </option>';
                }                
                print '
                <option value="1">Kulcs pozíció</option>
                <option value="0">Nem kulcs pozíció</option>
            </select>
            </td>
            <td>
            <select name="type" class="form-select">';
                if($row['type']==='1'){
                    print '
                    <option value="1" default>
                    Támogató
                    </option>';
                }else{
                    print '
                    <option value="0" default>
                    Termelő
                    </option>';
                }
                print '
                <option value="1">Támogató</option>
                <option value="0">Termelő</option>
            </select>
            </td>
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

