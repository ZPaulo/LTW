
<?php include_once('templates/header.php'); ?>
<script type="text/javascript" src="js/add_button.js"></script> 


<?php
  session_start();

  if(isset($_SESSION['Msg']))
    ?> <div id = "errorMsg"> <?php echo $_SESSION['Msg'];?> </div>
<?php
  unset($_SESSION['Msg']);
?>

<!--<div id="containerCreate">
<form id="Create" action = "create_poll.php" method = "post"  enctype="multipart/form-data">
   
    
    
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
-->
<script type="text/javascript">
 $(window).load(function(){
  $('#registerModal').modal('show');
 });
 </script>


  <div class="modal fade" id="registerModal" tabindex="1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h1 class="modal-title" id="registerModalLabel">CREATE A POLL</h1>
      </div>
      <div class="modal-body">
<div class="jumbotron" id="j3">
  <div class = "container">
    <div id="register">
      <form class="form-horizontal" role="form" action="create_poll.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <!--<label for="user" class="col-sm-2 control-label">USERNAME</label>-->
          <div class="col-sm-20">
            <input type="text" id="inputUser" name="name" class="form-control" placeholder="POLLNAME" required autofocus>
          </div>
          
          <div class="col-sm-20">
           Private <input type="checkbox" name="private" value="private">
          
          </div>
          
          <div class="col-sm-20">
           <input type="file" name="fileToUpload" id="fileToUpload"> <br><br>
          </div>
          
          <div class="col-sm-20">
            <input type="text" id="question0" name="question0" class="form-control" placeholder="QUESTION" required>
          </div>
          
          <div id="add_answer0" class="col-sm-20">
            <div id= "ans"><input type="text" id="q0answer0" name="q0answer0" class="form-control" placeholder="ANSWER 0" required></div>
            <div id= "ans"><input type="text" id="q0answer1" name="q0answer1" class="form-control" placeholder="ANSWER 1" required></div>
            <input type = "button" name ="addAns" id = "addAns0" value = "Add Answer">
          </div>
           
          <div class="col-sm-20">
            
            <button type="submit" id="button" class="btn btn-primary">CREATE</button>
          </div>
          
           <div class="col-sm-20">
           </div>
        </div>
       </form>
    </div>
  </div>
</div>
</div>
 <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
      <input type = "button" class="btn btn-default" name ="addQue" id = "addQue" value = "Add Question">
       
      </div>
</div>

    </div>
  </div>



<?php include_once('templates/footer.php'); ?>