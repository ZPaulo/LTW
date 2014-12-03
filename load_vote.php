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

  $questions = array(array());
  $questions[0][0] = $row['qText'];
  $questions[0][1] = $row['idQuestion'];

  while($row = $stmt->fetch()){
    $questions[][0] = $row['qText'];
    $questions[][1] = $row['idQuestion'];
  }
?>
  <legend><?php echo $poll; ?></legend>
  <?php
  $i = 0;
  foreach($questions as $question){
    ?> <div id = Question><?php echo $question[0]; ?></div>
    <?php
    $stmt = $db->prepare('SELECT * FROM Answer WHERE idQuestion = ? AND idPoll = ?');
    $stmt->execute(array($question[1],$idPoll));

    while($row = $stmt->fetch()){?>
      <div id = Answer> <input type="radio" name=<?php echo "answer".$i; ?> value=<?php echo $row['aText']; ?>><?php echo $row['aText']; ?> (<?php echo $row['votes']; ?> votes) </div><br>
    <?php
    }
    $i++;
  }

}
?>
