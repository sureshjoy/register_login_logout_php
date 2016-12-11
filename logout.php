<?php
session_start();
session_destroy();
unset($_SESSION['usename']);
$_SESSION['message'] ="your now logged out";
 header("location:login.php");

?>