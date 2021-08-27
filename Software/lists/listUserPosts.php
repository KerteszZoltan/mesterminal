<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

print '
<form action="#" method="POST">
<label class="input-group-text" for="workpages">Dolgozó szerinti keresés</label>
<select name="workerId" class="form-select" id="workerId">
  <option selected>Válassz dolgozót</option>';
    $selectUser="SELECT * from `user`";
    $resultUser = $conn -> query($selectUser);
    if ($resultUser->num_rows > 0) {
    while($row = $resultUser->fetch_assoc()) {
        print '<option value='.$row["ID"].'>'.$row['name'].'</option>';
    }
}
print '
</select>
<input type="submit" value="kilistázás" class="btn btn-primary">
</form>';
print '
<form action="#" method="POST">
<label class="input-group-text" for="workpages">Poszt szerinti keresés</label>
<select name="postId" class="form-select" id="postId">
  <option selected>Válassz posztot</option>';
    $selectPost="SELECT * from `role`";
    $resultPost = $conn -> query($selectPost);
    if ($resultPost->num_rows > 0) {
    while($row = $resultPost->fetch_assoc()) {
        print '<option value='.$row["ID"].'>'.$row['name'].'</option>';
    }
}
print '
</select>
<input type="submit" value="kilistázás" class="btn btn-primary">
</form>';

if (empty($_POST['workerId']) && empty($_POST['postId'])) {
    print '
        <table class="table">
        <th colspan="2" style="text-align:center; vertical-align:middle"> Összes dolgozó és azok posztjai </th>
        <tr>
        ';
    $selectUsersPosts="SELECT user.name as user_name, role.name as post_name from user INNER JOIN user_role on user.ID=user_role.user_ID INNER JOIN role on user_role.role_ID=role.ID;";
    $reultUserPost = $conn -> query($selectUsersPosts);
    if ($reultUserPost->num_rows > 0) {
    
        while($row = $reultUserPost->fetch_assoc()) {
        print '
            <tr><td style="text-align:center; vertical-align:middle">'.$row['user_name'].'</td>
            <t><td style="text-align:center; vertical-align:middle">'.$row['post_name'].'</td></tr>
            ';
        }
    }
    print '
        </tr>
        </table>
        ';

} else if (!empty($_POST['workerId'])) {
    print '
        <table class="table">
        <th colspan="2" style="text-align:center; vertical-align:middle"> Dolgozóhoz tartozó posztok </th>
        <tr>
        ';
    $workerId=$_POST['workerId'];
    $sqlWorkersPost="SELECT user.name as user_name, role.name as post_name from user INNER JOIN user_role on user.ID=user_role.user_ID 
    INNER JOIN role on user_role.role_ID=role.ID WHERE user.ID='$workerId';";
    $resultWorkerPost= $conn -> query($sqlWorkersPost);
    if ($resultWorkerPost->num_rows > 0) {
        while($row = $resultWorkerPost->fetch_assoc()) {
        print '
            <tr><td style="text-align:center; vertical-align:middle">'.$row['user_name'].'</td>
            <t><td style="text-align:center; vertical-align:middle">'.$row['post_name'].'</td></tr>
            ';
        }
    }
    print '
        </tr>
        </table>
        ';
} else if (!empty($_POST['postId'])) {
    print '
        <table class="table">
        <th colspan="2" style="text-align:center; vertical-align:middle"> Dolgozóhoz tartozó posztok </th>
        <tr>
        ';
    $postId=$_POST['postId'];
    $sqlPostWorker="SELECT user.name as user_name, role.name as post_name from user INNER JOIN user_role on user.ID=user_role.user_ID 
    INNER JOIN role on user_role.role_ID=role.ID WHERE role.ID='$postId';";
    $resultPostWorker= $conn -> query($sqlPostWorker);
    if ($resultPostWorker->num_rows >= 1) {
        while($row = $resultPostWorker->fetch_assoc()) {
        print '
            <tr><td style="text-align:center; vertical-align:middle">'.$row['user_name'].'</td>
            <t><td style="text-align:center; vertical-align:middle">'.$row['post_name'].'</td></tr>
            ';
        }
    }else{
        print'
        <tr><td colspan="2" style="text-align:center; vertical-align:middle">Nincs adat</td>
        ';
    }
    print '
        </tr>
        </table>
        ';
} 


?>