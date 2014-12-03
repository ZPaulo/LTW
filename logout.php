<?php

function logout(){
session_start();


session_destroy();
header('Location: login_body.php');
exit;
}
 
logout();
?>