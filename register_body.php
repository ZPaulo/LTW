<?php include_once('templates/header.php'); ?>

  <form id="Register" action = "register.php" method = "post">
    <div class="Info">UserName:<input type="text" name = "user">
                      Name:<input type="text" name = "name">
                      Email:<input type="text" name = "email">
                      Password:<input type="password" name = "pass">
    </div>
    <input type="submit" value="Log in"/>
</form>

<?php include_once('templates/footer.php'); ?>
