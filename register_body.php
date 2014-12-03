<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> <!-- for jquery-->
	<script type="text/javascript" src="js/jquery-passy.js"></script> <!-- required for password rating-->
<link rel="stylesheet" href="style.css" type="text/css">
<?php include_once('templates/header.php'); ?>
  <div id ="register">

    <form id="Register" action = "register.php" method = "post">
       <p><h1> Sign up </h1> <p>
       <br/>
    <div class="Info"><input type="text" name = "user" required="true" placeholder="Username"/> <br/>
                      <input type="text" name = "name" required="true" placeholder="Name"/> <br/>
                      <input type="email" name = "email" required="true" placeholder="E-mail"/> <br/>
                      <input type="password" name = "pass" id="input" required="true" placeholder="Password"/> 
                      <span id="output"></span><br/>
                      <input type="password" name="confPass" required="true" placeholder="Confirm Password"/> 
                      <script type="text/javascript" src="js/strong_password.js"></script><br/>
    </div>
    <button id ="button" type="submit"> Register </button>
</form>



<?php include_once('templates/footer.php'); ?>


