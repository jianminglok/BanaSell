<?php
session_start();
include_once 'dbconnect.php';

$uploaded = "uploaded/";
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Ogiebooks</title>
</head>
<body style="background-image: url('img/background.jpg'); height:100%; background-size: 100% 100%;
        background-repeat: no-repeat;
        background-position: left top; z-index: -1;">  

<?php $page = 'info.php'; include('nav.php'); 
$key = $_POST['key'];
$result=0;
$result = mysqli_query($con,"SELECT * FROM books WHERE `key` = '".$key."'");

$row = mysqli_fetch_array($result);

?>

 <div class="banasell-content mdl-layout__content">
<style>
* {box-sizing:border-box}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

.mySlides {
    display: none;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor:pointer;
  height: 13px;
  width: 13px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}
.slideshow-container {
  height:40%; width:30%;
  padding-bottom: 2em;
}
@media (max-width: 900px) { 
  .slideshow-container {
  height:50%; width:50%;
  padding-bottom: 0em;
}
}

.banasell-navigation .mdl-navigation__link {
  height: 64px;
}
</style>



<div class="banasell-more-section">
<a name="ads"></a>
        <div class="banasell-card-container mdl-grid">
 
       
<?php  $comingsoon = "Coming Soon";             
$result2 = mysqli_query($con, "SELECT * FROM path_keys WHERE `key` = '".$key."'"); $i=0;
$rowcount = mysqli_num_rows($result2);

$form = $row['form'];

$result3 = mysqli_query($con, "SELECT * FROM $form WHERE `key` = '".$key."'"); 
$rowcount2 = mysqli_num_rows($result3);

if($rowcount > 0) { ?>

<div class="slideshow-container" style="" >
    

   <?php
while($row2 = mysqli_fetch_array($result2)) {
	$i++;
?>

<div class="mySlides fade">
    <div class="numbertext"><?php echo $i ?>/<?php echo $rowcount ?></div>
    <img src="<?php echo $uploaded.$row2['path']?>" style="width:100%">
  </div>

<?php } ?> 
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div> <?php } ?>




             <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
              
              <div class="mdl-card__title">
                 <h4 class="mdl-card__title-text"><?php echo $row['title'];  ?></h4>
              </div>
              <div class="mdl-card__supporting-text">
                <span class="mdl-typography--font-light mdl-typography--subhead"><?php echo $row['description'];  ?></span>
                <ul class="demo-list-icon mdl-list">
                <li class="mdl-list__item">
				    <span class="mdl-list__item-primary-content">
				    <i class="material-icons mdl-list__item-icon">face</i>
				    Name: <?php echo $row['name'];  ?>
				</span>
				  </li>
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
				    <span id="phone" class="mdl-list__item-primary-content"  style="display:none">
				    <i class="material-icons mdl-list__item-icon">contact_phone</i>
				    Phone Number: <?php echo $row['contact']; if($row['whatsapp'] == '1') echo '&nbsp(Whatsapp Available)'; if($row['wechat'] == '1') echo '&nbsp(Wechat Available)'; if($row['facebook'] == '1' && !empty($row['fb_name'])) { echo '&nbsp(Facebook Available: '.$row['fb_name'].')'; } ?>
				  </span>
          <a id="spoiler" onclick="myFunction()" class="banasell-link mdl-list__item-primary-content">
				    <i class="material-icons mdl-list__item-icon">contact_phone</i>
				    Show phone number
				  </a>
				  </li>
          <li class="mdl-list__item">
				    <span class="mdl-list__item-primary-content">
				    <i class="material-icons mdl-list__item-icon">book</i>
				    Books For: <?php if($row['form'] == "f1") { echo "Junior 1"; } elseif($row['form'] == "f2") { echo "Junior 2"; } elseif($row['form'] == "f3") { echo "Junior 3"; } if($row['form'] == "f4") { echo "Senior 1"; } if($row['form'] == "f5") { echo "Senior 2"; } if($row['form'] == "f6") { echo "Senior 3"; } if($row['form'] == "others") { echo "Others"; }  ?>
				  </span>
				  </li>

          <li class="mdl-list__item">
				    <span class="mdl-list__item-primary-content">
            <i class="material-icons mdl-list__item-icon">library_books</i>
				    Included Books:
				  </span>
				  </li>
          <?php while($row3 = mysqli_fetch_array($result3)) { 
            
            for ($i = 1; $i < mysqli_num_fields($result3) / 2; $i++) {
              if(isset($row3['book_'.$i.'_subject']) && isset($row3['book_'.$i])) {

            ?>
            <li class="mdl-list__item">
				    <span class="mdl-list__item-primary-content">
				    
            <?php 
            echo strtoupper($row3['book_'.$i.'_subject']);
            echo '&nbsp: '; 
            echo $row3['book_'.$i];          
            ?>
				  </span>
				  </li>
          <?php } } } ?>
				</ul>
              </div>
              <div class="mdl-card__actions mdl-card--border">
								<a href="tel:<?php echo $row['contact'];  ?>" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
									Call Seller
								</a>
                <?php if($row['whatsapp'] == '1') { ?>
                <a href="https://api.whatsapp.com/send?phone=6<?php echo $row['contact'];  ?>" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
									WhatsApp Seller
								</a>
                <?php } ?>
                
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

<script>
function myFunction() {
    var x = document.getElementById('phone');

        x.style.display = 'inherit';
        var y = document.getElementById('spoiler');

        y.style.display = 'none';
    

    
}

</script>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1} 
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; 
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block"; 
  dots[slideIndex-1].className += " active";
}
</script>


<script src="https://code.getmdl.io/1.2.1/material.min.js"></script>

<script src="js/carousel.js"></script>
