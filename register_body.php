
	<?php include_once('templates/header.php'); ?>

	<div class="modal fade" id="myModal" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
<div class="jumbotron" id="j1">
	<div class = "container">
		<div id="register">
			<h1><b>REGISTER</b></h1><br>
			<form class="form-horizontal" role="form" action="register.php" method="post">
				<div class="form-group">
					<label for="user" class="col-sm-2 control-label">USERNAME</label>
					<div class="col-sm-10">
						<input type="text" name="user" class="form-control" id="user"
						required="true" placeholder="USERNAME">
					</div>
					<label for="name" class="col-sm-2 control-label">NAME</label>
					<div class="col-sm-10">
						<input type="text" name="name"  class="form-control" id="name"
						required="true" placeholder="NAME">
					</div>
					<label for="email" class="col-sm-2 control-label">E-MAIL</label>
					<div class="col-sm-10">
						<input type="email" name="email"  class="form-control" id="email"
						required="true" placeholder="E-MAIL">
					</div>
					<label for="password" class="col-sm-2 control-label">PASSWORD</label>
					<div class="col-sm-10">
						<input type="password" name="pass" class="form-control" id="input" required="true" placeholder="PASSWORD">
					</div>
					<span id="output"></span>
					<label for="password" class="col-sm-2 control-label">CONFIRM PASSWORD</label>
					<div class="col-sm-10">
						<input type="password"  name="confPass" class="form-control" id="confPass" required="true" placeholder="CONFIRM PASSWORD">
					</div>
					  <script type="text/javascript" src="js/strong_password.js"></script>
					<div class="col-sm-10">
						 <button id ="button" type="submit"> Register </button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<?php include_once('templates/footer.php'); ?>
