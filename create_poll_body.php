<!DOCTYPE html>
<html>
<head>
  <title> YouPoll </title>
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="add_button.js"></script>

  <meta charset = "UTF-8">
</head>
<body>
<form id="Create" action = "create_poll.php" method = "post"  enctype="multipart/form-data">
    Poll Name<input type="text" name = "name"> <br><br>
    Question <input type="text" name = "question1"><br>
    <div id="add_answer">
      <ul>
        <li>Answer 1<input type="text" name = "answer1"></li> <br>
        <li>Answer 2<input type="text" name = "answer2"></li> <br>
        <li>Answer 3<input type="text" name = "answer3"></li> <br>
      </ul>
      <input type = "button" name ="addAns" id = "addAns" value = "Add">
    </div>
    Image   <input type="file" name="fileToUpload" id="fileToUpload"> <br><br>
  <input type="submit" value="Create!"/>
</form>

<?php include_once('templates/footer.php'); ?>
