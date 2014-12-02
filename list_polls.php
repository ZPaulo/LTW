<?php

$db = new PDO('sqlite:db/dataBase.db');

$stmt = $db->prepare('SELECT * FROM Poll');
$stmt->execute();
while($row = $stmt->fetch()){?>
  <li><a href=<?php echo "vote_poll_body.php?poll=". $row['name']; ?> name=<?php echo $row['name']; ?> ><?php echo $row['name']; ?> </a></li>
<?php } ?>
