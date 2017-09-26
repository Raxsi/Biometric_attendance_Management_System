<?php
include('header.php'); 
require('db connect.php');
?> 
<?php
$usn=$frmdate=$todate=$sem=$name="";
$flag="0";
$time = "00:00";
$x=0;
$result="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST['usn'])) {
    $flag="1";
  } else {
    $usn =strtoupper(($_POST['usn']));
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
		header("Location:report_single.php");
}
else{
	$sql ="SELECT student_name,Semester from student WHERE usn = '${usn}'";
$ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
   $sem=$row['Semester'];
   $name = $row['student_name'];
   	}
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

<html>
<link href="css/bootstrap.min.css" rel="stylesheet">
<body style="background-image: url('images/ccc.png');">
<button type="button" class="btn btn-danger" onclick="history.back(-1)" >Back</button><br/>
<div class="container">
<div class="table-responsive">
<table class="table table-bordered" >
	<thead><h2><?php echo $name."-".$usn?></h2>
      <tr>
        <th>SUBID</th>
        <th>ATTENDANCE</th>
      </tr>
    </thead>
    <tbody>
    	<?php
for($y=0;$y<$x;$y++){
		$sql3 ="select count(a.sid) as att from att a,student s,subject_table st where s.usn=a.sid and st.subid=a.subid and a.sid='${usn}' and a.subid='${subid[$y]}' and a.date >= '${frmdate}' and a.date <= '${todate}'";
	 $ret2 = $db->query($sql3);
  while($row2 = $ret2->fetchArray(SQLITE3_ASSOC) ){
		
   	echo "<tr>";
   	echo "<td>".$subid[$y]."</td>";
   	echo "<td>".$row2['att']."</td>";
   	echo "</tr>";
   	}
	
}
?>
    </tbody>
</table>
</div>
</div>
<?php include('footer.php'); ?>
</body>
</html>