<?php include_once('templates/header.php'); ?>
<?php
  session_start();

  if(isset($_SESSION['Msg']))
  ?> <div id = "errorMsg"> <?php echo $_SESSION['Msg'];?> </div>
  <?php
  unset($_SESSION['Msg']);
  ?>

<form id="Vote" action = <?php echo "vote.php?poll=". $_GET['poll'] ?> method = "post">
  <div id="voteContainer">
    
    <?php require('load_vote.php');?>
  </div>
</form>





<?php include_once('templates/footer.php'); ?>
