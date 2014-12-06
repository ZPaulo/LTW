<?php


session_start();
unset($_SESSION['Msg']);

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

    if (empty($_FILES['fileToUpload']['name'])) {
      $image = "default.jpg";
    }
    else{
      include_once("upload.php");
      $image = $_FILES["fileToUpload"]["name"];
    }


    if(isset($_SESSION['Msg'])){
      echo $_SESSION['Msg'];
    }
    else{
      global $db;

      if(isset($_POST['private'])){
        if(!isset($_SESSION['username']))
        {
          $_SESSION['Msg'] = "Must login first to create a private poll";
          header('Location: login_body.php');
          die("Must login first to create a poll");
        }
        $private = 1;
      }
      else{
        $private = 0;
      }

      $chk = $db->prepare('SELECT * FROM User WHERE user = ?');
      $chk->execute(array($_SESSION['username']));

      if(!($row = $chk->fetch())){
        $idUser = 0;
      }
      else{
        $idUser = $row['idUser'];
      }

      $questions = add_question();

      $ins = $db->prepare('INSERT INTO Poll (idUser,name,image,private) Values (?, ?, ?, ?)');

      $name = $_POST['name'];

      $ins->execute(array($idUser,$name,$image,$private));
      echo $image;

      $chk = $db->prepare('SELECT * FROM Poll WHERE name = ?');
      $chk->execute(array($name));
      $row = $chk->fetch();
      echo $row['idPoll'];

      foreach ($questions as $question){
        insert($row['idPoll'],$question);
      }
    }
  }
  else{
    $_SESSION['Msg'] = "That Poll already exists, please choose another name";
  }
}


create_poll();


if(isset($_SESSION['Msg'])){
  header('Location: create_poll_body.php');
}
else{
  header('Location: profile_body.php');
}


?>
