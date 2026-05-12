<?php
session_start();

// remove admin session
unset($_SESSION['admin']);

// destroy full session
session_destroy();

// redirect to login page
header("Location: index.php");
exit();
?>