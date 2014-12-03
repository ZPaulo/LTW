<?php include_once('templates/header.php'); ?>

<?php
  session_start();

  if(isset($_SESSION['Msg']))
  ?> <div id = "errorMsg"> <?php echo $_SESSION['Msg'];?> </div>
  <?php
  unset($_SESSION['Msg']);
  ?>
<link rel="stylesheet" href="style.css" type="text/css">
<div id="container">
<form id="Vote" action = <?php echo "vote.php?poll=". $_GET['poll'] ?> method = "post">
  <div class = "Poll">
    <fieldset>
      <?php require('load_vote.php');?>
    </fieldset>
  </div>
</form>
</div>



<?php include_once('templates/footer.php'); ?>
