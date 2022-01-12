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
        print $sql_standard="INSERT INTO user_order_role (user_ID, order_ID, role_ID) VALUES 
        ('3', '{$workpageId}', '23'),
        ('56', '{$workpageId}', '10'),
        ('60', '{$workpageId}', '8'),
        ('56', '{$workpageId}', '20'),
        ('2', '{$workpageId}', '24'),
        ('9', '{$workpageId}', '25'),
        ('27', '{$workpageId}', '26'),
        ('16', '{$workpageId}', '18');";
        $result=$conn->query($sql_standard);
        header("Location: ../user_order_role.php");
        if(!$sql_standard){
            print ' Nem jó ';
        }
    }else{
        print 'Hiba';
    }
}
else if(isset($_POST['custom_responsible'])){
    print $user_id = $_POST['workerId'];
    print '|';
    print $order_id = $_POST['workpageId'];
    print '|';
    print $role_id = $_POST['user_role'];
    print $sql ="INSERT INTO user_order_role (user_ID, order_ID, role_ID) 
	VALUES ('{$user_id}','{$order_id}','{$role_id}')";
    $result = $conn->query($sql);
    if(!$sql){
        print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
        print '<div class="input-group-text">Hiba a feltöltés közben!<br></div>';
        print '<form action="../user_order_role.php"><button type="submit" class="btn btn-primary">Új dolgozó-gyátási rendelés feltöltés</button> </form>';
    }else{
        header("Location: ../user_order_role.php");
    }
}
?>