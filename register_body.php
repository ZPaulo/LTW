<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> <!-- for jquery-->
	<script type="text/javascript" src="js/jquery-passy.js"></script> <!-- required for password rating-->
<link rel="stylesheet" href="style.css" type="text/css">
<?php include_once('templates/header.php'); ?>
  <div id ="register">

    <form id="Register" action = "register.php" method = "post">
       <p><h1> Sign up </h1> <p>
       <br/>
    <div class="Info">UserName:<input type="text" name = "user" required="true"/> <br/>
                      Name:<input type="text" name = "name" required="true"/> <br/>
                      Email:<input type="email" name = "email" required="true"/> <br/>
                      Password:<input type="password" name = "pass" id="input" required="true"/> 
                      <span id="output"></span><br/>
                      Confirm Password:<input type="password" name="confPass" required="true"/> 
                      <script type="text/javascript" src="js/strong_password.js"></script><br/>
    </div>
    <input type="submit" value="Register"/>
</form>



<?php include_once('templates/footer.php'); ?>


