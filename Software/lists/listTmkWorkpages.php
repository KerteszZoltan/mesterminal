<?php
include "connection.php";
if(!isset($_SESSION)){
    session_start();
}

$sql="SELECT * from `workpages` inner join tmkworkpages on workpages.workpageId = tmkworkpages.workpageId";
$reultErrors = $conn -> query($sql);
if ($reultErrors->num_rows > 0) {
    print '
    <div style="overflow: hidden">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">TMK munkalapok</th>
        </tr>
        </thead>
        <tbody>
        ';
    while($row = $reultErrors->fetch_assoc()) {
        print '
            <tr>
            <td>'.$row["workpageName"].'</td>

            </tr>';
    }
    print '
        </tbody>
        </table>
        </div>';
}



?>