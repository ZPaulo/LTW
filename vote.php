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
      $idQuestion = $row['idQuestion'];
      $ans->execute(array($idQuestion,$idPoll,$_POST['answer'.$i]));
      $row = $ans->fetch();

      $inc_vote = $row['votes']+1;


      $ans = $db->prepare('UPDATE Answer SET votes = ? WHERE idAnswer = ?');
      $idAnswer =$row['idAnswer'];
      $ans->execute(array($inc_vote,$idAnswer));

      if(isset($_SESSION['username'])){
        $ans = $db->prepare('SELECT * FROM User WHERE user = ?');
        $ans->execute(array($_SESSION['username']));
        $row = $ans->fetch();

        $ans = $db->prepare('INSERT INTO UserAnswers (idUser,idPoll,idQuestion,idAnswer) Values (?, ?, ?, ?)');
        $ans->execute(array($row['idUser'],$idPoll,$idQuestion,$idAnswer));
      }

    }

    $i++;

  }

}
else{
  session_start();
  $_SESSION['Msg'] = "You cannot vote blank";
}
header('Location: main_page_body.php');

?>
