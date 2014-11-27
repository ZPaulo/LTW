<?php

function check_user($user,$hashPass){
  $db = new PDO('sqlite:db/dataBase.db');

  $stmt = $db->prepare('SELECT * FROM User WHERE user = ? AND password = ?');
  $stmt->execute(array($user, $hashPass));

  return $stmt->fetch() !== false;
}


function login(){
  try {
    $user = $_POST['user'];
    $hashPass=md5($_POST['pass']);
    if(check_user($user,$hashPass))
    {
      $msg = "Succecefull Login";
      return $msg;
    }
    else
    {
      $msg = "Invalid UserName or Password";
      return $msg;
    }

  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

session_start();

$_SESSION['Msg'] = login();
$_SESSION['username'] = $_POST['user'];

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
