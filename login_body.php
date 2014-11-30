<?php

session_start();

if(isset($_SESSION['Msg']))
echo $_SESSION['Msg'];

unset($_SESSION['Msg']);

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
