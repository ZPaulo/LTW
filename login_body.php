<?php

session_start();

if(isset($_SESSION['Msg']))
echo $_SESSION['Msg'];

unset($_SESSION['Msg']);

?>

<link rel="stylesheet" href="style.css" type="text/css">
<?php include_once('templates/header.php'); ?>
 <div id ="login">

<form id="Login" action = "login.php" method = "post">
	 <p><h1> Login </h1> <p>
       <br/>
<div class="Info"><input type="text" name = "user" placeholder="Username"><br/>
                  <input type="password" name = "pass" placeholder="Password"><br/>
</div>
    <button id="button" type="submit"> Log in </button>
</form>
</div>



<?php include_once('templates/footer.php'); ?>
