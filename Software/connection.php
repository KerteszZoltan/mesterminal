<?php
$servername = "127.0.0.1";
//$username = "admin";
//$password = "Admin_12345.";
$database = "mesterminal";

// XAMPP TESZT 

$username = "root";
$password = "";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>