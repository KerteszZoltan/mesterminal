<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

print $barcode = $_POST['barcode'];
print $order_type = $_POST['order_type'];
print $customer_number = $_POST['customer_number'];
print $site = $_POST['site'];
print $product = $_POST['product'];
print $total_count = $_POST['total_count'];
print $expected_count = $_POST['expected_count'];
print $pass_count = $_POST['pass_count'];
print $fail_count = $_POST['fail_count'];
print $status = $_POST['status'];

print $sql ="INSERT INTO `order` (barcode, order_type_ID, customer_number, site_id, product_id, total_count, expected_count, pass_count, fail_count, order_status_ID) 
       VALUES ('{$barcode}','{$order_type}', '{$customer_number}', '{$site}', '{$product}', '{$total_count}', '{$expected_count}', '{$pass_count}', '{$fail_count}', '{$status}')";
$result = $conn->query($sql);
if(!$sql){
    print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Hiba a feltöltés közben!<br></div>';
    print '<form action="../order.php"><button type="submit" class="btn btn-primary">Új munkalap feltöltés</button> </form>';
    }else{
        header("Location: ../order.php");    
    }
?>