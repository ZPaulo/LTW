<?php
$db = new PDO('sqlite:db/dataBase.db');

session_start();


function send_email($email,$name)
{

$to      = $email;
$subject = 'Activate Your Email';

$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$headers .= 'From: noreply@youpoll.com' . "\r\n" .
    'Reply-To: noreply@youpoll.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
$url= BASE_PATH . '/verify.php?email=' . urlencode($email) ;

$message ='<p> Dear '.$name.'</p>';

$message .='<p> To activate your account please click on Activate buttton <p>';

$message.='<table cellspacing="0" cellpadding="0"> <tr>';
$message .= '<td align="center" width="300" height="40" bgcolor="#000091" style="-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;

color: #ffffff; display: block;">';

$message .= '<a href="'.$url.'" style="color: #ffffff; font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none;

line-height:40px; width:100%; display:inline-block">Click to Activate</a>';
$message .= '</td> </tr> </table>';


mail($to, $subject, $message, $headers);
return '<div>A confirmation email has been sent to <b>'. $email.' </b> Please click on the Activate Button to Activate your account </div>';
}


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
    
     return send_email($email,$name);
  }

  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

 

$_SESSION['Msg'] = register_user();

header('Location: login_body.php');

?>
