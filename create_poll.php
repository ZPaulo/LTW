<?php

session_start();

if(!isset($_SESSION['username']))
{
  $_SESSION['Msg'] = "Must login first to create a poll";
  header('Location: login_body.php');
  die("Must login first to create a poll");
}

$db = new PDO('sqlite:db/dataBase.db');

function add_question(){
  $questions = array(array());
  $i = 0;
  $j = 0;
  while(isset($_POST['question'.$j])){
    $questions[$j][0] = $_POST['question'.$j];
    while(isset($_POST['q'.$j.'answer'.$i])){
      $questions[$j][$i+1] = $_POST['q'.$j.'answer'.$i];
      $i++;
    }
    $i = 0;
    $j++;
  }
  return $questions;
}

function insert($idPoll,$question){
  global $db;
  $ins = $db->prepare('INSERT INTO Question (idPoll,qText) Values (?, ?)');
  $ins->execute(array($idPoll,$question[0]));

  for ($i = 1; $i < count($question); $i++){
    $chk = $db->prepare('SELECT * FROM Question WHERE qText = ? AND idPoll = ?');
    $chk->execute(array($question[0],$idPoll));
    $row = $chk->fetch();

    $ins = $db->prepare('INSERT INTO Answer (idPoll,idQuestion,aText,votes) Values (?,?,?,0)');
    $ins->execute(array($idPoll,$row['idQuestion'],$question[$i]));

  }

}

function check_poll($poll){
  global $db;
  $chk = $db->prepare('SELECT * FROM Poll WHERE name = ?');
  $chk->execute(array($poll));
  if(!$chk->fetch())
    return true;
  else
    return false;
}

function create_poll(){
  if(check_poll($_POST['name'])){

    //include_once "upload.php";

    global $db;

    $chk = $db->prepare('SELECT * FROM User WHERE user = ?');
    $chk->execute(array($_SESSION['username']));
    $row = $chk->fetch();



    $ins = $db->prepare('INSERT INTO Poll (idUser,name) Values (?, ?)');

    $idUser = $row['idUser'];
    $name = $_POST['name'];

    $ins->execute(array($idUser,$name));

    $questions = add_question();

    $chk = $db->prepare('SELECT * FROM Poll WHERE name = ?');
    $chk->execute(array($name));
    $row = $chk->fetch();

    foreach ($questions as $question){
      insert($row['idPoll'],$question);
    }
  }
  else{
    $_SESSION['Msg'] = "That Poll already exists, please choose another name";
    header('Location: create_poll_body.php');
    die("Unable to create Poll");
  }

}

create_poll();

$_SESSION['sel_poll'] = $_POST['name'];
//header('Location: main_page_body.php');

?>
