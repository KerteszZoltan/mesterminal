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
        print '<option value='.$row["ID"].'>'.$row['user_name'].'</option>';
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
    $selectPost="SELECT * from `post`";
    $resultPost = $conn -> query($selectPost);
    if ($resultPost->num_rows > 0) {
    while($row = $resultPost->fetch_assoc()) {
        print '<option value='.$row["ID"].'>'.$row['post_name'].'</option>';
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
    $selectUsersPosts="SELECT user.user_name, post.post_name from user INNER JOIN user_post on user.ID=user_post.user_ID INNER JOIN post on user_post.post_ID=post.ID;";
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
    $sqlWorkersPost="SELECT user.user_name, post.post_name from user INNER JOIN user_post on user.ID=user_post.user_ID 
    INNER JOIN post on user_post.post_ID=post.ID WHERE user.ID='$workerId';";
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
    $sqlPostWorker="SELECT user.user_name, post.post_name from user INNER JOIN user_post on user.ID=user_post.user_ID 
    INNER JOIN post on user_post.post_ID=post.ID WHERE post.ID='$postId';";
    $resultPostWorker= $conn -> query($sqlPostWorker);
    if ($resultPostWorker->num_rows > 0) {
        while($row = $resultPostWorker->fetch_assoc()) {
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
} 


?>