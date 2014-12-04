


<script type="text/javascript" src="js/add_button.js"></script>
<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
<link type="text/css" rel="stylesheet" href="templates/menupopup.css" />

  

<?php
  session_start();

  if(isset($_SESSION['Msg']))
    ?> <div id = "errorMsg"> <?php echo $_SESSION['Msg'];?> </div>
<?php
  unset($_SESSION['Msg']);
?>

<div id="containerCreate">
<form id="Create" action = "create_poll.php" method = "post"  enctype="multipart/form-data">
    Poll Name<input type="text" required = "required" name = "name"> <br><br>
    Private <input type="checkbox" name="private" value="private">
    Image   <input type="file" name="fileToUpload" id="fileToUpload"> <br><br>
    <div id = "question0">
      Question <input type="text" name = "question0"><br>
      <div id="add_answer0">
          <div id= "ans">Answer <input type="text" required = "required" name = "q0answer0"></li> <br></div>
          <div id= "ans">Answer <input type="text" required = "required" name = "q0answer1"></li> <br></div>
          <input type = "button" name ="addAns" id = "addAns0" value = "Add">
      </div>
    </div>
    <input type = "button" name ="addQue" id = "addQue" value = "Add">
  <input type="submit" value="Create!"/>
 
 <?php include_once('share_popup.php'); ?>

 </form>
</div>
