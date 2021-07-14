<?php
include "../connection.php";
include_once("../html_frame/html_head.html");

$productId = $_POST['productId'];

if(!empty($_FILES['file'])){
    $filename   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
    $extension  = pathinfo( $_FILES["file"]["name"], PATHINFO_EXTENSION ); // jpg
    $basename   = $filename . "." . $extension; // 5dab1961e93a7.jpg
    $source       = $_FILES["file"]["tmp_name"];
    $destination  = "../appendixs/{$basename}";
    $productId=$_POST['productId'];
    move_uploaded_file( $source, $destination );
    $insert ="INSERT INTO appendixs (appendixName) 
           VALUES ('{$basename}')";
    $conn->query($insert);
    $sqlLast="SELECT MAX(appendixId) as id from appendixs";
    $result = $conn->query($sqlLast);
    $last;
    if ($result->num_rows > 0) {
      foreach($result as $row) {
        $last=$row['id'];
      }
    }
    
      $insertProductAppendix="INSERT INTO productappendixs (appendixId, productId)
                              VALUE ('{$last}', '{$productId}')";
      $conn->query($insertProductAppendix);            
    }

    header("Location: ../appendix.php");


?>