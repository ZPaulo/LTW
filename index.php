<?php include_once('templates/header.php'); ?>


<div id="info">
	<h1>YOUPOLL</h1>
		<h2>The place where YOU poll.</h2>
       <br/>
</div>


	<div class = "container">
		<div id="pollList">
			<?php require('list_polls.php'); ?>
		</div>
	</div>

<?php include_once('templates/footer.php'); ?>


