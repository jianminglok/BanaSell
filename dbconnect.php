<?php
//connect to mysql database
$con = mysqli_connect("localhost", "root", "makerlab", "ogiebooks") or die("Error " . mysqli_error($con));
$con->set_charset('utf8');
