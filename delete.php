<?php

$db = new PDO('sqlite:db/dataBase.db');

function delete($idPoll)
{

  global $db;

    $updP = $db->prepare('DELETE FROM Poll WHERE idPoll=?');
    $updP->execute(array($idPoll));

	$updQ = $db->prepare('DELETE FROM Question WHERE idPoll=?');
    $updQ->execute(array($idPoll));

    $updA = $db->prepare('DELETE FROM Answer WHERE idPoll=?');
    $updA->execute(array($idPoll));

    $updA = $db->prepare('DELETE FROM UserAnswers WHERE idPoll=?');
    $updA->execute(array($idPoll));

}

delete($_GET['idPoll']);

header('Location: profile_body.php');

?>