<?php include_once('templates/header.php'); ?>


<div id="info">
	<h1>YOUPOLL</h1>
		<h2>The place where YOU poll.</h2>
       <br/>
</div>

<div class="jumbotron" id="j1">
	<div class = "container">
		<div id="pollList">
			<?php require('list_polls.php'); ?>
		</div>
	</div>
</div>





<!--
<div id="index">
  		<div id='cssmenu'>
			<ul>
   				<li><a href='login_body.php'><span>Login</span></a></li>
   				<li class='last'><a href='register_body.php'><span>Register</span></a></li>
			</ul>
		</div>
</div>-->
<?php include_once('templates/footer.php'); ?>


