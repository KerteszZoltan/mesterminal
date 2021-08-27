<?php
include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST['city'])){
    
    $siteId=$_POST['siteId'];
    print $city = ucwords($_POST['city']);
    print $street=$_POST['street'];
    print $house_number=$_POST['house_number'];

    print $sql="UPDATE `site` SET `city`='$city',
                            `street`='$street',
                            `house_number`='$house_number'
                        WHERE `ID`='$siteId'";
    $result = $conn->query($sql);
    if(!$result){
        print "nem sikerült a módosítás";
    } else{
        header("Location: ../site.php");
    }
}
?>