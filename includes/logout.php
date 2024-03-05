<?php 
session_start();

$_SESSION["username"] =null ;
$_SESSION["firstname"] = null ;
$_SESSION["lastname"] =null ;
$_SESSION["user_role"] = null ;

// remove all session variables
session_unset();

// destroy the session
session_destroy();

header("Location: ../index.php");

?>