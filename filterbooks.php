<?php
session_start();

include_once 'dbconnect.php';

if(isset($_POST['testkey'])) {
	$_SESSION['testkey'] = $_POST['testkey'];
	header("Location: test.php");
}

if(isset($_POST['form']) && $_POST['form'] == 'form3')  { ?>

	<style>
	.senior1 {
		display: none;
	}
	</style>
	
<?php } 

if(isset($_POST['signup'])) {

	

if(isset($_POST['1'])) {
	$conditions[] = "chi_s1_1_sc=1";
} 

if(isset($_POST['2'])) {
	$conditions[] = "chi_s1_2_sc=1";
} 

if(isset($_POST['3'])) {
	$conditions[] = "chi_j1_1_sc=1";
} 

if(isset($_POST['4'])) {
	$conditions[] = "chi_j1_2_sc=1";
} 



if(isset($_POST['5'])) {
	$conditions[] = "kupasan_s1_sc=1";
} 

if(isset($_POST['6'])) {
	$conditions[] = "jaket_s1_sc=1";
} 


if(isset($_POST['7'])) {
	$conditions[] = "dinara_s1_sc=1";
} 

if(isset($_POST['8'])) {
	$conditions[] = "think_s1_sc=1";
} 


if(isset($_POST['9'])) {
	$conditions[] = "poems_s1_sc=1";
} 

if(isset($_POST['10'])) {
	$conditions[] = "sejarah_s1_sc=1";
} 


if(isset($_POST['11'])) {
	$conditions[] = "nexus_s1_sc=1";
} 

if(isset($_POST['12'])) {
	$conditions[] = "comp_s1_sc=1";
} 


if(isset($_POST['13'])) {
	$conditions[] = "addmaths_s1_1_sc=1";
} 

if(isset($_POST['14'])) {
	$conditions[] = "addmaths_s1_2_sc=1";
} 


if(isset($_POST['15'])) {
	$conditions[] = "bio_s1_sc=1";
} 

if(isset($_POST['16'])) {
	$conditions[] = "chem_s1_sc=1";
} 

if(isset($_POST['17'])) {
	$conditions[] = "phy_s1_sc=1";
} 

if(empty($_POST['1']) && empty($_POST['2']) && empty($_POST['3']) && empty($_POST['4']) && empty($_POST['5']) && empty($_POST['6']) && empty($_POST['7']) && empty($_POST['8']) && empty($_POST['9']) && empty($_POST['10']) && empty($_POST['11']) && empty($_POST['12']) && empty($_POST['13']) && empty($_POST['14']) && empty($_POST['15']) && empty($_POST['16']) && empty($_POST['17'])) {
  $errorinfo = "Please select at least one book to continue.";
}

if(empty($errorinfo)) {
$test11 = "SELECT * from checklist WHERE " . implode(' AND ', $conditions);
$result = mysqli_query($con,$test11);
if(mysqli_num_rows($result) > 0) {
     while($row = mysqli_fetch_array($result)) {
			 $variabele[] = $row['key'];
		 }
		 $test21 =  '"' . implode('","', $variabele) . '"';
		 $_SESSION['test'] = $test21;
		header("Location: filterresults.php");
} else {
    $errorinfo = "Sorry, no books were found. Please try again.";
}
} 
}
?> 
<!DOCTYPE html>
<html>
<head>
	<title>Ogiebooks - Filter Books</title>
	
</head>
<body style="background-image: url('img/background.jpg'); height:100%; background-size: 100% 100%;
        background-repeat: no-repeat;
        background-position: left top;">   

<?php $page = 'filterbooks.php'; include('nav.php'); ?>

<main class="mdl-layout__content" >
	 
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
		.ogiebooks-card-container .mdl-card__supporting-text {
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
		</style>

<div style="padding-top: 3em">
<!-- Square card -->
<style>

.test {
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
@media (max-width: 900px) {
	.test {
	padding-left: 8%;
	}
	.topp {
	margin-bottom:1em;
	}
  .test2 {
	width: 100%;
  background-color: #fff;
  
	}
  .test3 {
    margin-left: 0em;
  }
  .test4 {
    margin-bottom: 1.5em;
  }
  .test5 {
    margin-left: 0em;
  }
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

			<div class="ogiebooks-more-section senior1"><div class="ogiebooks-card-container mdl-grid">
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
  <div class="mdl-snackbar__text" style="margin-right: 10px"></div>
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
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>