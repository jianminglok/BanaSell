<?php 
session_start();
$_SESSION['previous'] = basename($_SERVER['PHP_SELF']);
unset($_SESSION['name']); 
unset($_SESSION['email']); 

if (empty($_SESSION['name']) && empty($_SESSION['email'])) {
    header('Location: register.php');
} ?>