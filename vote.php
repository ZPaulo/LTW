<?php

session_start();

if(isset($_POST['answer0']))
{
  $poll = $_GET['poll'];

  $db = new PDO('sqlite:db/dataBase.db');

  $stmt = $db->prepare('SELECT * FROM Poll WHERE name = ?');
  $stmt->execute(array($poll));
  $row = $stmt->fetch();
  $idPoll = $row['idPoll'];

  $stmt = $db->prepare('SELECT * FROM Question WHERE idPoll = ?');
  $stmt->execute(array($idPoll));

  $i = 0;
  while($row = $stmt->fetch()){
    if(isset($_POST['answer'.$i])){
      $ans = $db->prepare('SELECT * FROM Answer WHERE idQuestion = ? AND idPoll = ? AND aText = ?');
      $ans->execute(array($row['idQuestion'],$idPoll,$_POST['answer'.$i]));
      $row = $ans->fetch();

      $inc_vote = $row['votes']+1;


      $ans = $db->prepare('UPDATE Answer SET votes = ? WHERE idAnswer = ?');
      $ans->execute(array($inc_vote,$row['idAnswer']));

    }

    $i++;

  }

}
else{
  $_SESSION['Msg'] = "You cannot vote blank";
}
header('Location: main_page_body.php');

?>
