<?php
require('db connect.php');
include('header.php');
ini_set("max_execution_time", 0);

set_include_path(get_include_path() . PATH_SEPARATOR . '../../../Classes/');

/** PHPExcel_IOFactory */
include('Classes/PHPExcel/IOFactory.php');
$inputFileName = $_FILES['file']['tmp_name'];
$usn=$name=$dob=$gender=$email=$phone=$sem="";
$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
$arrlength = count($sheetData);
for($x = 1; $x < $arrlength; $x++) {
	$usn = $sheetData[$x]['A'];
	$name = $sheetData[$x]['B'];
	$dob = $sheetData[$x]['C'];
	$gender = $sheetData[$x]['D'];
	$email = $sheetData[$x]['E'];
	$phone = $sheetData[$x]['F'];
	$sem = $sheetData[$x]['G'];
	
$db->exec("Insert into student('usn','student_name','dob','gender','email','semester','phone') values ('$usn','$name','$dob','$gender','$email','$sem','$phone')");
}
?>