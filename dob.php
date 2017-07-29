<?php 

session_start();

$_SESSION['previous'] = basename($_SERVER['PHP_SELF']);

if(isset($_POST['birthdateup'])) { 

	date_default_timezone_set ("Asia/Kuching");
    $dateofreg1=date("d M Y");
    $dbd=$_POST['birthdate'];
    $_SESSION['birthdate']=$dbd;
    $startTimeStamp = strtotime($dbd);
    $endTimeStamp = strtotime($dateofreg1);
    $timeDiff = abs($endTimeStamp - $startTimeStamp);
    $birthDate =$dbd;
    $birthDate = explode("-", $birthDate);
    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
    ? ((date("Y") - $birthDate[0]) - 1)
    : (date("Y") - $birthDate[0]));

    if(!empty($_SESSION['birthdate'])) {
        header('Location: register.php');
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Ogiebooks - Sign Up</title>
	
</head>
<body style="background-image: url('img/background.jpg'); height:100%; background-size: 100% 100%;
        background-repeat: no-repeat;
        background-position: left top;">   

<?php $page = 'dob.php'; include('nav2.php'); ?>

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
      
			
			<div class="demo-card-wide mdl-card mdl-shadow--2dp" style=" margin: 45px 0;
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
					<label class="mdl-textfield--floating-label	" for="email">Please select your date of birth to continue</label>
					<div class="mdl-textfield mdl-js-textfield" style="margin-bottom: 0.5em;">
						<input name="birthdate" class="mdl-textfield__input" required type="date" min="<?php $time2 = new DateTime(); $time2->setDate($time2->format('Y'), 1, 1);
$newtime2 = $time2->modify('-170 year')->format('Y-m-d');  echo $newtime2; ?>" max="<?php $time = new DateTime(); $time->setDate($time->format('Y'), 12, 31);
$newtime = $time->modify('-12 year')->format('Y-m-d');  echo $newtime; ?>">
					</div>
				</div>
				<div class="mdl-card__actions mdl-card--border">
					<button name="birthdateup" type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" style="margin-left: 0.5em;">
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



</body>
</html>
<script src="js/material.js"></script>