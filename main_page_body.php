<?php include_once('templates/header.php'); ?>

 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
<body>

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
</body>




<?php include_once('templates/footer.php'); ?>
