<?php 
session_start();
unset($_SESSION['birthdate']); 
unset($_SESSION['name']); 
unset($_SESSION['email']); 

if (empty($_SESSION['birthdate'])) {
    header('Location: dob.php');
}
