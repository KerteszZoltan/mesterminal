<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

print $product_name = ucwords($_POST['product_name']);
//print $product_barcode = $_POST['product_barcode'];
print $article_number = $_POST['article_number'];
print $foreign_id = $_POST['foreign_id'];




$productCheck = $conn->query( "SELECT * FROM `product` WHERE name = '$product_name'");
if($productCheck->num_rows > 0){
    print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Sikertelen feltöltés! Ilyen névvel vagy vonalkóddal már létezik termék!<br></div>';
    print '<form action="../product.php"><button type="submit" class="btn btn-primary">Új termék feltöltés</button> </form>';
    ?>
    <?php
    }else{
        $sql ="INSERT INTO product (name, barcode, article_number, foreign_id) 
	    VALUES ('{$product_name}','{$product_barcode}','{$article_number}','{$foreign_id}')";
        $result = $conn->query($sql);
        if(!$sql){
            print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
            print '<div class="input-group-text">Hiba a feltöltés közben!<br></div>';
            print '<form action="../product.php"><button type="submit" class="btn btn-primary">Új termék feltöltés</button> </form>';
        }else{
            header("Location: ../product.php");
            
        }
    }
?>