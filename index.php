<?php
session_start();
include_once 'dbconnect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ogiebooks</title>
</head>
<body>

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


<?php $page = 'index.php'; include('nav.php'); 

$result=0;
$result = mysqli_query($con,"SELECT * FROM books WHERE 1 ORDER BY FIELD(`paid`, 1) DESC, `id` DESC LIMIT 3");


?>

 <div class="banasell-content mdl-layout__content">
        <a name="top"></a>
        <div class="intro-section mdl-typography--text-center">
          <div class="logo-font banasell-slogan">Ogiebooks</div>
          <div class="logo-font banasell-sub-slogan">A 2nd hand book selling website made by STTSS students, for STTSS students</div>
          <div class="logo-font banasell-create-character">
            <a href="booklist.php"><i class="material-icons">shopping_basket</i> Look for books here</a>
          </div>

          <a href="#ads">
            <button class="banasell-fab mdl-button mdl-button--colored mdl-js-button mdl-button--fab mdl-js-ripple-effect" style="background: #da4932 !important;">
              <i class="material-icons">expand_more</i>
            </button>
          </a>
        </div>

<div class="banasell-more-section">
    <a name="ads"></a>
    <div class="banasell-section-title mdl-typography--display-1-color-contrast">Newest ads</div>
          <div class="banasell-card-container mdl-grid">

<?php  while($row = mysqli_fetch_array($result)) { 
  
$key2 = $row['key'];

  $result2 = mysqli_query($con, "SELECT * FROM path_keys WHERE `key` = '".$key2."'"); $i=0;

  $row2 = mysqli_fetch_array($result2)

  /* Select fist image in future */
  
   ?>
         <form class=" mdl-cell--4-col test1 mdl-cell--4-col-tablet mdl-cell--4-col-phone" method="POST" action="info.php" style="display:flex; flex-flow: row wrap;">
         
            <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp" style="width: 100%;">
              <div class="mdl-card__media" style="height: 200px; background-color: #f0eded; position: relative;">
              <img src="<?php echo "uploaded/".$row2['path']?>">
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
				    Books For: <?php if($row['form'] == "f1") { echo "Junior 1"; } elseif($row['form'] == "f2") { echo "Junior 2"; } elseif($row['form'] == "f3") { echo "Junior 3"; } if($row['form'] == "f4") { echo "Senior 1"; } if($row['form'] == "f5") { echo "Senior 2"; } if($row['form'] == "f6") { echo "Senior 3"; } if($row['form'] == "others") { echo "Others"; } ?>
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

<?php } $comingsoon = "Coming Soon" ?>            

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
                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                  More Info
                </a>
              </div>
            </div>

          </div>
        </div> 

        	

        <footer class="banasell-footer mdl-mega-footer">
          <div class="mdl-mega-footer--top-section">
            <div class="mdl-mega-footer--left-section">
            <ul class="mdl-mini-footer__link-list">
              <li><a href="index.php">Home</a></li>
              <li><a href="booklist.php">Book List</a></li>
              <li><a href="faq.php">FAQ</a></li>
              <li><a href="contactus.php">Contact Us</a></li>
              <li><a href="t&c.php">Privacy & Terms</a></li>
            </ul>
            </div>
            <div class="mdl-mega-footer--right-section">
              <a class="mdl-typography--font-light" href="#top">
                Back to Top
                <i class="material-icons">expand_less</i>
              </a>
            </div>
          </div>

          Copyright <?php echo date('Y'); ?> Ogiebooks. A project by <a class="banasell-link" href="https://github.com/jianminglok">@jianminglok</a> and <a class="banasell-link" href="https://github.com/Reloin">@Reloin</a>.

          
        </footer>
      </div>
      
    </div>
  </body>
</html>

<script src="https://code.getmdl.io/1.2.1/material.min.js"></script>
