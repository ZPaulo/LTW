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
<div class="Info">UserName:<input type="text" name = "user"><br/>
                  Password:<input type="password" name = "pass">
</div>
    <input type="submit" value="Log in"/>
</form>
</div>



<?php include_once('templates/footer.php'); ?>
