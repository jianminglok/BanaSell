<?php
session_start();
include_once 'dbconnect.php';
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Ogiebooks</title>
</head>
<body style="background-image: url('img/background.jpg'); height:100%; background-size: 100% 100%;
        background-repeat: no-repeat;
        background-position: left top; z-index: -1;">  

<?php $page = 'index.php'; include('nav.php'); 
$key = $_POST['key'];
$result=0;
$result = mysqli_query($con,"SELECT * FROM books WHERE `key` = '".$key."'");

$row = mysqli_fetch_array($result);

?>

 <div class="ogiebooks-content mdl-layout__content">



<div class="ogiebooks-more-section">
    <a name="ads"></a>
        <div class="ogiebooks-card-container mdl-grid">

<?php  $comingsoon = "Coming Soon";             
$result2 = mysqli_query($con, "SELECT * FROM path_keys WHERE `key` = '".$key."'"); $i=0;
while($row2 = mysqli_fetch_array($result2)) {
	$i++;
?>
<!-- Image card -->
<style>
.demo-card-image.mdl-card {
 
  
  
}
.demo-card-image > .mdl-card__actions {
  height: 52px;
  padding: 16px;
  background: rgba(0, 0, 0, 0.2);
}
.demo-card-image__filename {
  color: #fff;
  font-size: 14px;
  font-weight: 500;
}
.test1 {
	height: auto; width: 60%;
}
@media (max-width: 900px) { 
	.test1{
	height: auto; width: 90%; 
	}}
</style>



<div class="demo-card-image mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--2dp" style="background: url('<?php echo $row2['path']?>') center / cover;">
  <div class="mdl-card__title mdl-card--expand"></div>
  <div class="mdl-card__actions">
		<a id="button" class="test-button<?php echo $i?>" style="color: #fff; text-decoration: none;">
    Click to Enlarge<a>
  </div>

</div>

<dialog class="test1 mdl-dialog dialog<?php echo $i?>" style="  ">

      <img src="<?php echo $row2['path']?>" style="max-height: 100%; max-width: 100%;position: relative; left: 50%;
    transform: translate(-50%); ">


 	<div class="mdl-dialog__actions ">
      <button type="button" class="mdl-button close">Close</button>
    </div>   
  </dialog>



<?php } ?>

             <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
              
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
				    <i class="material-icons mdl-list__item-icon">contact_phone</i>
				    Phone Number: <?php echo $row['contact'];  ?>
				  </span>
				  </li>
          <li class="mdl-list__item">
				    <span class="mdl-list__item-primary-content">
				    <i class="material-icons mdl-list__item-icon">book</i>
				    Books For: <?php echo $row['form'];  ?>
				  </span>
				  </li>
				</ul>
              </div>
              <div class="mdl-card__actions mdl-card--border">
								<a href="tel:<?php echo $row['contact'];  ?>" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
									Call Seller
								</a>
							</div>
            </div>
          </div>
        </div> 

        	

        

  </body>
</html>

<script>
  (function() {
    'use strict';
    var dialogButton = document.querySelector('.test-button1');
    var dialog = document.querySelector('.dialog1');
    if (! dialog.showModal) {
      dialogPolyfill.registerDialog(dialog);
    }
    dialogButton.addEventListener('click', function() {
       dialog.showModal();
    });
		dialog.querySelector('.close').addEventListener('click', function() {
      dialog.close();
    });
  }());
</script>
<script>
  (function() {
    'use strict';
    var dialogButton = document.querySelector('.test-button2');
    var dialog = document.querySelector('.dialog2');
    if (! dialog.showModal) {
      dialogPolyfill.registerDialog(dialog);
    }
    dialogButton.addEventListener('click', function() {
       dialog.showModal();
    });
		dialog.querySelector('.close').addEventListener('click', function() {
      dialog.close();
    });
  }());
</script>
<script>
  (function() {
    'use strict';
    var dialogButton = document.querySelector('.test-button3');
    var dialog = document.querySelector('.dialog3');
    if (! dialog.showModal) {
      dialogPolyfill.registerDialog(dialog);
    }
    dialogButton.addEventListener('click', function() {
       dialog.showModal();
    });
		dialog.querySelector('.close').addEventListener('click', function() {
      dialog.close();
    });
  }());
</script>
<script>
  (function() {
    'use strict';
    var dialogButton = document.querySelector('.test-button4');
    var dialog = document.querySelector('.dialog4');
    if (! dialog.showModal) {
      dialogPolyfill.registerDialog(dialog);
    }
    dialogButton.addEventListener('click', function() {
       dialog.showModal();
    });
		dialog.querySelector('.close').addEventListener('click', function() {
      dialog.close();
    });
  }());
</script>
<script>
  (function() {
    'use strict';
    var dialogButton = document.querySelector('.test-button5');
    var dialog = document.querySelector('.dialog5');
    if (! dialog.showModal) {
      dialogPolyfill.registerDialog(dialog);
    }
    dialogButton.addEventListener('click', function() {
       dialog.showModal();
    });
		dialog.querySelector('.close').addEventListener('click', function() {
      dialog.close();
    });
  }());
</script>
<script>
  (function() {
    'use strict';
    var dialogButton = document.querySelector('.test-button6');
    var dialog = document.querySelector('.dialog6');
    if (! dialog.showModal) {
      dialogPolyfill.registerDialog(dialog);
    }
    dialogButton.addEventListener('click', function() {
       dialog.showModal();
    });
		dialog.querySelector('.close').addEventListener('click', function() {
      dialog.close();
    });
  }());
</script>
<script>
  (function() {
    'use strict';
    var dialogButton = document.querySelector('.test-button7');
    var dialog = document.querySelector('.dialog7');
    if (! dialog.showModal) {
      dialogPolyfill.registerDialog(dialog);
    }
    dialogButton.addEventListener('click', function() {
       dialog.showModal();
    });
		dialog.querySelector('.close').addEventListener('click', function() {
      dialog.close();
    });
  }());
</script>
<script>
  (function() {
    'use strict';
    var dialogButton = document.querySelector('.test-button8');
    var dialog = document.querySelector('.dialog8');
    if (! dialog.showModal) {
      dialogPolyfill.registerDialog(dialog);
    }
    dialogButton.addEventListener('click', function() {
       dialog.showModal();
    });
		dialog.querySelector('.close').addEventListener('click', function() {
      dialog.close();
    });
  }());
</script>
<script>
  (function() {
    'use strict';
    var dialogButton = document.querySelector('.test-button9');
    var dialog = document.querySelector('.dialog9');
    if (! dialog.showModal) {
      dialogPolyfill.registerDialog(dialog);
    }
    dialogButton.addEventListener('click', function() {
       dialog.showModal();
    });
		dialog.querySelector('.close').addEventListener('click', function() {
      dialog.close();
    });
  }());
</script>
<script>
  (function() {
    'use strict';
    var dialogButton = document.querySelector('.test-button10');
    var dialog = document.querySelector('.dialog10');
    if (! dialog.showModal) {
      dialogPolyfill.registerDialog(dialog);
    }
    dialogButton.addEventListener('click', function() {
       dialog.showModal();
    });
		dialog.querySelector('.close').addEventListener('click', function() {
      dialog.close();
    });
  }());
</script>

<script src="https://code.getmdl.io/1.2.1/material.min.js"></script>
