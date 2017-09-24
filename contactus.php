<?php 
session_start();

$page = 'admin.php';

include_once 'dbconnect.php';

$error = false;

// sql to create table


?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
	<title>Ogiebooks - Add Books</title>
</head>

<body style="background-image: url('img/background.jpg'); height:100%; background-size: 100% 100%;
        background-repeat: no-repeat;
        background-position: left top;">  

<?php $page = 'contactus.php'; include('nav.php'); ?>

<!-- Wide card with share menu button -->
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
.test2 {
        position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);margin-left:0em; 
    }
@media (max-width: 900px) { 
        
	.test1{
	height: auto; width: 90%; 
    }
    
}
</style>
<main class="mdl-layout__content">

<div class="mdl-cell mdl-cell--8-col mdl-cell--7-col-tablet mdl-cell--7-col-phone mdl-card mdl-shadow--3dp test2" style="">


<div class="mdl-card__supporting-text" style="width: 100%" >
<p>For any business or personal inquiries related to our website, please kindly contact us at <a href="mailto:inquiries@ogiebooks.com">inquiries@ogiebooks.com</a>.&nbsp;</p>
<p>For any emergency issues related to our website, plese contact <a href="mailto:help@ogiebooks.com">help@ogiebooks.com</a>.&nbsp;</p>
<p>We promise you will receive a response from us as soon as possible once we manage to sort out the matter, thank you for your cooperation.</p>

</div>
</div> 



</main>
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

          Copyright <?php echo date('Y'); ?> Ogiebooks. A project by <a class=".banasell-link" href="https://github.com/jianminglok">@jianminglok</a> and <a class=".banasell-link" href="https://github.com/Reloin">@Reloin</a>.

          
        </footer>

</body>
</html>


<script src="js/material.js"></script>
<script src="js/mdl-selectfield.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>