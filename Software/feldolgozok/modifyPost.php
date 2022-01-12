<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    
    
    print $post_name = ucwords($_POST['postName']);
    print $postId=$_POST['postId'];
    $key_pozition=$_POST['key_pozition'];
    $type=$_POST['type'];

    $sql="UPDATE `role` SET 
    `name`='$post_name', 
    `key_pozition`='$key_pozition',
    `type`='$type'
    WHERE `ID`='$postId'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a módosítás";
    } else{
        header("Location: ../post.php");
    }
}
?>