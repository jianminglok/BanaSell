<?php
session_start();

$_session['timeout']=time();

if(isset($_SESSION['usr_id'])!="") {
	header("Location: index.php");
}

include_once 'dbconnect.php';

$error = false;

//check if form is submitted
if (isset($_POST['login'])) {

	$email = $_POST['email'];

	$check = mysqli_query($con, "SELECT * FROM confirm WHERE email = '$email'");
	$row=mysqli_fetch_array($check,MYSQLI_ASSOC);
	if(mysqli_num_rows($check) != 1)
	{

	if(!empty($_POST['stayloggedin'])) {
		$_SESSION['stayloggedin'] = strtotime(date("Y-m-d ")."23:59:59");
	}

	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$result = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $email. "' ");

	if ($row = mysqli_fetch_array($result)) {
    $banasell = md5('bxa11z8');
    $password2 = trim($password) . $banasell;
    if(password_verify($password2, $row['password'])) {
		$_SESSION['usr_id'] = $row['id'];
		$_SESSION['usr_name'] = $row['name'];
		$_SESSION['timeout'] = time();
		header("Location: index.php");
    } else {
        $errorinfo = "Your username or password is incorrect.";
        $error = true;
    }
	} else {
		$errorinfo = "User not found.";
    $error = true;
	}
} else {
	$errorinfo = "Your account is not activated or your new email address has not been verified.";
  $error = true;
}
}
?>

<!DOCTYPE html>
<html style="height:100%; ">
<head>
	<title>BanaSell - Sign In</title>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body style="background-image: url('img/background.jpg'); height:100%; background-size: 100% 100%;
        background-repeat: no-repeat;
        background-position: left top;">   

<?php $page = 'login.php'; include('nav.php'); ?>

<!-- Wide card with share menu button -->
<style>
.demo-card-wide.mdl-card {
  width: 350px;
  height: 580px;
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
<div class="demo-card-wide mdl-card mdl-shadow--2dp" style=" margin: 5px 0;
    max-width: 1044px;
    margin-left: auto;
    margin-right: auto;">
  <div class="mdl-card__title">
    <h2 class="mdl-card__title-text">Sign In</h2>
  </div>
  <!-- MDL Progress Bar with Indeterminate Progress -->
  <div class="mdl-card__supporting-text">
  <form method="post" action="#" style="padding-left: 1em; padding-right: 1em; padding-top: 1em; padding-bottom: 1.5em;">  
   <!-- Simple Textfield -->
    <?php if($error) { ?>   
    <label class="mdl-textfield--floating-label	" for="email">Please enter your email</label>
    <div class="mdl-textfield mdl-js-textfield is-invalid" style="margin-bottom: 0.5em;">
      <input name="email" class="mdl-textfield__input" required value="<?php echo $email ?>" type="email" id="email">
      <label class="mdl-textfield__label" for="email">Email</label>
    </div>
    <label class="mdl-textfield--floating-label" for="password">Please enter your password</label>
    <div class="mdl-textfield mdl-js-textfield is-invalid" style="margin-bottom: 0.5em;">
      <input name="password" class="mdl-textfield__input" required type="password" id="password">
      <label class="mdl-textfield__label" for="password">Password</label>
    </div>
    <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="stayloggedin">
      <input name="stayloggedin" type="checkbox" id="stayloggedin" class="mdl-checkbox__input" value="1">
      <span class="mdl-checkbox__label">Stay signed in</span>
    </label>
    </script>
    <?php } else { ?>
    <label class="mdl-textfield--floating-label	" for="email">Please enter your email</label>
    <div class="mdl-textfield mdl-js-textfield" style="margin-bottom: 0.5em;">
      <input name="email" class="mdl-textfield__input" required type="email" id="email">
      <label class="mdl-textfield__label" for="email">Email</label>
    </div>
    <label class="mdl-textfield--floating-label" for="password">Please enter your password</label>
    <div class="mdl-textfield mdl-js-textfield" style="margin-bottom: 0.5em;">
      <input name="password" class="mdl-textfield__input" required type="password" id="password">
      <label class="mdl-textfield__label" for="password">Password</label>
    </div>
    <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="stayloggedin">
      <input name="stayloggedin" type="checkbox" id="stayloggedin" class="mdl-checkbox__input" value="1">
      <span class="mdl-checkbox__label">Stay signed in</span>
    </label>
    
    <?php } ?>

      <div class="g-recaptcha" data-sitekey="your_site_key" style="padding-top: 1.5em; padding-bottom: 1.5em"></div>

  </div>
  <div class="mdl-card__actions mdl-card--border">
    <button name="login" type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" style="margin-left: 0.5em;">
      Sign In
    </button>
    <button onclick="window.location.href='reset.php'" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
      Need Help?
    </button>
  </div>
  </form>

</div>
</main>
<?php if(isset($errorinfo)) { ?>
<div id="error-toast" class="mdl-js-snackbar mdl-snackbar">
  <div class="mdl-snackbar__text" style="margin-right: 11px"></div>
  <button class="mdl-snackbar__action" type="button" style="display:none"></button>
</div>
<?php } ?>

<script>
r(function(){
    var snackbarContainer = document.querySelector('#error-toast');
    var data = {
      message: '<?php echo $errorinfo ?>',
      timeout: 10000
    };
    snackbarContainer.MaterialSnackbar.showSnackbar(data);
});
function r(f){ /in/.test(document.readyState)?setTimeout('r('+f+')',1):f()}
</script>

</body>
</html>
<script src="js/material.js"></script>