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
          <li><a href='profile.php'><span>Profile</span></a></li>
          <?php } ?>
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

    <div class = "Manage">
      <ul>
        <?php require('manage.php');?>
      </ul>



      <?php include_once('templates/footer.php'); ?>
