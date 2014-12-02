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
  <div id = Question><?php echo $question; ?></div>
  <?php $i = 0;
  foreach ($answers as $answer){ ?>
    <div id = Answer> <input type="radio" name="answer" value=<?php echo $answer[0]; ?>><?php echo $answer[0]; ?> (<?php echo $answer[1]; ?> votes) </div>
    <?php $i++;
  }

  $_SESSION['sel_quest'] = $question;
}
?>
