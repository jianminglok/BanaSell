<?php

session_start();

include_once 'dbconnect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>BanaSell</title>
</head>
<body>


<?php $page = 'booklist.php'; include('nav.php'); 

$result = mysqli_query($con,"SELECT * FROM books WHERE 1 ORDER BY FIELD(`paid`, 1) DESC, `id` DESC");
	
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

if(isset($_POST['form']) && $_POST['form'] == '1') {
$form = "Junior 1";
} else {

}

if(isset($_POST['form']) && $_POST['form'] == '2') {
$form = "Junior 2";
} else {

}

if(isset($_POST['form']) && $_POST['form'] == '3') {
$form = "Junior 3";
} else {

}

if(isset($_POST['form']) && $_POST['form'] == '4') {
$form = "Senior 1";
} else {

}

if(isset($_POST['form']) && $_POST['form'] == '5') {
$form = "Senior 2";
} else {

}

if(isset($_POST['form']) && $_POST['form'] == '6') {
$form = "Senior 3";
} else {

}

if(isset($_POST['form']) && $_POST['form'] == 'all') {
$form = '%';
} else {

}

if(!empty($_POST['form']) && !empty($_POST['filter'])) {
  $result = mysqli_query($con,"SELECT * FROM books WHERE `form` LIKE '".$form."' ORDER BY FIELD(`paid`, 1) DESC, {$filter} {$sort}");
}


?>
<body style="background-image: url('img/background.jpg'); height:100%; background-size: 100% 100%;
        background-repeat: no-repeat;
        background-position: left top; z-index: -1;">  

<div class="banasell-content mdl-layout__content" style="position: relative;">

<div style="padding-top: 3em">
<!-- Square card -->
<style>

.test {
	padding-left: 15%;
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
  <form style="padding-top: 1em;" method="post" action="booklist.php">
<label class="mdl-textfield--floating-label	" for="form" style="position: absolute">Show books for a specific form:</label>
					<div class="mdl-selectfield mdl-js-selectfield" style="margin-right: 2em;">
						<select name="form" required class="mdl-selectfield__select mdl-textfield__input">
							<option></option>
              <option value="all">All</option>
							<option value="1">Junior 1</option>
							<option value="2">Junior 2</option>
							<option value="3">Junior 3</option>
							<option value="4">Senior 1</option>
							<option value="5">Senior 2</option>
							<option value="6">Senior 3</option>
						</select>
						<label class="mdl-selectfield__label" for="myselect">Choose your form</label>
					</div>

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
						<label class="mdl-selectfield__label" for="myselect">Choose an option</label>
					</div>
          
<!-- Colored raised button -->
<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored test5" style="margin-bottom: 1em; ">
  Apply
</button>
          </form>
</div>
</div>



<div class="banasell-more-section">
    <a name="ads"></a>
          <div class="banasell-card-container mdl-grid">

<?php   while($row = mysqli_fetch_array($result)) {  ?>
         <form class=" mdl-cell--4-col test1 mdl-cell--4-col-tablet mdl-cell--4-col-phone" method="POST" action="test4.php" style="display:flex; flex-flow: row wrap;">
         
            <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp" style="width: 100%;">
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
          <li class="mdl-list__item">
				    <span class="mdl-list__item-primary-content">
				    <i class="material-icons mdl-list__item-icon">book</i>
				    Books For: <?php echo $row['form'];  ?>
				  </span>
				  </li>
				</ul>
        <input name="key" type="hidden" value="<?php echo $row['key']?>">
              </div>
              <div class="mdl-card__actions mdl-card--border">
			    <button type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" style="font-size:16px; font-weight: 500;" href="#" >More Info</button>
			      
			  </div>
            </div>
            </form>

        <style type="text/css">
        .card1{
		display:none;
		}</style>

<?php }  $comingsoon = "Coming Soon" ?>            

            <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp card1">
              <div class="mdl-card__media" style="height: 200px; background-color: #f0eded; position: relative;">
                
              </div>
              <div class="mdl-card__title">
                 <h4 class="mdl-card__title-text"><?php echo $comingsoon ?></h4>
              </div>
              <div class="mdl-card__supporting-text">
                <span class="mdl-typography--font-light mdl-typography--subhead"><?php echo $comingsoon ?></span>
                <ul class="demo-list-icon mdl-list">
                <li class="mdl-list__item">
                  <span class="mdl-list__item-primary-content">
                  <i class="material-icons mdl-list__item-icon">date_range</i>
                  Date submitted: <?php echo $comingsoon ?>
              </span>
                </li>
                <li class="mdl-list__item">
                  <span class="mdl-list__item-primary-content">
                  <i class="material-icons mdl-list__item-icon">star_rate</i>
                  Condition:  <?php echo $comingsoon ?>
                </span>
                </li>
                <li class="mdl-list__item">
                  <span class="mdl-list__item-primary-content">
                  <i class="material-icons mdl-list__item-icon">attach_money</i>
                  Price: <?php echo $comingsoon ?>  
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

            <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp card1">
              <div class="mdl-card__media" style="height: 200px; background-color: #f0eded; position: relative;">
                
              </div>
              <div class="mdl-card__title">
                 <h4 class="mdl-card__title-text"><?php echo $comingsoon ?></h4>
              </div>
              <div class="mdl-card__supporting-text">
                <span class="mdl-typography--font-light mdl-typography--subhead"><?php echo $comingsoon ?></span>
                <ul class="demo-list-icon mdl-list">
                <li class="mdl-list__item">
                  <span class="mdl-list__item-primary-content">
                  <i class="material-icons mdl-list__item-icon">date_range</i>
                  Date submitted: <?php echo $comingsoon ?>
              </span>
                </li>
                <li class="mdl-list__item">
                  <span class="mdl-list__item-primary-content">
                  <i class="material-icons mdl-list__item-icon">star_rate</i>
                  Condition:  <?php echo $comingsoon ?>
                </span>
                </li>
                <li class="mdl-list__item">
                  <span class="mdl-list__item-primary-content">
                  <i class="material-icons mdl-list__item-icon">attach_money</i>
                  Price: <?php echo $comingsoon ?>  
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

            <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp card1">
              <div class="mdl-card__media" style="height: 200px; background-color: #f0eded; position: relative;">
                
              </div>
              <div class="mdl-card__title">
                 <h4 class="mdl-card__title-text"><?php echo $comingsoon ?></h4>
              </div>
              <div class="mdl-card__supporting-text">
                <span class="mdl-typography--font-light mdl-typography--subhead"><?php echo $comingsoon ?></span>
                <ul class="demo-list-icon mdl-list">
                <li class="mdl-list__item">
                  <span class="mdl-list__item-primary-content">
                  <i class="material-icons mdl-list__item-icon">date_range</i>
                  Date submitted: <?php echo $comingsoon ?>
              </span>
                </li>
                <li class="mdl-list__item">
                  <span class="mdl-list__item-primary-content">
                  <i class="material-icons mdl-list__item-icon">star_rate</i>
                  Condition:  <?php echo $comingsoon ?>
                </span>
                </li>
                <li class="mdl-list__item">
                  <span class="mdl-list__item-primary-content">
                  <i class="material-icons mdl-list__item-icon">attach_money</i>
                  Price: <?php echo $comingsoon ?> 
                </span>
                </li>
              </ul>
              </div>
              <div class="mdl-card__actions mdl-card--border">
                <button type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" style="font-size:16px; font-weight: 500;" href="#" >More Info</button>
              </div>
            </div>
</div>
</div>

  </body>
</html>
<script src="js/material.js"></script>
<script src="js/mdl-selectfield.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
