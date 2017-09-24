<?php
session_start();
include_once 'function.php';
include_once 'dbconnect.php';

unset($_SESSION['email']); 
unset($_SESSION['email2']); 

//set validation error flag as false
$error = false;

require_once __DIR__ . '/recaptcha/autoload.php';
$recaptcha = new \ReCaptcha\ReCaptcha('6LeNwScUAAAAAIjCcPf3CNL9f-7l5WYpyoismfJG');

//check if form is submitted
if (isset($_POST['signup'])) {

  if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {

    
    
         $resp = $recaptcha->verify($_POST["g-recaptcha-response"], $_SERVER['REMOTE_ADDR']);
    
       if (!$resp->isSuccess()) {
        $errorinfo = "Bots are not welcomed! Go away please! :P";
       
        
      } else  if($resp->isSuccess()) {

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
  
  $banasell = md5('bxa11z8');
  $password2 = trim($password) . $banasell;

	if(!$error) {

		$result = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $email. "'");

		$_SESSION['email2']=$_POST['email2'];
		$_SESSION['email']=$email;

		if ($row = mysqli_fetch_array($result)) {

			if(password_verify($password2, $row['password'])) {

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
          $errorinfo = "A problem has occured!";
    		}

    	} else {		
         $email2_error = "An error has occured, you may have already requested an email change.";
         $errorinfo = "An error has occured, you may have already requested an email change.";
    	}

    }

}  else {
    $errormsg = "Your email or password is incorrect.";
    $errorinfo = "Your email or password is incorrect.";
}
}
      }
    } else {
      $errorinfo = "Something wrong with recaptcha";
    }
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Ogiebooks - Update Email</title>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body style="background-image: url('img/background.jpg'); height:100%; background-size: 100% 100%;
        background-repeat: no-repeat;
        background-position: left top;">   

<?php $page = 'updateemail.php'; include('nav4.php'); ?>

<!-- Wide card with share menu button -->
<style>
.demo-card-wide.mdl-card {
  width: 350px;
  height: 630px;
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

<main class="mdl-layout__content" >
<section class="mdl-layout__tab-panel is-active" id="fixed-tab-1">

<?php if(isset($_SESSION['usr_id'])) { ?>

  <form method="post" action="#" style="">  
<div class="demo-card-wide mdl-card mdl-shadow--2dp" style=" margin: 45px 0;
    max-width: 1044px;
    margin-left: auto;
    margin-right: auto;">
  <div class="mdl-card__title">
    <h2 class="mdl-card__title-text">Update Email</h2>
  </div>
  <!-- MDL Progress Bar with Indeterminate Progress -->
  <div class="mdl-card__supporting-text" style="margin-left: 1em; margin-right: 1em; margin-top: 0.82em; margin-bottom: 1.5em;">



<?php if($error) { ?>   
    <label class="mdl-textfield--floating-label	" for="email">Please enter your email</label>
    <div class="mdl-textfield mdl-js-textfield is-invalid" style="margin-bottom: 0.5em;">
      <input name="email" class="mdl-textfield__input" required value="<?php echo $email ?>" type="email" id="email">
      <label class="mdl-textfield__label" for="email">Email</label>
    </div>
		<div class="mdl-textfield mdl-js-textfield is-invalid" style="margin-bottom: 0.5em;">
      <input name="email2" class="mdl-textfield__input" required value="<?php echo $email ?>" type="email" id="email">
      <label class="mdl-textfield__label" for="email2">Email</label>
    </div>
    <label class="mdl-textfield--floating-label" for="password">Please enter your password</label>
    <div class="mdl-textfield mdl-js-textfield is-invalid" >
      <input name="password" class="mdl-textfield__input" required type="password" id="password">
      <label class="mdl-textfield__label" for="password">Password</label>
    </div>
    </script>
    <?php } else { ?>
    <label class="mdl-textfield--floating-label	" for="email">Please enter your old email</label>
    <div class="mdl-textfield mdl-js-textfield" style="margin-bottom: 0.5em;">
      <input name="email" class="mdl-textfield__input" required type="email" id="email">
      <label class="mdl-textfield__label" for="email">Email</label>
    </div>
    <label class="mdl-textfield--floating-label	" for="email">Please enter your new email</label>
		<div class="mdl-textfield mdl-js-textfield" style="margin-bottom: 0.5em;">
      <input name="email2" class="mdl-textfield__input" required type="email" id="email2">
      <label class="mdl-textfield__label" for="email2">Email</label>
    </div>
    <label class="mdl-textfield--floating-label" for="password">Please enter your password</label>
    <div class="mdl-textfield mdl-js-textfield" >
      <input name="password" class="mdl-textfield__input" required type="password" id="password">
      <label class="mdl-textfield__label" for="password">Password</label>
    </div>
    
    <?php } ?>
		
  </div>

	<div style="padding-left: 1.5em">
  <div class="g-recaptcha" data-sitekey="6LeNwScUAAAAAOEEkybIcPq7Rl9pzd5hqRtSvSEf" style="padding-bottom: 1.5em; "></div>
</div>

  <div class="mdl-card__actions mdl-card--border">
    <button name="signup" type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" style="margin-left: 0.5em;">
      Sign In
    </button>
    <button onclick="window.location.href='reset.php'" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
      Need Help?
    </button>
  </div>



			</form>

	
	
	
</div>
</section>
<section class="mdl-layout__tab-panel" id="fixed-tab-2">
</section>
</main>

<?php } else { $errorinfo = 'Please sign in to update your info. Thanks.'; ?>

<p style="color: white; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 17px;">Please sign in to update your info. <a href="login.php">You can sign in here.</a></p>

<?php } ?>      

  </body>
</html>

<?php if(isset($errorinfo)) { ?>
<div id="error-toast" class="mdl-js-snackbar mdl-snackbar">
  <div class="mdl-snackbar__text" style="margin-right: 9px"></div>
  <button class="mdl-snackbar__action" type="button" style="display:none"></button>
</div>


<script>
r(function(){
    var snackbarContainer = document.querySelector('#error-toast');
    var data = {
      message: '<?php echo $errorinfo; ?>',
      timeout: 5000
    };
    snackbarContainer.MaterialSnackbar.showSnackbar(data);
});
function r(f){ /in/.test(document.readyState)?setTimeout('r('+f+')',1):f()}
</script>
 
<?php } ?>

<script src="js/material.js"></script>
<script src="js/mdl-selectfield.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

