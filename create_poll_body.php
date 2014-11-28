<?php include_once('templates/header.php'); ?>

<form id="Create" action = "create_poll.php" method = "post">
  <div class="Info">
    Poll Name:<input type="text" name = "name">
    Question :<input type="text" name = "question1">
    Answer 1:<input type="text" name = "answer1">
    Answer 2:<input type="text" name = "answer2">
    Answer 3:<input type="text" name = "answer3">
  </div>
  <input type="submit" value="Create!"/>
</form>

<?php include_once('templates/footer.php'); ?>
