<?php
require('db connect.php');
include('header.php');
ini_set("max_execution_time", 0);
if (!session_id()) session_start();
 if (!$_SESSION['logon']){ header("Location:home.php"); 
die(); }

/** Include path **/
set_include_path(get_include_path() . PATH_SEPARATOR . '../../../Classes/');

/** PHPExcel_IOFactory */
include('Classes/PHPExcel/IOFactory.php');
$db->exec('BEGIN;');
if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_FILES['file']))
{
  // loop all files
  foreach ( $_FILES['file']['tmp_name'] as $i => $name )
  {

$inputFileName =$_FILES['file']['tmp_name'][$i];

$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

$arrlength = count($sheetData);
$date = $sheetData['3']['F'];
$st = "P";

for($x = 5; $x < $arrlength; $x++) {
	if($sheetData[$x]['A']=="ISE" || is_null($sheetData[$x]['B']))
	continue;
	else if($sheetData[$x]['E']=="Faculty"){
		$subid = $sheetData[$x]['C'];
		$period = $sheetData[$x]['A'];
	}
	else{
		$sid = $sheetData[$x]['B'];
		$time = $date. " ". $sheetData[$x]['F'];
		#echo $sid . " " . $time . "<br>";
$db->query("insert into att('sid','status','period','subid','date') values('$sid','$st','$period','$subid','$time')");
/*$smt = $db->prepare("insert into att(sid,status,period,subid,date) values (':sid', ':status',':period',':subid',':date')");
$smt->bindValue(':sid', $sid);
$smt->bindParam(':status', $st);
$smt->bindParam(':period', $period);
$smt->bindParam(':subid', $subid);
$smt->bindParam(':date', $time);
$smt->execute(); */

	}
} }}
   $db->exec('COMMIT;');
  $db->close();
unset($db);
?>
<html>
<head><link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/button.css" rel="stylesheet">
    	
    </head>	

<body style="background-image: url('images/ccc.png');">
<button type="button" class="btn btn-danger" onclick="location.href='att_upload.php';" >Back</button>
<h1 style="color: green">Uploaded Successfully</h1>
<?php include('footer.php'); ?>
</body>

</html>




