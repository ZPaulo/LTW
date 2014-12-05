<?php
if(isset($_GET['searchData'])){
  include_once('db/connection.php');
  global $db;

  $poll = $_GET['searchData'];


  $stmt = $db->prepare('SELECT * FROM Poll WHERE name Like ?');
  $stmt->execute(array('%'.$poll.'%'));

  while($row = $stmt->fetch()){
    if($row['private'] == 0){
    $sResults .= '<li><p> '. $row['idPoll']. ' <a href=vote_poll_body.php?poll='. $row['name'].' name='.$row['name'].' >'.$row['name'].'</a></p></li>';
    }
  }

  echo   $sResults;
}

?>
