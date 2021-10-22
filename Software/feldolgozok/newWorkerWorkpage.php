<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(isset($_POST['standard'])){
    print $workpageId=$_POST['workpageId'];
    if($workpageId!=0){
        $users = array(56, 49, 9, 3, 49);
        $posts = array(10, 8, 20, 17, 18);
        $sql_standard="INSERT INTO user_order (user_ID, order_ID);";
        //$result=$conn->query($sql_standard);
        print $sql_standard="INSERT INTO user_order (user_ID, order_ID, post) VALUES ('{$user}', '{$workpageId}', '{$post}');";
        $user_count=count($users);
        $post_count=count($posts);
        for ($i=0; $i < $user_count ; $i++) { 
            
        }
    }else{
        print 'Hiba';
    }
}
else{
    print $user_id = $_POST['workerId'];
    print '|';
    print $order_id = $_POST['workpageId'];
    print $sql ="INSERT INTO user_order (user_ID, order_ID) 
	VALUES ('{$user_id}','{$order_id}')";
    $result = $conn->query($sql);
    if(!$sql){
        print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
        print '<div class="input-group-text">Hiba a feltöltés közben!<br></div>';
        print '<form action="../user_order.php"><button type="submit" class="btn btn-primary">Új dolgozó-gyátási rendelés feltöltés</button> </form>';
    }else{
        header("Location: ../user_order.php");
    }
}
?>