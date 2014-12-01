<?php include_once('templates/header.php'); ?>

<link rel="stylesheet" href="style.css" type="text/css">
  <form id="Register" action = "register.php" method = "post">
    <div class="Info">UserName:<input type="text" name = "user" required="true">
                      Name:<input type="text" name = "name" required="true">
                      Email:<input type="email" name = "email" required="true">
                      Password:<input type="password" name = "pass" required="true">
                      Confirm Password:<input type="password" name="confPass" required="true">
    </div>
    <input type="submit" value="Register"/>
</form>

<?php include_once('templates/footer.php'); ?>
