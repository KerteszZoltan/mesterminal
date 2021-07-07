<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    
    
    print $postName = ucwords($_POST['postName']);
    print $postId=$_POST['postId'];
    $sql="UPDATE `posts` SET `postName`='$postName' WHERE `postId`='$postId'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a módosítás";
    } else{
        header("Location: ../post.php");
    }
}
?>