
	<?php include_once('templates/header.php'); ?>
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
        <h1 class="modal-title" id="registerModalLabel">REGISTER</h1>
      </div>
      <div class="modal-body">
<div class="jumbotron" id="j1">
	<div class = "container">
		<div id="register">
			<form class="form-horizontal" role="form" action="register.php" method="post">
				<div class="form-group">
					<!--<label for="user" class="col-sm-2 control-label">USERNAME</label>-->
					<div class="col-sm-10">
						<input type="text" name="user" class="form-control" id="user"
						required="true" placeholder="USERNAME">
					</div>
					
					<div class="col-sm-10">
						<input type="text" name="name"  class="form-control" id="name"
						required="true" placeholder="NAME">
					</div>
					
					<div class="col-sm-10">
						<input type="email" name="email"  class="form-control" id="email"
						required="true" placeholder="E-MAIL">
					</div>
					
					<div class="col-sm-10">
						<input type="password" name="pass" class="form-control" id="input" required="true" placeholder="PASSWORD">
					</div>
					<span id="output"></span>
					
					<div class="col-sm-10">
						<input type="password"  name="confPass" class="form-control" id="confPass" required="true" placeholder="CONFIRM PASSWORD">
					</div>
					  <script type="text/javascript" src="js/strong_password.js"></script>
					<div class="col-sm-10">
						<button type="submit" id="button" class="btn btn-primary">REGISTER</button>
					</div>
				</div>
			 </form>
		</div>
	</div>
</div>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
       
      </div>
    </div>
  </div>
</div>


<?php include_once('templates/footer.php'); ?>
