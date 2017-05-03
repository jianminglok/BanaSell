<?php
session_start();

include_once 'dbconnect.php';


$usr_id = $_SESSION['usr_id'];



if(isset($_POST['signup'])) {

$test20 = "INSERT INTO watchlist_keys(`key`,`usr_id`) VALUES('test','" . $usr_id . "');";

if(isset($_POST['1'])) {
  $conditions1 = "chi_s1_1_sc";
  $test1 = mysqli_query($con, "SELECT * FROM watchlist_keys WHERE `key` = '" . $conditions1 . "' AND `usr_id` = '".$usr_id."'");
  if(mysqli_num_rows($test1) == 0) {
	  $test20 .= "INSERT INTO watchlist_keys(`key`,`usr_id`) VALUES('" . $conditions1 . "','" . $usr_id . "');";
  } else {
	  $test21[] = $conditions1;
  }
} 

if(isset($_POST['2'])) {
  $conditions2 = "chi_s1_2_sc";
  $test2 = mysqli_query($con, "SELECT * FROM watchlist_keys WHERE `key` = '" . $conditions2 . "' AND `usr_id` = '".$usr_id."'");
  if(mysqli_num_rows($test2) == 0) {
	  $test20 .= "INSERT INTO watchlist_keys(`key`,`usr_id`) VALUES('" . $conditions2 . "','" . $usr_id . "');";
  } else {
	  $test21[] = $conditions2;
  }
} 

if(isset($_POST['3'])) {
  $conditions3 = "chi_j1_1_sc";
  $test3 = mysqli_query($con, "SELECT * FROM watchlist_keys WHERE `key` = '" . $conditions3 . "' AND `usr_id` = '".$usr_id."'");
  if(mysqli_num_rows($test3) == 0) {
	  $test20 .= "INSERT INTO watchlist_keys(`key`,`usr_id`) VALUES('" . $conditions3 . "','" . $usr_id . "');";
  } else {
	  $test21[] = $conditions3;
  }
} 

if(isset($_POST['4'])) {
  $conditions4 = "chi_j1_2_sc";
  $test4 = mysqli_query($con, "SELECT * FROM watchlist_keys WHERE `key` = '" . $conditions4 . "' AND `usr_id` = '".$usr_id."'");
  if(mysqli_num_rows($test4) == 0) {
	  $test20 .= "INSERT INTO watchlist_keys(`key`,`usr_id`) VALUES('" . $conditions4 . "','" . $usr_id . "');";
  } else {
	  $test21[] = $conditions4;
  }
} 

if(isset($_POST['5'])) {
  $conditions5 = "kupasan_s1_sc";
  $test5 = mysqli_query($con, "SELECT * FROM watchlist_keys WHERE `key` = '" . $conditions5 . "' AND `usr_id` = '".$usr_id."'");
  if(mysqli_num_rows($test5) == 0) {
	  $test20 .= "INSERT INTO watchlist_keys(`key`,`usr_id`) VALUES('" . $conditions5 . "','" . $usr_id . "');";
  } else {
	  $test21[] = $conditions5;
  }
} 

if(isset($_POST['6'])) {
  $conditions6 = "jaket_s1_sc";
  $test6 = mysqli_query($con, "SELECT * FROM watchlist_keys WHERE `key` = '" . $conditions6 . "' AND `usr_id` = '".$usr_id."'");
  if(mysqli_num_rows($test6) == 0) {
	  $test20 .= "INSERT INTO watchlist_keys(`key`,`usr_id`) VALUES('" . $conditions6 . "','" . $usr_id . "');";
  } else {
	  $test21[] = $conditions6;
  }
} 


if(isset($_POST['7'])) {
  $conditions7 = "dinara_s1_sc";
  $test7 = mysqli_query($con, "SELECT * FROM watchlist_keys WHERE `key` = '" . $conditions7 . "' AND `usr_id` = '".$usr_id."'");
  if(mysqli_num_rows($test7) == 0) {
	  $test20 .= "INSERT INTO watchlist_keys(`key`,`usr_id`) VALUES('" . $conditions7 . "','" . $usr_id . "');";
  } else {
	  $test21[] = $conditions7;
  }
} 

if(isset($_POST['8'])) {
  $conditions8 = "think_s1_sc";
  $test8 = mysqli_query($con, "SELECT * FROM watchlist_keys WHERE `key` = '" . $conditions8 . "' AND `usr_id` = '".$usr_id."'");
  if(mysqli_num_rows($test8) == 0) {
	  $test20 .= "INSERT INTO watchlist_keys(`key`,`usr_id`) VALUES('" . $conditions8 . "','" . $usr_id . "');";
  }
   else {
	  $test21[] = $conditions8;
  }
} 


if(isset($_POST['9'])) {
  $conditions9 = "poems_s1_sc";
  $test9 = mysqli_query($con, "SELECT * FROM watchlist_keys WHERE `key` = '" . $conditions9 . "' AND `usr_id` = '".$usr_id."'");
  if(mysqli_num_rows($test9) == 0) {
	  $test20 .= "INSERT INTO watchlist_keys(`key`,`usr_id`) VALUES('" . $conditions9 . "','" . $usr_id . "');";
  } else {
	  $test21[] = $conditions9;
  }
} 

if(isset($_POST['10'])) {
  $conditions10 = "sejarah_s1_sc";
  $test10 = mysqli_query($con, "SELECT * FROM watchlist_keys WHERE `key` = '" . $conditions10 . "' AND `usr_id` = '".$usr_id."'");
  if(mysqli_num_rows($test10) == 0) {
	  $test20 .= "INSERT INTO watchlist_keys(`key`,`usr_id`) VALUES('" . $conditions10 . "','" . $usr_id . "');";
  } else {
	  $test21[] = $conditions10;
  }
} 


if(isset($_POST['11'])) {
  $conditions11 = "nexus_s1_sc";
  $test11 = mysqli_query($con, "SELECT * FROM watchlist_keys WHERE `key` = '" . $conditions11 . "' AND `usr_id` = '".$usr_id."'");
  if(mysqli_num_rows($test11) == 0) {
	  $test20 .= "INSERT INTO watchlist_keys(`key`,`usr_id`) VALUES('" . $conditions11 . "','" . $usr_id . "');";
  } else {
	  $test21[] = $conditions11;
  }
} 

if(isset($_POST['12'])) {
  $conditions12 = "comp_s1_sc";
  $test12 = mysqli_query($con, "SELECT * FROM watchlist_keys WHERE `key` = '" . $conditions12 . "' AND `usr_id` = '".$usr_id."'");
  if(mysqli_num_rows($test12) == 0) {
	  $test20 .= "INSERT INTO watchlist_keys(`key`,`usr_id`) VALUES('" . $conditions12 . "','" . $usr_id . "');";
  } else {
	  $test21[] = $conditions12;
  }
} 


if(isset($_POST['13'])) {
  $conditions13 = "addmaths_s1_1_sc";
  $test13 = mysqli_query($con, "SELECT * FROM watchlist_keys WHERE `key` = '" . $conditions13 . "' AND `usr_id` = '".$usr_id."'");
  if(mysqli_num_rows($test13) == 0) {
	  $test20 .= "INSERT INTO watchlist_keys(`key`,`usr_id`) VALUES('" . $conditions13 . "','" . $usr_id . "');";
  } else {
	  $test21[] = $conditions13;
  }
} 

if(isset($_POST['14'])) {
  $conditions14 = "addmaths_s1_2_sc";
  $test14 = mysqli_query($con, "SELECT * FROM watchlist_keys WHERE `key` = '" . $conditions14 . "' AND `usr_id` = '".$usr_id."'");
  if(mysqli_num_rows($test14) == 0) {
	  $test20 .= "INSERT INTO watchlist_keys(`key`,`usr_id`) VALUES('" . $conditions14 . "','" . $usr_id . "');";
  } else {
	  $test21[] = $conditions14;
  }
} 


if(isset($_POST['15'])) {
  $conditions15 = "bio_s1_sc";
  $test15 = mysqli_query($con, "SELECT * FROM watchlist_keys WHERE `key` = '" . $conditions15 . "' AND `usr_id` = '".$usr_id."'");
  if(mysqli_num_rows($test15) == 0) {
	  $test20 .= "INSERT INTO watchlist_keys(`key`,`usr_id`) VALUES('" . $conditions15 . "','" . $usr_id . "');";
  } else {
	  $test21[] = $conditions15;
  }
} 

if(isset($_POST['16'])) {
  $conditions16 = "chem_s1_sc";
  $test16 = mysqli_query($con, "SELECT * FROM watchlist_keys WHERE `key` = '" . $conditions16 . "' AND `usr_id` = '".$usr_id."'");
  if(mysqli_num_rows($test16) == 0) {
	  $test20 .= "INSERT INTO watchlist_keys(`key`,`usr_id`) VALUES('" . $conditions16 . "','" . $usr_id . "');";
  } else {
	  $test21[] = $conditions16;
  }
} 

if(isset($_POST['17'])) {
  $conditions17 = "phy_s1_sc";
  $test17 = mysqli_query($con, "SELECT * FROM watchlist_keys WHERE `key` = '" . $conditions17 . "' AND `usr_id` = '".$usr_id."'");
  if(mysqli_num_rows($test17) == 0) {
	  $test20 .= "INSERT INTO watchlist_keys(`key`,`usr_id`) VALUES('" . $conditions17 . "','" . $usr_id . "');";
  } else {
	  $test21[] = $conditions17;
  }
} 

if(!empty($test21)) {
	$test21 =  '' . implode('","', $test21) . '';
	$test22 = explode(',', $test21);
	$errorinfo = sizeof($test22)." of the books you selected have already been added to your watchlist.";
	
	} else {
		if(mysqli_multi_query($con, $test20)  ) {
			$error = 'false';
			mysqli_close($con);
		}
		if($error == 'false') {
			$con = mysqli_connect("localhost", "root", "", "testdb") or die("Error " . mysqli_error($con));
			mysqli_query($con, "DELETE FROM `watchlist_keys` WHERE `key` LIKE 'test'") or die(mysqli_error($con));
			header("Location: watchlist.php");
		}
	}

if(empty($_POST['1']) && empty($_POST['2']) && empty($_POST['3']) && empty($_POST['4']) && empty($_POST['5']) && empty($_POST['6']) && empty($_POST['7']) && empty($_POST['8']) && empty($_POST['9']) && empty($_POST['10']) && empty($_POST['11']) && empty($_POST['12']) && empty($_POST['13']) && empty($_POST['14']) && empty($_POST['15']) && empty($_POST['16']) && empty($_POST['17'])) {
  $errorinfo = "Please select at least one book to continue.";
} else {



} 
 
}
?> 

<!DOCTYPE html>
<html>
<head>
	<title>BanaSell - Filter Books</title>
	
</head>
<body style="background-image: url('img/background.jpg'); height:100%; background-size: 100% 100%;
        background-repeat: no-repeat;
        background-position: left top;">   

<?php   $page = 'watchlistadd.php'; include('nav.php'); ?>

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
		</style>


			<div class="banasell-more-section senior1">
        <div class="banasell-section-title mdl-typography--display-1" style="color:white">Add to Watchlist</div>
        <div class="banasell-card-container mdl-grid">
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
				Add Books Now
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

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>