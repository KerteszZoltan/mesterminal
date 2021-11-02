<?php
include_once("html_frame/html_head.html");
include("./connection.php");
print '
<div class="card-body" style="text-align:center;">
    <p> Rendeléshez tartozó felelősök </h5>
</div>
<div class="input-group mb-3">
<form action="#" method="POST">
  <span class="input-group-text" id="basic-addon3">Gyártási rendelés keresése</span>
  <input type="text" name="customer_number" class="form-control" value="" aria-label="Server">
  <input type="submit" value="Keresés" class="btn btn-primary">
</form>
</div>
';
if (isset($_POST['customer_number'])) {
    $customer_number=$_POST['customer_number'];
    $length=strlen($customer_number);
    if ($length > 10) {
        $sql_customer_number="SELECT 
        `order`.`customer_number` as customer_number, 
        `user`.`name` as user_name, 
        `role`.`name` as role_name 
        from `user_order_role`
        INNER join user on user_order_role.user_ID=user.ID 
        INNER JOIN `order` on user_order_role.order_ID=`order`.`ID`
        INNER JOIN `role` on user_order_role.role_ID=`role`.`ID` where `order`.`customer_number`='".$customer_number."';";
        $result_customer_number=$conn->query($sql_customer_number);
        if ($result_customer_number->num_rows > 0) {
            while($row = $result_customer_number->fetch_assoc()) {
                print $row['customer_number']." | ".$row['user_name']." | ".$row['role_name']."<br>";
            }
        }
    }
    else{
        print 'Nincs a keresésnek megfelelő adat';
    }
}

?>