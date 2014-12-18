
<?php include_once('templates/header.php'); ?>

    <?php

     

    if(isset($_SESSION['Msg']))
    echo $_SESSION['Msg'];

    unset($_SESSION['Msg']);

    ?>
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
        <h1 class="modal-title" id="registerModalLabel">SIGN IN</h1>
      </div>
      <div class="modal-body">

<div class="jumbotron" id="j2">
 <div class="container">
      <form class="form-signin" action="login.php" method ="post" role="form">
        <label for="inputUser" class="sr-only">USERNAME</label>
        <input type="text" id="inputUser" name="user" class="form-control" placeholder="USERNAME" required autofocus>
        <label for="inputPassword" class="sr-only">PASSWORD</label>
        <input type="password" id="inputPassword" name="pass" class="form-control" placeholder="PASSWORD" required>
        <button type="submit" id="button" class="btn btn-primary">LOGIN</button>
      </form>

    </div> <!-- /container -->
</div>
</div>
 <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
     
        </form>
      </div>
    </div>
  </div>
</div>



<?php include_once('templates/footer.php'); ?>
