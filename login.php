<?php


function check_user($user,$hashPass){
    $db = new PDO('sqlite:db/dataBase.db');
    $chk = $db->prepare('SELECT * FROM User WHERE user = ?');
    $chk->execute(array($user));
	$row = $chk->fetch();
    if(!$row)
	{	
		if($row['password'] == $hashPass)
			return true;
	}
      return false;
}


function login(){
try {
		$user = $_POST['user'];
		$hashPass=md5($_POST['pass']);
		$pass = $hashPass;
		if(check_user($user,$hashPass))
		{
			$msg = "Succecefull Login";
			echo $msg;
			return true;
		}
		else
		{
			$msg = "Invalid UserName or Password";
			echo $msg;
			return false;
		}

		
	} catch (PDOException $e) {
    echo $e->getMessage();
  }
}
$value=login();
echo $value;
if($value)
{
header('Location: register_body.php');
}
else
{
echo $value;
	//header('Location: fake.php');
}

?>	
	
	