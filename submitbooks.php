<?php
session_start();

unset($errormsg);

include_once 'dbconnect.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
	$title = mysqli_real_escape_string($con, $_POST['title']);
	$description = mysqli_real_escape_string($con, $_POST['description']);
	$condition = mysqli_real_escape_string($con, $_POST['condition']);
	$contact = mysqli_real_escape_string($con, $_POST['contact']);
	$price = mysqli_real_escape_string($con, $_POST['price']);
	$form = mysqli_real_escape_string($con, $_POST['form']);
	$dateofsubmit = mysqli_real_escape_string($con, $_POST['dateofsubmit']);

	//name can contain only alpha characters and space
	if (!preg_match('/^[0-9]+(\\.[0-9]+)?$/',$price)) {
		$error = true;
		$price_error = "Pricing can only contain numbers and decimals.";
	} else {
	}

	$key2 = $_SESSION['key2'];

	if(!$error) {
	$name_array = $_FILES['files']['name'];
     $tmp_name_array = $_FILES['files']['tmp_name'];
     // Number of files
     $count_tmp_name_array = count($tmp_name_array);

    for($i = 0; $i < $count_tmp_name_array; $i++){
          // Get extension of current file
          $extension = pathinfo($name_array[$i] , PATHINFO_EXTENSION);
        		
        $desired_dir="$key2";
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);		// Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$tmp_name_array[$i])==false){
                move_uploaded_file($tmp_name_array[$i],"$desired_dir/".$i.".".$extension);
                
            }
			$test = "$desired_dir/".$i.".".$extension;
			$test3 = $i.".".$extension;
			mysqli_query($con, "INSERT INTO path_keys(`path`,`name`,`key`,`usr_id`) VALUES('".$test."','".$test3."','".$key2."','".$_SESSION['usr_id']."')");
        }else{
                print_r($errors);
        }
    }  
    
	
	if(empty($error)){
	}

	if (mysqli_query($con, "INSERT INTO books(title, description, `condition`, contact, pricing, `date`, form, usr_id, `key`) VALUES('" . $title . "', '" . $description . "', '" . $condition . "', '" . $contact . "', '" . $price . "', '" . $dateofsubmit . "', '" . $form . "','" . $_SESSION['usr_id'] . "','" . $key2 . "')")) {
		if (mysqli_query($con, "INSERT INTO checklist(`chi_s1_1_sc`,`chi_s1_2_sc`,`chi_j1_1_sc`,`chi_j1_2_sc`,`kupasan_s1_sc`,`jaket_s1_sc`,`dinara_s1_sc`,`think_s1_sc`,`poems_s1_sc`,`sejarah_s1_sc`,`nexus_s1_sc`,`comp_s1_sc`,`addmaths_s1_1_sc`,`addmaths_s1_2_sc`,`bio_s1_sc`,`chem_s1_sc`,`phy_s1_sc`,`key`) VALUES('" . $_SESSION['chi_s1_1_sc'] . "', '" . $_SESSION['chi_s1_2_sc'] . "', '" . $_SESSION['chi_j1_1_sc'] . "', '" . $_SESSION['chi_j1_2_sc'] . "', '" . $_SESSION['kupasan_s1_sc'] . "', '" . $_SESSION['jaket_s1_sc'] . "', '" . $_SESSION['dinara_s1_sc'] . "', '" . $_SESSION['think_s1_sc'] . "', '" . $_SESSION['poems_s1_sc'] . "', '" . $_SESSION['sejarah_s1_sc'] . "', '" . $_SESSION['nexus_s1_sc'] . "', '" . $_SESSION['comp_s1_sc'] . "', '" . $_SESSION['addmaths_s1_1_sc'] . "', '" . $_SESSION['addmaths_s1_2_sc'] . "', '" . $_SESSION['bio_s1_sc'] . "', '" . $_SESSION['chem_s1_sc'] . "', '" . $_SESSION['phy_s1_sc'] . "', '" . $key2 . "')")) {
		unset($_SESSION['key2']);
		unset($_SESSION['chi_s1_1_sc']);
		unset($_SESSION['chi_s1_2_sc']);
		unset($_SESSION['chi_j1_1_sc']);
		unset($_SESSION['chi_j1_2_sc']);
		unset($_SESSION['kupasan_s1_sc']);
		unset($_SESSION['jaket_s1_sc']);
		unset($_SESSION['dinara_s1_sc']);
		unset($_SESSION['think_s1_sc']);
		unset($_SESSION['poems_s1_sc']);
		unset($_SESSION['sejarah_s1_sc']);
		unset($_SESSION['nexus_s1_sc']);
		unset($_SESSION['comp_s1_sc']);
		unset($_SESSION['addmaths_s1_1_sc']);
		unset($_SESSION['addmaths_s1_2_sc']);
		unset($_SESSION['bio_s1_sc']);
		unset($_SESSION['chem_s1_sc']);
		unset($_SESSION['phy_s1_sc']);
		$message = "Successfully posted ad. <a href='index.php'>Click here if you are not automatically redirected to the home page.</a>";
        $_SESSION['message'] = $message;
        $redirect = "index.php";
        $_SESSION['redirect'] = $redirect;
        $redirect_time = "3";
        $_SESSION['redirect_time'] = $redirect_time;
        $activity = "Post An Ad";
        $_SESSION['activity'] = $activity;
        header('Location: message.php');
		exit;
		}
	} else {

	}
}
	
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>BanaSell - Post an Ad</title>
	
</head>
<body style="background-image: url('img/background.jpg'); height:100%; background-size: 100% 100%;
        background-repeat: no-repeat;
        background-position: left top;">   
<script type="text/javascript">
	
$('.uploadimage').change(function(){
    if(this.files.length>10)
        alert('too many files')
	});
	// Prevent submission if limit is exceeded.
	$('testform').submit(function(){
	    if(this.files.length>10)
	        return false;
	});

</script>

<?php $page = 'submitbooks.php'; include('nav3.php'); ?>

<?php 
  //date in mm/dd/yyyy format; or it can be in other formats as well
  $dateofsubmit = date("m/d/Y");
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
			height: 1006px;
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
				<div class="mdl-card__title" style="padding-top: 9.9em" >
					<h2 class="mdl-card__title-text">Post an Ad</h2>
				</div>
				<!-- MDL Progress Bar with Indeterminate Progress -->
				<div class="mdl-card__supporting-text" style="overflow-y: auto;">
				<form name="signupform" enctype="multipart/form-data" role="form" id="testform" class="form1" method="post" style="padding-left: 1em; padding-right: 1em; padding-top: 1em; ">  
				<!-- Simple Textfield -->
				
					<label class="mdl-textfield--floating-label	" for="title">Please enter a title for your ad</label>
					<div class="mdl-textfield mdl-js-textfield" style="margin-bottom: 0.5em;">
						<input name="title" class="mdl-textfield__input" required type="text" id="title">
						<label class="mdl-textfield__label" for="title">Title</label>
					</div>

					<label class="mdl-textfield--floating-label	" for="description">Please enter a description for your ad</label>
					<div class="mdl-textfield mdl-js-textfield" style="margin-bottom: 0.5em;">
						<textarea name="description" class="mdl-textfield__input" id="description" maxlength="500" rows="6"></textarea>
					</div>

					<label class="mdl-textfield--floating-label	" for="condition">Condition of your books</label>
					<div class="mdl-selectfield mdl-js-selectfield">
						<select name="condition" id="condition" required class="mdl-selectfield__select mdl-textfield__input">
							<option></option>
							<option value="4">Excellent</option>
					      	<option value="3">Good</option>
					      	<option value="2">Moderate</option>
					      	<option value="1">Poor</option>
						</select>
						<label class="mdl-selectfield__label" for="myselect">Choose an option</label>
					</div>

					<label class="mdl-textfield--floating-label	" for="contact">Please enter your phone number</label>
					<div class="mdl-textfield mdl-js-textfield" style="margin-bottom: 0.5em;">
						<input name="contact" class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="contact">
						<label class="mdl-textfield__label" for="contact">Phone Number</label>
						<span class="mdl-textfield__error">Phone number can only contain numbers</span>
					</div>

					<label class="mdl-textfield--floating-label	" for="price">Please indicate your selling price in RM</label>
					<div class="mdl-textfield mdl-js-textfield" style="margin-bottom: 1em;">
						<input name="price" class="mdl-textfield__input" type="text" pattern="[0-9]+([\.,][0-9]+)?" id="price">
						<label class="mdl-textfield__label" for="price">Price</label>
						<span class="mdl-textfield__error">Selling price can only contain numbers and decimals and it must end with a number</span>
					</div>

					<label class="mdl-textfield--floating-label	" for="form">Which form are your books for?</label>
					<div class="mdl-selectfield mdl-js-selectfield">
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

					<?php if (isset($upload_error)) { ?>
					<label class="mdl-textfield--floating-label	" for="uploadFile">Please upload photos of your books</label>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--file is-invalid">
						<input class="mdl-textfield__input" placeholder="File" type="text" id="uploadFile" readonly/ style="box-sizing: border-box; width: calc(100% - 32px);">
						<div class="mdl-button mdl-button--primary mdl-button--icon mdl-button--file" style="right: 0;">
						<i class="material-icons">attach_file</i>
						<input type="file" id="uploadBtn" style="cursor: pointer; height: 100%; right: 0; opacity: 0; position: absolute; top: 0; width: 300px; z-index: 4;">
						</div>
						<span class="mdl-textfield__error"><?php echo $upload_error; ?></span>
					</div>	
					<?php } else { ?>
					<label class="mdl-textfield--floating-label	" for="uploadFile">Please upload photos of your books</label>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--file">
						<input class="mdl-textfield__input" placeholder="File" type="text" id="uploadFile" readonly/ style="box-sizing: border-box; width: calc(100% - 32px);">
						<div class="mdl-button mdl-button--primary mdl-button--icon mdl-button--file" style="right: 0;">
						<i class="material-icons">attach_file</i>
						<input type="file" name="files[]" accept="image/x-png,image/gif,image/jpeg" multiple=""  id="uploadBtn" style="cursor: pointer; height: 100%; right: 0; opacity: 0; position: absolute; top: 0; width: 300px; z-index: 4;">
						</div>
					</div>	
					<?php } ?>

					<input type="hidden" name="dateofsubmit" required value="<?php echo $dateofsubmit ?>" class="form-control">

				</div>
				<div class="mdl-card__actions mdl-card--border">
					<button name="signup" type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" style="margin-left: 1.5em;">
						Post Ad
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

document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.files[0].name;
};


</script>



</body>
</html>
<script src="js/material.js"></script>
<script src="js/mdl-selectfield.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>