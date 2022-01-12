<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
$ID = $_POST['id'];
$barcode = $_POST['barcode'];
$step_code = $_POST['step_code'];
$name = $_POST['name'];
$category_ID = $_POST['category_ID'];
$overhead_fee=$_POST['overhead_fee'];
$education=$_POST['education'];


print $sql="UPDATE `manufacturing_step` SET 
`barcode`='$barcode', 
`step_code`='$step_code', 
`name`='$name', 
`category_ID`='$category_ID',
`overhead_fee`='$overhead_fee',
`education`='$education'

where `ID`='$ID'";

$result = $conn->query($sql);
if(!$result){
    print "nem sikerült a módosítás";
} else{
    Header("Location: ../manufacturing_step.php");
    }
}
?>