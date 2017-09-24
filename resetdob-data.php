<?php 
session_start();
$_SESSION['previous2'] = basename($_SERVER['PHP_SELF']);
unset($_SESSION['birthdate']); 
header('Location: dob.php');
 ?>