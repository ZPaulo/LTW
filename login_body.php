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
    echo $_SESSION['Msg'];

    unset($_SESSION['Msg']);

    ?>

 <div id ="login">

<form id="Login" action = "login.php" method = "post">
	 <p><h1> Login </h1> <p>
       <br/>
<div class="Info"><input type="text" name = "user" placeholder="Username"><br/>
                  <input type="password" name = "pass" placeholder="Password"><br/>
</div>
    <button id="button" type="submit"> Log in </button>
</form>
</div>



<?php include_once('templates/footer.php'); ?>
