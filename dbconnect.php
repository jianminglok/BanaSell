<?php
//connect to mysql database
$con = mysqli_connect("localhost", "root", "makerlab8899", "ogiebooks") or die("Error " . mysqli_error($con));
$con->set_charset('utf8');
