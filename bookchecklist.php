<?php
session_start();

$_session['timeout'] = time();

if (isset($_SESSION['usr_id']) != "") {
	header("Location: index.php");
}

include_once 'dbconnect.php';

//check if form is submitted
if (isset($_POST['login'])) {

	$email = $_POST['email'];

	$check = mysqli_query($con, "SELECT * FROM confirm WHERE email = '$email'");
	$row = mysqli_fetch_array($check, MYSQLI_ASSOC);
	if (mysqli_num_rows($check) != 1) {

		if (!empty($_POST['stayloggedin'])) {
			$_SESSION['stayloggedin'] = strtotime(date("Y-m-d ") . "23:59:59");
		}

		$email = mysqli_real_escape_string($con, $_POST['email']);
		$password = mysqli_real_escape_string($con, $_POST['password']);
		$result = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $email . "' and password = '" . md5($password) . "'");

		if ($row = mysqli_fetch_array($result)) {
			$_SESSION['usr_id'] = $row['id'];
			$_SESSION['usr_name'] = $row['name'];
			$_SESSION['timeout'] = time();
			header("Location: index.php");
		} else {
			$errormsg = "Your username or password is incorrect.";
		}
	} else {
		$errormsg = "Your account is not activated or your new email address has not been verified.";
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Ogiebooks - Sign In</title>
</head>

<body>

	<?php $page = 'login.php';
	include('nav.php'); ?>

	<div class="container">
		<div class="row flex-items-xs-middle">
			<div class="">
				<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 50%">
					<fieldset>
						<legend>Login</legend>

						<div class="form-group">
							<div class="form-check">
								<label class="form-check-label">
									<input class="form-check-input" name="stayloggedin" type="checkbox" value="1">
									Stay logged in
								</label>
							</div>
						</div>

						<div class="form-group">
							<input type="submit" name="login" value="Login" class="btn btn-primary" />
						</div>

						<span class="text-danger"><?php if (isset($errormsg)) {
														echo $errormsg;
													} ?></span>
					</fieldset>
					<div class="text-center">
						<a href="reset.php">Forgot Password?</a>
					</div>

				</form>

			</div>
		</div>
	</div>

	<script src="js/jquery-1.10.2.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>