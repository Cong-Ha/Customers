<?php
session_start();    // start session
$_SESSION=[];      // clear session data
session_unset();  // unset session
session_destroy();// destroy session
setcookie(session_name(), '', time() -3600, '/'); //remove session cookie
header('Location: index.php');
exit();
?>