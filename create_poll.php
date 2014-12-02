<?php

session_start();

$db = new PDO('sqlite:db/dataBase.db');

function add_question(){
  $questions = array(array());
  $i = 1;
  $questions[0][0] = $_POST['question1'];
  while(isset($_POST['answer'.$i])){
    $questions[0][$i] = $_POST['answer'.($i-1)];
    $i++;
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

    for ($i = 0; $i < count($questions); $i++){
      $chk = $db->prepare('SELECT * FROM Poll WHERE name = ?');
      $chk->execute(array($name));
      $row = $chk->fetch();

      insert($row['idPoll'],$questions[$i]);
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
$_SESSION['sel_quest'] = $_POST['question1'];
header('Location: vote_poll_body.php');

?>
