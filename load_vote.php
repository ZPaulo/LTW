<?php


if(isset($_GET['poll']))
{
  $poll = $_GET['poll'];

  $db = new PDO('sqlite:db/dataBase.db');

  $stmt = $db->prepare('SELECT * FROM Poll WHERE name = ?');
  $stmt->execute(array($poll));
  $row = $stmt->fetch();

  $idPoll = $row['idPoll'];
  $poll_image = $row['image'];

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
  <legend><?php echo $poll; ?></legend>
  <img src=<?php echo "uploads/".$poll_image ?> alt="" width="300" height="200">
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
