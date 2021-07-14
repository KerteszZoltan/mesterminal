<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}
print '
    <table class="table">
    <th colspan="2" style="text-align:center; vertical-align:middle"> Kiválasztott munkalapon dolgozók </th>
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

?>