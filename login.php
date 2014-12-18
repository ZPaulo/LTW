<?php
session_start();
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

 

$msg = login();

if($msg == "true"){
  $_SESSION['username'] = $_POST['user'];
  header('Location: index.php');
}
else{
  $_SESSION['Msg'] = $msg;
  header('Location: login_body.php');
}


?>
