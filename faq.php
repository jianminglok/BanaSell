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
<link rel="stylesheet" href="css/styles2.css">
	<title>Ogiebooks - Add Books</title>
</head>

<body style="background-image: url('img/background.jpg'); height:100%; background-size: 100% 100%;
        background-repeat: no-repeat;
        background-position: left top;">  

<?php $page = 'faq.php'; include('nav.php'); ?>

<!-- Wide card with share menu button -->
<style>


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
<div class="demo-ribbon"></div>
<main class=" demo-main  mdl-layout__content">
<div class="demo-container mdl-grid">
          <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
          <div class="demo-content mdl-color--white mdl-shadow--4dp content mdl-color-text--grey-800 mdl-cell mdl-cell--8-col">
          <h3>FAQ</h3>
          <p style="margin-bottom: .0001pt;"><strong><span style="font-size: 12.0pt; line-height: 107%;">How do I post my ads?</span></strong></p>
<ol>
<li><span style="font-size: 12pt;">Click on "Post an ad" at the top right corner.</span></li>
<li><span style="font-size: 12pt;">Fill out the form , every information must be filled in before submitting it. To sell more than one book in an ad please click on "add another field", to delete extra books please click "delete field".</span></li>
<li><span style="font-size: 12pt;">Click "Post ad" and it's done.</span></li>
</ol>
<p style="margin-bottom: .0001pt;"><strong><span style="font-size: 12.0pt; line-height: 107%;">How do I sell or buy books?</span></strong></p>
<p style="margin-bottom: .0001pt;"><span style="font-size: 12.0pt; line-height: 107%;">All we serve is as an agent for buyer and seller to meet get in contact. So users have to physically meet with your client or seller to make your purchase. We hold no liability and responsibility for any actions or results or adverse situations happening between buyers and sellers.</span></p>
<p style="margin-bottom: .0001pt;"><span style="font-size: 12.0pt; line-height: 107%;">&nbsp;</span></p>
<p style="margin-bottom: .0001pt;"><strong><span style="font-size: 12.0pt; line-height: 107%;">What do I do after I sold my books?</span></strong></p>
<p style="margin-bottom: .0001pt;"><span style="font-size: 12.0pt; line-height: 107%;">Select the three vertical dots at the top right corner. A drop-down box is shown, select &ldquo;Update email &amp; ads&rdquo;. At the top bar select &ldquo;update ads&rdquo; and select &ldquo;delete ad&rdquo; for the ads you wanted to delete.</span></p>
<p style="margin-bottom: .0001pt;"><span style="font-size: 12.0pt; line-height: 107%;">&nbsp;</span></p>
<p style="margin-bottom: .0001pt;"><strong><span style="font-size: 12.0pt; line-height: 107%;">What if I changed my e-mail?</span></strong></p>
<p style="margin-bottom: .0001pt;"><span style="font-size: 12.0pt; line-height: 107%;">Select the three vertical dots at the top right corner. A drop-down box is shown, select &ldquo;Update email &amp; ads&rdquo;. Fill in the form to update it.</span></p>
<p style="margin-bottom: .0001pt;"><span style="font-size: 12.0pt; line-height: 107%;">&nbsp;</span></p>
<p style="margin-bottom: .0001pt;"><strong><span style="font-size: 12.0pt; line-height: 107%;">What if there are no books I wanted?</span></strong></p>
<p style="margin-bottom: .0001pt;"><span style="font-size: 12.0pt; line-height: 107%;">If there are no books you wanted in the present, I will have in the near future.</span></p>
<p style="margin-bottom: .0001pt;"><span style="font-size: 12.0pt; line-height: 107%;">&nbsp;</span></p>
<p style="margin-bottom: .0001pt;"><strong><span style="font-size: 12.0pt; line-height: 107%;">Do you earn money from us?</span></strong></p>
<p style="margin-bottom: .0001pt;"><span style="font-size: 12.0pt; line-height: 107%;">No, totally not.</span></p>
<p style="margin-bottom: .0001pt;"><span style="font-size: 12.0pt; line-height: 107%;">&nbsp;</span></p>
<p style="margin-bottom: .0001pt;"><strong><span style="font-size: 12.0pt; line-height: 107%;">Hey, my question is not listed in FAQ.</span></strong></p>
<p style="margin-bottom: .0001pt;"><span style="font-size: 12.0pt; line-height: 107%;">Go to &ldquo;contact us&rdquo; and e-mail us, we&rsquo;ll respond to you asap.</span></p>
<p style="margin-bottom: .0001pt;"><span style="font-size: 12.0pt; line-height: 107%;">&nbsp;</span></p>
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

          Copyright <?php echo date('Y'); ?> Ogiebooks. A project by <a class=".banasell-link" href="https://github.com/jianminglok">@jianminglok</a> and <a class=".banasell-link" href="https://github.com/Reloin">@Reloin</a>.

          
        </footer>
</main>


</body>
</html>


<script src="js/material.js"></script>
<script src="js/mdl-selectfield.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>