<!DOCTYPE html>
<html>
<head>
	<title>YOUPOLL</title>

	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> <!-- for jquery-->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
  <script type="text/javascript" src="js/jquery-passy.js"></script> <!-- required for password rating-->
  <link rel="stylesheet" href="templates/style.css" type="text/css">
  <meta charset = "UTF-8">
</head>
<body>
  <div class = "navbar navbar-inverse navbar-static-top">
    <div class= "container">
      <a href="index.php" class= "navbar-brand">YOUPOLL</a>
      <button class ="navbar-toggle" data-toggle ="collapse" data-target =".navHeaderCollapse">
        <span class ="icon-bar"></span>
        <span class ="icon-bar"></span>
        <span class ="icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse navHeaderCollapse">
        <ul class ="nav navbar-nav navbar-right">
        <li>
          <form class="navbar-form navbar-left" role="search">
        <li class="dropdown-list">
          <a class="dropdown" id="dropdown">
           <div id="search_data_div">
            <input id="searchData" type="text" placeholder="Search">
           </div>
          </a>
            <ul class="dropdown-menu">
              <div id = "results">
              </div>
            </ul>
      </li>
          </form>
        </li>

        <li>
          <a href="about_body.php">About</a>
        </li>
        <li>
          <a href="help_body.php">Help</a>
        </li>

        <?php  session_start();
            if(isset($_SESSION['username'])){ ?>
						<li><a href='create_poll_body.php'>CreatePoll</a></li>
            <li><a href='profile_body.php'> <?php echo $_SESSION['username']; ?> </a></li>
            <li><a href='logout.php'>Logout</a></li>

        <?php } else{ ?>
          <li>
          <a href="login_body.php">Login</a>
        </li>
        <li>
          <a href="register_body.php">Register</a>
        </li>
        <?php } ?>


        </ul>
    </div>
  </div>
</div>
<?php include_once('search_body.php'); ?>