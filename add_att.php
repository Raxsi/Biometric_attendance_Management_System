<?php
include('header.php'); 
require('db connect.php');

?> 
<?php
$name=$sid=$status=$period=$subid=$date="";
$flag="0";
$result="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
	if(empty($_POST['sid'])) {
		$flag="1";
	}
	else {
		$sid = strtoupper( ($_POST['sid']));
	}
	if(empty($_POST['status'])) {
		$flag="1";
	}
	else {
		$status = strtoupper(($_POST['status']));
	}
	if(empty($_POST['period'])) {
		$flag="1";
	}
	else {
		$period = strtoupper(($_POST['period']));
	}
	if(empty($_POST['subid'])) {
		$flag="1";
	}
	else {
		$subid = strtoupper(($_POST['subid']));
	}
	if(empty($_POST['date'])) {
		$flag="1";
	}
	else {
		$date =($_POST['date']);
	}
if($flag==1){
	
$result='<div class="alert alert-danger">Field Missing!!!. Please try again</div>';
}

else{
	$sql2=<<<EOD
select usn from student where usn='${sid}';
EOD;
$ret = $db->query($sql2);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
   $abc=$row['usn'];}
  if($abc>0){
  
 $sql =<<<EOD
insert into att(sid,status,period,subid,date) values('$sid','$status','$period','$subid','$date');
EOD;

$db->exec($sql);
$result='<div class="alert alert-success">Successfully Added</div>';

}
else
$result='<div class="alert alert-success">USN not found</div>';
}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Bootstrap core CSS -->
   <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/button.css" rel="stylesheet">
 <!-- Custom styles for this template -->
  </head>

  <body style="background-image: url('images/ccc.png');">
<button type="button" class="btn btn-danger" onclick="location.href='home.php';" >Back</button>
<div class="form-group">
        
    </div>
    <div class="container" >
        
        <div class="form-group">
            
        <h2 class="form-heading" style="font-size: 40px;color: white">Add Attendence</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
            <div class="col-sm-3 col-sm-offset-2">
        
       <a><label for="sid">sid</label> </a>
            <input type="textarea" class="form-control" id="sid" placeholder="sid" name="sid" required>
       <a><label for="status">status</label> </a>
            <input type="textarea" class="form-control" id="status" placeholder="P" name="status" required>
        <a><label for="period">period</label></a>
            <input type="textarea" class="form-control" id="period" placeholder="P#" name="period" required>
             <br />
            <button class="btn btn-success" type="submit" name="submit">Submit</button>
            </div>
            
             <div class="col-sm-3 col-sm-offset-0">
             
       <a><label for="subid">subid</label></a>
            <input type="subid" class="form-control" id="subid" placeholder="subid" name="subid">
       <a><label for="date">date</label></a>
	   <input type="subid" class="form-control" id="date" placeholder="dd/mm/yyyy hh:mm" name="date">
	   <div class="col-sm-6 col-sm-offset-2">
          <?php echo $result; ?>   
        </div>
        </div>
        </form>
        <?php include('footer.php'); ?>
        </body>
   		 </html>