<?php include_once('templates/header.php'); ?>

<script type="text/javascript">
 $(window).load(function(){
  $('#aboutModal').modal('show');
 });
 </script>

<div class="modal fade" id="aboutModal" tabindex="1" role="dialog" aria-labelledby="aboutModalLabel" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h1 class="modal-title" id="aboutModalLabel">ABOUT</h1>
      </div>
      <div class="modal-body">
		<div class="jumbotron" id="j6">
 			<div class="container">
 			 <p>YouPoll is a site created by <b>João Bordalo</b>,<b>João Soares</b> and <b>José Paulo Oliveira</b> for the course <b>LTW @ FEUP</b></p>
 			 <p>With Youpoll you can create Polls with multiple questions and answers, vote and share these with your friends via e-mail ou social media</p>
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