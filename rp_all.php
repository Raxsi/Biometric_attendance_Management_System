<?php
include('header.php'); 

require('db connect.php');
$usn=$frmdate=$todate=$sem=$name="";
$flag="0";
$time = "00:00";
$x=0;
$result="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(empty($_POST['sem'])) {
		$flag="1";
	}
	else {
		$sem = ($_POST['sem']);
	}
	if(empty($_POST['frmdate'])) {
		$flag="1";
	}
	else {
		$frmdate = ($_POST['frmdate']);
		$frmdate = $frmdate." ".$time;
	}
	if(empty($_POST['todate'])) {
		$flag="1";
	}
	else {
		$todate =($_POST['todate']);
		$todate = $todate." ".$time;
	}
	
	if($flag==1){
		$result='<div class="alert alert-danger">Field Missing!!!. Please try again</div>';
		header("Location:report_all.php");
}
else{
 $sql2="SELECT subid from subject_table WHERE semester = '${sem}'";
  $ret1 = $db->query($sql2);
  while($row1 = $ret1->fetchArray(SQLITE3_ASSOC) )
  	{
		
  
		$subid[$x] = $row1['subid'];
		$x=$x+1;
		
	}
	
}
}

?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '//Classes/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();
// Set document properties
$objPHPExcel->getProperties()->setCreator("kapi")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");
$fna = "rp_sem_".$sem.".xlsx";
$fname="download.php?file=".$fna;
?>
<html>
<link href="css/bootstrap.min.css" rel="stylesheet">
<body style="background-image: url('images/ccc.png');">
<button type="button" class="btn btn-danger" onclick="history.back(-1)" >Back</button><br/>
<div class="container">
<div class="table-responsive">
<table class="table table-bordered" >
	<thead><h2 >Report</h2>
	<a href="<?php echo $fname; ?>">Click here to download xlsx</a>
      <tr>
      <th>USN</th>
	  <th>NAME</th>
       <?php
       $z="C";
       $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'USN')
            ->setCellValue('B1', 'NAME');
	for($y=0;$y<$x;$y++){
       echo "<th>";
		   echo $subid[$y];
		   $a=$z."1";
		 #  echo $a;
		   $z++;
		  $objPHPExcel->getActiveSheet()->setCellValue($a, $subid[$y]);
		echo"</th>";
	}
     ?>
      </tr>
    </thead>
    <tbody>
    	<?php
    	$c='A'; $r="2";
		$sql ="SELECT student_name,usn from student where Semester = '${sem}'";
$ret = $db->query($sql);
		while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
   
   $usn = $row['usn'];
   echo "<tr>";
   echo "<td>".$row['usn']."</td>"; $objPHPExcel->getActiveSheet()->setCellValue($c.$r, $row['usn']); $c++;
   echo "<td>".$row['student_name']."</td>"; $objPHPExcel->getActiveSheet()->setCellValue($c.$r, $row['student_name']); $c++;
for($y=0;$y<$x;$y++){
		$sql3 ="select count(a.sid) as att from att a,student s,subject_table st where s.usn=a.sid and st.subid=a.subid and a.sid='${usn}' and a.subid='${subid[$y]}' and a.date >= '${frmdate}' and a.date <= '${todate}'";
	 $ret2 = $db->query($sql3);
  while($row2 = $ret2->fetchArray(SQLITE3_ASSOC) ){
  
   	echo "<td>".$row2['att']."</td>";$objPHPExcel->getActiveSheet()->setCellValue($c.$r, $row2['att']); $c++;
   	
   	}
	}
	echo "</tr>";$r++;$c='A';
	}

?>
    </tbody>
</table>
</div>
</div>
<?php include('footer.php'); ?>
</body>
</html>
<?php
$fname1="rp_sem_".$sem.".xlsx";
$objPHPExcel->getActiveSheet()->setTitle('$fnmae1');
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save($fname1);
#$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
#$objWriter->save(str_replace('.php', '.xls', __FILE__));
exit;
?>
