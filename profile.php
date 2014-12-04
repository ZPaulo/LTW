<?php

session_start();

if(isset($_SESSION['username'])){

  $db = new PDO('sqlite:db/dataBase.db');

  $ans = $db->prepare('SELECT * FROM User WHERE user = ?');
  $ans->execute(array($_SESSION['username']));
  $row = $ans->fetch();
  $idUser = $row['idUser'];

  $stmt = $db->prepare('SELECT * FROM Poll WHERE idUser = ?');
  $stmt->execute(array($idUser));

  if(!($row = $stmt->fetch())){ ?>
    <li> <p> You have no created polls </p> </li>
  <?php }
  else{ ?>
    <li> <?php echo "ID:   ". $row['idPoll']. "            Name:      ".$row['name']; ?><a href= <?php echo "manage_body.php?poll=".$row['name']; ?> >Manage</a> <a href= "Share" >Share</a></li><br><br>
    <?php
  }


  while($row = $stmt->fetch()){ ?>
    <li> <?php echo "ID:   ". $row['idPoll']. "            Name:      ".$row['name']; ?><a href= <?php echo "manage_body.php?poll=".$row['name']; ?> >Manage</a><a href= "Share" >Share</a></li><br><br>
      <?php  }

}


?>
