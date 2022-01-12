$sqlPlannedLeadTime="SELECT SUM(expected_count) as expected_count,
                            SUM(normal_time) as normal_time,
                            SUM(preparation_time) as preparation_time,
                            SUM(overhead_fee) as overhead_fee
                            FROM `order_manufacturing_step` where order_ID='".$workpageId."'";
$resultPlannedTime=$conn->query($sqlPlannedLeadTime);
if ($resultPlannedTime->num_rows > 0) {
    while($row = $resultPlannedTime->fetch_assoc()) {
        $expected_count=$row["expected_count"];
        $normal_time=$row["normal_time"];
        $preparation_time=$row["preparation_time"];
        $overhead_fee=$row["overhead_fee"];
    }
    $plannedLeadTimeHour=(($normal_time*$expected_count)+$preparation_time)/60;
}


print'
    <div style="width: 21cm;
                height: 29.3cm;
                padding: 2cm;
                margin: 1cm auto;
                border: 1px #D3D3D3 solid;
                border-radius: 5px;
                background: white;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
                overflow:auto;">
        <table class="table">
            <thead>
                <td><h6>Munka adatok:</td>
                <td colspan="4">
                <td><h6>Számítás a már meglévő adatokból</td>   

            <thead>
';
if ($plannedLeadTimeHour<1) {
    print '
    <tr><td><h6>Tervezett átfutási idő:</td> <td colspan="4"> <td>Nincs elég adat, hogy számítható legyen </td>
    </tr>';
}else{
    print '
    <tr><td><h6>Tervezett átfutási idő:</td><td colspan="4"> <td> '.$plannedLeadTimeHour.' óra</td>
    </tr>';
}
print '<tr><td><h6>Ár kalkuláció:</td><td></td></tr>
<tr>
    <td colspan="2">
    <td>Elvárt mennyiség</td>
    <td>Norma idő</td>
    <td>Óradíj</td>
    <td>Elvárt mennyiség díja</td>
    </tr>';
$sqlEstimatedCostOfWork="SELECT 
                        `manufacturing_step`.step_code, 
                        `manufacturing_step`.name, 
                        `order_manufacturing_step`.normal_time as time,
                        `order_manufacturing_step`.preparation_time as pretime,
                        `order_manufacturing_step`.overhead_fee,
                        `order_manufacturing_step`.`expected_count`
                        from user_order_manufacturing_step 
                        inner join order_manufacturing_step on user_order_manufacturing_step.order_manufacturing_step_ID=order_manufacturing_step.ID 
                        inner JOIN manufacturing_step on order_manufacturing_step.manufacturing_step_ID=manufacturing_step.ID 
                        WHERE order_manufacturing_step.order_ID='".$workpageId."'
                        ";
$resultEstimatedCostOfWork=$conn->query($sqlEstimatedCostOfWork);
$total_price=0;
if ($resultEstimatedCostOfWork->num_rows > 0) {
    while($row = $resultEstimatedCostOfWork->fetch_assoc()) {
        $pretime=$row['pretime'];
        $expected_count=$row['expected_count'];
        print '<tr>';
        print '<td>'.$step_code=$row["step_code"];
        print '<td>'.$name=$row["name"].'</td>';
        print '<td>'.$expected_count=$row["expected_count"].'</td>';
        print '<td>'.$time=$row["time"].'perc/db </td>';
        print '<td>'.$overhead_fee=$row["overhead_fee"].' Ft/óra </td>';
        print '<td>'.$part_price=(($time*$expected_count)+$pretime)*($overhead_fee/60).' Ft</td>';
        $total_price=$total_price+$part_price;
        print '</tr>';
    }
}
print '<tr><td colspan="2">Várható végösszeg:<td colspan="3"><td>'.$total_price.' Ft</td></td></tr>';