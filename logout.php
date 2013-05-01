<?php    
// Unset all of the session variables.
session_start();
$_SESSION = array();

// Finally, destroy the session.
session_destroy();
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'index.php';
header("Location: http://$host$uri/$extra");
exit();
?>