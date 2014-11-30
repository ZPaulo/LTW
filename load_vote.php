<?php

session_start();

$poll = $_SESSION['sel_poll'];

$db = new PDO('sqlite:db/dataBase.db');

$stmt = $db->prepare('SELECT * FROM Poll WHERE name = ?');
$stmt->execute(array($poll));
$row = $stmt->fetch();

$idPoll = $row['idPoll'];

$stmt = $db->prepare('SELECT * FROM Question WHERE idPoll = ?');
$stmt->execute(array($idPoll));
$row = $stmt->fetch();

$question = $row['qText'];

$stmt = $db->prepare('SELECT * FROM Answer WHERE idQuestion = ? AND idPoll = ?');
$stmt->execute(array($row['idQuestion'],$idPoll));
$row = $stmt->fetch();

$answers = array();
$answers[0] = $row['aText'];
$i = 1;
while($row = $stmt->fetch()){
  $answers[$i] = $row['aText'];
  $i++;
}
?>

<legend><?php echo $poll; ?></legend>
<div id = Question><?php echo $question; ?></div>
<?php $i = 0;
foreach ($answers as $answer){ ?>
  <div id = Answer> <input type="radio" name="answer" value=<?php echo "answer". $i; ?>><?php echo $answer; ?> </div>
  <?php $i++;
}
unset($_SESSION['sel_poll']);
?>
