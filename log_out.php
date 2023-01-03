<?php 
 session_start();
 session_unset();
 session_destroy();
  echo "Successfully Log out!";

 ?>
 <a href="login.php">Go back to Login Page</a>