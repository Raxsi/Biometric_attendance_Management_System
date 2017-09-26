<?php 
if (!session_id())
session_start();
if (!$_SESSION['logon'])
{ header("Location:login.php");
die();}
if (isset($_GET['file'])) {
$file = $_GET['file'];
if (file_exists($file) && is_readable($file) && preg_match('/\.xlsx$/',$file)) {
header('Content-Type: application/xlsx');
header("Content-Disposition: attachment; filename=\"$file\"");
readfile($file);
}
} else {
header("HTTP/1.0 404 Not Found");
echo "<h1>Error 404: File Not Found: <br /><em>$file</em></h1>";
}
?>