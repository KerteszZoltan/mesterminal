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
    $sqlWorkpageName="SELECT * from `workers`";
    $workpageNameResult = $conn -> query($sqlWorkpageName);
    if ($workpageNameResult->num_rows > 0) {
    while($row = $workpageNameResult->fetch_assoc()) {
        print '<option value='.$row["workerId"].'>'.$row['workerName'].'</option>';
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
    $sqlWorkerkName="SELECT * from `posts`";
    $resultWorkerName = $conn -> query($sqlWorkerkName);
    if ($resultWorkerName->num_rows > 0) {
    while($row = $resultWorkerName->fetch_assoc()) {
        print '<option value='.$row["postId"].'>'.$row['postName'].'</option>';
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
    $sql="SELECT workers.workerName, posts.postName from workers INNER JOIN workerposts on workers.workerId=workerposts.workerId INNER JOIN posts on workerposts.postId=posts.postId;";
    $reultWorkersPosts = $conn -> query($sql);
    if ($reultWorkersPosts->num_rows > 0) {
    
        while($row = $reultWorkersPosts->fetch_assoc()) {
        print '
            <tr><td style="text-align:center; vertical-align:middle">'.$row['workerName'].'</td>
            <t><td style="text-align:center; vertical-align:middle">'.$row['postName'].'</td></tr>
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
    $sqlWorkersPost="SELECT workers.workerName, posts.postName from workers INNER JOIN workerposts on workers.workerId=workerposts.workerId 
    INNER JOIN posts on workerposts.postId=posts.postId WHERE workers.workerId='$workerId';";
    $resultWorkerPost= $conn -> query($sqlWorkersPost);
    if ($resultWorkerPost->num_rows > 0) {
        while($row = $resultWorkerPost->fetch_assoc()) {
        print '
            <tr><td style="text-align:center; vertical-align:middle">'.$row['workerName'].'</td>
            <t><td style="text-align:center; vertical-align:middle">'.$row['postName'].'</td></tr>
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
    $sqlPostWorker="SELECT workers.workerName, posts.postName from workers INNER JOIN workerposts on workers.workerId=workerposts.workerId 
    INNER JOIN posts on workerposts.postId=posts.postId WHERE posts.postId='$postId';";
    $resultPostWorker= $conn -> query($sqlPostWorker);
    if ($resultPostWorker->num_rows > 0) {
        while($row = $resultPostWorker->fetch_assoc()) {
        print '
            <tr><td style="text-align:center; vertical-align:middle">'.$row['workerName'].'</td>
            <t><td style="text-align:center; vertical-align:middle">'.$row['postName'].'</td></tr>
            ';
        }
    }
    print '
        </tr>
        </table>
        ';
} 


?>