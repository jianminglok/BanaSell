<?php

session_start();

include_once 'dbconnect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ogiebooks</title>
</head>
<body>


<?php
$test11 = "SELECT * from checklist WHERE chi_s1_1_sc = '1'";
$result = mysqli_query($con,$test11);
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)){
      $variabele[] = $row['key'];
    
      
} 
$test =  '"' . implode('","', $variabele) . '"';


  $result2 = mysqli_query($con,"SELECT * FROM books WHERE `key` IN ($test) ");

  
  if(mysqli_num_rows($result2) > 0) {
    while($row = mysqli_fetch_assoc($result2)){
      
      echo 'hi';
} 
} 
}



?>
