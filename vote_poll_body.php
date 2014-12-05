<!DOCTYPE html>
<html>
<head>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400,600,700,800' rel='stylesheet' type='text/css'>

  <title>YOUPOLL</title>
  <link rel="stylesheet" href="templates/menustyle.css" type="text/css">
  <link rel="stylesheet" href="templates/style.css" type="text/css">
  <meta charset = "UTF-8">
</head>
<body>
  <div id="header">
    <div id="cssmenu">
      <ul>
        <li><a href='index.php'><span>HOMEPAGE</span></a></li>
        <?php session_start();
        if(isset($_SESSION['username'])){ ?>

          <li><a href='logout.php'><span>Logout</span></a></li>
          <?php } ?>
          <!--<li><a href=""><span>SEARCH</span></a></li>
          <li class='last'><a href=""><span>PROFILE</span></a></li>-->
        </ul>
      </div>
    </div>

<?php
  session_start();

  if(isset($_SESSION['Msg']))
  ?> <div id = "errorMsg"> <?php echo $_SESSION['Msg'];?> </div>
  <?php
  unset($_SESSION['Msg']);
  ?>
<div id="container">
<form id="Vote" action = <?php echo "vote.php?poll=". $_GET['poll'] ?> method = "post">
  <div class = "Poll">
    <fieldset>
      <?php require('load_vote.php');?>
  </div>
</form>
</div>




<?php include_once('templates/footer.php'); ?>
