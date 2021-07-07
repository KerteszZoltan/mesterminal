<?php 
include_once("html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['aid'])){
    $adminId='';
}
else{
    $adminId=$_SESSION['aid'];
}

if($adminId != 0){
include_once("html_frame/html_body.html");
include_once("connection.php");



$selectCompanys="SELECT * FROM `companys`";
$resultCompanys = $conn -> query($selectCompanys);
print '<form action="#" method="POST">
        <div class="input-group mb-3">
        <div class="input-group mb-3">
        <label class="input-group-text" for="companys">Cégek</label>
        <select name="companyId" class="form-select" id="companys">
        <option selected>Kérlek válassz céget</option>
        
';
if ($resultCompanys->num_rows > 0) {
    while($row = $resultCompanys->fetch_assoc()) {
        print '
          <option value="'.$row['companyId'].'">'.$row['companyName'].'</option>
        ';
    }
}
print '</select>
  <input type="submit" value="Rögzítés" class="btn btn-primary">
</div>
</form>
';
if(isset($_POST['companyId']))
{
    $actualCompany=$_POST['companyId'];
    $selectProductCompany="SELECT * from products INNER JOIN companyforeignpartnumbers ON companyforeignpartnumbers.productId=products.productId 
    where companyforeignpartnumbers.companyId='$actualCompany'";
    
    $resultproductsCompany = $conn -> query($selectProductCompany);
    if ($resultproductsCompany->num_rows > 0) {
        print '
    <form action="feldolgozok/newOrder.php" method="POST">
        <div class="input-group mb-3">
        <div class="input-group mb-3">
        <label class="input-group-text" for="companys">Termékek</label>
        <select name="productId" class="form-select" id="companys">
          <option selected>Válassz terméket</option>
    ';
    while($row = $resultproductsCompany->fetch_assoc()) {
        print '
          <option value="'.$row['foreignId'].'">'.$row['productName'].'</option>
        ';
    }
    print '</select>
    <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon1">Rendelt mennyiség:</span>
    <input type="number" name="quantity" class="form-control" aria-label="nev" aria-describedby="basic-addon1" required>
    <span class="input-group-text" id="basic-addon1">Szállítási határidő:</span>
    <input type="date" name="shippingDate" class="form-control" aria-label="nev" aria-describedby="basic-addon1" required>
    </div>
    <input type="hidden" name="companyId" value="'.$actualCompany.'">
    <input type="submit" value="Rögzítés" class="btn btn-primary">
    </div>
    </form>';
    }
    else{
        $selectProduct="SELECT * FROM `products`";
        $resultproducts = $conn -> query($selectProduct);
        if ($resultproducts->num_rows > 0) {
            print '
            <form action="feldolgozok/newOrder.php" method="POST">
            <div class="input-group mb-3">
            <div class="input-group mb-3">
            <label class="input-group-text" for="companys">Termékek</label>
            <select name="productId" class="form-select" id="companys">
            <option selected>Válassz terméket</option>
            ';
            while($row = $resultproducts->fetch_assoc()) {
                print '
                  <option value="'.$row['productId'].'">'.$row['productName'].'</option>
                ';
            }
            print '</select>
    <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon1">Rendelt mennyiség:</span>
    <input type="number" name="quantity" class="form-control" aria-label="nev" aria-describedby="basic-addon1" required>
    <span class="input-group-text" id="basic-addon1">Szállítási határidő:</span>
    <input type="date" name="shippingDate" class="form-control" aria-label="nev" aria-describedby="basic-addon1" required>
    </div>
    <input type="hidden" name="companyId" value="'.$actualCompany.'">
    <input type="submit" value="Rögzítés" class="btn btn-primary">
    </div>
    </form>';
        }
    }

}
}
else{
    print '<img src="./DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Használat előtt jelentkezz be!<br></div>';
    print '<form action="index.php"><button type="submit" class="btn btn-primary">Bejelentkezés</button> </form>';
}

?>