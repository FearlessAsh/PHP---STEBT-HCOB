<?php
   session_start();
   //after the session is started
   //empty out the session variables
   $_SESSION = array();
   //destroy the session
   session_destroy();
   //push the user to the main page
   print("<script>window.location='index.php#TopItems';</script>");
   //exit this page
   exit();
?>
