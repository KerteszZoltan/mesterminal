<?php
session_start();

$_SESSION['aid']='';

header("Location: ../index.php");
?>