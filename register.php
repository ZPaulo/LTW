<?php
$db = new PDO('sqlite:db/dataBase.db');

  function check_user($user){
    global $db;
    $chk = $db->prepare('SELECT * FROM User WHERE user = ?');
    $chk->execute(array($user));
    if(!$chk->fetch())
      return true;
    else
      return false;
  }

function register_user(){
  global $db;
  try {
    $user = $_POST['user'];
    $name = $_POST['name'];
    $email = $_POST['email'];
	  $hashPass=md5($_POST['pass']);
    $pass = $hashPass;
    if(check_user($user))
    {
      $ins = $db->prepare('INSERT INTO User (user,name,email,password) Values (?, ?, ?, ?)');
      $ins->execute(array($user,$name,$email,$pass));
      $msg = "Registration was succesfull :)";
      return $msg;
    }
    else
      {
        $msg = "Username already taken, please choose another";
        return $msg;
      }

  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

session_start();

$_SESSION['Msg'] = register_user();

header('Location: login_body.php');

?>
