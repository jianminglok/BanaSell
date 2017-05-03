<?php
session_start();

$_SESSION['previous4'] = basename($_SERVER['PHP_SELF']);

include_once 'dbconnect.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>BanaSell - Watchlist</title>
	
</head>
<body style="background-image: url('img/background.jpg'); height:100%; background-size: 100% 100%;
        background-repeat: no-repeat;
        background-position: left top;">   


<?php $page = 'watchlist.php'; include('nav.php'); ?>
<style>
.card1 {
	display:flex;
}
</style>
 <main class="mdl-layout__content" >

<?php if(isset($_SESSION['usr_id'])!="") { 
$usr_id = $_SESSION['usr_id'];  
?>


<?php

if(isset($_POST['testform'])) {

$_SESSION['testsubject'] = $_POST['test'];


 } else {  $check = mysqli_query($con, "SELECT * FROM watchlist_keys where `usr_id` = '" . $usr_id . "'"); ?>
<div class="banasell-more-section">
    <a name="ads"></a>
    <div class="banasell-section-title mdl-typography--display-1" style="color:white">Watchlist</div>
          <div class="banasell-card-container mdl-grid">

 

<?php 

while($row = mysqli_fetch_array($check)) { ?>

<?php
	
$test = $row['key'];
$test2 = $row['usr_id'];
$check2 = mysqli_query($con, "SELECT * FROM checklist WHERE $test = '1'");

$i = 0; while($row3 = mysqli_fetch_array($check2)) { 

	$test7 = $row3['key'];

	$check3 = mysqli_query($con, "SELECT * FROM books WHERE `key` = '" . $test7 . "'");
	
	
	while($row2 = mysqli_fetch_array($check3)) {
	
		$i++;	
			
		$test4 = $row['no'];	
		$test5 = $row['new_no'];	

		if($test4 == 0) {
			$check5 = mysqli_query($con, "UPDATE watchlist_keys SET `no` = '$i' WHERE `key` = '".$test."' AND `usr_id` = '".$usr_id."'");		
		}
		
	}
	
}

$test4 = $row['no'];
$test5 = $row['new_no'];	

if($i > $test4 && $test4 != 0 && $i != $test5) {
	$check5 = mysqli_query($con, "UPDATE watchlist_keys SET `new_no` = '$i' WHERE `key` = '".$test."' AND `usr_id` = '".$usr_id."'");
  ?><script>window.location.reload(true);</script><?php
} 
 ?>

 	<style>
		
		@media (min-width: 840px) {
    .test1 {
        width: calc(33.3333333333%) !important;
    }
    }

    @media (max-width: 479px) {
    .test1 {
    width: calc(100%) !important;
    }
    }
		</style>

 <form name="testform" class="test1 card1 mdl-cell--4-col" method="POST" action="watchlistresults.php" id="form1">
 	<div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp" style="width: 100%;">
              <div class="mdl-card__media" style="height: 200px; background-color: #f0eded; position: relative;">
                <img src="">
              </div>
              <div class="mdl-card__title">
                 <h4 class="mdl-card__title-text"><?php echo $test;  ?></h4>
              </div>
              <div class="mdl-card__supporting-text">

              </div>
			   <input type="hidden" name="test" value="<?php echo $test;  ?>">
              <div class="mdl-card__actions mdl-card--border">
 <button type="submit" name="testform" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" style="font-size:16px; font-weight: 500;" href="#" >Select</button>
			  </div>
			  
				<div class="mdl-card__menu"><?php if($test5 > $test4) { ?>
    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" disabled>
      <i class="material-icons">fiber_new</i>
    </button>
				<?php } ?> 
  </div>
            </div>
</form>


<?php 	} ?> <style>
.card2 {
	display:none !important;
}
</style> <?php 


 } ?></div><button onclick="window.location.href='watchlistadd.php'" class="card1 mdl-button mdl-js-button mdl-button--raised" style="background: #da4932; bottom:1px; margin-bottom:25px; position:fixed; right:40px; z-index:998;">
				Add Another Book
			</button>

			<button class="card2 mdl-button mdl-js-button mdl-button--raised" onclick="window.location.href='watchlist.php'" style="background: #da4932; bottom:1px; margin-bottom:25px; position:fixed; right:40px; z-index:998;">
				Select Another Book
			</button>

</main>
<?php } else { $errorinfo = 'Please sign in to access your watchlist. Thanks.'; ?>

<p style="color: white; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 17px;">Please sign in to access your watchlist. <a href="login.php">You can sign in here.</a></p>

<?php } ?>      

  </body>
</html>

<?php if(isset($errorinfo)) { ?>
<div id="error-toast" class="mdl-js-snackbar mdl-snackbar">
  <div class="mdl-snackbar__text" style="margin-right: 10px"></div>
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
 
<?php } elseif(isset($_SESSION['error_info'])) { ?>
<div id="error-toast" class="mdl-js-snackbar mdl-snackbar">
  <div class="mdl-snackbar__text" style="margin-right: 9px"></div>
  <button class="mdl-snackbar__action" type="button" style="display:none"></button>
</div>


<script>
r(function(){
    var snackbarContainer = document.querySelector('#error-toast');
    var data = {
      message: '<?php echo $_SESSION['error_info']; ?>',
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