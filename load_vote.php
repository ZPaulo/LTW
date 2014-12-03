<?php


if(isset($_GET['poll']))
{
  $poll = $_GET['poll'];

  $db = new PDO('sqlite:db/dataBase.db');

  $stmt = $db->prepare('SELECT * FROM Poll WHERE name = ?');
  $stmt->execute(array($poll));
  $row = $stmt->fetch();

  $idPoll = $row['idPoll'];

  $stmt = $db->prepare('SELECT * FROM Question WHERE idPoll = ?');
  $stmt->execute(array($idPoll));
  $row = $stmt->fetch();

  $question = $row['qText'];

  $stmt = $db->prepare('SELECT * FROM Answer WHERE idQuestion = ? AND idPoll = ?');
  $stmt->execute(array($row['idQuestion'],$idPoll));
  $row = $stmt->fetch();

  $answers = array(array());
  $answers[0][0] = $row['aText'];
  $answers[0][1] = $row['votes'];
  $i = 1;
  while($row = $stmt->fetch()){
    $answers[$i][0] = $row['aText'];
    $answers[$i][1] = $row['votes'];
    $i++;
  }
  ?>
<legend><?php echo $poll; ?></legend>
 <span id = "question"><?php echo $question; ?></span>
 <?php $i = 0;
  foreach ($answers as $answer){ ?>
    <div><span><?php echo $answer[0]; ?></span> <a href=<?php "vote.php?poll=". $poll?>>Vote</a> <?php echo $answer[1]; ?></div>
    <?php $i++;
}

  session_start();
  $_SESSION['sel_quest'] = $question;
}
?>
