<?php  
if(isset($_SESSION['username'])){
if (!session_id()) session_start(); $_SESSION['logon'] = true;
header('location:www/home.php');
}
else {
	header('location:www/login.php');
}
 ?>
