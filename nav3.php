<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A 2nd hand book selling website made by STTSS students, for STTSS students">
    <meta name="keywords" content="books, sttss, 2nd hand, sabah, kk, tshung tsin">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

        <!-- ================= Favicon ================== -->
        <!-- Standard -->
        <link rel="shortcut icon" href="img/logo.ico">
        <!-- Retina iPad Touch Icon-->
        <link rel="apple-touch-icon" sizes="144x144" href="img/logo.ico">
        <!-- Retina iPhone Touch Icon-->
        <link rel="apple-touch-icon" sizes="114x114" href="img/logo.ico">
        <!-- Standard iPad Touch Icon--> 
        <link rel="apple-touch-icon" sizes="72x72" href="img/logo.ico">
        <!-- Standard iPhone Touch Icon--> 
        <link rel="apple-touch-icon" sizes="57x57" href="img/logo.ico">

    <title>Ogiebooks</title>

    <!-- Page styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/material.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/mdl-selectfield.min.css">
    
    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
    _:-moz-tree-row(hover), .banasell-search-box {
        top: 4px;
    }  
    @media screen and (-ms-high-contrast: active), (-ms-high-contrast: none) {  
     .banasell-search-box {
        top: 3.5px;
    }
    }
    </style>
  </head>

<?php 

unset($errormsg);

$fn = basename($_SERVER['PHP_SELF']);

if(isset($_SESSION['usr_id'])!="") {
$timeouttime = time() - $_SESSION['timeout'];

  if(!empty($_SESSION['stayloggedin'])) {
    if($_SESSION['stayloggedin'] < time()) {

     session_destroy(); unset($_SESSION['usr_id']); unset($_SESSION['usr_name']); unset($_SESSION['stayloggedin']); header("Location: index.php");

    }
  } else {
      if ($timeouttime > 1800) {
        session_destroy(); unset($_SESSION['usr_id']); unset($_SESSION['usr_name']); header("Location: index.php");

      }else {
        $_SESSION['timeout'] = time();
      }
  }
}



if (isset($_SESSION['previous']) && isset($_SESSION['previous2'])) {
   if (basename($_SERVER['PHP_SELF']) != $_SESSION['previous'] && basename($_SERVER['PHP_SELF']) != $_SESSION['previous2'] ) {
        session_destroy();
        ### or alternatively, you can use this for specific variables:
        ### unset($_SESSION['varname']);
   }
}

if (isset($_SESSION['previous3'])) {
   if (basename($_SERVER['PHP_SELF']) != $_SESSION['previous3']) {
        unset($_SESSION['email2']); 
        ### or alternatively, you can use this for specific variables:
        ### unset($_SESSION['varname']);
   }
}

if (isset($_SESSION['previous4'])) {
   if (basename($_SERVER['PHP_SELF']) != $_SESSION['previous4'] OR time() - $_SESSION['created'] > 5) {
        unset($_SESSION['error_info']); 
        ### or alternatively, you can use this for specific variables:
        ### unset($_SESSION['varname']);
   }
}


?>

<style type="text/css">
  input {
    height: 100%;
  }
    .form-check-input:only-child {
    position: absolute;
  }
</style>

<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-tabs">

      <div class="banasell-header mdl-layout__header">
        <div class="mdl-layout__header-row">
          <span class="banasell-title mdl-layout-title">
          <a <?php echo ($page == 'index.php') ? "href='#'" : ""; ?> href="index.php"><img class="banasell-logo-image" src="icon/ogiebooks.png"></a>
          </span>
          <!-- Add spacer, to align navigation to the right in desktop -->
          <div class="banasell-header-spacer mdl-layout-spacer"></div>
          <div class="banasell-search-box mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right mdl-textfield--full-width">
            <form action="search.php" method="GET">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search-field">
              <i class="material-icons">search</i>
            </label>           
            <div class="mdl-textfield__expandable-holder">
              <input name="search_value" class="mdl-textfield__input" type="text" id="search-field">
            </div>
            </form>
          </div>
          <!-- Navigation -->
          <div class="banasell-navigation-container">
            <nav class="banasell-navigation mdl-navigation">
              <a <?php echo ($page == 'index.php') ? "class='mdl-navigation__link mdl-navigation__link-active mdl-typography--text-uppercase active' href='#'" : ""; ?> class="mdl-navigation__link mdl-typography--text-uppercase active" href="index.php">Home</a>
              <a <?php echo ($page == 'booklist.php') ? "class='mdl-navigation__link mdl-navigation__link-active mdl-typography--text-uppercase active' href='#'" : ""; ?> class="mdl-navigation__link mdl-typography--text-uppercase" href="booklist.php">Book List</a>
              <a <?php echo ($page == 'submitbooks.php') ? "class='mdl-navigation__link mdl-navigation__link-active mdl-typography--text-uppercase active' href='#'" : ""; ?> class="mdl-navigation__link mdl-typography--text-uppercase" href="submitbooks.php">Post An Ad</a>
            </nav>
          </div>
          <span class="banasell-mobile-title mdl-layout-title">
          <a <?php echo ($page == 'index.php') ? "href='#'" : ""; ?> href="index.php"><img class="banasell-logo-image" src="icon/ogiebooks.png"></a>
          </span>
          <button class="banasell-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="more-button">
            <i class="material-icons">more_vert</i>
          </button>
          <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
          <li <?php echo ($page == 'faq.php') ? "class='mdl-menu__item' onclick='#'" : ""; ?> class="mdl-menu__item" onclick="window.location='faq.php'">FAQ</li>
          <li <?php echo ($page == 't&c.php') ? "class='mdl-menu__item' onclick='#'" : ""; ?> class="mdl-menu__item" onclick="window.location='t&c.php'">T&C</li>
          <li <?php echo ($page == 'contactus.php') ? "class='mdl-menu__item' onclick='#'" : ""; ?> class="mdl-menu__item" onclick="window.location='contactus.php'">Contact Us</li>
          <li <?php echo ($page == 'updateemail.php') ? "class='mdl-menu__item' onclick='#'" : ""; ?> class="mdl-menu__item" onclick="window.location='updateemail.php'">Update Email & Ads</li>
          </ul>
          <button class="banasell-account-button banasell-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="account-button" style=" display: block !important;">
            <?php if (isset($_SESSION['usr_id']) )  { ?>
            <i class="material-icons" style="color: green !important;">account_circle</i>
            <?php } else { ?>
            <i class="material-icons">account_circle</i>
            <?php } ?>
          </button>
          <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="account-button">
          <?php if (isset($_SESSION['usr_id']) )  { ?>
            <li disabled class="mdl-menu__item">Signed In as <?php echo $_SESSION['usr_name']; ?></li>
            <li class="mdl-menu__item" onclick="window.location='logout.php'">Sign Out</li>
          <?php } elseif($fn == 'login.php' AND $fn !== 'register.php' AND $fn !== 'dob.php') { ?>
            <li <?php echo ($page == 'login.php') ? "class='mdl-menu__item' onclick='#'" : ""; ?> class="mdl-menu__item">Sign In</li>
            <li class="mdl-menu__item" onclick="window.location='dob.php'">Sign Up</li>
          <?php } else { ?>
            <li class="mdl-menu__item" onclick="window.location='login.php'">Sign In</li>
            <li <?php echo ($page == 'register.php' OR $page == 'dob.php') ? "class='mdl-menu__item' onclick='#'" : ""; ?> class="mdl-menu__item" onclick="window.location='dob.php'">Sign Up</li>
          <?php } ?>
          </ul>
        </div>
        <!-- Tabs -->
     <!-- Tabs -->
    <div class="mdl-layout__tab-bar mdl-js-ripple-effect" >
      <a <?php echo ($page == 'selectbooks.php') ? "class='mdl-layout__tab is-active' href='#'" : ""; ?> href="selectbooks.php" class="mdl-layout__tab">First Step</a>
      <a <?php echo ($page == 'submitbooks.php') ? "class='mdl-layout__tab is-active' href='#'" : ""; ?> <?php echo (empty($_SESSION['key2'])) ? "href='#' id='demo-show-snackbar'" : ""; ?> href="submitbooks.php" class="mdl-layout__tab">Second Step</a>
    </div>
      </div>

      <div class="banasell-drawer mdl-layout__drawer" >
        <span class="mdl-layout-title"  style="line-height: 1em !important">
          <i class="material-icons" style="padding-top: 3em;">account_circle</i>
          <br></br>
          <span><?php if(isset($_SESSION['usr_name'])) { echo $_SESSION['usr_name']; } else { echo 'Ogiebooks'; } ?></span>
        </span>
        <nav class="mdl-navigation">
           <a <?php echo ($page == 'index.php') ? "class='mdl-navigation__link mdl-navigation__link-active' href='#'" : ""; ?> class="mdl-navigation__link" href="index.php">Home</a>
          <a <?php echo ($page == 'booklist.php') ? "class='mdl-navigation__link mdl-navigation__link-active' href='#'" : ""; ?> class="mdl-navigation__link" href="booklist.php">Book List</a>
          <a <?php echo ($page == 'submitbooks.php') ? "class='mdl-navigation__link mdl-navigation__link-active' href='#'" : ""; ?> class="mdl-navigation__link" href="submitbooks.php">Post an Ad</a>
          <div class="banasell-drawer-separator"></div>
          <span class="mdl-navigation__link" href="">More</span>
          <a <?php echo ($page == 'faq.php') ? "class='mdl-navigation__link mdl-navigation__link-active' onclick='#'" : ""; ?> class="mdl-navigation__link" href="faq.php">FAQ</a>
          <a <?php echo ($page == 't&c.php') ? "class='mdl-navigation__link mdl-navigation__link-active' onclick='#'" : ""; ?> class="mdl-navigation__link" href="t&c.php">T&C</a>
          <a <?php echo ($page == 'contactus.php') ? "class='mdl-navigation__link mdl-navigation__link-active' onclick='#'" : ""; ?> class="mdl-navigation__link" href="contactus.php">Contact Us</a>
          <a <?php echo ($page == 'updateemail.php' OR $page == 'updateads.php') ? "class='mdl-navigation__link mdl-navigation__link-active' onclick='#'" : ""; ?> class="mdl-navigation__link" href="updateemail.php">Update Email & Ads</a>
        </nav>
      </div>

<?php if (empty($_SESSION['key2'])) { ?>
<div id="demo-snackbar-example" class="mdl-js-snackbar mdl-snackbar">
  <div class="mdl-snackbar__text" style="margin-right: 11px"></div>
  <button class="mdl-snackbar__action" style="display:none" type="button"></button>
</div>
<?php } ?>

<script>
(function() {
  'use strict';
  var snackbarContainer = document.querySelector('#demo-snackbar-example');
  var showSnackbarButton = document.querySelector('#demo-show-snackbar');
  var handler = function(event) {
    showSnackbarButton.style.backgroundColor = '';
  };
  showSnackbarButton.addEventListener('click', function() {
    'use strict';
    var data = {
      message: 'Please select your books before continuing.',
      timeout: 5000,
    };
    snackbarContainer.MaterialSnackbar.showSnackbar(data);
  });
}());
</script>      