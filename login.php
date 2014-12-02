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

if($msg == "true"){
  $_SESSION['username'] = $_POST['user'];
  header('Location: main_page_body.php');
}
else{
  $_SESSION['Msg'] = $msg;
  header('Location: login_body.php');
}


?>
