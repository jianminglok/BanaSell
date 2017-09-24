<?php
session_start();
include_once 'function.php';
$_SESSION['previous2'] = basename($_SERVER['PHP_SELF']);

include_once 'dbconnect.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
	unset($_SESSION['name']); 
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$sql = "SELECT * FROM users WHERE name = '".$name."'";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>=1)
       {
        $error = true;
        $name_error = "Username already exists, please choose a different username";
       }
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
	$birthdate2 = mysqli_real_escape_string($con, $_POST['birthdate3']);
	$birthdate3 = mysqli_real_escape_string($con, $_POST['birthdate2']);
	$form = mysqli_real_escape_string($con, $_POST['form']);

	
	
	//name can contain only alpha characters and space
	if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
		$error = true;
		$name_error = "Name must contain only alphabets and space";
	} else {
		$_SESSION['name']=$_POST['name'];
	}

	if(strlen($password) < 6) {
		$error = true;
		$password_error = "Password must be minimum of 6 characters";
	}

	if($password != $cpassword) {
		$error = true;
		$cpassword_error = "Passwords do not match";
	}

	if (!$error) {
		if(mysqli_query($con, "UPDATE users SET name = '" . $name . "', password = '" . md5($password) . "', dateofbirth = '" . $birthdate2 . "', age = '" . $birthdate3 . "', form = '" . $form . "' WHERE id = '".$_SESSION['usr_id']."' ")) {

			header('Refresh: 3; url=index.php' ); 
    		echo "Successfully updated info <a href='index.php'>Click here if you are not automatically redirected to login page.</a>";
    		unset($_SESSION['name']); 
    		exit();
    		} 
    	} else {
    		$errormsg = "Error in mysql...Please try again later!";
    	}

		} else {
			$errormsg = "Error in registering...Please try again later!";
}

if(isset($_POST['cleardob'])) {
	$_SESSION['name']=$_POST['name'];
	$_SESSION['email']=$_POST['email'];

	if(!empty($_SESSION['name']) && !empty($_SESSION['email'])) {
		header('Location: resetdob-data.php' ); 
	}
}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Ogiebooks - Update Info</title>
	
</head>
<body>

<?php $page = 'updateinfo.php'; include('nav.php'); ?>

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
    <div class="col-md-6">
				<fieldset style="width: 100%;">

					<?php if(isset($name_error)) { ?>
					<div class="form-group has-danger" >
					  <input type="text" name="name" placeholder="Name" required value="<?php if($error) { echo $name; } elseif(!empty($_SESSION['name'])) { echo $_SESSION['name']; } else { } ?>" class="form-control form-control-danger">
					  <div class="form-control-feedback"><?php if (isset($name_error)) echo $name_error; ?></div>
					  <small class="form-text text-muted">Please enter your full name.</small>
					</div>
					<?php } elseif(!isset($name_error) && isset($_POST['signup'])) { ?>
					<div class="form-group has-success" >
					  <input type="text" name="name" placeholder="Name" required value="<?php if($error) { echo $name; } elseif(!empty($_SESSION['name'])) { echo $_SESSION['name']; } else { } ?>" class="form-control form-control-success">
					  <small class="form-text text-muted">Please enter your full name.</small>
					</div>
					<?php } else { ?>
					<div class="form-group" >
					  <input type="text" name="name" placeholder="Name" required value="<?php if($error) { echo $name; } elseif(!empty($_SESSION['name'])) { echo $_SESSION['name']; } else { } ?>" class="form-control ">
					  <small class="form-text text-muted">Please enter your full name.</small>
					</div>
					<?php } ?>
					
					<?php if(isset($password_error)) { ?>
					<div class="form-group has-danger" >
					  <input type="password" name="password" placeholder="Password" required class="form-control" class="form-control form-control-danger">
					  <div class="form-control-feedback"><?php if (isset($password_error)) echo $password_error; ?></div>
					  <small class="form-text text-muted">Must be at least 6 characters long.</small>
					</div>
					<?php } elseif(isset($successmsg)) { ?>
					<div class="form-group has-success" >
					  <input type="password" name="password" placeholder="Password" required class="form-control" class="form-control form-control-success">
					  <small class="form-text text-muted">Must be at least 6 characters long.</small>
					</div>
					<?php } else { ?>
					<div class="form-group" >
					  <input type="password" name="password" placeholder="Password" required class="form-control" class="form-control ">
					  <small class="form-text text-muted">Must be at least 6 characters long.</small>
					</div>
					<?php } ?>

					<?php if(isset($cpassword_error)) { ?>
					<div class="form-group has-danger" >
					  <input type="password" name="cpassword" placeholder="Confirm Password" required class="form-control" class="form-control form-control-danger">
					  <div class="form-control-feedback"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></div>
					  <small class="form-text text-muted">Please retype your password.</small>
					</div>
					<?php } elseif(isset($successmsg)) { ?>
					<div class="form-group has-success" >
					  <input type="password" name="cpassword" placeholder="Confirm Password" required class="form-control" class="form-control form-control-success">
					  <small class="form-text text-muted">Please retype your password.</small>
					</div>
					<?php } else { ?>
					<div class="form-group" >
					  <input type="password" name="cpassword" placeholder="Confirm Password" required class="form-control" class="form-control ">
					  <small class="form-text text-muted">Please retype your password.</small>
					</div>
					<?php } ?>

					<div class="form-group" >
					  <input type="text" name="birthdate2" required value=<?php echo $age; ?> placeholder="Age" required class="form-control" class="form-control " >
					  <small class="form-text text-muted">Your age.</small>
					</div>
				</fieldset>
				</div>
				<div class="col-md-6">
				<fieldset style="width: 100%;">
					<div class="form-group" >
					  <input type="text" name="birthdate3" required value=<?php echo $dbd; ?> autocomplete="off" placeholder="Date Of Birth" required class="form-control" class="form-control " >
					  <small class="form-text text-muted">Your date of birth.</small>
					</div>

					 <div class="form-group">
					    <select name="form" required multiple class="form-control" id="form-select">
					      <option>Junior 1</option>
					      <option>Junior 2</option>
					      <option>Junior 3</option>
					      <option>Senior 1</option>
					      <option>Senior 2</option>
					      <option>Senior 3</option>
					      <option>Graduated</option>
					    </select>
					    <small class="form-text text-muted">Which form are you in?</small>
					  </div>

					<div class="form-group">
						<div class="btn-group" role="group" aria-label="button-signupform">
						  <button type="submit" name="signup" class="btn btn-outline-primary">Sign Up</button>
						  <button type="button" name="clearform" onclick="window.location.href='resetform-data.php'" class="btn btn-outline-warning">Clear this form</button>
						  <button type="submit" name="cleardob" return false;" class="btn btn-outline-warning">Reselect date of birth</button>
						  <button type="button" name="reset" onclick="window.location.href='clear.php'" class="btn btn-outline-danger">Start Over</button>
						</div>
						
					</div>
		
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


