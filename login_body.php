
<?php include_once('templates/header.php'); ?>

    <?php

    session_start();

    if(isset($_SESSION['Msg']))
    echo $_SESSION['Msg'];

    unset($_SESSION['Msg']);

    ?>

<!-- <div id ="login">

<form id="Login" action = "login.php" method = "post">
	 <p><h1> Login </h1> <p>
       <br/>
<div class="Info"><input type="text" name = "user" placeholder="Username"><br/>
                  <input type="password" name = "pass" placeholder="Password"><br/>
</div>
    <button id="button" type="submit"> Log in </button>
</form>
</div>-->

<div class="jumbotron" id="j2">
 <div class="container">

      <form class="form-signin" role="form">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->
</div>


<?php include_once('templates/footer.php'); ?>
