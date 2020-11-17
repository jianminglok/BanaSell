<?php

	include_once 'dbconnect.php';

	$confirm_key = $_GET["key"];
	$email = $_GET["email"];
	$id = $_GET["id"];
	
	$check = mysqli_query($con, "SELECT email FROM confirm WHERE confirm_key = '$confirm_key'");
	$row=mysqli_fetch_array($check,MYSQLI_ASSOC);
	if(mysqli_num_rows($check) == 1)
	{
		$query = mysqli_query($con, "UPDATE users SET status = 0 WHERE email = '$row[email]'");
		if($query)
		{
			$del = mysqli_query($con, "DELETE FROM confirm WHERE confirm_key = '$confirm_key'");
			if($del)
			{
				if(mysqli_query($con, "UPDATE users SET email = '" . $email . "' WHERE id = '".$id."' ")) {
				header('Refresh: 3; url=login.php' ); 
				$msg=  "Thank You, your email is now activated. <a href='login.php'>Click here if you are not automatically redirected to login page.</a>";
				echo $msg;
				}
			}
		}
	}
	else
	{
		header('Refresh: 3; url=dob.php' ); 
		$msg = "Sorry, your confirmation code is invalid or your email maybe be already activated. <a href='dob.php'>You will now be redirected back to the sign up page.</a>";
		echo $msg;
	}
