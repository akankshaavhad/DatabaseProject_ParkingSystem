<?php
   session_start();
   unset($_SESSION["user"]);
 
   header('Refresh: 2; URL = index.php');
?>
