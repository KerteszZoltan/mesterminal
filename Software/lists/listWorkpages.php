<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}
print'
<table style="width:100%">
    <thead>
        <tr>
        <form action="#" method="POST">
            <th colspan="5" style="text-align: center;"> <input type="hidden" value="2" name="status_list"> <input type="submit" value="Aktív rendelések"></td>
        </form>
        <form action="#" method="POST">
            <th colspan="5" style="text-align: center;"> <input type="hidden" value="3" name="status_list"> <input type="submit" value="Félkész rendelések"> </td>
        </form>
        <form action="#" method="POST">
            <th colspan="5" style="text-align: center;"> <input type="hidden" value="1" name="status_list"> <input type="submit" value="Archív rendelések"> </td>
        </form>
        </tr>
    </thead>
</table>    
';
if (isset($_POST['status_list'])) {
    $status_list=$_POST['status_list'];
    if ($status_list == '2') {
        $sql="SELECT `order`.*, product.name as prod_name 
        FROM `order` inner join `product` on `order`.product_ID=`product`.ID 
        where `order`.order_status_ID='".$status_list."' order by `order`.ID DESC;";
        $resultOrder = $conn -> query($sql);
    
    }
    else if($status_list=='1'){
        $sql="SELECT `order`.*, product.name as prod_name 
        FROM `order` inner join `product` on `order`.product_ID=`product`.ID 
        where `order`.order_status_ID='".$status_list."' order by `order`.ID DESC;";
        $resultOrder = $conn -> query($sql);
    }
    else if($status_list=='3'){
        $sql="SELECT `order`.*, product.name as prod_name 
        FROM `order` inner join `product` on `order`.product_ID=`product`.ID 
        where `order`.order_status_ID='".$status_list."' order by `order`.ID DESC;";
        $resultOrder = $conn -> query($sql);
    }
    if ($resultOrder->num_rows > 0) {
        print '
        <div style="overflow: scroll">
        <table class="table table-striped">
            <tr>
                <th scope="col">Gyártási rendelés azonosító</th>
                <th scope="col">Gyártási rendelés vonalkód</th>
                <th scope="col">Gyártási rendelés típusa</th>
                <th scope="col">Vevői rendelés szám</th>
                <th scope="col">Termék</th>
                <th scope="col">Telephely azonosító</th>
                <th scope="col">Vevői rendelés darabszáma</th>
                <th scope="col">Most gyártani kívánt mennyiség</th>
                <th scope="col">Teljesített mennyiség</th>
                <th scope="col">Selejt mennyiség</th>
                <th scope="col">Gyártási rendelés státusza</th>
                <th scope="col">Módosítás</th>
            </tr>
        </thead>
        <tbody>
        ';
        while($row = $resultOrder->fetch_assoc()) {
            print '
            <tr>
            <form action="workpageId.php" method="POST">
            <td><input type="submit" name="workpageId" value="'.$row["ID"].'"></td>
            </form>
            <form action="feldolgozok/modifyWorkpage.php" method="POST">
                <td><input style="width:100px" type="text" name="barcode" value="'.$row["barcode"].'"></td>
                <td><input style="width:20px" type="text" name="order_type_ID" value="'.$row["order_type_ID"].'"></td>
                <td><input type="text" name="customer_number" value="'.$row["customer_number"].'"></td>
                <td>'.$row["prod_name"].'</td>
                <td><input style="width:20px" type="text" name="site_ID" value="'.$row["site_ID"].'"></td>
                <td><input style="width:100px" type="text" name="customer_count" value="'.$row["customer_count"].' db"></td>
                <td><input style="width:100px" type="text" name="manufactured_count" value="'.$row["manufactured_count"].' db"></td>
                <td><input style="width:100px" type="text" name="pass_count" value="'.$row["pass_count"].' db"></td>
                <td><input style="width:100px" type="text" name="fail_count" value="'.$row["fail_count"].' db"></td>
                <td><input style="width:20px" type="text" name="order_status_ID" value="'.$row["order_status_ID"].'"></td>
                <td><Button type="submit" name="order_ID" value="'.$row["ID"].'" class="btn btn-primary">Módosítás</button></td>
            </form>';
            if($row['customer_count'] == $row['pass_count']){
                $ID=$row['ID'];
                $SQLinvisible="UPDATE `order` SET `order_status_ID`='1' WHERE `ID`='$ID';";
                $result=$conn->query($SQLinvisible);
            }
        print '</tr>';
        }
    print '
        </tbody>
        </table>
        </div>
    ';
    }
}
?>