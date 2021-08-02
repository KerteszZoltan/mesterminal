<?php
include "../connection.php";

if(!isset($_SESSION)){
    session_start();
}


echo $email = $_POST['email'];
echo $jelszocoded = md5($_POST['jelszo']);
echo $jelszouncoded = $_POST['jelszo'];

$sql="SELECT * FROM user WHERE user_email='$email' && user_password='$jelszocoded'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $_SESSION['aid'] = $row["ID"];
    $conn -> close();
    header("Location: ../mainPage.php");
  }
} else {
    print $sqluncoded="SELECT * FROM user WHERE user_email='$email' && user_password='$jelszouncoded'";
    $resultuncoded = $conn->query($sqluncoded);
    if ($resultuncoded->num_rows > 0) {
      while($row = $resultuncoded->fetch_assoc()) {
        $_SESSION['aid'] = $row["ID"];
        header("Location: ../admin.php");
      }
    }
    else {
      header("Location: ../index.php");
    }
}

?>