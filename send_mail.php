<?php
 
session_start();
//bordalo.joao94@gmail.com, joao-bordalo94@hotmail.com
function send_email() 
{

$emails=$_POST['emails'];
$user=$_SESSION['username'];
$name=$_POST['name'];

$to      = $emails;
$subject = $user.' wants to share '.$name.' Poll';

$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$headers .= 'From: noreply@youpoll.com' . "\r\n" .
    'Reply-To: noreply@youpoll.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$url= $_POST['url'];

$message ='<p> Dear friend of '.$user.'</p>';

$message .='<p> By his name, we, the You Poll team, are going to share the following poll: <p>';

$message.='<p> cick on the link to anwser the poll:'.$url.' <p>';

$message.='<p> Thanks for using our service <p>';


$message.='<p> The You Poll Team  <p>';

mail($to, $subject, $message, $headers);

return '<div>A email has been sent to your friends</div>';
}

echo$_POST['url'];
echo $_POST['emails'];
echo $_SESSION['username'];
echo $_POST['name'];
send_email();

header('Location: profile_body.php');

?>