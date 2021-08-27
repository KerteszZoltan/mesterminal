<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

print $product_name = ucwords($_POST['product_name']);
print $product_barcode = $_POST['product_barcode'];


$productCheck = $conn->query( "SELECT * FROM `product` WHERE name = '$product_name' OR barcode='$product_barcode' ");
if($productCheck->num_rows > 0){
    print '<img src="../DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Sikertelen feltöltés! Ilyen névvel vagy vonalkóddal már létezik termék!<br></div>';
    print '<form action="../product.php"><button type="submit" class="btn btn-primary">Új termék feltöltés</button> </form>';
    ?>
    <?php
    }else{
        $sql ="INSERT INTO product (name, barcode) 
	    VALUES ('{$product_name}','{$product_barcode}')";
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