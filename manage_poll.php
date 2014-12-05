<?php
$db = new PDO('sqlite:db/dataBase.db');


function change_image($idPoll)
{

  echo $_FILES['fileToUpload']['name'];
	if (empty($_FILES['fileToUpload']['name'])) {

    //Doesen't want to change this Image Field
      return;
    }
    else{
      include_once("upload.php");
      $image = $_FILES["fileToUpload"]["name"];
    }


    global $db;

    $upd = $db->prepare('UPDATE Poll SET image=? WHERE idPoll=?');
  
  	$upd->execute(array($image,$idPoll));

}

function check_poll($name){
  global $db;
  $chk = $db->prepare('SELECT * FROM Poll WHERE name = ?');
  $chk->execute(array($name));
  if(!$chk->fetch())
    return true;
  else
    return false;
}



function change_name($idPoll)
{

	if (empty($_POST['name'])) {

		//Doesen't want to change Poll Name 
    	return ;
    }
    else if (!check_poll($name)) {

    	//'Name already used'
    	return false;
    }
    else{
 
      $name = $_POST['name'];
    }


	 global $db;

    $upd = $db->prepare('UPDATE Poll SET name=? WHERE idPoll=?');
  
  	$upd->execute(array($name,$idPoll));
}


function change_privacy($idPoll)
{
  echo $_POST['private'];
	if(isset($_POST['private']))
	{
		$private= 1;
	}
	else
	{
		$private = 0;
	}

	global $db;
	$upd = $db->prepare('UPDATE Poll SET private=? WHERE idPoll=?');
  
  	$upd->execute(array($private,$idPoll));

}



function update($idPoll)
{

  change_name($idPoll);


  change_image($idPoll);
  

  change_privacy($idPoll);

}

update($_POST['idPoll']);



 header('Location: profile_body.php');

?>