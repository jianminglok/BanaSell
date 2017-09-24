<?php
session_start();

unset($errormsg);

include_once 'dbconnect.php';
include_once 'function.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
	$title = mysqli_real_escape_string($con, $_POST['title']);
	$description = mysqli_real_escape_string($con, $_POST['description']);
	$condition = mysqli_real_escape_string($con, $_POST['condition']);
	$contact = mysqli_real_escape_string($con, $_POST['contact']);
	$price = mysqli_real_escape_string($con, $_POST['price']);
	$dateofsubmit = mysqli_real_escape_string($con, $_POST['dateofsubmit']);

	$good = hate_bad($title);   	

	for($i=0; $i < sizeof($good); $i++)
    {
        $title = $good[$i];
	}
	
	$good2 = hate_bad($description);   	
	
		for($i=0; $i < sizeof($good2); $i++)
		{
			$description =  $good2[$i];
		}

	

		

	//name can contain only alpha characters and space
	if (!preg_match('/^[0-9]+(\\.[0-9]+)?$/',$price)) {
		$error = true;
		$price_error = "Pricing can only contain numbers and decimals.";
	} else {
	}

	$key2 = md5($dateofsubmit.time());

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
                mkdir("uploaded/$desired_dir", 0777);		// Create directory if it does not exist
            }
            if(is_dir("uploaded/$desired_dir/".$tmp_name_array[$i])==false){
                move_uploaded_file($tmp_name_array[$i],"uploaded/$desired_dir/".$i.".".$extension);
                
            }
			$test = "$desired_dir/".$i.".".$extension;
			$test3 = $i.".".$extension;
			if($extension != null) {
			mysqli_query($con, "INSERT INTO path_keys(`path`,`name`,`key`,`usr_id`) VALUES('".$test."','".$test3."','".$key2."','".$_SESSION['usr_id']."')");
			}
        }else{
                print_r($errors);
        }
    }  
    
	
	if(empty($error)){
	}

	$form = $_POST['form'];

	if(!empty($_POST['whatsapp'])) {
		$whatsapp = 1;
	} else {
		$whatsapp = 0;
	}

	if(!empty($_POST['wechat'])) {
		$wechat = 1;
	} else {
		$wechat = 0;
	}

	if(!empty($_POST['facebook']) && !empty($_POST['fb'])) {
		$facebook = 1;
	} else {
		$facebook = 0;
		$_POST['fb'] = NULL;
	}

	if (mysqli_query($con, "INSERT INTO books(`name`,title, description, `condition`, contact, pricing, `date`, form, usr_id, whatsapp, wechat, facebook, fb_name, `key`) VALUES('" . $_SESSION['usr_name'] . "','" . $title . "', '" . $description . "', '" . $condition . "', '" . $contact . "', '" . $price . "', '" . $dateofsubmit . "', '" . $form . "','" . $_SESSION['usr_id'] . "','" . $whatsapp . "','" . $wechat . "','" . $facebook . "','" . $_POST['fb'] . "','" . $key2 . "')")) {
		$sql = "CREATE TABLE IF NOT EXISTS $form (
			`id` int(10) NOT NULL AUTO_INCREMENT,
		   
			PRIMARY KEY (`id`),

			`key` varchar(100) NOT NULL
			
			)";

if ($con->query($sql) === TRUE) {
	
 } else {
	 echo "Error creating table: " . $con->error;
	 exit();
 }

 $num_of_books = sizeof($_POST['booksname']);

 $subject_name = "_subject";
 $book_name = "book_";

 echo "Number of books: ".$num_of_books;
 echo '<br />';

for($i=1; $i <= $num_of_books; $i++) {

 
 $col = mysqli_query($con, "SELECT book_$i FROM  `$form`");
 
 if(!$col) {

 $sql2 = "ALTER TABLE $form ADD book_$i  VARCHAR(100)";
 

 if ($con->query($sql2) === TRUE) {
	 
 } else {
	 echo "Error creating table: " . $con->error;
	 exit();
 }

}

$book_subject = $book_name . $i . $subject_name;
$col2 = mysqli_query($con, "SELECT $book_subject FROM  `$form`");

if(!$col2) {

$sql3 = "ALTER TABLE $form ADD $book_subject  VARCHAR(100)";


if ($con->query($sql3) === TRUE) {
	
} else {
	echo "Error creating table: " . $con->error;
	exit();
}

}

}

for($i = 0; $i <= $num_of_books - 1; $i++) {
    if(isset($_POST['booksname'][$i])) {

            echo $i;
            echo '<br />';
        
            ${"booksname" . $i} = $_POST['booksname'][$i];
            echo 'value of booksname'. $i .' is not null';
            echo '<br />';

            if($_POST['subject'][$i] != '') {
            ${"subject" . $i} = $_POST['subject'][$i];
            echo 'value of subject'. $i .' is not null';
            echo '<br />';
            } 
             
            } 
}


$sql = mysqli_query($con, "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$form'");
$row = mysqli_fetch_array($sql);
	while($row = mysqli_fetch_array($sql)){
		
		$output[] = $row['COLUMN_NAME'];                
	}

	$json = json_encode($_POST['booksname']);
	$phpStringArray = str_replace(array("{", "}", ":"), 
								  array("array(", "}", "=>"), $json);

	echo '<br />';     
	
	$id = null;
					
	if(mysqli_query($con, "INSERT INTO $form(`key`) VALUES('" . $key2 . "')")) {

	for($i=0; $i < $num_of_books; $i++) {      
		
		echo 'Current value of i is: ' . $i;
		echo '<br />';

		$v = $i + 1;
		$z = $i + 2;           

		

		if($id != null) {

			$id4 = $con->insert_id;

			$v = $v + $i;
			$z = $z + $i; 

			echo 'Current value of i is: ' . $i;
			echo '<br />';
			echo 'Current value of v is: ' . $v;
			echo '<br />';
			echo 'Current value of z is: ' . $z;
			echo '<br />';
			
			if(mysqli_query($con, "UPDATE $form SET `$output[$v]` = '${"booksname" . $i}' WHERE `id` = $id")) {
			
			mysqli_query($con, "UPDATE $form SET `$output[$z]` = '${"subject" . $i}' WHERE `id` = $id");

			
			
			}
							
		   
		} else {

			echo 'Current value of i is: ' . $i;
			echo '<br />';
			echo 'Current value of v is: ' . $v;
			echo '<br />';
			echo 'Current value of z is: ' . $z;
			echo '<br />';
			
			

		if(mysqli_query($con, "INSERT INTO $form(`key`, `$output[$v]`) VALUES ('$key2','${"booksname" . $i}')")) {            
			$id = $con->insert_id;

			echo $id;
			

			mysqli_query($con, "UPDATE $form SET `$output[$z]` = '${"subject" . $i}' WHERE `id` = $id");
			
		} else {
			
			echo("Error description: " . mysqli_error($con));

			echo '<br />';
			echo '<br />';
		}
		
	}
	}
	
	mysqli_query($con, "DELETE FROM $form WHERE `id` != '".$id."' AND `key` = '".$key2."'");	
	}
	


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
	


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Ogiebooks - Post an Ad</title>
	
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

<?php $page = 'submitbooks.php'; include('nav.php'); ?>

<?php 
  //date in mm/dd/yyyy format; or it can be in other formats as well
  $dateofsubmit = date("m/d/Y");
?>

<main class="mdl-layout__content">
<?php if(isset($_SESSION['usr_id'])!="") { ?>
    <section class="mdl-layout__tab-panel" id="fixed-tab-1">
		
    </section>
    <section class="mdl-layout__tab-panel is-active" id="fixed-tab-2">
      <div class="page-content">
					<!-- Wide card with share menu button -->
		<style>
		.demo-card-wide.mdl-card {
			width: 350px;
			height: 1506px;
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
     <div class="demo-card-wide mdl-card mdl-shadow--2dp" id="form_card" style=" margin: 45px 0;
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
						<input name="contact" class="mdl-textfield__input" required type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="contact">
						<label class="mdl-textfield__label" for="contact">Phone Number</label>
						<span class="mdl-textfield__error">Phone number can only contain numbers</span>
					</div>

					<label class="mdl-textfield--floating-label	" for="price">Please indicate your selling price in RM</label>
					<div class="mdl-textfield mdl-js-textfield" style="margin-bottom: 1em;">
						<input name="price" class="mdl-textfield__input" required type="text" pattern="[0-9]+([\.,][0-9]+)?" id="price">
						<label class="mdl-textfield__label" for="price">Price</label>
						<span class="mdl-textfield__error">Selling price can only contain numbers and decimals and it must end with a number</span>
					</div>

					<label class="mdl-textfield--floating-label	" for="fb">Please enter your facebook name if you would like buyers to contact you through this method</label>
					<div class="mdl-textfield mdl-js-textfield" style="margin-bottom: 1em;">
						<input name="fb" class="mdl-textfield__input" type="text"  id="fb">
						<label class="mdl-textfield__label" for="price">Facebook Name</label>
						
					</div>

					<?php if (isset($upload_error)) { ?>
					<label class="mdl-textfield--floating-label	" for="uploadFile">Please upload photos of your books (maximum 8)</label>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--file is-invalid">
						<input class="mdl-textfield__input" placeholder="File" type="text" id="uploadFile" accept="image/jpg, image/jpeg, image/png, image/gif" readonly/ style="box-sizing: border-box; width: calc(100% - 32px);">
						<div class="mdl-button mdl-button--primary mdl-button--icon mdl-button--file" style="right: 0;">
						<i class="material-icons">attach_file</i>
						<input type="file" id="uploadBtn" style="cursor: pointer; height: 100%; right: 0; opacity: 0; position: absolute; top: 0; width: 300px; z-index: 4;">
						</div>
						<span class="mdl-textfield__error"><?php echo $upload_error; ?></span>
					</div>	
					<?php } else { ?>
					<label class="mdl-textfield--floating-label	" for="uploadFile">Please upload photos of your books (maximum 8, each maximum 8MB)</label>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--file" style="margin-bottom: 1em;">
						<input class="mdl-textfield__input" placeholder="File" type="text" id="uploadFile" accept="image/jpg, image/jpeg, image/png, image/gif" readonly/ style="box-sizing: border-box; width: calc(100% - 32px);">
						<div class="mdl-button mdl-button--primary mdl-button--icon mdl-button--file" style="right: 0;">
						<i class="material-icons">attach_file</i>
						<input type="file" name="files[]" accept="image/x-png,image/gif,image/jpeg" multiple=""  id="uploadBtn" style="cursor: pointer; height: 100%; right: 0; opacity: 0; position: absolute; top: 0; width: 300px; z-index: 4;">
						</div>
					</div>	

					<?php } ?>
					
					<label class="mdl-textfield--floating-label	" for="" >Buyers can contact me via:</label>
					<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="whatsapp" style="margin-top: 1em;
					padding-bottom: 2em;">
										<input name="whatsapp" type="checkbox" id="whatsapp" class="mdl-checkbox__input" value="1">
										<span class="mdl-checkbox__label">WhatsApp</span>
									</label>

					<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="wechat" style="margin-top: 1em;
    padding-bottom: 2em;">
						<input name="wechat" type="checkbox" id="wechat" class="mdl-checkbox__input" value="1">
						<span class="mdl-checkbox__label">Wechat</span>
					</label>

					<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="facebook" style="margin-top: 1em;
    padding-bottom: 4em;">
						<input name="facebook" type="checkbox" id="facebook" class="mdl-checkbox__input" value="1">
						<span class="mdl-checkbox__label">Facebook</span>
					</label>

					<label class="mdl-textfield--floating-label" for="form">Which form are the books for?</label>
					<div class="mdl-selectfield mdl-js-selectfield" id="div_dbd" style="margin-bottom: 0.9em;">
						<select name="form" required class="mdl-selectfield__select mdl-textfield__input">
							<option></option>
							<option value="f1">Junior 1</option>
							<option value="f2">Junior 2</option>
							<option value="f3">Junior 3</option>
							<option value="f4">Senior 1</option>
							<option value="f5">Senior 2</option>
							<option value="f6">Senior 3</option>
                            <option value="others">Others</option>
						</select>
						<label class="mdl-selectfield__label" for="myselect">Choose your form</label>
					</div>   
                    				
					<label class="mdl-textfield--floating-label	" for="name">Please enter the name of your books</label>
					<div class="mdl-textfield mdl-js-textfield " style="padding-top: 0em;">
                    <div class="mdl-cell mdl-cell--12-col mdl-grid" style="margin: 0 0; padding: 0 0; width: 100%;">
                    <div class="mdl-cell mdl-cell--7-col mdl-cell--5-col-tablet mdl-cell--5-col-phone" style="float:left; margin: 0 0;">
                        <input name="booksname[]" class="mdl-textfield__input" value="" required="true" type="text" id="name" style="padding-top:1.1em; height: 25px; width: 155px">
                        <label class="mdl-textfield__label" for="booksname[]" style="width: 155px;height:43px;">Name</label>
						</div>
                        <div class="mdl-cell mdl-cell--5-col mdl-cell--3-col-tablet mdl-cell--3-col-phone">
						<style>
						#selectfield_js {
							margin-left: 1.5em; 
						}
						</style>
                        <div id="selectfield_js" class="mdl-selectfield mdl-js-selectfield" style="margin-top: -0.5em">
						<select name="subject[]" required class="mdl-selectfield__select mdl-textfield__input">
                            <option></option>
                            <option value="others">OTHERS</option>
							<option value="bm">BM</option>
							<option value="cn">CN</option>
							<option value="en">EN</option>
							<option value="sci">SCI</option>
							<option value="am">AM</option>
                            <option value="em">EM</option>
                            <option value="maths">MATHS</option>
							<option value="sej">SEJ</option>
                            <option value="khb">KHB</option>
                            <option value="mor">MOR</option>
                            <option value="geo">GEO</option>
                            <option value="bio">BIO</option>
                            <option value="chem">CHEM</option>
                            <option value="phy">PHY</option>
                            <option value="chist">CHIST</option>
                            <option value="business">BUS</option>
                            <option value="acc">ACC</option>
                            <option value="econ">ECON</option>
                            <option value="bookkeep">BK</option>
                            <option value="comop">COMP</option>
						</select>
						<label class="mdl-selectfield__label" for="myselect">Subject</label>
                        </div>
                        </div>
					</div>

                    </div>
                    

					<input type="hidden" name="dateofsubmit" required value="<?php echo $dateofsubmit ?>" class="form-control">

				</div>
				<div class="mdl-card__actions mdl-card--border">
				<button name="clearform" onclick="showDiv()" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" style="margin-left: 0.5em;">
						Add another field
					</button>
                    <button type="submit" name="cleardob" onclick="remove()" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" style="margin-left: 0.5em;" formnovalidate>
						Remove field
					</button>
					<button name="signup" type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" style="margin-left: 0.5em;">
						Post Ad
					</button>
				</div>
				</form>
			</div>
			</div>

    </section>

	<?php } else { $errorinfo = 'Please sign in before continuing. Thanks.'; ?>

<p style="color: white; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 17px;">Please sign in to post an ad. <a href="login.php">You can sign in here.</a></p>

<?php } ?>

  </main>


</div>


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

alertHTML = undefined;
approvedHTML = undefined;

	if(this.files.length > 8){
		alert("You can only upload up to 8 images.");
	} else {

		var count=0;
		var count2=0;
    
		for(var x in this.files) {
			var filesize = ((this.files[x].size/1024)/1024).toFixed(4); // MB

        	if (typeof this.files[x].name != "undefined" && filesize <= 8) { 

				if(count > 0) {
					approvedHTML = approvedHTML + ", " + this.files[x].name;
				}
				else {
            		approvedHTML = this.files[x].name;
				}

            count++;	
        } else if(typeof this.files[x].name != "undefined" && filesize > 8) {
			if(count2 > 0) {
					alertHTML = alertHTML + ", " + this.files[x].name;
				}
				else {
            		alertHTML = this.files[x].name;
				}
			count2++;		

		}
		}

		if(count2 > 0) {
			alert(alertHTML + ' exceeds 8MB.');
		}
		
		if(count > 0) {
		if(count > 1) {
    		document.getElementById("uploadFile").value =  count + ' Files (' + approvedHTML + ')';
		} else {
			document.getElementById("uploadFile").value = count + ' File (' + approvedHTML + ')';
		}
		} else {
			document.getElementById("uploadFile").value =  '';
		}
	}
};

</script>

<script>
function showDiv() {
    var field = $("<label></label>").text("Please enter the name of your book");
    field.attr({
        "class" : "mdl-textfield--floating-label",
        "for" : "book"
    });
    var div = $("<div></div>");
    div.attr({
        "class" : "mdl-textfield mdl-js-textfield",
        "style" : "margin-bottom: -1em; ",
    });
    var div2 = $("<div></div>");
    div2.attr({
        "class" : "mdl-cell mdl-cell--12-col mdl-grid",
        "style" : "margin: 0 0; padding: 0 0; width: 100%;",
    });
    var div3 = $("<div></div>");
    div3.attr({
        "class" : "mdl-cell mdl-cell--7-col",
        "style" : "float:left; margin: 0 0;",
    });
    var div4 = $("<div></div>");
    div4.attr({
        "class" : "mdl-cell mdl-cell--5-col"
    });
    var div5 = $("<div></div>");
    div5.attr({
        "class" : "mdl-selectfield mdl-js-selectfield",
        "style" : "margin-left: 1.5em; margin-top: -1.5em",
    });
    var input = $("<input></input>");
    input.attr({
        "name" : "booksname[]",
        "class" : "mdl-textfield__input",
        "required" : "true",
        "type" : "text",
        "id" : "booksname",
        "style" : "height: 21px; width: 155px"
    });
    var label = $("<label></label>").text("Name");
    label.attr({
        "class" : "mdl-textfield__label",
        "for" : "booksname[]",
        "style" : "width: 155px;height:47px;"
    });
    var label2 = $("<label></label>").text("Subject");
    label2.attr({
        "class" : "mdl-selectfield__label",
        "for" : "myselect"
    });
    var select = $("<select></select>");
    select.attr({
        "class" : "mdl-selectfield__select mdl-textfield__input",
        "required" : "true",
        "name" : "subject[]"
    });    
    var option = $("<option></option>");
    var option0 = $("<option></option>").text("OTHERS");
    option0.attr({
        "value" : "others"
    }); 
    var option1 = $("<option></option>").text("BM");
    option1.attr({
        "value" : "bm"
    });    
    var option2 = $("<option></option>").text("CN");
    option2.attr({
        "value" : "cn"
    });    
    var option3 = $("<option></option>").text("EN");
    option3.attr({
        "value" : "en"
    });    
    var option4 = $("<option></option>").text("SCI");
    option4.attr({
        "value" : "sci"
    });    
    var option5 = $("<option></option>").text("AM");
    option5.attr({
        "value" : "am"
    });    
    var option6 = $("<option></option>").text("EM");
    option6.attr({
        "value" : "em"
    });    
    var option7 = $("<option></option>").text("MATHS");
    option7.attr({
        "value" : "maths"
    });    
    var option8 = $("<option></option>").text("SEJ");
    option8.attr({
        "value" : "sej"
    });    
    var option9 = $("<option></option>").text("KHB");
    option9.attr({
        "value" : "khb"
    });    
    var option10 = $("<option></option>").text("MOR");
    option10.attr({
        "value" : "mor"
    });    
    var option11 = $("<option></option>").text("GEO");
    option11.attr({
        "value" : "geo"
    });    
    var option12 = $("<option></option>").text("BIO");
    option12.attr({
        "value" : "bio"
    });    
    var option13 = $("<option></option>").text("CHEM");
    option13.attr({
        "value" : "chem"
    });    
    var option14 = $("<option></option>").text("PHY");
    option14.attr({
        "value" : "phy"
    });    
    var option15 = $("<option></option>").text("CHIST");
    option15.attr({
        "value" : "chist"
    });    
    var option16 = $("<option></option>").text("BUS");
    option16.attr({
        "value" : "bus"
    });    
    var option17 = $("<option></option>").text("ACC");
    option17.attr({
        "value" : "acc"
    });   
    var option18 = $("<option></option>").text("ECO");
    option18.attr({
        "value" : "eco"
    });  
    var option19 = $("<option></option>").text("BK");
    option19.attr({
        "value" : "bk"
    });    
    var option20 = $("<option></option>").text("COMP");
    option20.attr({
        "value" : "comp"
    });   

    div.append(div2);
    div2.append(div3, div4);
    div3.append(input,label);
    div4.append(div5);
    div5.append(select,label2);
    select.append(option,option0,option1,option2,option3,option4,option5,option6,option7,option8,option9,option10,option11,option12,option13,option14,option15,option16,option17,option18,option19,option20)
    $("#div_dbd").after(field,div); 
    var height = $("#form_card").height() + 101;
    $('#form_card').css("height", height); 
    componentHandler.upgradeDom();    // Append the new elements 
}

function remove() {
    $("#form-id div:last child").last().remove();
    var height = $("#form_card").height() - 101;
    $('#form_card').css("height", height); 
    componentHandler.upgradeDom();    // Append the new elements 
}
</script>



</body>
</html>
<script src="js/material.js"></script>
<script src="js/mdl-selectfield.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>