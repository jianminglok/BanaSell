<?php

session_start();

$uploaded = "uploaded/";

/**
* Recursively delete a directory
*
* @param string $dir Directory name
* @param boolean $deleteRootToo Delete specified top-level directory as well
*/
function recursiveRemoveDirectory($directory)
{
    foreach(glob("{$directory}/*") as $file)
    {
        if(is_dir($file)) { 
            recursiveRemoveDirectory($file);
        } else {
            unlink($file);
        }
    }
    rmdir($directory);
}
include_once 'dbconnect.php';

if(isset($_POST['delete'])) {
  $form = $_POST['form'];
  $key = $_POST['delete'];  
  
    mysqli_query($con, "DELETE FROM books WHERE `key` = '".$_POST['delete']."'");
    $sql = "DELETE FROM ".$form." WHERE `key` = '".$_POST['delete']."'";
    mysqli_query($con,$sql);
    mysqli_query($con, "DELETE FROM path_keys WHERE `key` = '".$_POST['delete']."'");
    recursiveRemoveDirectory($uploaded.$_POST['delete']);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Ogiebooks</title>
</head>
<body>


<?php $page = 'updateads.php'; include('nav4.php'); 

$result = mysqli_query($con,"SELECT * FROM books WHERE `usr_id` = '".$_SESSION['usr_id']."'");
	


?>
<body style="background-image: url('img/background.jpg'); height:100%; background-size: 100% 100%;
        background-repeat: no-repeat;
        background-position: left top; z-index: -1;">  

<div class="banasell-content mdl-layout__content" style="position: relative;">


<!-- Square card -->
<style>
.banasell-more-section {
      padding: 25px 0; !important
  }

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
  .banasell-more-section {
      padding: 25px 0; !important
  }
  
}
</style>





<div class="banasell-more-section">
    <a name="ads"></a>
          <div class="banasell-card-container mdl-grid">

          <?php if(isset($_SESSION['usr_id'])) { ?>

<?php   while($row = mysqli_fetch_array($result)) { 


  
  $key2 = $row['key'];
  
    $result2 = mysqli_query($con, "SELECT * FROM path_keys WHERE `key` = '".$key2."'"); $i=0;
  
    $row2 = mysqli_fetch_array($result2)
  
  ?>


         <form class=" mdl-cell--4-col test1 mdl-cell--4-col-tablet mdl-cell--4-col-phone" method="POST" action="" style="display:flex; flex-flow: row wrap;">
         
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
				    Books For: <?php if($row['form'] == "f1") { echo "Junior 1"; } elseif($row['form'] == "f2") { echo "Junior 2"; } elseif($row['form'] == "f3") { echo "Junior 3"; } if($row['form'] == "f4") { echo "Senior 1"; } if($row['form'] == "f5") { echo "Senior 2"; } if($row['form'] == "f6") { echo "Senior 3"; } if($row['form'] == "others") { echo "Others"; }  ?>
				  </span>
				  </li>
				</ul>
        <input name="form" type="hidden" value="<?php echo $row['form']?>">
              </div>
              <div class="mdl-card__actions mdl-card--border">
			    <button type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" style="font-size:16px; font-weight: 500;" href="#" name="delete" value="<?php echo $row['key']; ?>">Delete Ad</button>
			      
			  </div>
            </div>
            </form>

        <style type="text/css">
        .card1{
		display:none;
		}</style>

<?php }  $comingsoon = "Coming Soon" ?>            

<p class="card1" style="color: white; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 17px;">No ads posted yet. <a href="selectbooks.php">You can post an ad here.</a></p>

<?php } else {   $errorinfo = 'Please sign in to update your info. Thanks.'; ?>
    <p style="color: white; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 17px;">Please sign in to update your info. <a href="login.php">You can sign in here.</a></p>
  <?php } ?>
</div>


  </body>
</html>

<?php if(isset($errorinfo)) { ?>
<div id="error-toast" class="mdl-js-snackbar mdl-snackbar">
  <div class="mdl-snackbar__text" style="margin-right: 9px"></div>
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
 
<?php } ?>

<script src="js/material.js"></script>
<script src="js/mdl-selectfield.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
