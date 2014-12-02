<?php include_once('templates/header.php'); ?>


  <script type="text/javascript" src="js/add_button.js"></script>
  <link rel="stylesheet" href="style.css" type="text/css">

<body>
<?php
  session_start();

  if(isset($_SESSION['Msg']))
    ?> <div id = "errorMsg"> <?php echo $_SESSION['Msg'];?> </div>
<?php
  unset($_SESSION['Msg']);
?>
<?php include_once('templates/header.php'); ?>

<div id="container">
<form id="Create" action = "create_poll.php" method = "post"  enctype="multipart/form-data">
    Poll Name<input type="text" name = "name"> <br><br>
    Question <input type="text" name = "question1"><br>
    <div id="add_answer">
      <ul>
        <div><li>Answer <input type="text" name = "answer0"></li> <br></div>
        <div><li>Answer <input type="text" name = "answer1"></li> <br></div>
      </ul>
      <input type = "button" name ="addAns" id = "addAns" value = "Add">
    </div>
    Image   <input type="file" name="fileToUpload" id="fileToUpload"> <br><br>
  <input type="submit" value="Create!"/>
</form>
</div>

<?php include_once('templates/footer.php'); ?>
