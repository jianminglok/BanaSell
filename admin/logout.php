<?php
session_start();

if(isset($_SESSION['usr_id2'])) {
	session_destroy();
	unset($_SESSION['usr_id2']);
	header("Location: index.php");
} else {
	header("Location: index.php");
}
?>