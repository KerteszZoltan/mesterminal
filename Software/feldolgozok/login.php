<?php
include "../connection.php";

if(!isset($_SESSION)){
    session_start();
}


echo $email = $_POST['email'];
echo $jelszo = md5($_POST['jelszo']);
$sql="SELECT * FROM admins WHERE Email='$email' && passworld='$jelszo'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $_SESSION['aid'] = $row["adminId"];
    header("Location: ../mainPage.php");
  }
} else {
   header("Location: ../index.php");
}

?>