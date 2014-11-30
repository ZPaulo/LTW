<?php 

//Start the session
session_start();

//Access your POST variables
if($_SESSION['Msg']==''){
$msg ='';
}
$msg = $_SESSION['Msg'];

//Unset the useless session variable
unset($_SESSION['Msg']);

 echo $msg; 
 
 include_once('templates/header.php'); 
?>
<link rel="stylesheet" href="style.css" type="text/css">
<form id="Login" action = "login.php" method = "post">
<div class="Info">UserName:<input type="text" name = "user">
                  Password:<input type="password" name = "pass">
</div>
    <input type="submit" value="Log in"/>
</form>	


<?php include_once('templates/footer.php'); ?>
	
