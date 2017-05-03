<?php 
include_once 'dbconnect.php';
include_once 'function.php';

$_SESSION['previous3'] = basename($_SERVER['PHP_SELF']);

//set validation error flag as false
$error = false;

// Was the form submitted?
if (isset($_POST["email"])) {

	$email = mysqli_real_escape_string($con, $_POST['email']);

if(!$error) {
	if(checkUser($email) == "true")
	{
		$userID = UserID($email);
		$token = generateRandomString();
		date_default_timezone_set ("Asia/Kuching");
		$date = date('Y-m-d H:i:s');

		if(mysqli_query($con, "INSERT INTO recovery_keys(userID,token,`timestamp`) VALUES ($userID, '$token', '$date') ")) {
			 $send_mail = send_mail($email, $token);


			if($send_mail === 'success')
			{
				 $msg = 'A mail with recovery instructions has sent to your email.';
				 $_SESSION['email2']=$_POST['email'];	
				 $sent_email = true;
			}else{
				$msg = 'There is something wrong while sending your email, please try again.';
			}
		}else {
				$msg = 'There is something wrong with our system, please try again.';
		}
		
	}else {
		$msg = 'The email is not in our database. Please make sure you are using the correct email.';
	}
}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>BanaSell - Sign Up</title>
	
</head>
<body style="background-image: url('img/background.jpg'); height:100%; background-size: 100% 100%;
        background-repeat: no-repeat;
        background-position: left top;">   

<?php $page = 'reset.php'; include('nav.php'); ?>

<main class="mdl-layout__content">
    <section class="mdl-layout__tab-panel is-active" id="fixed-tab-1">
			<!-- Wide card with share menu button -->
		<style>
		.demo-card-wide.mdl-card {
			width: 350px;
			height: 456px;
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
      
			
			<div class="demo-card-wide mdl-card mdl-shadow--2dp" style=" margin: 70px 0;
    max-width: 1044px;
    margin-left: auto;
    margin-right: auto;">
				<div class="mdl-card__title">
					<h2 class="mdl-card__title-text">Sign Up</h2>
				</div>
				<!-- MDL Progress Bar with Indeterminate Progress -->
				<div class="mdl-card__supporting-text">
				<form method="post" action="#" style="padding-left: 1em; padding-right: 1em; padding-top: 4.5em; padding-bottom: 2.5em;">  
				<!-- Simple Textfield -->
				<?php if (isset($msg) && !isset($sent_email)) {	?>
					<label class="mdl-textfield--floating-label	" for="email">Please enter the email address you used during sign up.</label>
					<div class="mdl-textfield mdl-js-textfield is-invalid" style="margin-bottom: 0.5em;">
					<input name="email" class="mdl-textfield__input" required value="<?php echo $email ?>" type="email" id="email">
					<label class="mdl-textfield__label" for="email">Email</label>
					</div>
				<?php } else { ?>
					<label class="mdl-textfield--floating-label	" for="email">Please enter the email address you used during sign up.</label>
						<div class="mdl-textfield mdl-js-textfield" style="margin-bottom: 0.5em;">
						<input name="email" class="mdl-textfield__input" required type="email" id="email">
						<label class="mdl-textfield__label" for="email">Email</label>
					</div>
				<?php } ?>     
				</div>
				<div class="mdl-card__actions mdl-card--border">
					<button name="birthdateup" type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" style="margin-left: 1em;">
						Next
					</button>
					<button onclick="location.href='login.php';" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
						Have An Account? 
					</button>
				</div>
				</form>
			
			
			</div>
    </section>
    <section class="mdl-layout__tab-panel" id="fixed-tab-2">
      <div class="page-content">
				
				</div>
    </section>
  </main>


</div>

<?php if(isset($msg)) { ?>
<div id="error-toast" class="mdl-js-snackbar mdl-snackbar">
  <div class="mdl-snackbar__text" style="margin-right: 12px"></div>
  <button class="mdl-snackbar__action" type="button" style="display:none"></button>
</div>
<?php } ?>

<script>
r(function(){
    var snackbarContainer = document.querySelector('#error-toast');
    var data = {
      message: '<?php if(isset($msg)) { echo $msg; } ?>',
      timeout: 10000
    };
    snackbarContainer.MaterialSnackbar.showSnackbar(data);
});
function r(f){ /in/.test(document.readyState)?setTimeout('r('+f+')',1):f()}
</script>

</body>
</html>
<script src="js/material.js"></script>