<?php
session_start();
include_once 'function.php';
$_SESSION['previous2'] = basename($_SERVER['PHP_SELF']);

include_once 'dbconnect.php';

//set validation error flag as false
$error = false;

require_once __DIR__ . '/recaptcha/autoload.php';
$recaptcha = new \ReCaptcha\ReCaptcha('6LeNwScUAAAAAIjCcPf3CNL9f-7l5WYpyoismfJG');

//check if form is submitted
if (isset($_POST['signup'])) {

	unset($_SESSION['name']);
	unset($_SESSION['email']);
	
	if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
		
			 $resp = $recaptcha->verify($_POST["g-recaptcha-response"], $_SERVER['REMOTE_ADDR']);
		
			 if (!$resp->isSuccess()) {
			$errorinfo = "Bots are not welcomed! Go away please! :P";
				exit();
			
			} else  if($resp->isSuccess()) {

				

	
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$sql = "SELECT * FROM users WHERE name = '".$name."'";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>=1)
       {
        $error = true;
        $name_error = "Username already exists, please choose a different username";
       }
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$sql2 = "SELECT * FROM users WHERE email = '".$email."'";
    $result2 = mysqli_query($con,$sql2);
    if(mysqli_num_rows($result2)>=1)
       {
        $error = true;
        $email_error = "Email already exists, please use a different email";
       }
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
	$age = mysqli_real_escape_string($con, $_POST['age']);
	$dbd = mysqli_real_escape_string($con, $_POST['dbd']);
	$form = mysqli_real_escape_string($con, $_POST['form']);

	
	//name can contain only alpha characters and space
	if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
		$error = true;
		$name_error = "Name must contain only alphabets and space";
	} else {
		$_SESSION['name']=$_POST['name'];
	}

	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$email_error = "Please enter a valid email";
	}else {
		$_SESSION['email']=$_POST['email'];
		$key = md5($email.time());
	}

	if(strlen($password) < 8) {
		$error = true;
		$password_error = "Password must be at least 8 characters long";
	} else {
		$password2 = hash("sha256", $password);
		$cpassword2 = hash("sha256", $cpassword);
	}

	if($password2 != $cpassword2) {
		$error = true;
		$cpassword_error = "Passwords do not match";
	}

	if (!$error) {
		$banasell = md5('bxa11z8');
		$password3 = trim($password) . $banasell;
		$hashed = password_hash($password3, PASSWORD_BCRYPT, ["cost" => 16]);
		if(mysqli_query($con, "INSERT INTO users(name,email,password,dateofbirth,age,form) VALUES('" . $name . "', '" . $email . "', '" . $hashed . "', '" . $dbd . "', '" . $age . "', '" . $form . "')")) {
			
			$message = "Successfully Registered! <a href='login.php'>Click here if you are not automatically redirected to login page.</a>";
            $_SESSION['message'] = $message;
            $redirect = "index.php";
            $_SESSION['redirect'] = $redirect;
            $redirect_time = "3";
            $_SESSION['redirect_time'] = $redirect_time;
            $activity = "Sign Up";
            $_SESSION['activity'] = $activity;
        	header('Location: message.php');
    		
    	} else {
    		$errormsg = "Error in mysql...Please try again later!";
    	}
exit();
		} else {
			$errormsg = "Error in registering...Please try again later!";
			echo $errormsg;
			exit();
		}
	

}

}  else {
	$_SESSION['name']=$_POST['name'];
	$_SESSION['email']=$_POST['email'];
    $errorinfo = "Please tick the reCAPTCHA verification checkbox before continuing.";
  }

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
	<title>Ogiebooks - Sign Up</title>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body style="background-image: url('https://ogiebooks.gq/img/background.jpg'); height:100%; background-size: 100% 100%;
        background-repeat: no-repeat;
        background-position: left top;">   

<?php $page = 'register.php'; include('nav2.php'); ?>

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

<main class="mdl-layout__content">
    <section class="mdl-layout__tab-panel" id="fixed-tab-1">
		
    </section>
    <section class="mdl-layout__tab-panel is-active" id="fixed-tab-2">
      <div class="page-content">
					<!-- Wide card with share menu button -->
		<style>
		.demo-card-wide.mdl-card {
			width: 350px;
			height: 1161px;
		}
		.demo-card-wide > .mdl-card__title {
			color: #fff;
			height: 176px;
			background: #ff8c00;
		}
		}
		.demo-card-wide > .mdl-card__menu {
			color: #fff;
		}
		</style>
<form method="post" action="#" style="">  
			<div class="demo-card-wide mdl-card mdl-shadow--2dp" style=" margin: 45px 0;
    max-width: 1044px;
    margin-left: auto;
    margin-right: auto;">
				<div class="mdl-card__title" style="padding-top: 9.9em">
					<h2 class="mdl-card__title-text">Sign Up</h2>
				</div>
				<!-- MDL Progress Bar with Indeterminate Progress -->
				<div class="mdl-card__supporting-text" style="overflow-y: auto; padding-right: 0.4em; padding-left: 2.2em; margin-right: 1.5em; margin-top: 1.5em; margin-bottom: 0.82em;">

				<!-- Simple Textfield -->
				
					<?php if(isset($name_error)) { ?>
					<label class="mdl-textfield--floating-label	" for="name">Please enter your name</label>
					<div class="mdl-textfield mdl-js-textfield is-invalid" style="margin-bottom: 1.5em;">
						<input name="name" class="mdl-textfield__input" value="<?php echo $name ?>" required type="text" id="name">
						<label class="mdl-textfield__label" for="name">Name</label>
						<span class="mdl-textfield__error"><?php echo $name_error ?></span>
					</div>
					<?php } elseif(!isset($name_error) && isset($_POST['signup'])) { ?>
					<label class="mdl-textfield--floating-label	" for="name">Please enter your name</label>
					<div class="mdl-textfield mdl-js-textfield" style="margin-bottom: 0.5em;">
						<input name="name" class="mdl-textfield__input" value="<?php echo $_SESSION['name'] ?>" required type="text" id="name">
						<label class="mdl-textfield__label" for="name">Name</label>
					</div>
					<?php } else { ?>
					<label class="mdl-textfield--floating-label	" for="email">Please enter your name</label>
					<div class="mdl-textfield mdl-js-textfield" style="margin-bottom: 0.5em;">
						<input name="name" class="mdl-textfield__input" value="<?php if($error) { echo $name; } elseif(!empty($_SESSION['name'])) { echo $_SESSION['name']; } else { null; } ?>" required="true" type="text" id="name">
						<label class="mdl-textfield__label" for="name">Name</label>
					</div>
					<?php } ?>

					<?php if(isset($email_error)) { ?>
					<label class="mdl-textfield--floating-label	" for="email">Please enter your email</label>
					<div class="mdl-textfield mdl-js-textfield is-invalid" style="margin-bottom: 0.5em;">
						<input name="email" class="mdl-textfield__input" value="<?php echo $email ?>" required type="email" id="email">
						<label class="mdl-textfield__label" for="email">Email</label>
						<span class="mdl-textfield__error"><?php echo $email_error ?></span>
					</div>
					<?php } elseif(!isset($email_error) && isset($_POST['signup'])) { ?>
					<label class="mdl-textfield--floating-label	" for="email">Please enter your email</label>
					<div class="mdl-textfield mdl-js-textfield" style="margin-bottom: 0.5em;">
						<input name="email" class="mdl-textfield__input" value="<?php echo $_SESSION['email'] ?>" required type="email" id="email">
						<label class="mdl-textfield__label" for="email">Email</label>
					</div>
					<?php } else { ?>
					<label class="mdl-textfield--floating-label	" for="email">Please enter your email</label>
					<div class="mdl-textfield mdl-js-textfield" style="margin-bottom: 0.5em;">
						<input name="email" class="mdl-textfield__input" value="<?php if($error) { echo $email; } elseif(!empty($_SESSION['email'])) { echo $_SESSION['email']; } else { null; } ?>" required="true" type="email" id="email">
						<label class="mdl-textfield__label" for="email">Email</label>
					</div>
					<?php } ?>

					<?php if(isset($password_error)) { ?>
					<label class="mdl-textfield--floating-label	" for="password">Must be at least 6 characters long</label>
					<div class="mdl-textfield mdl-js-textfield is-invalid" style="margin-bottom: 0.5em;">
						<input name="password" class="mdl-textfield__input" required type="password" id="password">
						<label class="mdl-textfield__label" for="password">Password</label>
						<span class="mdl-textfield__error"><?php echo $password_error ?></span>
					</div>
					<?php } elseif(!isset($email_error) && isset($_POST['signup'])) { ?>
					<label class="mdl-textfield--floating-label	" for="password">Must be at least 6 characters long</label>
					<div class="mdl-textfield mdl-js-textfield" style="margin-bottom: 0.5em;">
						<input name="password" class="mdl-textfield__input" required type="password" id="password">
						<label class="mdl-textfield__label" for="password">Password</label>
					</div>
					<?php } else { ?>
					<label class="mdl-textfield--floating-label	" for="password">Must be at least 6 characters long</label>
					<div class="mdl-textfield mdl-js-textfield" style="margin-bottom: 0.5em;">
						<input name="password" class="mdl-textfield__input" required type="password" id="password">
						<label class="mdl-textfield__label" for="password">Password</label>
					</div>
					<?php } ?>

					<?php if(isset($cpassword_error)) { ?>
					<label class="mdl-textfield--floating-label	" for="cpassword">Must be at least 6 characters long</label>
					<div class="mdl-textfield mdl-js-textfield is-invalid" style="margin-bottom: 0.5em;">
						<input name="cpassword" class="mdl-textfield__input" required type="password" id="cpassword">
						<label class="mdl-textfield__label" for="cpassword">Confirm Password</label>
						<span class="mdl-textfield__error"><?php echo $cpassword_error ?></span>
					</div>
					<?php } elseif(isset($successmsg)) { ?>
					<label class="mdl-textfield--floating-label	" for="cpassword">Must be at least 6 characters long</label>
					<div class="mdl-textfield mdl-js-textfield" style="margin-bottom: 0.5em;">
						<input name="cpassword" class="mdl-textfield__input" required type="password" id="cpassword">
						<label class="mdl-textfield__label" for="cpassword">Confirm Password</label>
					</div>
					<?php } else { ?>
					<label class="mdl-textfield--floating-label	" for="cpassword">Must be at least 6 characters long</label>
					<div class="mdl-textfield mdl-js-textfield" style="margin-bottom: 0.5em;">
						<input name="cpassword" class="mdl-textfield__input" required type="password" id="cpassword">
						<label class="mdl-textfield__label" for="cpassword">Confirm Password</label>
					</div>
					<?php } ?>

					<label class="mdl-textfield--floating-label	" for="age">Please enter your age</label>
					<div class="mdl-textfield mdl-js-textfield" style="margin-bottom: 0.5em;">
						<input name="age" class="mdl-textfield__input" value=<?php echo $age; ?> required readonly type="text" id="age">
						<label class="mdl-textfield__label" for="age">Age</label>
					</div>

					<label class="mdl-textfield--floating-label	" for="dbd">Please enter your date of birth</label>
					<div class="mdl-textfield mdl-js-textfield" style="margin-bottom: 0.5em;">
						<input name="dbd" class="mdl-textfield__input" value=<?php echo $dbd; ?> required readonly type="text" id="dbd">
						<label class="mdl-textfield__label" for="dbd">Date of Birth</label>
					</div>

					<label class="mdl-textfield--floating-label	" for="dbd">Which form are you in?</label>
					<div class="mdl-selectfield mdl-js-selectfield" style="margin-bottom: 0.5em">
						<select name="form" required class="mdl-selectfield__select mdl-textfield__input">
							<option></option>
							<option>Junior 1</option>
							<option>Junior 2</option>
							<option>Junior 3</option>
							<option>Senior 1</option>
							<option>Senior 2</option>
							<option>Senior 3</option>
						</select>
						<label class="mdl-selectfield__label" for="myselect">Choose your form</label>
					</div>

					<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="t&c" style="padding-bottom: 5em">
      <input name="t&c" type="checkbox" id="t&c" class="mdl-checkbox__input" required>
      <span class="mdl-checkbox__label">I have read through the <a href="t&c.php">terms and conditions</a> and agreed to all of them.</span>
    </label>

					<div style="padding-top: 0.8em">
    <div class="g-recaptcha" data-sitekey="6LeNwScUAAAAAOEEkybIcPq7Rl9pzd5hqRtSvSEf" style="padding-bottom: 1.5em; "></div>
	</div>

				</div>
				<div class="mdl-card__actions mdl-card--border">
					<button name="signup" type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" style="margin-left: 0.5em;">
						Sign Up
					</button>
					<button type="submit" name="cleardob"  class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" style="margin-left: 0.5em;" formnovalidate>
						Reselect date of birth
					</button>
					<button name="clearform" onclick="window.location.href='resetform-data.php'" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" style="margin-left: 0.5em;">
						Clear this part
					</button>
					<button name="reset" onclick="window.location.href='clear.php'" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
						Clear all data
					</button>
				</div>
				</form>
			</div>
			</div>

    </section>
  </main>


</div>

<?php if($error == true) { ?>
<div id="error-toast" class="mdl-js-snackbar mdl-snackbar">
  <div class="mdl-snackbar__text" style="margin-right: 11px"></div>
  <button class="mdl-snackbar__action" type="button" style="display:none"></button>
</div>
<?php } else { ?>
<div id="error-toast" class="mdl-js-snackbar mdl-snackbar" style="display:none">
  <div class="mdl-snackbar__text" style="margin-right: 11px"></div>
  <button class="mdl-snackbar__action" type="button" style="display:none"></button>
</div>
<?php } ?>

<script>
r(function(){
    var snackbarContainer = document.querySelector('#error-toast');
    var data = {
      message: 'Something is wrong with the data you have just entered, please take a look!',
      timeout: 10000
    };
    snackbarContainer.MaterialSnackbar.showSnackbar(data);
});
function r(f){ /in/.test(document.readyState)?setTimeout('r('+f+')',1):f()}


</script>

<?php if(isset($errorinfo)) { ?>
<div id="error-toast2" class="mdl-js-snackbar mdl-snackbar">
  <div class="mdl-snackbar__text" style="margin-right: 11px"></div>
  <button class="mdl-snackbar__action" type="button" style="display:none"></button>
</div>
<script>
r(function(){
    var snackbarContainer = document.querySelector('#error-toast2');
    var data = {
      message: '<?php echo $errorinfo ?>',
      timeout: 10000
    };
    snackbarContainer.MaterialSnackbar.showSnackbar(data);
});
function r(f){ /in/.test(document.readyState)?setTimeout('r('+f+')',1):f()}
</script>
<?php } ?>



<script type="text/javascript">
document.getElementById('testform').onsubmit= function(e){
     e.preventDefault();
}
</script>


</body>
</html>
<script src="js/material.js"></script>