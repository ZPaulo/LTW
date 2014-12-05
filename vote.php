<?php

session_start();

if(isset($_POST['answer'])){
  $idAnswer = $_POST['answer'];

  $db = new PDO('sqlite:db/dataBase.db');

  $stmt = $db->prepare('SELECT * FROM Answer WHERE idAnswer = ?');
  $stmt->execute(array($idAnswer));
  $row = $stmt->fetch();
  $idPoll = $row['idPoll'];
  $idQuestion = $row['idQuestion'];

  $inc_vote = $row['votes']+1;

  $ans = $db->prepare('UPDATE Answer SET votes = ? WHERE idAnswer = ?');
  $ans->execute(array($inc_vote,$idAnswer));

  if(isset($_SESSION['username'])){
        $ans = $db->prepare('SELECT * FROM User WHERE user = ?');
        $ans->execute(array($_SESSION['username']));
        $row = $ans->fetch();

        $ans = $db->prepare('INSERT INTO UserAnswers (idUser,idPoll,idQuestion,idAnswer) Values (?, ?, ?, ?)');
        $ans->execute(array($row['idUser'],$idPoll,$idQuestion,$idAnswer));
  }

  echo true;
}
else{
  echo false;
}

?>
