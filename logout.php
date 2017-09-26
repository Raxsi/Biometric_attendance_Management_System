<?php
/**
 * The logout file
 * destroys the session
 * expires the cookie
 * redirects to login.php
 */
session_start();
session_destroy();
session_unset($_SESSION['username']);
header("location: login.php");
?>