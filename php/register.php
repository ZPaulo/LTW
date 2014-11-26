<?php

  function check_user($user){
    $db = new PDO('sqlite:dataBase.db');
    $chk = $db->prepare('SELECT * FROM User WHERE user = ?');
    $chk->execute(array($user));
    if(!$chk->fetch()){
      return true;
    }

    else
    {
      echo 'Sorry but that user is taken';
      return false;
    }
  }

function register_user(){
  $db = new PDO('sqlite:dataBase.db');
  try {
    $ins = $db->prepare('INSERT INTO User (user,nome,email,password) Values (?, ?, ?, ?)');
    $user = $_POST['user'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    if(check_user($user))
      $ins->execute(array($user,$name,$email,$pass));
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}


register_user();


?>
