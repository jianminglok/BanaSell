<?php
session_start();
?>

<!DOCTYPE html>
<html style="height:100%; ">
<head>
	<title>BanaSell - <?php if(isset($_SESSION['message'], $_SESSION['activity'], $_SESSION['redirect'])) { echo $_SESSION['activity']; } else { echo 'Error 404'; } ?></title>
</head>
<body style="background-image: url('img/background.jpg'); height:100%; background-size: 100% 100%;
        background-repeat: no-repeat;
        background-position: left top;">   

<?php $page = 'message.php'; include('nav.php'); ?>

<!-- Wide card with share menu button -->
<style>
.demo-card-wide.mdl-card {
  width: 350px;
  height: 440px;
}
.demo-card-wide > .mdl-card__title {
  color: #fff;
  height: 176px;
  background: #da4932;
}
}
.demo-card-wide > .mdl-card__menu {
  color: #fff;
}
</style>
<main class="mdl-layout__content">
<div class="demo-card-wide mdl-card mdl-shadow--2dp" style=" margin: 135px 0;
    max-width: 1044px;
    margin-left: auto;
    margin-right: auto;">
  <div class="mdl-card__title">
    <h2 class="mdl-card__title-text"><?php if(isset($_SESSION['message'], $_SESSION['activity'], $_SESSION['redirect'])) { echo $_SESSION['activity']; } else { echo 'Error 404'; } ?></h2>
  </div>
  <!-- MDL Progress Bar with Indeterminate Progress -->
  <div class="mdl-card__supporting-text">
  <style>
    .demo-card-wide.mdl-card {
      width: 350px;
      height: auto;
    }
    .mdl-card__supporting-text {
      margin: 2em 0;
    }
    </style>

    <?php if(isset($_SESSION['message'], $_SESSION['activity'], $_SESSION['redirect'])) { ?>
    
      <?php echo $_SESSION['message']?>
    </div>
    <?php } else { $_SESSION['redirect'] = null; $_SESSION['redirect_time'] = null;?>

      Oops, there's nothing here. Click <a href="index.php">here</a> to go home or <a href="#" onclick="history.go(-1)">here</a> to go back to your previous page.
    </div>
    <?php } ?>
  </form>

</div>
</main>

</body>
</html>
<script src="js/material.js"></script>

<meta http-equiv="Refresh" content="<?php echo $_SESSION['redirect_time']?>; url=<?php echo $_SESSION['redirect']?>">
<?php 
unset($_SESSION['activity']); 
unset($_SESSION['message']); 
unset($_SESSION['redirect']); 
unset($_SESSION['redirect_time']); 
?>