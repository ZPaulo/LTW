<?php

session_start();

$db = new PDO('sqlite:db/dataBase.db');

function add_question(){
  $questions = array(array());
  $questions[0][0] = $_POST['question1'];
  $questions[0][1] = $_POST['answer1'];
  $questions[0][]= $_POST['answer2'];
  $questions[0][] = $_POST['answer3'];

  return $questions;
}

function insert($idPoll,$question){
  global $db;
  $ins = $db->prepare('INSERT INTO Question (idPoll,qText) Values (?, ?)');
  $ins->execute(array($idPoll,$question[0]));


  for ($i = 1; $i < count($question); $i++){
    $chk = $db->prepare('SELECT * FROM Question WHERE qText = ?');
    $chk->execute(array($question[0]));
    $row = $chk->fetch();

    $ins = $db->prepare('INSERT INTO Answer (idQuestion,qText) Values (?, ?)');
    $ins->execute(array($row['idQuestion'],$question[$i]));

  }

}

function create_poll(){
  global $db;

  include_once "upload.php";

  $chk = $db->prepare('SELECT * FROM User WHERE user = ?');
  $chk->execute(array($_SESSION['username']));
  $row = $chk->fetch();

  $ins = $db->prepare('INSERT INTO Poll (idUser,name) Values (?, ?)');

  $idUser = $row['idUser'];
  $name = $_POST['name'];

  $ins->execute(array($idUser,$name));

  $questions = add_question();

  for ($i = 0; $i < count($questions); $i++){
    $chk = $db->prepare('SELECT * FROM Poll WHERE name = ?');
    $chk->execute(array($name));
    $row = $chk->fetch();

    insert($row['idPoll'],$questions[$i]);
  }
}

create_poll();

//header('Location: create_poll_body.php');

?>
