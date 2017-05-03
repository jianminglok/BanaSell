<?php 
include_once 'dbconnect.php';

if(isset($_GET['search_value'])) {
$query = $_GET['search_value']; 
}

if(isset($_POST['search_post'])) {
	$_SESSION['search_post'] = $_POST['search_post'];
	$query2 = $_SESSION['search_post'];
}

if(isset($_POST['filter']) && $_POST['filter'] == 'pricing ASC') {
$filter = 'CAST(pricing AS DECIMAL(10,2))';
$sort = 'ASC';
} else {
	
}

if(isset($_POST['filter']) && $_POST['filter'] == 'pricing DESC') {
$filter = 'CAST(pricing AS DECIMAL(10,2))';
$sort = 'DESC';
} else {
	
}

if(isset($_POST['filter']) && $_POST['filter'] == 'id DESC') {
$filter = 'id';
$sort = 'DESC';
} else {
	
}

if(isset($_POST['filter']) && $_POST['filter'] == 'id ASC') {
$filter = 'id';
$sort = 'ASC';
} else {

}

if(isset($_POST['filter']) && $_POST['filter'] == 'condition DESC') {
$filter = '`condition`';
$sort = 'DESC';

} else {
	
}

if(isset($_POST['filter']) && $_POST['filter'] == 'condition ASC') {
$filter = '`condition`';
$sort = 'ASC';

} else {

}

if(!empty($_POST['filter'] ) && isset($_POST['search_post'])) {
  $result = mysqli_query($con,"SELECT * FROM books WHERE `title` LIKE '%".$query2."%' ORDER BY {$filter} {$sort}");
}

?>

<?php
if(isset($_GET['search_value'])) {
$result = mysqli_query($con, "SELECT * FROM books WHERE `title` LIKE '%".$query."%'");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>BanaSell - Search</title>
	
</head>
<body style="background-image: url('img/background.jpg'); height:100%; background-size: 100% 100%;
        background-repeat: no-repeat;
        background-position: left top; z-index: -1;">  

<?php $page = 'search.php'; include('nav.php'); ?>

<div class="banasell-content mdl-layout__content">
<div style="padding-top: 3em">
<!-- Square card -->
<style>

.test {
	padding-left: 32%;
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
<?php if(mysqli_num_rows($result) > 0) { ?>
<div class="mdl-shadow--2dp test2" style=" ">
 
	<!-- Colored raised button -->
	<div class="test" >
  <form style="padding-top: 1em;" method="post" action="search.php">
<label class="mdl-textfield--floating-label	" for="form" style="position: absolute">Sort by:</label>
					<div class="mdl-selectfield mdl-js-selectfield">
						<select name="filter" required class="mdl-selectfield__select mdl-textfield__input">
							<option></option>
							<option value="pricing ASC">Price: Lowest to Highest</option>
							<option value="pricing DESC">Price: Highest to Lowest</option>
							<option value="id DESC">Newest First</option>
							<option value="id ASC">Oldest First</option>
							<option value="condition DESC">Condition Best to Worst</option>
							<option value="condition ASC">Condition Worst to Best</option>
						</select>
						<label class="mdl-selectfield__label" for="myselect">Choose your form</label>
					</div>
          
<!-- Colored raised button -->
<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored test5" style="margin-bottom: 1em; ">
  Apply
</button>
<?php if(isset($_GET['search_value'])) { ?>
<input name="search_post" type="hidden" value="<?php echo $query;?>">
<?php } elseif(isset($_POST['search_post'])) { ?>
	<input name="search_post" type="hidden" value="<?php echo $query2;?>">
<?php } ?>
          </form>
</div>
</div>



<div class="banasell-more-section">
    <a name="ads"></a>
          <div class="banasell-card-container mdl-grid">

<?php  while($row = mysqli_fetch_array($result)) {  ?>
         
            <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
              <div class="mdl-card__media" style="height: 200px; background-color: #f0eded; position: relative;">
                <img src="<?php echo $row['key'].'/0.'?>">
              </div>
              <div class="mdl-card__title">
                 <h4 class="mdl-card__title-text"><?php echo $row['title'];  ?></h4>
              </div>
              <div class="mdl-card__supporting-text">
                <span class="mdl-typography--font-light mdl-typography--subhead"><?php echo $row['description'];  ?></span>
                <ul class="demo-list-icon mdl-list">
				  <li class="mdl-list__item">
				    <span class="mdl-list__item-primary-content">
				    <i class="material-icons mdl-list__item-icon">date_range</i>
				    Date submitted: <?php echo $row['date'];  ?>
				</span>
				  </li>
				  <li class="mdl-list__item">
				    <span class="mdl-list__item-primary-content">
				    <i class="material-icons mdl-list__item-icon">star_rate</i>
				    Condition:  <?php if($row['condition']==='1'){
						$condition = 'Poor';
					} elseif ($row['condition']==='2') {
						$condition = 'Moderate';
					} elseif ($row['condition']==='3') {
						$condition = 'Good';
					} elseif ($row['condition']==='4') {
						$condition = 'Excellent';
					} echo $condition;  ?>
				  </span>
				  </li>
				  <li class="mdl-list__item">
				    <span class="mdl-list__item-primary-content">
				    <i class="material-icons mdl-list__item-icon">attach_money</i>
				    Price: RM <?php echo $row['pricing'];  ?>
				  </span>
				  </li>
				</ul>
              </div>
              <div class="mdl-card__actions mdl-card--border">
			    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
			      More Info
			    </a>
			  </div>
            </div>

        <style type="text/css">
        .card1{
		display:none;
		}</style>

<?php } } ?>            

<p style="color: white; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 17px;">No results were found based on your search.</a></p>

<?php
 

?>
</body>
</html>

<script src="js/material.js"></script>
<script src="js/mdl-selectfield.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>