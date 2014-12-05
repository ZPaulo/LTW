<?php include_once('templates/header.php'); ?>
<?php
  session_start();

  if(isset($_SESSION['Msg']))
  ?> <div id = "errorMsg"> <?php echo $_SESSION['Msg'];?> </div>
  <?php
  unset($_SESSION['Msg']);
  ?>

  <script type="text/javascript">
 $(window).load(function(){
  $('#voteModal').modal('show');
 });
 </script>

<div class="modal fade" id="voteModal" tabindex="1" role="dialog" aria-labelledby="voteModalLabel" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h1 class="modal-title" id="registerModalLabel">MAKE YOUR VOTE</h1>
      </div>
      <div class="modal-body">
<div class="jumbotron" id="j3">
<form id="Vote" action = <?php echo "vote.php?poll=". $_GET['poll'] ?> method = "post">
  <div id="voteContainer">

    <?php require('load_vote.php');?>
  </div>
</form>
</div>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
       
       
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="js/animate_vote.js" ></script>



<?php include_once('templates/footer.php'); ?>
