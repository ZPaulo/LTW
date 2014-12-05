<?php

session_start();

if(isset($_GET['poll']))
{
  $poll = $_GET['poll'];

  $db = new PDO('sqlite:db/dataBase.db');

  $stmt = $db->prepare('SELECT * FROM Poll WHERE name = ?');
  $stmt->execute(array($poll));
  $row = $stmt->fetch();

  $idPoll = $row['idPoll'];

  if(isset($_SESSION['username'])){
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
    if($row['private'] == 1){
      $_SESSION['Msg'] = "You must login to vote in a private poll";
      header('Location: login_body.php');
      die("You must login to vote in a private poll");
    }
  }



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
  <h1><?php echo $poll; ?></h1>
  <img src=<?php echo "uploads/".$poll_image ?> alt="" width="300" height="200">
  <?php
  $i = 0;
  foreach($questions as $question){
    ?> <span id = "question"><?php echo $question[0]; ?></span>
    <?php
    $stmt = $db->prepare('SELECT * FROM Answer WHERE idQuestion = ? AND idPoll = ?');
    $stmt->execute(array($question[1],$idPoll));
    $j = 0;
    while($row = $stmt->fetch()){
      if(isset($answers)){
        if($answer[$j] == $row['idAnswer']){?>
          <div><span><?php echo $row['votes']; ?></span> <input type="radio" name=<?php echo "answer".$i; ?> disabled = "disabled" checked = "checked" value=<?php echo $row['aText']; ?>><?php echo $row['aText']; ?> (<?php echo $row['votes']; ?> votes) </div><br>
        <?php }
        else{?>
          <div><span><?php echo $row['votes']; ?></span> <input type="radio" name=<?php echo "answer".$i; ?> disabled = "disabled" value=<?php echo $row['aText']; ?>><?php echo $row['aText']; ?> (<?php echo $row['votes']; ?> votes) </div><br>
        <?php  }
        $j++;
      }
      else{ ?>
        <div><span><?php echo $row['votes']; ?></span> <input type="radio" name=<?php echo "answer".$i; ?> value=<?php echo $row['aText']; ?>><?php echo $row['aText']; ?> (<?php echo $row['votes']; ?> votes) </div><br>
        <?php  }
    }
    $i++;
  }
  ?>
  </fieldset>
  <?php if(isset($answers)){ ?>
  <input type="submit" disabled = "disabled" value="Vote!"/>
  <?php }
  else{ ?>
    <input type="submit" value="Vote!"/>
<?php  }
}
?>
