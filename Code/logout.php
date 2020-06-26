<?php
{
   session_start();
   //header("Location: index.php"); // Redirecting To Home Page
unset($_SESSION['username']);
$_SESSION['counter_sud']=0;
$_SESSION['counter_as']=0;
$_SESSION['counter_if']=0;
$_SESSION['counter_homer']=0;
//session_destroy();
}
?>