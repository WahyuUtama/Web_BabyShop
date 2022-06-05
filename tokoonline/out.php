<?php 
session_start();
$_SESSION['status_login'] = false;
session_destroy();

header("Location: login.php");
?>