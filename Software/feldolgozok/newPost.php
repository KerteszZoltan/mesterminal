<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

print $post_name = ucwords($_POST['post_name']);
$key_pozition=$_POST['key_pozition'];
$type=$_POST['type'];


    $sql ="INSERT INTO role (name, key_pozition,type) 
	VALUES ('{$post_name}','{$key_pozition}','{$type}')";
    $result = $conn->query($sql);
    if(!$sql){
        print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
        print '<div class="input-group-text">Hiba a feltöltés közben!<br></div>';
        print '<form action="../post.php"><button type="submit" class="btn btn-primary">Új post feltöltés</button> </form>';
    }else{
        header("Location: ../post.php");    
    }
?>