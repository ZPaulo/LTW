<?php
//Start the session
session_start();

//Access your POST variables
$msg = $_SESSION['Msg'];

//Unset the useless session variable
unset($_SESSION['Msg']);


include_once('templates/header.php');
?>

<form id="Login">
	<div class="Info">
		<?php echo $msg; ?>
	</div>
</form>

<?php include_once('templates/footer.php'); ?>
