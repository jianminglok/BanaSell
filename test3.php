<?php

session_start();

include_once 'dbconnect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>BanaSell</title>
</head>
<body>


<?php
$test11 = "SELECT SUM(usr_id) AS total from watchlist_keys WHERE `key` = 'chi_j1_2_sc'";
$result = mysqli_query($con,$test11);
 while($total = mysqli_fetch_assoc($result))
    {
    echo $total['total'] .'<br />';
    }

?>
