<?php
session_start();
include_once 'function.php';
include_once 'dbconnect.php';

unset($_SESSION['email']); 
unset($_SESSION['email2']); 

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$email2 = mysqli_real_escape_string($con, $_POST['email2']);
	$sql2 = "SELECT * FROM users WHERE email = '".$email2."'";
	$id = $_SESSION['usr_id'];
    $result2 = mysqli_query($con,$sql2);
    if(mysqli_num_rows($result2)>=1)
       {
        $error = true;
        $email2_error = "Email already exists, please use a different email";
       }
	
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$email2_error = "Please enter a valid email";
	}else {
		
		$key2 = md5($email.time());
	}

	$password = mysqli_real_escape_string($con, $_POST['password']);

	if(!$error) {

		$result = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . md5($password) . "'");

		$_SESSION['email2']=$_POST['email2'];
		$_SESSION['email']=$email;

		if ($row = mysqli_fetch_array($result)) {

			

			if(mysqli_query($con, "INSERT INTO confirm(email, confirm_key) VALUES ('$email2', '$key2')")) {
			
			$send_mail2 = send_verification_change_mail($email2, $key2, $id);

			if($send_mail2 === 'success') {
			$successmsg = "Successfully Registered! <a href='login.php'>Click here if you are not automatically redirected.</a>";
			// wait 3 seconds and redirect :)
			header('Refresh: 3; url=login.php' ); 
			echo "Successfully Registered! A mail with recovery instruction has sent to your email. Please activate your account to use it. <a href='login.php'>Click here if you are not automatically redirected to login page.</a>";
			unset($_POST["signup"]);
			unset($_SESSION['email']); 
			unset($_SESSION['email2']); 
			exit();
    		
    		} else {
    			echo "A problem has occured!";
    		}

    	} else {		
 	  		$email2_error = "An error has occured, you may have already requested an email change.";
    	}

		

}  else {
		$errormsg = "Your email or password is incorrect.";
}
}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>BanaSell - Sign Up</title>
	
</head>
<body>

<?php $page = 'updateemail.php'; include('nav.php'); ?>

<div class="container" id="1">
	<div class="row " id="2">
		<div class="" id="3">

<?php 
	//date in mm/dd/yyyy format; or it can be in other formats as well
  

if(!empty($_SESSION['birthdate'])) {

	$dbd=$_SESSION['birthdate'];
	//explode the date to get month, day and year
  $birthDate = explode("-", $dbd);
  //get age from date or birthdate
  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
    ? ((date("Y") - $birthDate[0]) - 1)
    : (date("Y") - $birthDate[0])); 
} else {
	$dbd = date("m/d/Y");
  //explode the date to get month, day and year
  $birthDate = explode("/", $dbd);
  //get age from date or birthdate
  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
    ? ((date("Y") - $birthDate[2]) - 1)
    : (date("Y") - $birthDate[2])); 
}

?>

<?php if(isset($_SESSION['usr_id'])) { ?>
<ul class="nav nav-pills nav-stacked" style="position: absolute; top: 50%; left: 12%; transform: translate(-50%, -50%); width: 12%">
  <li class="nav-item">
    <a <?php echo ($page == 'updateemail.php') ? "class='nav-link active'" : ""; ?> class="nav-link" href="updateemail.php" disabled>Update Email</a>
  </li>
  <li class="nav-item">
    <a <?php echo ($page == 'updateinfo.php') ? "class='nav-link active'" : ""; ?> class="nav-link" href="updateinfo.php" disabled>Update Info</a>
  </li>
</ul>

<form role="form" id="testform" class="form1" style="position: absolute; top: 55%; left: 50%; transform: translate(-35%, -50%); width: 70%" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
<div class="container">
  <div class="row">
    <div class="col-md-12">
				<fieldset style="width: 100%;">

					<?php if(isset($email_error)) { ?>
					<div class="form-group has-danger" >
					  <input type="text" name="email" placeholder="Email" required value="<?php if($error) { echo $email; } ?>" class="form-control form-control-danger">
					  <div class="form-control-feedback"><?php if (isset($email_error)) echo $email_error; ?></div>
					  <small class="form-text text-muted">Please enter your existing email address.</small>
					</div>
					<?php } elseif(!isset($email_error) && isset($_POST['signup'])) { ?>
					<div class="form-group has-success" >
					  <input type="text" name="email" placeholder="Email" required value="<?php if($error) { echo $email; } elseif(!empty($_SESSION['email'])) { echo $_SESSION['email']; } else { } ?>" class="form-control form-control-success">
					  <small class="form-text text-muted">Please enter your existing valid email address.</small>
					</div>
					<?php } else { ?>
					<div class="form-group" >
					  <input type="text" name="email" placeholder="Email" required value="<?php if($error) { echo $email; } elseif(!empty($_SESSION['email'])) { echo $_SESSION['email']; } else { } ?>" class="form-control ">
					  <small class="form-text text-muted">Please enter your existing valid email address.</small>
					</div>
					<?php } ?>

					<?php if(isset($email2_error)) { ?>
					<div class="form-group has-danger" >
					  <input type="text" name="email2" placeholder="Email" required value="<?php if($error) { echo $email2; } ?>" autocomplete="off" class="form-control form-control-danger">
					  <div class="form-control-feedback"><?php if (isset($email2_error)) echo $email2_error; ?></div>
					  <small class="form-text text-muted">Please enter a valid email address.</small>
					</div>
					<?php } elseif(!isset($email2_error) && isset($_POST['signup'])) { ?>
					<div class="form-group has-success" >
					  <input type="text" name="email2" placeholder="Email" required value="<?php if($error) { echo $email2; } elseif(!empty($_SESSION['email2'])) { echo $_SESSION['email2']; } else { } ?>" autocomplete="off" class="form-control form-control-success">
					  <small class="form-text text-muted">Please enter a valid email address.</small>
					</div>
					<?php } else { ?>
					<div class="form-group" >
					  <input type="text" name="email2" placeholder="Email" required value="<?php if($error) { echo $email2; } elseif(!empty($_SESSION['email2'])) { echo $_SESSION['email2']; } else { } ?>" autocomplete="off" class="form-control ">
					  <small class="form-text text-muted">Please enter a valid email address.</small>
					</div>
					<?php } ?>

					<?php if(isset($errormsg)) { ?>
					<div class="form-group has-danger" >
					  <input type="password" name="password" placeholder="Password" required class="form-control" class="form-control form-control-danger">
					  <small class="form-text text-muted">Please enter your password.</small>
					</div>
					<?php } else { ?>
					<div class="form-group" >
					  <input type="password" name="password" placeholder="Password" required class="form-control"  class="form-control ">
					  <small class="form-text text-muted">Please enter your password.</small>
					</div>
					<?php } ?>

					<div class="form-group">
						<div class="btn-group" role="group" aria-label="button-signupform">
						  <button type="submit" name="signup" class="btn btn-outline-primary">Sign Up</button>

						</div>
						
					</div>
		
					<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>

				</fieldset></div>
			</form>

		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
		Already Registered? <a href="login.php">Login Here</a>
		</div>
	</div>
</div>
<?php } else { ?>
<div class="container" >
 
	<div class="row" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);" >
		<div class="text-center" >	
		Please sign in to update your info. <a href="login.php">Your can sign in here.</a>
		</div>
	</div>
</div>
<?php } ?>


<script type="text/javascript">
$(function() {
    $('input[name="birthdate"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    }, 
    function(start, end, label) {
        var years = moment().diff(start, 'years');

    });
});
</script>



</body>
</html>


