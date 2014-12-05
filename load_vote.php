<?php

session_start();

if(isset($_GET['poll']))
{
  $poll = $_GET['poll'];

  $db = new PDO('sqlite:db/dataBase.db');

  $stmt = $db->prepare('SELECT * FROM Poll WHERE name = ?');
  $stmt->execute(array($poll));
  $row = $stmt->fetch();

  $poll_image = $row['image'];
  $idPoll = $row['idPoll'];

  if(isset($_SESSION['username'])){
    $isUser = 1;
    $ans = $db->prepare('SELECT * FROM User WHERE user = ?');
    $ans->execute(array($_SESSION['username']));
    $row = $ans->fetch();

    $ans = $db->prepare('SELECT * FROM UserAnswers WHERE idUser = ? AND idPoll = ?');
    $ans->execute(array($row['idUser'],$idPoll));
    if($row = $ans->fetch()){
      $answers = array();
      $answers[0] = $row['idAnswer'];
      $i = 1;
      while($row = $ans->fetch()){
        $answers[$i] = $row['idAnswer'];
      }
    }
  }
  else{
    $isUser = 0;
    if($row['private'] == 1){
      $_SESSION['Msg'] = "You must login to vote in a private poll";
      header('Location: login_body.php');
      die("You must login to vote in a private poll");
    }
  }




  $stmt = $db->prepare('SELECT * FROM Question WHERE idPoll = ?');
  $stmt->execute(array($idPoll));

  $questions = array(array());

  $i = 0;
  while($row = $stmt->fetch()){
    $questions[$i][0] = $row['qText'];
    $questions[$i][1] = $row['idQuestion'];
    $i++;
  }
?>
  <h1><?php echo $poll; ?></h1>
  <img src=<?php echo "uploads/".$poll_image ?> alt="" width="300" height="200">
  <?php
  $i = 0;
  foreach($questions as $question){
    ?> <section class = <?php echo $question[1]; ?> > <span id = "question"><?php echo $question[0]; ?></span>
    <?php
    $stmt = $db->prepare('SELECT * FROM Answer WHERE idQuestion = ? AND idPoll = ?');
    $stmt->execute(array($question[1],$idPoll));
    $j = 0;
    while($row = $stmt->fetch()){
      if(isset($answers)){ ?>
          <div><span id="votes"><?php echo $row['votes']; ?></span> <?php echo $row['aText']; ?> </div><br>
      <?php }
      else{ ?>
        <div><span></span><a class = <?php echo $question[1]; ?> user = <?php echo $isUser; ?> votes = <?php echo $row['votes']; ?> href="" name=<?php echo $row['idAnswer']; ?>>Vote</a> <?php echo $row['aText']; ?> </div><br>
        <?php  }
    } ?>
  </section> <?php
    $i++;
  }

}
?>
