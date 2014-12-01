<?php include_once('templates/header.php'); ?>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> <!-- for jquery-->
	<script type="text/javascript" src="js/jquery-passy.js"></script> <!-- required for password rating-->
<link rel="stylesheet" href="style.css" type="text/css">
  <form id="Register" action = "register.php" method = "post">
    <div class="Info">UserName:<input type="text" name = "user" required="true">
                      Name:<input type="text" name = "name" required="true">
                      Email:<input type="email" name = "email" required="true">
                      Password:<input type="password" name = "pass" id="input" required="true">
                      <span id="output"></span>
                      Confirm Password:<input type="password" name="confPass" required="true">
                      <script type="text/javascript" src="js/strong_password.js"></script>
    </div>
    <input type="submit" value="Register"/>
</form>


<?php include_once('templates/footer.php'); ?>
