<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    print $postId=$_POST['postId'];
    print $sql="DELETE FROM `posts` WHERE `postId`='$postId'";
    $result = $conn->query($sql);
    if(!$result){
        header("Location: ../post.php");
        print "nem sikerült a törlés";
    } else{
        header("Location: ../post.php");
    }
}
?>