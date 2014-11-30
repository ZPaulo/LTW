<?php include_once('templates/header.php'); ?>

<form id="Vote" action = "vote.php" method = "post">
  <div class = "Poll">
    <fieldset>
      <?php require('load_vote.php');?>
      <input type="submit" value="Vote"/>
    </fieldset>
  </div>
</form>



<?php include_once('templates/footer.php'); ?>
