<?php
session_start();

include_once 'dbconnect.php';
include_once 'function.php';
$email = $_GET['email'];
$token = $_GET['token'];
$userID = UserID($email); 
$verifytoken = verifytoken($userID, $token);
if(isset($_POST['submit']))
{
    $new_password = $_POST['new_password'];
    
    $retype_password = $_POST['retype_password'];
    
    if(strlen($new_password) < 8) {
      $error = true;
      $password_error = "Password must be at least 8 characters long";
    } else {
      $new_password2 = hash("sha256", $new_password);
      $retype_password2 = hash("sha256", $retype_password);
    }
    
    if($new_password2 == $retype_password2)
    {
        $ogiebooks = md5('bxa11z8');
		    $password3 = trim($new_password) . $ogiebooks;
		    $hashed = password_hash($password3, PASSWORD_BCRYPT, ["cost" => 16]);
        if(mysqli_query($con, "UPDATE users SET password = '$hashed' WHERE id = $userID")) {
                if(mysqli_query($con, "UPDATE recovery_keys SET valid = 0 WHERE userID = $userID AND token ='$token'")) {
                // wait 5 seconds and redirect :)
                $message = "Password successfully reset! <a href='login.php'>Click here if you are not automatically redirected.</a>";
                $_SESSION['message'] = $message;
                $redirect = "login.php";
                $_SESSION['redirect'] = $redirect;
                $redirect_time = "5";
                $_SESSION['redirect_time'] = $redirect_time;
                $activity = "Reset Password";
                $_SESSION['activity'] = $activity;
                header('Location: message.php');
            }
        } else {
           exit();
        }
    }else
    {
      $error = true;
		  $cpassword_error = "Passwords do not match";
    }
    
}
?>

<!DOCTYPE html>
<html style="height:100%; ">
<head>
	<title>Ogiebooks - Reset Password</title>
</head>
<body style="background-image: url('img/background.jpg'); height:100%; background-size: 100% 100%;
        background-repeat: no-repeat;
        background-position: left top;">   

<?php $page = 'forget.php'; include('nav.php'); ?>

<!-- Wide card with share menu button -->
<style>
.demo-card-wide.mdl-card {
  width: 350px;
  height: 440px;
}
.demo-card-wide > .mdl-card__title {
  color: #fff;
  height: 176px;
  background: #da4932;
}
}
.demo-card-wide > .mdl-card__menu {
  color: #fff;
}
</style>
<main class="mdl-layout__content">
<div class="demo-card-wide mdl-card mdl-shadow--2dp" style=" margin: <?php if($verifytoken == 1) { ?> 78px <?php } else { ?>135px <?php } ?> 0;
    max-width: 1044px;
    margin-left: auto;
    margin-right: auto;">
  <div class="mdl-card__title">
    <h2 class="mdl-card__title-text">Reset Password</h2>
  </div>
  <!-- MDL Progress Bar with Indeterminate Progress -->
  <div class="mdl-card__supporting-text">
   
   <!-- Simple Textfield -->
    <?php if($verifytoken == 1) { ?>   
    <form method="post" action="#" style="padding-left: 1em; padding-right: 1em; padding-top: 1em; padding-bottom: 1.5em;"> 
    <?php if(isset($password_error)) { ?>
					<label class="mdl-textfield--floating-label	" for="password">Must be at least 6 characters long</label>
					<div class="mdl-textfield mdl-js-textfield is-invalid" style="margin-bottom: 0.5em;">
						<input name="new_password" class="mdl-textfield__input" required type="password" id="password">
						<label class="mdl-textfield__label" for="password">Password</label>
						<span class="mdl-textfield__error"><?php echo $password_error ?></span>
					</div>
					<?php } else { ?>
					<label class="mdl-textfield--floating-label	" for="password">Must be at least 6 characters long</label>
					<div class="mdl-textfield mdl-js-textfield" style="margin-bottom: 0.5em;">
						<input name="new_password" class="mdl-textfield__input" required type="password" id="password">
						<label class="mdl-textfield__label" for="password">Password</label>
					</div>
					<?php } ?>

					<?php if(isset($cpassword_error)) { ?>
					<label class="mdl-textfield--floating-label	" for="cpassword">Must be at least 6 characters long</label>
					<div class="mdl-textfield mdl-js-textfield is-invalid" style="margin-bottom: 0.5em;">
						<input name="retype_password" class="mdl-textfield__input" required type="password" id="cpassword">
						<label class="mdl-textfield__label" for="cpassword">Confirm Password</label>
						<span class="mdl-textfield__error"><?php echo $cpassword_error ?></span>
					</div>
					<?php } else { ?>
					<label class="mdl-textfield--floating-label	" for="cpassword">Must be at least 6 characters long</label>
					<div class="mdl-textfield mdl-js-textfield" style="margin-bottom: 0.5em;">
						<input name="retype_password" class="mdl-textfield__input" required type="password" id="cpassword">
						<label class="mdl-textfield__label" for="cpassword">Confirm Password</label>
					</div>
					<?php } ?>
    </div>
    <div class="mdl-card__actions mdl-card--border">
        <button name="submit" type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" style="margin-left: 0.5em;">
        Reset Password
        </button>
    </div>          
    <?php } else { ?>
    <style>
    .demo-card-wide.mdl-card {
      width: 350px;
      height: 310px;
    }
    .mdl-card__supporting-text {
      margin: 2em 0;
    }
    </style>
      Opps! The link may be broken or already used. Please make sure you have the link is correct or request another one from <a href="reset.php">here</a>.
    </div>
    <?php } ?>
  </form>

</div>
</main>

</body>
</html>
<script src="js/material.js"></script>