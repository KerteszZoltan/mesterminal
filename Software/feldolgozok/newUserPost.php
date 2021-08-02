workerId
postId

<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

print $workerId = $_POST['workerId'];
print '|';
print $postId = $_POST['postId'];

$checkPostWorker="SELECT * from user_post WHERE user_ID='$workerId' and post_ID='$postId' ";
$resultCheck=$conn->query($checkPostWorker);
if ($resultCheck->num_rows == 0) {
    $sqlInsert ="INSERT INTO user_post (user_ID, post_ID) 
	VALUES ('{$workerId}','{$postId}')";
    $resultInsert = $conn->query($sqlInsert);
    if(!$resultInsert){
        print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
        print '<div class="input-group-text">Hiba a feltöltés közben!<br></div>';
        print '<form action="../user_post.php"><button type="submit" class="btn btn-primary">Új felhasználó és poszt kapcsolat feltöltés</button> </form>';
    }else{
        header("Location: ../user_post.php");
    }
    header("Location: ../user_post.php");
}else{
    header("Location: ../user_post.php");
}
    
?>