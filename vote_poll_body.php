<?php include_once('templates/header.php'); ?>

<?php
  session_start();

  if(isset($_SESSION['Msg']))
  ?> <div id = "errorMsg"> <?php echo $_SESSION['Msg'];?> </div>
  <?php
  unset($_SESSION['Msg']);
  ?>

<form id="Vote" action = "vote.php" method = "post">
  <div class = "Poll">
    <fieldset>
      <?php require('load_vote.php');?>
      <input type="submit" value="Vote"/>
    </fieldset>
  </div>
</form>



<?php include_once('templates/footer.php'); ?>
