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

  function check_name($name){
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
      return false;
    else
      return true;
  }

  function check_user_name($user){

    if(!preg_match("/^[a-zA-Z0-9]*$/",$user))
      return false;
    else
      return true;

  }

  function check_email_exists($email){
    global $db;
    $chk = $db->prepare('SELECT * FROM User WHERE email = ?');
    $chk->execute(array($email));
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
	  $hashPass=$_POST['pass'];
    $confirmationPass = $_POST['confPass'];


  if($confirmationPass!=$hashPass)
  {
    $msg = "Passwords don't match";
    return $msg;
  }
  else if(!check_user_name($user))
  {
    $msg = "Only letters and numbers allowed for UserName";
    return $msg;
  }
  else if(!check_name($name))
  {
    $msg = "Only letters and white space allowed for Name";
    return $msg;
  }
  else if(!check_email_exists($email))
  {
    $msg = "E-mail already used";
    return $msg;
  }
  else if(!check_user($user))
  {
    $msg = "Username already taken, please choose another";
    return $msg;
  }
  else
  {
    $pass = md5($hashPass);
    $ins = $db->prepare('INSERT INTO User (user,name,email,password) Values (?, ?, ?, ?)');
    $ins->execute(array($user,$name,$email,$pass));
    $msg = "Registration was succesfull :)";
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
