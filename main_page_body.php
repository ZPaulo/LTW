<!DOCTYPE html>
<html>
<head>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400,600,700,800' rel='stylesheet' type='text/css'>
  <title>YOUPOLL</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="js/add_button.js"></script>
  <script type="text/javascript" src="js/search.js"></script>
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script>
  $(document).ready(function() {
    $( "#tabs" ).tabs();
  });
  </script>
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
        </ul>
      </div>
    </div>


  <div id="tabs">
    <ul>
      <li><a href="#tabs-1">Create Poll</a></li>
      <li><a href="#tabs-2">Search Polls</a></li>
      <li><a href="#tabs-3">All Polls</a></li>
    </ul>
    <div id="tabs-1">
   	 <?php require('create_poll_body.php');?>
    </div>
    <div id="tabs-2">
      <?php require('search_body.php');?>
    </div>
    <div id="tabs-3">
      <?php require('list_polls.php');?>
    </div>
  </div>




<?php include_once('templates/footer.php'); ?>
