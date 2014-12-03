<?php

session_start();

if(isset($_POST['answer']))
{

  $poll = $_GET['poll'];
  $question = $_SESSION['sel_quest'];
  $answer = $_POST['answer'];

  $db = new PDO('sqlite:db/dataBase.db');

  $stmt = $db->prepare('SELECT * FROM Poll WHERE name = ?');
  $stmt->execute(array($poll));
  $row = $stmt->fetch();
  $idPoll = $row['idPoll'];

  $stmt = $db->prepare('SELECT * FROM Question WHERE qText = ? AND idPoll = ?');
  $stmt->execute(array($question,$idPoll));
  $row = $stmt->fetch();

  $stmt = $db->prepare('SELECT * FROM Answer WHERE idQuestion = ? AND idPoll = ? AND aText = ?');
  $stmt->execute(array($row['idQuestion'],$idPoll,$answer));
  $row = $stmt->fetch();

  $inc_vote = $row['votes']+1;

  $stmt = $db->prepare('UPDATE Answer SET votes = ? WHERE idAnswer = ?');
  $stmt->execute(array($inc_vote,$row['idAnswer']));


  unset($_SESSION['sel_quest']);
}
else{
  $_SESSION['Msg'] = "You cannot vote blank";
}

header('Location: main_page_body.php');

?>
