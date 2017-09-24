<?php
session_start();

unset($errormsg);

include_once 'dbconnect.php';

//set validation error flag as false
$error = false;

$dateofsubmit = date("m/d/Y");

//check if form is submitted
if (isset($_POST['signup'])) {
	if (isset($_POST['1'])) {
		$chi_s1_1_sc = "1";
		$_SESSION['chi_s1_1_sc'] = "1";
	} else {
		$chi_s1_1_sc = "0";
		$_SESSION['chi_s1_1_sc'] = "0";
	}

	if (isset($_POST['2'])) {
		$chi_s1_2_sc = "1";
		$_SESSION['chi_s1_2_sc'] = "1";
	} else {
		$chi_s1_2_sc = "0";
		$_SESSION['chi_s1_2_sc'] = "0";
	}
    
    if (isset($_POST['3'])) {
		$chi_j1_1_sc = "1";
		$_SESSION['chi_j1_1_sc'] = "1";
	} else {
		$chi_j1_1_sc = "0";
		$_SESSION['chi_j1_1_sc'] = "0";
	}
        
    if (isset($_POST['4'])) {
		$chi_j1_2_sc = "1";
		$_SESSION['chi_j1_2_sc'] = "1";
	} else {
		$chi_j1_2_sc = "0";
		$_SESSION['chi_j1_2_sc'] = "0";
	}
    
	if (isset($_POST['5'])) {
		$kupasan_s1_sc = "1";
		$_SESSION['kupasan_s1_sc'] = "1";
	} else {
		$kupasan_s1_sc = "0";
		$_SESSION['kupasan_s1_sc'] = "0";
	}

	if (isset($_POST['6'])) {
		$jaket_s1_sc = "1";
		$_SESSION['jaket_s1_sc'] = "1";
	} else {
		$jaket_s1_sc = "0";
		$_SESSION['jaket_s1_sc'] = "0";
	}
        
	if (isset($_POST['7'])) {
		$dinara_s1_sc = "1";
		$_SESSION['dinara_s1_sc'] = "1";
	} else {
		$dinara_s1_sc = "0";
		$_SESSION['dinara_s1_sc'] = "0";
	}

	if (isset($_POST['8'])) {
		$think_s1_sc = "1";
		$_SESSION['think_s1_sc'] = "1";
	} else {
		$think_s1_sc = "0";
		$_SESSION['think_s1_sc'] = "0";
	}

	if (isset($_POST['9'])) {
		$poems_s1_sc = "1";
		$_SESSION['poems_s1_sc'] = "1";
	} else {
		$poems_s1_sc = "0";
		$_SESSION['poems_s1_sc'] = "0";
	}

	if (isset($_POST['10'])) {
		$sejarah_s1_sc = "1";
		$_SESSION['sejarah_s1_sc'] = "1";
	} else {
		$sejarah_s1_sc = "0";
		$_SESSION['sejarah_s1_sc'] = "0";
	}

	if (isset($_POST['11'])) {
		$nexus_s1_sc = "1";
		$_SESSION['nexus_s1_sc'] = "1";
	} else {
		$nexus_s1_sc = "0";
		$_SESSION['nexus_s1_sc'] = "0";
	}

	if (isset($_POST['12'])) {
		$comp_s1_sc = "1";
		$_SESSION['comp_s1_sc'] = "1";
	} else {
		$comp_s1_sc = "0";
		$_SESSION['comp_s1_sc'] = "0";
	}

	if (isset($_POST['13'])) {
		$addmaths_s1_1_sc = "1";
		$_SESSION['addmaths_s1_1_sc'] = "1";
	} else {
		$addmaths_s1_1_sc = "0";
		$_SESSION['addmaths_s1_1_sc'] = "0";
	}

	if (isset($_POST['14'])) {
		$addmaths_s1_2_sc = "1";
		$_SESSION['addmaths_s1_2_sc'] = "1";
	} else {
		$addmaths_s1_2_sc = "0";
		$_SESSION['addmaths_s1_2_sc'] = "0";
	}


	if (isset($_POST['15'])) {
		$bio_s1_sc = "1";
		$_SESSION['bio_s1_sc'] = "1";
	} else {
		$bio_s1_sc = "0";
		$_SESSION['bio_s1_sc'] = "0";
	}

	if (isset($_POST['16'])) {
		$chem_s1_sc = "1";
		$_SESSION['chem_s1_sc'] = "1";
	} else {
		$chem_s1_sc = "0";
		$_SESSION['chem_s1_sc'] = "0";
	}

	if (isset($_POST['17'])) {
		$phy_s1_sc = "1";
		$_SESSION['phy_s1_sc'] = "1";
	} else {
		$phy_s1_sc = "0";
		$_SESSION['phy_s1_sc'] = "0";
	}

	if(empty($_POST['1']) && empty($_POST['2']) && empty($_POST['3']) && empty($_POST['4']) && empty($_POST['5']) && empty($_POST['6']) && empty($_POST['7']) && empty($_POST['8']) && empty($_POST['9']) && empty($_POST['10']) && empty($_POST['11']) && empty($_POST['12']) && empty($_POST['13']) && empty($_POST['14']) && empty($_POST['15']) && empty($_POST['16']) && empty($_POST['17'])) {
		 $errorinfo = "Please select your books before continuing.";
	} else {
		$key2 = md5($dateofsubmit.time());
		$_SESSION['key2'] = $key2;
		header("Location: submitbooks.php");
		exit;
	
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

<?php $page = 'selectbooks.php'; include('nav3.php'); ?>


<?php 
	//date in mm/dd/yyyy format; or it can be in other formats as well
  $dateofsubmit = date("m/d/Y");
?>

 <main class="mdl-layout__content" >

<?php if(isset($_SESSION['usr_id'])!="") { ?>

    <section class="mdl-layout__tab-panel is-active" id="fixed-tab-1" style="width: 100%">
      <div class="page-content" >
				<style>
		.demo-card-wide.mdl-card {
			height: 456px;
		}
		.demo-card-wide > .mdl-card__title {
			color: #fff;
			height: 176px;
			background: #da4932;
		}
		.mdl-card__title > .mdl-card__title-text {
			color: #fff;
		}
		.demo-card-wide > .mdl-card__menu {
			color: #fff;
		}
		.mdl-data-table {
			left: 50%;
			transform: translate(-50%);
		}	
		.mdl-data-table2 {
			margin-top: 1.5em;
			left: 49.8%;
			transform: translate(-49.8%);
		}	
		.mdl-data-table3 {
			margin-top: 2.5em;
			left: 49.9%;
			transform: translate(-50%);
		}	
		.mdl-data-table4 {
			margin-top: 0.5em;
				left: 49.7%;	
				transform: translate(-49.8%);
			}
		.banasell-card-container .mdl-card__supporting-text {
			padding-bottom: 4px;
		}
		.mdl-card__supporting-text {
			height: 57%;
		}
		@media (max-width: 900px) {
			.mdl-data-table {
				left: 49.9%;
				transform: translate(-49.9%);
			}	
			.mdl-data-table2 {
				margin-top: 1.5em;
				left: 49.9%;
				transform: translate(-50%);
			}	
			.mdl-data-table3 {
				margin-top: 2.5em;
				left: 49.5%;
				transform: translate(-49.7%);
			}	
			.mdl-data-table4 {
				margin-top: 0.5em;
				left: 49.9%;	
				transform: translate(-50%);
			}
			.mdl-card__supporting-text {
				height: 57%;
			}
		}

		.test {
			margin-top: 4%;
	padding-left: 30%;
	}
  .test2 {
	width: 80%;
  background-color: #fff;
  margin: 0 auto;
	}
.test3 {
  margin-left: 2em;
}
.test5{
  margin-left: 2em;
}
		</style>

		<div class="mdl-shadow--2dp test2" style=" ">
 
	<!-- Colored raised button -->
	<div class="test" >
  <form style="padding-top: 1em;" method="post" action="filterbooks.php">
<label class="mdl-textfield--floating-label	" for="form" style="position: absolute">Select your form:</label>
					<div class="mdl-selectfield mdl-js-selectfield" style="margin-right: 2em;">
						<select name="form" required class="mdl-selectfield__select mdl-textfield__input">
							<option></option>
              <option value="all">All</option>
							<option value="form1">Junior 1</option>
							<option value="form2">Junior 2</option>
							<option value="form3">Junior 3</option>
							<option value="form4">Senior 1</option>
							<option value="form5">Senior 2</option>
							<option value="form6">Senior 3</option>
						</select>
						<label class="mdl-selectfield__label" for="myselect">Choose your form</label>
					</div>

<!-- Colored raised button -->
<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored test5" style="margin-bottom: 1em; ">
  Apply
</button>
          </form>
</div>
</div>

			<div class="banasell-more-section"><div class="banasell-card-container mdl-grid">
			<div class="demo-card-wide mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp card1">
        <div class="mdl-card__title">
					<h2 class="mdl-card__title-text">Chinese</h2>
				</div>
				<!-- MDL Progress Bar with Indeterminate Progress -->
				<div class="mdl-card__supporting-text" >
				<form method="post" id="testform" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="signupform" enctype="multipart/form-data">
				<table id="table" class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" >
					<thead>
						<tr>
							<th>
									<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-data-table__select1" for="table-header">
										<input type="checkbox" id="table-header" class="mdl-checkbox__input" />
									</label>
							</th>
							<th class="mdl-data-table__cell--non-numeric">Textbook</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
									<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-data-table__select mdl-data-table__select1" for="row[1]">
										<input name="1" value="1" type="checkbox" id="row[1]" class="mdl-checkbox__input" />
									</label>
							</td>
							<td class="mdl-data-table__cell--non-numeric">华文高一上册</td>
						</tr>
						<tr>
							<td>
									<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-data-table__select mdl-data-table__select1" for="row[2]">
										<input name="2" value="1" type="checkbox" id="row[2]" class="mdl-checkbox__input" />
									</label>
							</td>
							<td class="mdl-data-table__cell--non-numeric">华文高一下册</td>
						</tr>
						<tr>
							<td>
									<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-data-table__select mdl-data-table__select1" for="row[3]">
										<input name="3" value="1" type="checkbox" id="row[3]" class="mdl-checkbox__input" />
									</label>
							</td>
							<td class="mdl-data-table__cell--non-numeric">华文初一上册</td>
						</tr>
						<tr>
							<td>
									<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-data-table__select mdl-data-table__select1" for="row[4]">
										<input name="4" value="1" type="checkbox" id="row[4]" class="mdl-checkbox__input" />
									</label>
							</td>
							<td class="mdl-data-table__cell--non-numeric">华文初一下册</td>
						</tr>
					</tbody>
				</table>
				</div>
				<div class="mdl-card__menu">
				</div>
				</div>

         <div class="demo-card-wide mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp card1">
					<div class="mdl-card__title">
						<h2 class="mdl-card__title-text">Bahasa Malaysia</h2>
					</div>
					<!-- MDL Progress Bar with Indeterminate Progress -->
					<div class="mdl-card__supporting-text">
					<table id="table2" class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="margin-top: 1.5em; left: 49.9%;  transform: translate(-49.815%);">
						<thead>
							<tr>
								<th>
									<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-data-table__select2" for="table-header2">
										<input type="checkbox" id="table-header2" class="mdl-checkbox__input" />
									</label>
							</th>
								<th class="mdl-data-table__cell--non-numeric">Textbook</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-data-table__select mdl-data-table__select2" for="row2[1]">
										<input name="5" value="1" type="checkbox" id="row2[1]" class="mdl-checkbox__input" />
									</label>
							</td>
								<td class="mdl-data-table__cell--non-numeric">Kupasan dan Kajian Bijak<br>Komsas Tingakatan 4 </td>
							</tr>
							<tr>
								<td>
									<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-data-table__select mdl-data-table__select2" for="row2[2]">
										<input name="6" value="1" type="checkbox" id="row2[2]" class="mdl-checkbox__input" />
									</label>
							</td>
								<td class="mdl-data-table__cell--non-numeric">Jaket Kulit Kijang Dari Istanbul</td>
							</tr>
							<tr>
								<td>
									<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-data-table__select mdl-data-table__select2" for="row2[3]">
										<input name="7" value="1" type="checkbox" id="row2[3]" class="mdl-checkbox__input" />
									</label>
							</td>
								<td class="mdl-data-table__cell--non-numeric">Di Sebalik Dinara</td>
							</tr>
						</tbody>
					</table>
					</div>
					<div class="mdl-card__menu">
					</div>
					</div>

					<div class="demo-card-wide mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp card1">
						<div class="mdl-card__title">
							<h2 class="mdl-card__title-text">English</h2>
						</div>
						<!-- MDL Progress Bar with Indeterminate Progress -->
						<div class="mdl-card__supporting-text" style="position: relative;">
						<table id="table3" class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="margin-top: 2.5em; left: 49.9%;	transform: translate(-50%);">
							<thead>
								<tr>
									<th>
										<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-data-table__select3" for="table-header3">
											<input type="checkbox" id="table-header3" class="mdl-checkbox__input" />
										</label>
								</th>
									<th class="mdl-data-table__cell--non-numeric">Textbook</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-data-table__select mdl-data-table__select3" for="row3[1]">
											<input name="8" value="1" type="checkbox" id="row3[1]" class="mdl-checkbox__input" />
										</label>
								</td>
									<td class="mdl-data-table__cell--non-numeric">Think Level 4 Student's Book</td>
								</tr>
								<tr>
									<td>
										<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-data-table__select mdl-data-table__select3" for="row3[2]">
											<input name="9" value="1" type="checkbox" id="row3[2]" class="mdl-checkbox__input" />
										</label>
								</td>
									<td class="mdl-data-table__cell--non-numeric">A Collection of Poems,<br>Short Stories and Drama <br>(SPM Form 4)</td>
								</tr>
							</tbody>
						</table>
						</div>
						</div>

						<div class="demo-card-wide mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp card1">
						<div class="mdl-card__title">
							<h2 class="mdl-card__title-text">Sejarah, Moral and Computer</h2>
						</div>
						<!-- MDL Progress Bar with Indeterminate Progress -->
						<div class="mdl-card__supporting-text" style="position: relative;">
						<table id="table4" class="mdl-data-table mdl-data-table2 mdl-js-data-table mdl-shadow--2dp">
							<thead>
								<tr>
									<th>
										<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-data-table__select4" for="table-header4">
											<input type="checkbox" id="table-header4" class="mdl-checkbox__input" />
										</label>
								</th>
									<th class="mdl-data-table__cell--non-numeric">Textbook</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-data-table__select mdl-data-table__select4" for="row4[1]">
											<input name="10" value="1" type="checkbox" id="row4[1]" class="mdl-checkbox__input" />
										</label>
								</td>
									<td class="mdl-data-table__cell--non-numeric">KBSM Sejarah Tingkatan 4</td>
								</tr>
								<tr>
									<td>
										<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-data-table__select mdl-data-table__select4" for="row4[2]">
											<input name="11" value="1" type="checkbox" id="row4[2]" class="mdl-checkbox__input" />
										</label>
								</td>
									<td class="mdl-data-table__cell--non-numeric">Nexus Bestari Pendidikan<br>Moral Tingkatan 4 & 5</td>
								</tr>
								<tr>
									<td>
										<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-data-table__select mdl-data-table__select4" for="row4[3]">
											<input name="12" value="1" type="checkbox" id="row4[3]" class="mdl-checkbox__input" />
										</label>
								</td>
									<td class="mdl-data-table__cell--non-numeric">Computer Knowledge [2017]</td>
								</tr>
							</tbody>
						</table>
						</div>
						</div>

						<div class="demo-card-wide mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp card1">
						<div class="mdl-card__title">
							<h2 class="mdl-card__title-text">Mathematics</h2>
						</div>
						<!-- MDL Progress Bar with Indeterminate Progress -->
						<div class="mdl-card__supporting-text" style="position: relative;">
						<table id="table5" class="mdl-data-table mdl-data-table3 mdl-js-data-table mdl-shadow--2dp" style="margin-top: 3em;">
							<thead>
								<tr>
									<th>
										<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-data-table__select5" for="table-header5">
											<input type="checkbox" id="table-header5" class="mdl-checkbox__input" />
										</label>
								</th>
									<th class="mdl-data-table__cell--non-numeric">Textbook</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-data-table__select mdl-data-table__select5" for="row5[1]">
											<input name="13" value="1" type="checkbox" id="row5[1]" class="mdl-checkbox__input" />
										</label>
								</td>
									<td class="mdl-data-table__cell--non-numeric">Advanced Mathematics Senior<br>One (Part 1) [2017]</td>
								</tr>
								<tr>
									<td>
										<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-data-table__select mdl-data-table__select5" for="row5[2]">
											<input name="14" value="1" type="checkbox" id="row5[2]" class="mdl-checkbox__input" />
										</label>
								</td>
									<td class="mdl-data-table__cell--non-numeric">Advanced Mathematics Senior<br>One (Part 2) [2017]</td>
								</tr>
							</tbody>
						</table>
						</div>
						</div>

						<div class="demo-card-wide mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp card1">
						<div class="mdl-card__title">
							<h2 class="mdl-card__title-text">Science</h2>
						</div>
						<!-- MDL Progress Bar with Indeterminate Progress -->
						<div class="mdl-card__supporting-text" style="position: relative;">
						<table id="table6" class="mdl-data-table mdl-data-table4 mdl-js-data-table mdl-shadow--2dp">
							<thead>
								<tr>
									<th>
										<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-data-table__select6" for="table-header6">
											<input type="checkbox" id="table-header6" class="mdl-checkbox__input" />
										</label>
								</th>
									<th class="mdl-data-table__cell--non-numeric">Textbook</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-data-table__select mdl-data-table__select6" for="row6[1]">
											<input name="15" value="1" type="checkbox" id="row6[1]" class="mdl-checkbox__input" />
										</label>
								</td>
									<td class="mdl-data-table__cell--non-numeric">Success SPM Biology<br>Form 4 & 5</td>
								</tr>
								<tr>
									<td>
										<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-data-table__select mdl-data-table__select6" for="row6[2]">
											<input name="16" value="1" type="checkbox" id="row6[2]" class="mdl-checkbox__input" />
										</label>
								</td>
									<td class="mdl-data-table__cell--non-numeric">Focus SPM Chemistry<br>Form 4 & 5</td>
								</tr>
								<tr>
									<td>
										<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-data-table__select mdl-data-table__select6" for="row6[3]">
											<input name="17" value="1" type="checkbox" id="row6[3]" class="mdl-checkbox__input" />
										</label>
								</td>
									<td class="mdl-data-table__cell--non-numeric">Success SPM Physics<br>Form 4 & 5</td>
								</tr>
							</tbody>
						</table>
						</div>
						
						</div>
			
			<!-- Colored FAB button -->
			<button type="submit" name="signup" class="mdl-button mdl-js-button mdl-button--raised" style="background: #da4932; bottom:1px; margin-bottom:25px; position:fixed; right:40px; z-index:998;">
				Next
			</button>
			</form>

			</div>
			
			</div>
			
    </section>
    <section class="mdl-layout__tab-panel" id="fixed-tab-2">
      <div class="page-content"><!-- Your content goes here --></div>
    </section>

<?php } else { $errorinfo = 'Please sign in before continuing. Thanks.'; ?>

<p style="color: white; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 17px;">Please sign in to post an ad. <a href="login.php">You can sign in here.</a></p>

<?php } ?>

  </main>



<script type="text/javascript">
var table = document.getElementById('table');
var headerCheckbox = document.getElementById('table-header');
var boxes = table.querySelectorAll('tbody .mdl-data-table__select1');
var headerCheckHandler = function(event) {
  if (event.target.checked) {
    for (var i = 0, length = boxes.length; i < length; i++) {
      boxes[i].MaterialCheckbox.check();
    }
  } else {
    for (var i = 0, length = boxes.length; i < length; i++) {
      boxes[i].MaterialCheckbox.uncheck();
    }
  }
};
headerCheckbox.addEventListener('change', headerCheckHandler);
</script>

<script type="text/javascript">
var table = document.getElementById('table2');
var headerCheckbox = document.getElementById('table-header2');
var boxes2 = table.querySelectorAll('tbody .mdl-data-table__select2');
var headerCheckHandler = function(event) {
  if (event.target.checked) {
    for (var i = 0, length = boxes2.length; i < length; i++) {
      boxes2[i].MaterialCheckbox.check();
    }
  } else {
    for (var i = 0, length = boxes2.length; i < length; i++) {
      boxes2[i].MaterialCheckbox.uncheck();
    }
  }
};
headerCheckbox.addEventListener('change', headerCheckHandler);
</script>

<script type="text/javascript">
var table = document.getElementById('table3');
var headerCheckbox = document.getElementById('table-header3');
var boxes3 = table.querySelectorAll('tbody .mdl-data-table__select3');
var headerCheckHandler = function(event) {
  if (event.target.checked) {
    for (var i = 0, length = boxes3.length; i < length; i++) {
      boxes3[i].MaterialCheckbox.check();
    }
  } else {
    for (var i = 0, length = boxes3.length; i < length; i++) {
      boxes3[i].MaterialCheckbox.uncheck();
    }
  }
};
headerCheckbox.addEventListener('change', headerCheckHandler);
</script>

<script type="text/javascript">
var table = document.getElementById('table4');
var headerCheckbox = document.getElementById('table-header4');
var boxes4 = table.querySelectorAll('tbody .mdl-data-table__select4');
var headerCheckHandler = function(event) {
  if (event.target.checked) {
    for (var i = 0, length = boxes4.length; i < length; i++) {
      boxes4[i].MaterialCheckbox.check();
    }
  } else {
    for (var i = 0, length = boxes4.length; i < length; i++) {
      boxes4[i].MaterialCheckbox.uncheck();
    }
  }
};
headerCheckbox.addEventListener('change', headerCheckHandler);
</script>

<script type="text/javascript">
var table = document.getElementById('table5');
var headerCheckbox = document.getElementById('table-header5');
var boxes5 = table.querySelectorAll('tbody .mdl-data-table__select5');
var headerCheckHandler = function(event) {
  if (event.target.checked) {
    for (var i = 0, length = boxes5.length; i < length; i++) {
      boxes5[i].MaterialCheckbox.check();
    }
  } else {
    for (var i = 0, length = boxes5.length; i < length; i++) {
      boxes5[i].MaterialCheckbox.uncheck();
    }
  }
};
headerCheckbox.addEventListener('change', headerCheckHandler);
</script>

<script type="text/javascript">
var table = document.getElementById('table6');
var headerCheckbox = document.getElementById('table-header6');
var boxes6 = table.querySelectorAll('tbody .mdl-data-table__select6');
var headerCheckHandler = function(event) {
  if (event.target.checked) {
    for (var i = 0, length = boxes6.length; i < length; i++) {
      boxes6[i].MaterialCheckbox.check();
    }
  } else {
    for (var i = 0, length = boxes6.length; i < length; i++) {
      boxes6[i].MaterialCheckbox.uncheck();
    }
  }
};
headerCheckbox.addEventListener('change', headerCheckHandler);
</script>

</body>
</html>

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
      message: '<?php echo $errorinfo; ?>',
      timeout: 5000
    };
    snackbarContainer.MaterialSnackbar.showSnackbar(data);
});
function r(f){ /in/.test(document.readyState)?setTimeout('r('+f+')',1):f()}
</script> 

<script src="js/material.js"></script>
<script src="js/mdl-selectfield.min.js"></script>
