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
      return "true";
    }
    else
    {
      return "Invalid UserName or Password";
    }

  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

session_start();

$msg = login();

$_SESSION['Msg'] = $msg;
$_SESSION['username'] = $_POST['user'];

if($msg == "true")
  header('Location: create_poll_body.php');
else
  header('Location: login_body.php');

?>
